<?php
require_once 'utilities/Axis.php';
require_once 'utilities/Triangle.php';
require_once 'document/mynumber/Simple.php';
// require_once 'document/mynumber/SimpleFront.php';
require_once 'document/mynumber/SimpleBack.php';

$back = SimpleBack::withSimple(new Simple());

$mynumberArea = $back->mynumber();
