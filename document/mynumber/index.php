<?php
require_once 'utilities/Axis.php';
require_once 'utilities/Triangle.php';
require_once 'document/mynumber/Simple.php';
// require_once 'document/mynumber/SimpleFront.php';
require_once 'document/mynumber/SimpleBack.php';

$simple = new Simple();

$back = new SimpleBack($simple->getSimple());



echo $back;

