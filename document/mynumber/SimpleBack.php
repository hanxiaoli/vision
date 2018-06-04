<?php

class SimpleBack
{

    // 参照物symbol
    private $referenceSymbol = null;

    // 卡范围
    private $cardArea = null;

    // MyNumber范围
    private $mynumberArea = null;

    // MyNumber号码
    private $mynumber = null;

    // // 构造函数
    // public static function withInput($input)
    // {
    // $instance = new self();
    // $instance::setSimple(json_decode($input));
    // $instance->referenceSymbol = $instance->referenceSymbol(self::backText);
    // echo "reference text:" . $instance->referenceSymbol->text . PHP_EOL;
    // echo "reference confidence:" . $instance->referenceSymbol->text . PHP_EOL;
    
    // return $instance;
    // }
    
    // // 构造函数
    // public static function withSimple($annotation)
    // {
    // $instance = new self();
    // $instance->referenceSymbol = $instance->referenceSymbol(self::backText);
    // echo "reference text:" . $instance->referenceSymbol->text . PHP_EOL;
    // echo "reference confidence:" . $instance->referenceSymbol->confidence . PHP_EOL;
    // return $instance;
    // }
    
    // 构造函数
    public static function withSymbol($referenceSymbol)
    {
        $instance = new self();
        $instance->referenceSymbol = $referenceSymbol;
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
    public function cardArea()
    {
        $referenceTimes = null;
        switch ($this->referenceSymbol->getText()) {
            case "認":
                $referenceTimes = array(
                    18,
                    16,
                    47,
                    11
                );
                break;
            default:
                echo "cardArea error";
        }
        
        return Simple::getArea($this->referenceSymbol, $referenceTimes);
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