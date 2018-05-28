<?php

class SimpleBack extends Simple
{

    const backText = "~拾得手数下禁認項時付";

    public static function withInput($input)
    {
        $instance = new self();
        parent::setSimple(json_decode($input));
        
        return $instance;
    }

    public static function withSimple($content)
    {
        $instance = new self();
        parent::setSimple($content);
        
        return $instance;
    }
    
    public function cardAreaByReference1(){
        $cardArea=array();
        $referenceSymbol = parent::getReferenceSymbol(self::backText);
        
        if ("認"===$referenceSymbol->text) {
            echo "resultX0:";
            $resultX0 = $referenceSymbol->boundingBox->vertices[0]->x - ($referenceSymbol->boundingBox->vertices[3]->x - $referenceSymbol->boundingBox->vertices[0]->x) * 9.5;
            echo $resultX0 . PHP_EOL;
            echo "resultY0:";
            $resultY0 = $referenceSymbol->boundingBox->vertices[0]->y - ($referenceSymbol->boundingBox->vertices[3]->y - $referenceSymbol->boundingBox->vertices[0]->y) * 9.5;
            echo $resultY0 . PHP_EOL;
            $cardArea[0] = Axis::withXY($resultX0,$resultY0);
            
            echo "resultX1:";
            $resultX1 = $resultX0 + ($referenceSymbol->boundingBox->vertices[1]->x - $referenceSymbol->boundingBox->vertices[0]->x) * 47;
            echo $resultX1 . PHP_EOL;
            echo "resultY1:";
            $resultY1 = $resultY0 + ($referenceSymbol->boundingBox->vertices[1]->y - $referenceSymbol->boundingBox->vertices[0]->y) * 47;
            echo $resultY1 . PHP_EOL;
            $cardArea[1] = Axis::withXY($resultX1,$resultY1);
            
            echo "resultX1:";
            $resultX1 = $resultX0 + ($referenceSymbol->boundingBox->vertices[1]->x - $referenceSymbol->boundingBox->vertices[0]->x) * 47;
            echo $resultX1 . PHP_EOL;
            echo "resultY1:";
            $resultY1 = $resultY0 + ($referenceSymbol->boundingBox->vertices[1]->y - $referenceSymbol->boundingBox->vertices[0]->y) * 47;
            echo $resultY1 . PHP_EOL;
            $cardArea[1] = Axis::withXY($resultX1,$resultY1);
            
            echo "resultX3:";
            $resultX3 = $referenceSymbol->boundingBox->vertices[0]->x - ($referenceSymbol->boundingBox->vertices[3]->x - $referenceSymbol->boundingBox->vertices[0]->x) * 6;
            echo $resultX3 . PHP_EOL;
            $resultY3 = $referenceSymbol->boundingBox->vertices[0]->y - ($referenceSymbol->boundingBox->vertices[3]->y - $referenceSymbol->boundingBox->vertices[0]->y) * 6;
            echo "resultY3:";
            echo $resultY3 . PHP_EOL;
            echo "end" . PHP_EOL;
        }
    }
}