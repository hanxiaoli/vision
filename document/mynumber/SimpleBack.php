<?php

class SimpleBack extends Simple
{

    const backText = "~拾得手数下禁認項時付";

    private $area = null;

    private $referenceSymbol = null;

    public static function withInput($input)
    {
        $instance = new self();
        $instance::setSimple(json_decode($input));
        $instance->referenceSymbol = $instance->referenceSymbol(self::backText);
        echo "reference text:" . $instance->referenceSymbol->text . PHP_EOL;
        echo "reference confidence:" . $instance->referenceSymbol->text . PHP_EOL;
        
        return $instance;
    }

    public static function withSimple($content)
    {
        $instance = new self();
        // parent::setSimple($content);
        $instance->referenceSymbol = $instance->referenceSymbol(self::backText);
        echo "reference text:" . $instance->referenceSymbol->text . PHP_EOL;
        echo "reference confidence:" . $instance->referenceSymbol->confidence . PHP_EOL;
        
        return $instance;
    }

    // Referenced by "認"
    public function referenceAreaByMitome()
    {
        $area = array();
        if ("認" === $this->referenceSymbol->text) {
            echo "leftX:";
            $leftX = $this->referenceSymbol->boundingBox->vertices[0]->x - ($this->referenceSymbol->boundingBox->vertices[1]->x - $this->referenceSymbol->boundingBox->vertices[0]->x) * 18;
            echo $leftX . PHP_EOL;
            echo "leftY:";
            $leftY = $this->referenceSymbol->boundingBox->vertices[0]->y - ($this->referenceSymbol->boundingBox->vertices[1]->y - $this->referenceSymbol->boundingBox->vertices[0]->y) * 18;
            echo $leftY . PHP_EOL;
            $area[0] = Axis::withXY($leftX, $leftY);
            
            echo "upX:";
            $upX = $this->referenceSymbol->boundingBox->vertices[0]->x + ($this->referenceSymbol->boundingBox->vertices[0]->x - $this->referenceSymbol->boundingBox->vertices[3]->x) * 16;
            echo $upX . PHP_EOL;
            echo "upY:";
            $upY = $this->referenceSymbol->boundingBox->vertices[0]->y + ($this->referenceSymbol->boundingBox->vertices[0]->y - $this->referenceSymbol->boundingBox->vertices[3]->y) * 16;
            echo $upY . PHP_EOL;
            $area[1] = Axis::withXY($upX, $upY);
            
            echo "rightX:";
            $rightX = $this->referenceSymbol->boundingBox->vertices[0]->x + ($this->referenceSymbol->boundingBox->vertices[1]->x - $this->referenceSymbol->boundingBox->vertices[0]->x) * 47;
            echo $rightX . PHP_EOL;
            echo "rightY:";
            $rightY = $this->referenceSymbol->boundingBox->vertices[0]->y + ($this->referenceSymbol->boundingBox->vertices[1]->y - $this->referenceSymbol->boundingBox->vertices[0]->y) * 47;
            echo $rightY . PHP_EOL;
            $area[2] = Axis::withXY($rightX, $rightY);
            
            echo "downX:";
            $downX = $this->referenceSymbol->boundingBox->vertices[0]->x - ($this->referenceSymbol->boundingBox->vertices[0]->x - $this->referenceSymbol->boundingBox->vertices[3]->x) * 11;
            echo $downX . PHP_EOL;
            echo "downY:";
            $downY = $this->referenceSymbol->boundingBox->vertices[0]->y - ($this->referenceSymbol->boundingBox->vertices[0]->y - $this->referenceSymbol->boundingBox->vertices[3]->y) * 11;
            echo $downY . PHP_EOL;
            $area[3] = Axis::withXY($downX, $downY);
            
            $this->area = $area;
            
            return $this->area;
        }
    }

    public function setCardArea(Array $cardArea)
    {
        return $this->cardArea = $cardArea;
    }

    public function getCardArea()
    {
        return $this->$cardArea;
    }

    public function setReferenceSymbol($referenceSymbol)
    {
        return $this->referenceSymbol = $referenceSymbol;
    }

    public function getReferenceSymbol()
    {
        return $this->referenceSymbol;
    }
}