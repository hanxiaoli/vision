<?php

class Axis
{

    // private $horizontal = 0;
    
    // private $vertical = 0;
    private $x = 0;

    private $y = 0;

    function __construct()
    {}

    public static function withXY($horizontal, $vertical)
    {
        $instance = new self();
        $instance->setX($horizontal);
        $instance->setY($vertical);
        
        return $instance;
    }

    public static function withVertex($googleCloudVisionVertex)
    {
        $instance = new self();
        $instance->setX($googleCloudVisionVertex->x);
        $instance->setY($googleCloudVisionVertex->y);
        
        return $instance;
    }

    public function setX($x)
    {
        $this->x = $x;
    }

    public function getX()
    {
        return $this->x;
    }

    public function setY($y)
    {
        $this->y = $y;
    }

    public function getY()
    {
        return $this->y;
    }
}
