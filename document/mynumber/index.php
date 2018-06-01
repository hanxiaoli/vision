<?php
require __DIR__ . '/../../vendor/autoload.php';
require_once 'utilities/Axis.php';
require_once 'utilities/Triangle.php';
require_once 'document/mynumber/Simple.php';

// require_once 'document/mynumber/SimpleFront.php';
// require_once 'document/mynumber/SimpleBack.php';

use Google\Cloud\Vision\V1\ImageAnnotatorClient;

$path = 'C:/Users/base/Desktop/calculate/1_bw.jpg';

function detect_document_text($path)
{
    $imageAnnotator = new ImageAnnotatorClient();
    // annotate the image
    $image = file_get_contents($path);
    $response = $imageAnnotator->documentTextDetection($image);
    $annotation = $response->getFullTextAnnotation();
    
    $simple = Simple::withAnnotation($annotation);
    
    echo "";
}
// [END vision_fulltext_detection]

detect_document_text($path);
