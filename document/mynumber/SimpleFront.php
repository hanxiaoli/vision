<?php

class SimpleFront extends Simple
{

    const frontText = "~住所意思腸眼肝腎及小";

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

    public function getReferenceSymbol()
    {
        return parent::getReferenceSymbol(self::frontText);
    }
}