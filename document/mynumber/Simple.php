<?php
use Google\Cloud\Vision\V1\TextAnnotation;

class Simple
{

    // 卡的宽度mm
    public const cardWidth = 85.5;

    // 卡的高度mm
    public const cardHeight = 54;

    // 背面参照物列表
    public const backText = array(
        "拾", // 13 X 14
        "得", // 13 X 14
        "方", // 13 X 14
        "手", // 13 X 14
        "数", // 13 X 14
        "間", // 13 X 14
        "認", // 10 X 11
        "禁", // 10 X 11
        "載", // 10 X 11
        "項" // 10 X 11
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

    // 正面参照symbol array
    private $comparativeSymbolsFront = array();

    // 背面参照symbol array
    private $comparativeSymbolsBack = array();

    // 正面参照symbol
    private $referenceSymbolFront = null;

    // 背面参照symbol
    private $referenceSymbolBack = null;

    // 正面参照block
    private $referenceBlockFront = null;

    // 背面参照block
    private $referenceBlockBack = null;

    // 正面以x坐标计算得出的pix/mm
    private $widthPixMmFront = null;

    // 正面以y坐标计算得出的pix/mm
    private $heightPixMmFront = null;

    // 背面以x坐标计算得出的pix/mm
    private $widthPixMmBack = null;

    // 背面以y坐标计算得出的pix/mm
    private $heightPixMmBack = null;

    /**
     * 构造函数
     *
     * @param Simple $simple
     */
    public static function withAnnotation(TextAnnotation $annotation)
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
                            if (in_array($symbol->getText(), SimpleFront::referenceTextFront)) {
                                ($instance->comparativeSymbolsFront)[$symbol->getText()] = $symbol;
                                if (null === $instance->referenceSymbolFront || $symbol->getConfidence() > $instance->referenceSymbolFront->getConfidence()) {
                                    $instance->referenceSymbolFront = $symbol;
                                    $instance->referenceBlockFront = $block;
                                }
                                $matchingTimesFront ++;
                            }
                            
                            if (in_array($symbol->getText(), self::backText)) {
                                ($instance->$comparativeSymbolsBack)[$symbol->getText()] = $symbol;
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
                echo "无法找到足够的参照物";
                return null;
            }
            
            if ($matchingTimesFront >= 3 and $matchingTimesBack >= 3) {
                echo "两面的识别请联系公司代表";
                return null;
            }
            
            if ($matchingTimesFront >= 3) {
                $instance->hasFront = true;
                
                print('Reference symbol front: ' . $instance->referenceSymbolFront->getText() . '(' . $instance->referenceSymbolFront->getConfidence() . ')' . PHP_EOL);
                
                $vertices = $instance->referenceBlockFront->getBoundingBox()->getVertices();
                $bounds = [];
                foreach ($vertices as $vertex) {
                    $bounds[] = sprintf('(%d,%d)', $vertex->getX(), $vertex->getY());
                }
                print('Reference block front vertices: ' . join(', ', $bounds) . PHP_EOL);
                
                $instance->setWidthPixMmFront();
            } else {
                $instance->hasFront = false;
                $instance->referenceSymbolFront = null;
            }
            
            if ($matchingTimesBack >= 3) {
                $instance->hasBack = true;
                print('Reference symbol back: ' . $instance->referenceSymbolBack->getText() . '(' . $instance->referenceSymbolBack->getConfidence() . ')' . PHP_EOL);
                
                $vertices = $instance->referenceBlockBack->getBoundingBox()->getVertices();
                $bounds = [];
                foreach ($vertices as $vertex) {
                    $bounds[] = sprintf('(%d,%d)', $vertex->getX(), $vertex->getY());
                }
                print('ReferenceBlockBack Bounds: ' . join(', ', $bounds) . PHP_EOL);
            } else {
                $instance->hasBack = false;
                $instance->referenceSymbolBack = null;
            }
            
            return $instance;
        } else {
            print('No text found' . PHP_EOL);
            return null;
        }
    }

    /**
     * 取得卡区域的剪切坐标
     *
     * @param Array $area
     */
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

    // public function getObjectByRange(Array $area, $referenceSymbol)
    // {
    // $obj = null;
    
    // $symbols = $this->getSimpleSymbols();
    // $symbolsLength = count($symbols);
    // $startSymbol = null;
    // $starLength = null;
    // $endSymbol = null;
    // $endLength = null;
    // for ($i = 0; $i < $symbolsLength; $i ++) {
    // $startTriangle = Triangle::withAxis($area[0], Axis::withVertex($symbols[$i]->boundingBox->vertices[0]));
    // $endTriangle = Triangle::withAxis(Axis::withVertex($symbols[$i]->boundingBox->vertices[1]), $area[1]);
    
    // $thisLengthFromStart = abs(Triangle::withAxis($area[0], Axis::withVertex($symbols[$i]->boundingBox->vertices[0]))->getHypotenuse());
    // $thisLengthFromEnd = abs(Triangle::withAxis(Axis::withVertex($symbols[$i]->boundingBox->vertices[1]), $area[1])->getHypotenuse());
    
    // if (null === $starLength or $starLength >= $thisLengthFromStart) {
    
    // if ("■" == $symbols[$i]->text) {} else {
    // $startSymbol = &$symbols[$i];
    // $starLength = $thisLengthFromStart;
    // }
    // }
    
    // if (null === $endLength or $endLength >= $thisLengthFromEnd) {
    // $endSymbol = &$symbols[$i];
    // $endLength = $thisLengthFromEnd;
    // }
    // }
    
    // $obj .= $startSymbol->text;
    
    // while ($startSymbol !== $endSymbol) {
    // $previousSymbol = $startSymbol;
    // $starLength = null;
    // for ($i = 0; $i < $symbolsLength; $i ++) {
    // if ($startSymbol == $symbols[$i]) {
    // continue;
    // }
    // $thisLengthFromStart = abs(Triangle::withAxis(Axis::withVertex($startSymbol->boundingBox->vertices[1]), Axis::withVertex($symbols[$i]->boundingBox->vertices[0]))->getHypotenuse());
    
    // if (null === $starLength or $starLength >= $thisLengthFromStart) {
    // $previousSymbol = &$symbols[$i];
    // $starLength = $thisLengthFromStart;
    // }
    // }
    // $startSymbol = &$previousSymbol;
    
    // $obj .= $startSymbol->text;
    // }
    // return $obj;
    // }
    
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
    public function getSimpleSymbols()
    {
        return $this->simpleSymbols;
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
     * @return multitype:
     */
    public function getComparativeSymbolsFront()
    {
        return $this->comparativeSymbolsFront;
    }

    /**
     *
     * @return multitype:
     */
    public function getComparativeSymbolsBack()
    {
        return $this->comparativeSymbolsBack;
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
     * @param mixed $simpleSymbols
     */
    public function setSimpleSymbols($simpleSymbols)
    {
        $this->simpleSymbols = $simpleSymbols;
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

    /**
     *
     * @param multitype: $comparativeSymbolsFront
     */
    public function setComparativeSymbolsFront($comparativeSymbolsFront)
    {
        $this->comparativeSymbolsFront = $comparativeSymbolsFront;
    }

    /**
     *
     * @param multitype: $comparativeSymbolsBack
     */
    public function setComparativeSymbolsBack($comparativeSymbolsBack)
    {
        $this->comparativeSymbolsBack = $comparativeSymbolsBack;
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
     * @return mixed
     */
    public function getWidthPixMmFront()
    {
        return $this->widthPixMmFront;
    }

    /**
     *
     * @return mixed
     */
    public function getHeightPixMmFront()
    {
        return $this->heightPixMmFront;
    }

    /**
     *
     * @return mixed
     */
    public function getWidthPixMmBack()
    {
        return $this->widthPixMmBack;
    }

    /**
     *
     * @return mixed
     */
    public function getHeightPixMmBack()
    {
        return $this->heightPixMmBack;
    }

    /**
     *
     * @param mixed $widthPixMmFront
     */
    public function setWidthPixMmFront($widthPixMmFront = null)
    {
        if (null !== $widthPixMmFront) {
            $this->widthPixMmFront = $widthPixMmFront;
            return;
        }
        
        $comparativeSymbols = (SimpleFront::comparativeSymbolsDistance[$this->referenceSymbolFront->getText()])["width"];
        
        foreach ($comparativeSymbols as $key => $comparativeSymbol) {
            if (array_key_exists($key, $this->comparativeSymbolsFront)) {
                $widthPixMmFront = Triangle::withAxis(Axis::withVertex(($this->referenceSymbolFront->getBoundingBox()->getVertices())[0]), Axis::withVertex(($this->comparativeSymbolsFront[$key]->getBoundingBox()->getVertices())[0]))->getHypotenuse() / $comparativeSymbol;
                break;
            }
        }
        
        if (null === $widthPixMmFront) {
            echo "setWidthPixMmFront error 1";
        }
        
        $this->widthPixMmFront = $widthPixMmFront;
    }

    /**
     *
     * @param mixed $heightPixMmFront
     */
    public function setHeightPixMmFront($heightPixMmFront)
    {
        $this->heightPixMmFront = $heightPixMmFront;
    }

    /**
     *
     * @param mixed $widthPixMmBack
     */
    public function setWidthPixMmBack($widthPixMmBack)
    {
        $this->widthPixMmBack = $widthPixMmBack;
    }

    /**
     * @param mixed $heightPixMmBack
     */
    public function setHeightPixMmBack($heightPixMmBack)
    {
        $this->heightPixMmBack = $heightPixMmBack;
    }


}
