<?php

class Triangle
{

    private $hypotenuse = null;

    private $opposite = null;

    private $adjacent = null;

    function __construct()
    {}

    public static function withAxis(Axis $pointLeft, Axis $pointRight)
    {
        $instance = new self();
        $instance->setOpposite($pointRight->getX() - $pointLeft->getX());
        $instance->setAdjacent($pointRight->getY() - $pointLeft->getY());
        $instance->setHypotenuse(sqrt($instance->adjacent * $instance->adjacent + $instance->opposite * $instance->opposite));
        
        return $instance;
    }

    public function getSin()
    {
        return $this->opposite / $this->hypotenuse;
    }

    public function setHypotenuse($hypotenuse)
    {
        $this->hypotenuse = $hypotenuse;
    }

    public function getHypotenuse()
    {
        return $this->hypotenuse;
    }

    public function setOpposite($opposite)
    {
        $this->opposite = $opposite;
    }

    public function getOpposite()
    {
        return $this->opposite;
    }

    public function setAdjacent($adjacent)
    {
        $this->adjacent = $adjacent;
    }

    public function getAdjacent()
    {
        return $this->adjacent;
    }
}

