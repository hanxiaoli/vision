<?php

class SimpleFront
{

    // // 参照物对象
    // private $simple = null;
    
    // "思"字作为参照物时，内容区域的各边与参照物对象左上角点之间的距离
    public const timesTo = array(
        "思" => array(
            "card" => array(
                79,
                22,
                86,
                6
            ),
            "name" => array(
                79,
                - 17,
                75,
                - 13
            ),
            "address" => array(
                79,
                - 13,
                75,
                - 11.5
            ),
            "sex" => array(
                7,
                22,
                86,
                - 5
            ),
            "birthday" => array(
                13,
                - 13,
                13,
                - 11.5
            ),
            "expire" => array(
                - 11.5,
                - 13,
                86,
                - 11.5
            ),
            "electronic" => array(
                79,
                22,
                86,
                6
            ),
            "serial1" => array(
                79,
                22,
                86,
                6
            ),
            "serial2" => array(
                79,
                22,
                86,
                6
            )
        ),
        "住" => array()
    );

    // 参照物symbol
    private $referenceSymbol = null;

    // 卡范围
    private $cardArea = null;

    // MyNumber范围
    private $mynumberArea = null;

    // MyNumber号码
    private $mynumber = null;

    // 构造函数
    public static function withSymbol($referenceSymbol)
    {
        $instance = new self();
        $instance->referenceSymbol = $referenceSymbol;
        $instance->cardArea = Simple::getArea($instance->referenceSymbol,self::timesTo[$referenceSymbol->getText()]["card"]);
        return $instance;
    }
    
    // // 取卡中各种内容的范围
    // public function contentsArea()
    // {
    // echo "------------------Get name area front"
    // $referenceTimes = null;
    // switch ($this->referenceSymbol->getText()) {
    // case "思":
    // $referenceTimes = array(
    // 79,
    // 22,
    // 86,
    // 6
    // );
    // break;
    // default:
    // echo "cardArea error";
    // }
    // return Simple::getArea($this->referenceSymbol, $referenceTimes);
    // }
}