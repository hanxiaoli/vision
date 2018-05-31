<?php

class SimpleBack extends Simple
{

    // 参照物列表
    const backText = "~拾得手数下禁認項時付";

    // 参照物对象
    private $referenceSymbol = null;

    // 卡范围
    private $cardArea = null;

    // MyNumber范围
    private $mynumberArea = null;

    // MyNumber号码
    private $mynumber = null;

    // 构造函数
    public static function withInput($input)
    {
        $instance = new self();
        $instance::setSimple(json_decode($input));
        $instance->referenceSymbol = $instance->referenceSymbol(self::backText);
        echo "reference text:" . $instance->referenceSymbol->text . PHP_EOL;
        echo "reference confidence:" . $instance->referenceSymbol->text . PHP_EOL;
        
        return $instance;
    }

    // 构造函数
    public static function withSimple($content)
    {
        $instance = new self();
        $instance->referenceSymbol = $instance->referenceSymbol(self::backText);
        echo "reference text:" . $instance->referenceSymbol->text . PHP_EOL;
        echo "reference confidence:" . $instance->referenceSymbol->confidence . PHP_EOL;
        return $instance;
    }

    // 取号码
    public function mynumber()
    {
        $this->mynumber = null;
        if (null === $this->mynumberArea) {
            if ("認" === $this->referenceSymbol->text) {
                $this->mynumberArea = $this->mynumberAreaByMitome();
            }
        }
        
        $this->mynumber = $this->getObjectByRange($this->mynumberArea, $this->referenceSymbol);
        
        echo "Mynumber:" . $this->mynumber . PHP_EOL;
        
        return $this->mynumber;
    }

    // 取卡范围
    public function cardAreaByMitome()
    {
        $referenceArea = array();
        
        $leftX = $this->referenceSymbol->boundingBox->vertices[0]->x - ($this->referenceSymbol->boundingBox->vertices[1]->x - $this->referenceSymbol->boundingBox->vertices[0]->x) * 18;
        $leftY = $this->referenceSymbol->boundingBox->vertices[0]->y - ($this->referenceSymbol->boundingBox->vertices[1]->y - $this->referenceSymbol->boundingBox->vertices[0]->y) * 18;
        $referenceArea[0] = Axis::withXY($leftX, $leftY);
        
        $upX = $this->referenceSymbol->boundingBox->vertices[0]->x - ($this->referenceSymbol->boundingBox->vertices[3]->x - $this->referenceSymbol->boundingBox->vertices[0]->x) * 16;
        $upY = $this->referenceSymbol->boundingBox->vertices[0]->y - ($this->referenceSymbol->boundingBox->vertices[3]->y - $this->referenceSymbol->boundingBox->vertices[0]->y) * 16;
        $referenceArea[1] = Axis::withXY($upX, $upY);
        
        $rightX = $this->referenceSymbol->boundingBox->vertices[0]->x + ($this->referenceSymbol->boundingBox->vertices[1]->x - $this->referenceSymbol->boundingBox->vertices[0]->x) * 47;
        $rightY = $this->referenceSymbol->boundingBox->vertices[0]->y + ($this->referenceSymbol->boundingBox->vertices[1]->y - $this->referenceSymbol->boundingBox->vertices[0]->y) * 47;
        $referenceArea[2] = Axis::withXY($rightX, $rightY);
        
        $downX = $this->referenceSymbol->boundingBox->vertices[0]->x + ($this->referenceSymbol->boundingBox->vertices[3]->x - $this->referenceSymbol->boundingBox->vertices[0]->x) * 11;
        $downY = $this->referenceSymbol->boundingBox->vertices[0]->y + ($this->referenceSymbol->boundingBox->vertices[3]->y - $this->referenceSymbol->boundingBox->vertices[0]->y) * 11;
        $referenceArea[3] = Axis::withXY($downX, $downY);
        
        $this->cardArea = $this->getArea($referenceArea);
        
        return $this->cardArea;
    }

    // 取MyNumber范围
    public function mynumberAreaByMitome()
    {
        $referenceArea = array();
        
        $leftX = $this->referenceSymbol->boundingBox->vertices[0]->x - ($this->referenceSymbol->boundingBox->vertices[1]->x - $this->referenceSymbol->boundingBox->vertices[0]->x) * - 9;
        $leftY = $this->referenceSymbol->boundingBox->vertices[0]->y - ($this->referenceSymbol->boundingBox->vertices[1]->y - $this->referenceSymbol->boundingBox->vertices[0]->y) * - 9;
        $referenceArea[0] = Axis::withXY($leftX, $leftY);
        
        $upX = $this->referenceSymbol->boundingBox->vertices[0]->x - ($this->referenceSymbol->boundingBox->vertices[3]->x - $this->referenceSymbol->boundingBox->vertices[0]->x) * 10;
        $upY = $this->referenceSymbol->boundingBox->vertices[0]->y - ($this->referenceSymbol->boundingBox->vertices[3]->y - $this->referenceSymbol->boundingBox->vertices[0]->y) * 10;
        $referenceArea[1] = Axis::withXY($upX, $upY);
        
        $rightX = $this->referenceSymbol->boundingBox->vertices[0]->x + ($this->referenceSymbol->boundingBox->vertices[1]->x - $this->referenceSymbol->boundingBox->vertices[0]->x) * 45;
        $rightY = $this->referenceSymbol->boundingBox->vertices[0]->y + ($this->referenceSymbol->boundingBox->vertices[1]->y - $this->referenceSymbol->boundingBox->vertices[0]->y) * 45;
        $referenceArea[2] = Axis::withXY($rightX, $rightY);
        
        $downX = $this->referenceSymbol->boundingBox->vertices[0]->x + ($this->referenceSymbol->boundingBox->vertices[3]->x - $this->referenceSymbol->boundingBox->vertices[0]->x) * - 6;
        $downY = $this->referenceSymbol->boundingBox->vertices[0]->y + ($this->referenceSymbol->boundingBox->vertices[3]->y - $this->referenceSymbol->boundingBox->vertices[0]->y) * - 6;
        $referenceArea[3] = Axis::withXY($downX, $downY);
        
        $this->mynumberArea = $this->getArea($referenceArea);
        
        return $this->mynumberArea;
    }

    // 通过参照物取特定范围
    public function getArea(Array $referenceArea)
    {
        $triangleLeftUp = Triangle::withAxis($referenceArea[0], Axis::withVertex($this->referenceSymbol->boundingBox->vertices[0]));
        $triangleRightUp = Triangle::withAxis($referenceArea[1], Axis::withVertex($this->referenceSymbol->boundingBox->vertices[0]));
        $triangleRightDown = Triangle::withAxis($referenceArea[2], Axis::withVertex($this->referenceSymbol->boundingBox->vertices[0]));
        $triangleLeftDown = Triangle::withAxis($referenceArea[3], Axis::withVertex($this->referenceSymbol->boundingBox->vertices[0]));
        
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

    // 设定参照物对象
    public function setReferenceSymbol($referenceSymbol)
    {
        return $this->referenceSymbol = $referenceSymbol;
    }

    // 取参照物的对象
    public function getReferenceSymbol()
    {
        return $this->referenceSymbol;
    }

    // 设定卡范围
    public function setCardArea(Array $cardArea)
    {
        return $this->cardArea = $cardArea;
    }

    // 取卡范围
    public function getCardArea()
    {
        return $this->$cardArea;
    }
}