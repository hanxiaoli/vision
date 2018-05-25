<?php

class Triangle
{

    private $hypotenuse = null;

    private $opposite = null;

    private $adjacent = null;

    function __construct(Axis $pointLeft, Axis $pointRight)
    {
        $this->opposite = $pointRight->x - $pointLeft->x;
        $this->adjacent = $pointRight->y - $pointLeft->y;
        $this->adjacent = sqrt($this->adjacent * $this->adjacent + $this->opposite * $this->opposite);
    }

    public function getSin()
    {
        return $this->opposite / $this->hypotenuse;
    }
}

