<?php
require __DIR__ . '/../../vendor/autoload.php';
require_once 'utilities/Axis.php';
require_once 'utilities/Triangle.php';
require_once 'document/mynumber/Simple.php';
require_once 'document/mynumber/SimpleFront.php';
require_once 'document/mynumber/SimpleBack.php';

use Google\Cloud\Vision\V1\ImageAnnotatorClient;

$path = 'C:/Users/base/Desktop/calculate/1_bw.jpg';

// $path = '/Volumes/SANDISC32GB/git/hanxiaoli/vision/document/mynumber/asset/1_bw.jpg';
function detect_document_text($path)
{
    // TODO comment out for test
    if (false) {
        echo time();
        
        $imageAnnotator = new ImageAnnotatorClient();
        $image = file_get_contents($path);
        $response = $imageAnnotator->documentTextDetection($image);
        $annotation = $response->getFullTextAnnotation();
        
        $simple = Simple::withAnnotation($annotation);
        
        $simpleFront = null;
        $simpleBack = null;
        
        $fixedImage = null;
        $fixedImageWidth = null;
        $fixedImageHeight = null;
        
        if ($simple->isHasFront()) {
            $simpleFront = SimpleFront::withSymbol($simple->getReferenceSymbolFront());
            $frontArea = $simpleFront->cardArea();
            $cutArea = Simple::cutArea($frontArea);
            
            $src = imagecreatefromjpeg($path);
            $dst = imagecreatetruecolor($cutArea["width"], $cutArea["height"]);
            $white = imagecolorallocate($dst, 255, 255, 255);
            imagefill($dst, 0, 0, $white);
            imagecopy($dst, $src, 0, 0, $cutArea["x"], $cutArea["y"], $cutArea["width"], $cutArea["height"]);
            imagejpeg($dst, "C:/ocr/image/1_bw_front_origin.jpg", 100);
            
            $triangleFront = Triangle::withAxis(Axis::withVertex(($simple->getReferenceBlockFront()
                ->getBoundingBox()
                ->getVertices())[0]), Axis::withVertex(($simple->getReferenceBlockFront()
                ->getBoundingBox()
                ->getVertices())[1]));
            
            $dst = imagerotate($dst, $triangleFront->getDegree(), $white);
            
            $w_dst = imagesx($dst);
            $h_dst = imagesy($dst);
            
            if (null === $fixedImageWidth || $fixedImageWidth < $w_dst) {
                $fixedImageWidth = $w_dst * 2;
            }
            if (null === $fixedImageHeight || $fixedImageHeight < $h_dst) {
                $fixedImageHeight = $h_dst * 2;
            }
            
            if (null === $fixedImage) {
                $fixedImage = imagecreatetruecolor($fixedImageWidth, $fixedImageHeight);
            }
            imagefill($fixedImage, 0, 0, $white);
            imagecopy($fixedImage, $dst, 0, 0, 0, 0, $w_dst, $h_dst);
            
            // header("Content-type: image/png");
            imagejpeg($dst, "C:/ocr/image/1_bw_front_fixed.jpg", 100);
            imagedestroy($dst);
        }
        
        if ($simple->isHasBack()) {
            $simpleBack = SimpleBack::withSymbol($simple->getReferenceSymbolBack());
            $backArea = $simpleBack->cardArea();
            $cutArea = Simple::cutArea($backArea);
            
            $src = imagecreatefromjpeg($path);
            $dst = imagecreatetruecolor($cutArea["width"], $cutArea["height"]);
            $white = imagecolorallocate($dst, 255, 255, 255);
            imagefill($dst, 0, 0, $white);
            imagecopy($dst, $src, 0, 0, $cutArea["x"], $cutArea["y"], $cutArea["width"], $cutArea["height"]);
            imagejpeg($dst, "C:/ocr/image/1_bw_back_origin.jpg", 100);
            
            $triangleBack = Triangle::withAxis(Axis::withVertex(($simple->getReferenceBlockBack()
                ->getBoundingBox()
                ->getVertices())[0]), Axis::withVertex(($simple->getReferenceBlockBack()
                ->getBoundingBox()
                ->getVertices())[1]));
            
            $dst = imagerotate($dst, $triangleBack->getDegree(), $white);
            
            $w_dst = imagesx($dst);
            $h_dst = imagesy($dst);
            if (null === $fixedImageWidth || $fixedImageWidth < $w_dst) {
                $fixedImageWidth = $w_dst;
            }
            if (null === $fixedImageHeight || $fixedImageHeight / 2 < $h_dst) {
                $fixedImageHeight = $h_dst;
            }
            if (null === $fixedImage) {
                $fixedImage = imagecreatetruecolor($fixedImageWidth, $fixedImageHeight);
            }
            imagefill($fixedImage, 0, 0, $white);
            imagecopy($fixedImage, $dst, 0, $fixedImageHeight / 2, 0, 0, $w_dst, $h_dst);
            
            // header("Content-type: image/png");
            imagejpeg($dst, "C:/ocr/image/1_bw_back_fixed.jpg", 100);
            imagedestroy($dst);
        }
        
        imagejpeg($fixedImage, "C:/ocr/image/1_bw_fixed.jpg", 100);
        imagedestroy($fixedImage);
        
        echo time();
    }
    
    $imageAnnotator = new ImageAnnotatorClient();
    $image = file_get_contents("C:/ocr/image/1_bw_fixed.jpg");
    $response = $imageAnnotator->documentTextDetection($image);
    $annotation = $response->getFullTextAnnotation();
    
    $simple = Simple::withAnnotation($annotation);
    
    if ($simple->isHasFront()) {
        $simpleFront = SimpleFront::withSymbol($simple->getReferenceSymbolFront());
    }
}

detect_document_text($path);
