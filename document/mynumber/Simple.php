<?php

class Simple
{

    // 正面参照物列表
    public const frontText = array(
        "住",
        "所",
        "意",
        "思",
        "腸",
        "眼",
        "肝",
        "腎",
        "及",
        "小"
    );

    // 背面参照物列表
    public const backText = array(
        "拾",
        "得",
        "手",
        "数",
        "下",
        "禁",
        "認",
        "項",
        "時",
        "付"
    );

    // simple
    private $annotation = null;

    // pages
    private $simplePages = null;

    // blocks
    private $simpleBlocks = null;

    // symbols
    private $simpleSymbols = null;

    // 是否包含正面
    private $hasFront = false;

    // 是否包含背面
    private $hasBack = false;

    // 正面参照symbol
    private $referenceSymbolFront = null;

    // 背面参照symbol
    private $referenceSymbolBack = null;

    // 正面参照block
    private $referenceBlockFront = null;

    // 背面参照block
    private $referenceBlockBack = null;

    // 构造函数
    public static function withAnnotation($annotation)
    {
        $instance = new self();
        $instance->annotation = $annotation;
        $instance->simplePages = $annotation->getPages();
        $instance->simpleBlocks = ($annotation->getPages())[0]->getBlocks();
        
        $matchingTimesFront = 0;
        $matchingTimesBack = 0;
        
        if ($annotation) {
            foreach ($instance->simpleBlocks as $block) {
                foreach ($block->getParagraphs() as $paragraph) {
                    foreach ($paragraph->getWords() as $word) {
                        foreach ($word->getSymbols() as $symbol) {
                            ($instance->simpleSymbols)[] = $symbol;
                            // TODO
                            if (in_array($symbol->getText(), self::frontText)) {
                                if (null === $instance->referenceSymbolFront || $symbol->getConfidence() > $instance->referenceSymbolFront->getConfidence()) {
                                    $instance->referenceSymbolFront = $symbol;
                                    $instance->referenceBlockFront = $block;
                                }
                                $matchingTimesFront ++;
                            }
                            
                            if (in_array($symbol->getText(), self::backText)) {
                                if (null === $instance->referenceSymbolBack || $symbol->getConfidence() > $instance->referenceSymbolBack->getConfidence()) {
                                    $instance->referenceSymbolBack = $symbol;
                                    $instance->referenceBlockBack = $block;
                                }
                                $matchingTimesBack ++;
                            }
                            // TODO
                        }
                    }
                }
            }
            
            if ($matchingTimesFront < 3 and $matchingTimesBack < 3) {
                return null;
            }
            
            if ($matchingTimesFront >= 3) {
                $instance->hasFront = true;
                print('Reference symbol front: ' . $instance->referenceSymbolFront->getText() . '(' . $instance->referenceSymbolFront->getConfidence() . ')' . PHP_EOL);
            } else {
                $instance->referenceSymbolFront = null;
            }
            
            if ($matchingTimesBack >= 3) {
                $instance->hasBack = true;
                print('Reference symbol back: ' . $instance->referenceSymbolBack->getText() . '(' . $instance->referenceSymbolBack->getConfidence() . ')' . PHP_EOL);
            } else {
                $instance->referenceSymbolBack = null;
            }
            
            $vertices = $instance->referenceBlockFront->getBoundingBox()->getVertices();
            $bounds = [];
            foreach ($vertices as $vertex) {
                $bounds[] = sprintf('(%d,%d)', $vertex->getX(), $vertex->getY());
            }
            print('ReferenceBlockFront Bounds: ' . join(', ', $bounds) . PHP_EOL);
            
            $vertices = $instance->referenceBlockBack->getBoundingBox()->getVertices();
            $bounds = [];
            foreach ($vertices as $vertex) {
                $bounds[] = sprintf('(%d,%d)', $vertex->getX(), $vertex->getY());
            }
            print('ReferenceBlockBack Bounds: ' . join(', ', $bounds) . PHP_EOL);
            
            return $instance;
        } else {
            print('No text found' . PHP_EOL);
            return null;
        }
    }

