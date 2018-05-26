<?php
require_once 'utilities/Axis.php';
require_once 'utilities/Triangle.php';
require_once 'document/mynumber/Simple.php';

$simple = new Simple();

$referenceSymbolBack = $simple->getReferenceSymbolBack();
$simple->getReferenceDegree($referenceSymbolBack->text);

