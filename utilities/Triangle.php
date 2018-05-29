<?php

class Triangle
{

    // 左点
    private $pointLeft = null;

    // 右点
    private $pointRight = null;

    // 斜边
    private $hypotenuse = null;

    // 对边
    private $opposite = null;

    // 临边
    private $adjacent = null;

    // 构造函数
    public static function withAxis(Axis $pointLeft, Axis $pointRight)
    {
        $instance = new self();
        $instance->pointLeft = $pointLeft;
        $instance->pointRight = $pointRight;
        $instance->setAdjacent($pointRight->getX() - $pointLeft->getX());
        $instance->setOpposite($pointRight->getY() - $pointLeft->getY());
        $instance->setHypotenuse(sqrt($instance->adjacent * $instance->adjacent + $instance->opposite * $instance->opposite));
        
        return $instance;
    }

    // 取正弦
    public function getSin()
    {
        return $this->opposite / $this->hypotenuse;
    }

    // 取余弦
    public function getCos()
    {
        return $this->adjacent / $this->hypotenuse;
    }

    // 取正切
    public function getTan()
    {
        return $this->opposite / $this->adjacent;
    }

    // 取余切
    public function getCot()
    {
        return $this->adjacent / $this->opposite;
    }

    // 设定斜边
    public function setHypotenuse($hypotenuse)
    {
        $this->hypotenuse = $hypotenuse;
    }

    // 取斜边
    public function getHypotenuse()
    {
        return $this->hypotenuse;
    }

    // 设定对边
    public function setOpposite($opposite)
    {
        $this->opposite = $opposite;
    }

    // 取对边
    public function getOpposite()
    {
        return $this->opposite;
    }

    // 设定临边
    public function setAdjacent($adjacent)
    {
        $this->adjacent = $adjacent;
    }

    // 取临边
    public function getAdjacent()
    {
        return $this->adjacent;
    }

    // 设定左点
    public function setPointLeft($pointLeft)
    {
        $this->pointLeft = $pointLeft;
    }

    // 取左点
    public function getPointLeft()
    {
        return $this->pointLeft;
    }

    // 设定右点
    public function setPointRight($pointRight)
    {
        $this->pointRight = $pointRight;
    }

    // 取右点
    public function getPointRight()
    {
        return $this->pointRight;
    }
}

