<?php
$input = '
    {
        "description": "個人番号",
        "boundingPoly":
        {
            "vertices": [
            {
                "x": 977,
                "y": 1294
            },
            {
                "x": 1011,
                "y": 1253
            },
            {
                "x": 1023,
                "y": 1263
            },
            {
                "x": 989,
                "y": 1304
            }]
        }
    }
';
$content = json_decode($input);

echo $content->description . PHP_EOL;
$description = $content->description;
$leftUpX = $content->boundingPoly->vertices[0]->x;
$leftUpY = $content->boundingPoly->vertices[0]->y;
$leftDownX = $content->boundingPoly->vertices[1]->x;
$leftDownY = $content->boundingPoly->vertices[1]->y;
$rightDownX = $content->boundingPoly->vertices[2]->x;
$rightDownY = $content->boundingPoly->vertices[2]->y;
$rightUpX = $content->boundingPoly->vertices[3]->x;
$rightUpY = $content->boundingPoly->vertices[3]->y;

$xUp = $leftUpX - $rightUpX;
$yUp = $leftUpY - $rightUpY;
$slantingUp = sqrt($xUp * $xUp + $yUp * $yUp);
$sinUp = (abs($xUp) < abs($yUp) ? $xUp : $yUp) / $slantingUp;
echo $sinUp . PHP_EOL;

$xDown = $leftDownX - $rightDownX;
$yDown = $leftDownY - $rightDownY;
$slantingDown = sqrt($xDown * $xDown + $yDown * $yDown);
$sinDown = (abs($xDown) < abs($yDown) ? $xDown : $yDown) / $slantingDown;
echo $sinDown . PHP_EOL;