    // 通过参照物取特定范围
    public static function getArea($referenceSymbol, Array $referenceTimes)
    {
        $vertices = $referenceSymbol->getBoundingBox()->getVertices();
        
        $referenceWidth = Triangle::withAxis(Axis::withVertex($vertices[0]), Axis::withVertex($vertices[1]));
        $referenceHeight = Triangle::withAxis(Axis::withVertex($vertices[0]), Axis::withVertex($vertices[3]));
        
        $referenceArea = array();
        
        $leftX = $vertices[0]->getX() - $referenceWidth->getAdjacent() * $referenceTimes[0];
        $leftY = $vertices[0]->getY() - $referenceWidth->getOpposite() * $referenceTimes[0];
        $referenceArea[0] = Axis::withXY($leftX, $leftY);
        echo "referenceArea[0]:" . $referenceArea[0]->getX() . "," . $referenceArea[0]->getY() . PHP_EOL;
        
        $upX = $vertices[0]->getX() - $referenceHeight->getAdjacent() * $referenceTimes[1];
        $upY = $vertices[0]->getY() - $referenceHeight->getOpposite() * $referenceTimes[1];
        $referenceArea[1] = Axis::withXY($upX, $upY);
        echo "referenceArea[1]:" . $referenceArea[1]->getX() . "," . $referenceArea[1]->getY() . PHP_EOL;
        
        $rightX = $vertices[0]->getX() + $referenceWidth->getAdjacent() * $referenceTimes[2];
        $rightY = $vertices[0]->getY() + $referenceWidth->getOpposite() * $referenceTimes[2];
        $referenceArea[2] = Axis::withXY($rightX, $rightY);
        echo "referenceArea[2]:" . $referenceArea[2]->getX() . "," . $referenceArea[2]->getY() . PHP_EOL;
        
        $downX = $vertices[0]->getX() + $referenceHeight->getAdjacent() * $referenceTimes[3];
        $downY = $vertices[0]->getY() + $referenceHeight->getOpposite() * $referenceTimes[3];
        $referenceArea[3] = Axis::withXY($downX, $downY);
        echo "referenceArea[3]:" . $referenceArea[3]->getX() . "," . $referenceArea[3]->getY() . PHP_EOL;
        
        $triangleLeftUp = Triangle::withAxis($referenceArea[0], Axis::withVertex($vertices[0]));
        $triangleRightUp = Triangle::withAxis($referenceArea[1], Axis::withVertex($vertices[0]));
        $triangleRightDown = Triangle::withAxis($referenceArea[2], Axis::withVertex($vertices[0]));
        $triangleLeftDown = Triangle::withAxis($referenceArea[3], Axis::withVertex($vertices[0]));
        
        $area = array();
        $area[0] = Triangle::withLine($triangleLeftUp->getAdjacent(), $triangleLeftUp->getOpposite(), null, $referenceArea[1])->getPointLeft();
        $area[1] = Triangle::withLine($triangleRightUp->getAdjacent(), $triangleRightUp->getOpposite(), null, $referenceArea[2])->getPointLeft();
        $area[2] = Triangle::withLine($triangleRightDown->getAdjacent(), $triangleRightDown->getOpposite(), null, $referenceArea[3])->getPointLeft();
        $area[3] = Triangle::withLine($triangleLeftDown->getAdjacent(), $triangleLeftDown->getOpposite(), null, $referenceArea[0])->getPointLeft();
        
        echo "area [0]:" . "x=" . $area[0]->getX() . ", y=" . $area[0]->getY() . PHP_EOL;
        echo "area [1]:" . "x=" . $area[1]->getX() . ", y=" . $area[1]->getY() . PHP_EOL;
        echo "area [2]:" . "x=" . $area[2]->getX() . ", y=" . $area[2]->getY() . PHP_EOL;
        echo "area [3]:" . "x=" . $area[3]->getX() . ", y=" . $area[3]->getY() . PHP_EOL;
        
        return $area;
    }

    public static function cutArea(Array $area)
    {
        $xs = array(
            $area[0]->getX(),
            $area[1]->getX(),
            $area[2]->getX(),
            $area[3]->getX()
        );
        $ys = array(
            $area[0]->getY(),
            $area[1]->getY(),
            $area[2]->getY(),
            $area[3]->getY()
        );
        
        return array(
            "x" => min($xs),
            "y" => min($ys),
            "width" => max($xs) - min($xs),
            "height" => max($ys) - min($ys)
        );
    }

