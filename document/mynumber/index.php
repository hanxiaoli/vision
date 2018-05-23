<?php
namespace com\vision\document\mynumber;

require __DIR__ . '/../../vendor/autoload.php';
use Google\Cloud\Vision\V1\ImageAnnotatorClient;
$path = 'C:/ocr/image/2.jpg';
$image = file_get_contents($path);

$imageAnnotator = new ImageAnnotatorClient();

$response = $imageAnnotator->documentTextDetection($image);
$annotation = $response->getFullTextAnnotation();
// print out detailed and structured information about document text
if ($annotation) {
    foreach ($annotation->getPages() as $page) {
        foreach ($page->getBlocks() as $block) {
            $block_text = '';
            foreach ($block->getParagraphs() as $paragraph) {
                foreach ($paragraph->getWords() as $word) {
                    foreach ($word->getSymbols() as $symbol) {
                        $block_text .= $symbol->getText();
                    }
                    $block_text .= ' ';
                }
                $block_text .= "\n";
            }
            printf('Block content: %s', $block_text);
            printf('Block confidence: %f' . PHP_EOL, $block->getConfidence());
            // get bounds
            $vertices = $block->getBoundingBox()->getVertices();
            $bounds = [];
            foreach ($vertices as $vertex) {
                $bounds[] = sprintf('(%d,%d)', $vertex->getX(), $vertex->getY());
            }
            print('Bounds: ' . join(', ', $bounds) . PHP_EOL);
            print(PHP_EOL);
        }
    }
} else {
    print('No text found' . PHP_EOL);
}
