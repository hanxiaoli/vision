<?php

class SimpleFront
{

    // // 参照物对象
    // private $simple = null;
    
    // 参照物symbol
    private $referenceSymbol = null;

    // 卡范围
    private $cardArea = null;

    // MyNumber范围
    private $mynumberArea = null;

    // MyNumber号码
    private $mynumber = null;

    // 构造函数
    // public static function withSimple(Simple $simple)
    // {
    // $instance = new self();
    // $instance->simple = $simple;
    // return $instance;
    // }
    
    // 构造函数
    public static function withSymbol($referenceSymbol)
    {
        $instance = new self();
        $instance->referenceSymbol = $referenceSymbol;
        return $instance;
    }

    // 取卡的范围
    public function cardArea()
    {
        $referenceTimes = null;
        switch ($this->referenceSymbol->getText()) {
            case "思":
                $referenceTimes = array(
                    79,
                    22,
                    86,
                    6
                );
                break;
            default:
                echo "cardArea error";
        }
        
        return Simple::getArea($this->referenceSymbol, $referenceTimes);
    }
}