    public function getObjectByRange(Array $area, $referenceSymbol)
    {
        $obj = null;
        
        $symbols = $this->getSimpleSymbols();
        $symbolsLength = count($symbols);
        $startSymbol = null;
        $starLength = null;
        $endSymbol = null;
        $endLength = null;
        for ($i = 0; $i < $symbolsLength; $i ++) {
            $startTriangle = Triangle::withAxis($area[0], Axis::withVertex($symbols[$i]->boundingBox->vertices[0]));
            $endTriangle = Triangle::withAxis(Axis::withVertex($symbols[$i]->boundingBox->vertices[1]), $area[1]);
            
            $thisLengthFromStart = abs(Triangle::withAxis($area[0], Axis::withVertex($symbols[$i]->boundingBox->vertices[0]))->getHypotenuse());
            $thisLengthFromEnd = abs(Triangle::withAxis(Axis::withVertex($symbols[$i]->boundingBox->vertices[1]), $area[1])->getHypotenuse());
            
            if (null === $starLength or $starLength >= $thisLengthFromStart) {
                
                if ("■" == $symbols[$i]->text) {} else {
                    $startSymbol = &$symbols[$i];
                    $starLength = $thisLengthFromStart;
                }
            }
            
            if (null === $endLength or $endLength >= $thisLengthFromEnd) {
                $endSymbol = &$symbols[$i];
                $endLength = $thisLengthFromEnd;
            }
        }
        
        $obj .= $startSymbol->text;
        
        while ($startSymbol !== $endSymbol) {
            $previousSymbol = $startSymbol;
            $starLength = null;
            for ($i = 0; $i < $symbolsLength; $i ++) {
                if ($startSymbol == $symbols[$i]) {
                    continue;
                }
                $thisLengthFromStart = abs(Triangle::withAxis(Axis::withVertex($startSymbol->boundingBox->vertices[1]), Axis::withVertex($symbols[$i]->boundingBox->vertices[0]))->getHypotenuse());
                
                if (null === $starLength or $starLength >= $thisLengthFromStart) {
                    $previousSymbol = &$symbols[$i];
                    $starLength = $thisLengthFromStart;
                }
            }
            $startSymbol = &$previousSymbol;
            
            $obj .= $startSymbol->text;
        }
        return $obj;
    }

    /**
     *
     * @return mixed
     */
    public function getAnnotation()
    {
        return $this->annotation;
    }

    /**
     *
     * @return mixed
     */
    public function getSimplePages()
    {
        return $this->simplePages;
    }

    /**
     *
     * @return mixed
     */
    public function getSimpleBlocks()
    {
        return $this->simpleBlocks;
    }

    /**
     *
     * @return mixed
     */
    public function getReferenceSymbolFront()
    {
        return $this->referenceSymbolFront;
    }

    /**
     *
     * @return mixed
     */
    public function getReferenceSymbolBack()
    {
        return $this->referenceSymbolBack;
    }

    /**
     *
     * @return mixed
     */
    public function getReferenceBlockFront()
    {
        return $this->referenceBlockFront;
    }

    /**
     *
     * @return mixed
     */
    public function getReferenceBlockBack()
    {
        return $this->referenceBlockBack;
    }

    /**
     *
     * @param mixed $annotation
     */
    public function setAnnotation($annotation)
    {
        $this->annotation = $annotation;
    }

    /**
     *
     * @param mixed $simplePages
     */
    public function setSimplePages($simplePages)
    {
        $this->simplePages = $simplePages;
    }

    /**
     *
     * @param mixed $simpleBlocks
     */
    public function setSimpleBlocks($simpleBlocks)
    {
        $this->simpleBlocks = $simpleBlocks;
    }

    /**
     *
     * @param multitype:unknown $simpleSymbols
     */
    public function setSimpleSymbols($simpleSymbols)
    {
        $this->simpleSymbols = $simpleSymbols;
    }

    /**
     *
     * @param mixed $referenceSymbolFront
     */
    public function setReferenceSymbolFront($referenceSymbolFront)
    {
        $this->referenceSymbolFront = $referenceSymbolFront;
    }

    /**
     *
     * @param mixed $referenceSymbolBack
     */
    public function setReferenceSymbolBack($referenceSymbolBack)
    {
        $this->referenceSymbolBack = $referenceSymbolBack;
    }

    /**
     *
     * @param mixed $referenceBlockFront
     */
    public function setReferenceBlockFront($referenceBlockFront)
    {
        $this->referenceBlockFront = $referenceBlockFront;
    }

    /**
     *
     * @param mixed $referenceBlockBack
     */
    public function setReferenceBlockBack($referenceBlockBack)
    {
        $this->referenceBlockBack = $referenceBlockBack;
    }

    /**
     *
     * @return boolean
     */
    public function isHasFront()
    {
        return $this->hasFront;
    }

    /**
     *
     * @return boolean
     */
    public function isHasBack()
    {
        return $this->hasBack;
    }

    /**
     *
     * @param boolean $hasFront
     */
    public function setHasFront($hasFront)
    {
        $this->hasFront = $hasFront;
    }

    /**
     *
     * @param boolean $hasBack
     */
    public function setHasBack($hasBack)
    {
        $this->hasBack = $hasBack;
    }
    
    
}
