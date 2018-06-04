<?php

class Axis
{

    // private $horizontal = 0;
    
    // private $vertical = 0;
    
    // x轴
    private $x = 0;

    // y轴
    private $y = 0;

    // 构造函数（通过x轴，y轴坐标）
    public static function withXY($horizontal, $vertical)
    {
        $instance = new self();
        $instance->setX($horizontal);
        $instance->setY($vertical);
        
        return $instance;
    }

    // 构造函数（通过Google Cloud Vision vertices[index]对象。）
    public static function withVertex($googleCloudVisionVertex)
    {
        $instance = new self();
        $instance->setX($googleCloudVisionVertex->getX());
        $instance->setY($googleCloudVisionVertex->getY());
        
        return $instance;
    }

    // 设定x轴坐标
    public function setX($x)
    {
        $this->x = $x;
    }

    // 取x轴坐标
    public function getX()
    {
        return $this->x;
    }

    // 设定y轴坐标
    public function setY($y)
    {
        $this->y = $y;
    }

    // 取y轴坐标
    public function getY()
    {
        return $this->y;
    }
}
