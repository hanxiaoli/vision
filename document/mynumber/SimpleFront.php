<?php

class SimpleFront extends Simple
{

    // 参照物对象
    private $simple = null;

    // 卡范围
    private $cardArea = null;

    // MyNumber范围
    private $mynumberArea = null;

    // MyNumber号码
    private $mynumber = null;

    // 构造函数
    public static function withSimple(Simple $simple)
    {
        $instance = new self();
        $instance->simple = $simple;
        return $instance;
    }

    // 取卡的范围
    public function cardArea()
    {
        switch ($this->simple->getReferenceSymbolFront()->getText()) {
            case "思":
                $this->cardArea = $this->cardAreaByShi();
                return $this->cardArea;
            default:
                echo "cardArea error";
        }
    }

    // 通过“思”字取卡范围
    public function cardAreaByShi()
    {
        $referenceArea = array();
        $vertices = $this->simple->getReferenceSymbolFront()
            ->getBoundingBox()
            ->getVertices();
        
        $referenceWidth = Triangle::withAxis(Axis::withVertex($vertices[0]), Axis::withVertex($vertices[1]));
        $referenceHeight = Triangle::withAxis(Axis::withVertex($vertices[0]), Axis::withVertex($vertices[3]));
        
        $leftX = $vertices[0]->getX() - $referenceWidth->getAdjacent() * 18;
        $leftY = $vertices[0]->getY() - $referenceWidth->getOpposite() * 18;
        $referenceArea[0] = Axis::withXY($leftX, $leftY);
        
        $upX = $vertices[0]->getX() - $referenceHeight->getAdjacent() * 16;
        $upY = $vertices[0]->getY() - $referenceHeight->getOpposite() * 16;
        $referenceArea[1] = Axis::withXY($upX, $upY);
        
        $rightX = $vertices[0]->getX() + $referenceWidth->getAdjacent() * 47;
        $rightY = $vertices[0]->getY() + $referenceWidth->getOpposite() * 47;
        $referenceArea[2] = Axis::withXY($rightX, $rightY);
        
        $downX = $vertices[0]->getX() + $referenceHeight->getAdjacent() * 11;
        $downY = $vertices[0]->getY() + $referenceHeight->getOpposite() * 11;
        $referenceArea[3] = Axis::withXY($downX, $downY);
        
        $this->cardArea = $this->simple->getArea($referenceArea, Axis::withVertex($vertices[0]));
        
        return $this->cardArea;
    }
}