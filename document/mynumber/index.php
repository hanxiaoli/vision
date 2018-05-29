<?php
require_once 'utilities/Axis.php';
require_once 'utilities/Triangle.php';
require_once 'document/mynumber/Simple.php';
// require_once 'document/mynumber/SimpleFront.php';
require_once 'document/mynumber/SimpleBack.php';

$back = SimpleBack::withSimple(new Simple());

$referenceArea = $back->referenceAreaByMitome();

$triangle = Triangle::withAxis(Axis::withVertex($back->getReferenceSymbol()->boundingBox->vertices[0]), $referenceArea[0]);

// $degree = $back->referenceTriangle($back->getReferenceSymbol()->text)
// ->getSin();

$cardArea = array();

if (0 < $triangle->getAdjacent()) {
    $cardArea[0] = Axis::withXY($referenceArea[1]->getX() - $triangle->getAdjacent(), $referenceArea[1]->getY() - $triangle->getOpposite());
} else {
    $cardArea[0] = Axis::withXY($referenceArea[1]->getX() + $triangle->getAdjacent(), $referenceArea[1]->getY() + $triangle->getOpposite());
}

echo "x:" . ($cardArea[0]->getX()) . PHP_EOL;
echo "y:" . ($cardArea[0]->getY()) . PHP_EOL;
