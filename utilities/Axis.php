<?php

class Axis
{

    // private $horizontal = 0;
    
    // private $vertical = 0;
    private $x = 0;

    private $y = 0;

    function __construct()
    {}

    function __construct1($horizontal, $vertical)
    {
        $this->x = $horizontal;
        $this->y = $vertical;
    }

    function __construct2($googleCloudVisionVertex)
    {
        $this->x = $googleCloudVisionVertex->x;
        $this->y = $googleCloudVisionVertex->y;
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
