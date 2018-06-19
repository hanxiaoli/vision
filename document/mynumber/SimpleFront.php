<?php
use Google\Cloud\Vision\V1\Symbol;

class SimpleFront extends Simple
{

    /**
     * 正面参照文字列表
     */
    public const referenceTextFront = array(
        "住",
        "所",
        "意",
        "思",
        "性",
        "別",
        "電",
        "個",
        "及",
        "特"
    );

    /**
     * 各区域到参照物左上角之间的距离（mm）
     */
    public const lengthToReferenceSymbol = array(
        "住" => array(
            "card" => array(
                "left" => 3,
                "right" => 82.5,
                "up" => 11,
                "down" => 43
            ),
            "name" => array(
                "left" => 0,
                "right" => 64,
                "up" => 11,
                "down" => 0
            ),
            "address" => array(
                "left" => 5,
                "right" => 62,
                "up" => 2,
                "down" => 8
            ),
            "sex" => array(
                "left" => - 62,
                "right" => 80,
                "up" => - 1,
                "down" => 9
            ),
            "birthday" => array(
                "left" => - 20,
                "right" => 52.5,
                "up" => - 4.5,
                "down" => 13
            ),
            "expire" => array(
                "left" => - 50,
                "right" => 78.5,
                "up" => - 5.5,
                "down" => 13
            )
        ),
        "所" => array(
            "card" => array(
                "left" => 5,
                "right" => 80.5,
                "up" => 11,
                "down" => 43
            ),
            "name" => array(
                "left" => 2,
                "right" => 62,
                "up" => 11,
                "down" => 0
            ),
            "address" => array(
                "left" => 3,
                "right" => 64,
                "up" => 2,
                "down" => 8
            ),
            "sex" => array(
                "left" => - 60,
                "right" => 82,
                "up" => - 1,
                "down" => 9
            ),
            "birthday" => array(
                "left" => - 18,
                "right" => 50,
                "up" => - 4.5,
                "down" => 13
            ),
            "expire" => array(
                "left" => - 47,
                "right" => 80.5,
                "up" => - 5.5,
                "down" => 13
            )
        ),
        "意" => array(
            "card" => array(
                "left" => 38.8,
                "right" => 46.8,
                "up" => 44.8,
                "down" => 8.5
            ),
            "name" => array(
                "left" => 38.8,
                "right" => 29,
                "up" => 44.8,
                "down" => - 35.5
            ),
            "address" => array(
                "left" => 38.8,
                "right" => 29,
                "up" => 38.5,
                "down" => - 27
            ),
            "sex" => array(
                "left" => - 28,
                "right" => 46.8,
                "up" => 33,
                "down" => - 26.5
            ),
            "birthday" => array(
                "left" => 13.5,
                "right" => 16,
                "up" => 31.5,
                "down" => - 22.5
            ),
            "expire" => array(
                "left" => - 12.5,
                "right" => 47,
                "up" => 28.5,
                "down" => - 22.5
            )
        ),
        "思" => array(
            "card" => array(
                "left" => 40.3,
                "right" => 45.3,
                "up" => 44.8,
                "down" => 8.5
            ),
            "name" => array(
                "left" => 40.3,
                "right" => 27.5,
                "up" => 44.8,
                "down" => - 35.5
            ),
            "address" => array(
                "left" => 40.3,
                "right" => 27.5,
                "up" => 38.5,
                "down" => - 27
            ),
            "sex" => array(
                "left" => - 26.5,
                "right" => 45.3,
                "up" => 33,
                "down" => - 26.5
            ),
            "birthday" => array(
                "left" => 15,
                "right" => 14.5,
                "up" => 31.5,
                "down" => - 22.5
            ),
            "expire" => array(
                "left" => - 11,
                "right" => 48.5,
                "up" => 28.5,
                "down" => - 22.5
            )
        ),
        "性" => array(
            "card" => array(
                "left" => 72.8,
                "right" => 13,
                "up" => 14.5,
                "down" => 40
            ),
            "name" => array(
                "left" => 72.8,
                "right" => - 6,
                "up" => 14.5,
                "down" => - 4
            ),
            "address" => array(
                "left" => 72.8,
                "right" => - 6,
                "up" => 8.5,
                "down" => 4
            ),
            "sex" => array(
                "left" => 6,
                "right" => 13,
                "up" => 3,
                "down" => 4
            ),
            "birthday" => array(
                "left" => 48,
                "right" => - 18,
                "up" => - 2,
                "down" => 8
            ),
            "expire" => array(
                "left" => 21.5,
                "right" => 13,
                "up" => - 2,
                "down" => 8
            )
        ),
        "別" => array(
            "住" => 72,
            "所" => 70,
            "意" => 36,
            "思" => 34.5,
            "及" => 26,
            "特" => 42,
            "left" => 74.5,
            "right" => 11,
            "up" => 14.5,
            "down" => 39.5
        ),
        "電" => array(
            "住" => 51,
            "所" => 49,
            "意" => 15.5,
            "思" => 14,
            "及" => 6,
            "特" => 11.5,
            "left" => 77.5,
            "right" => 8,
            "up" => 18,
            "down" => 36
        ),
        "個" => array(
            "住" => 71,
            "所" => 69,
            "意" => 35,
            "思" => 34,
            "及" => 27,
            "特" => 41,
            "left" => 80,
            "right" => 5.5,
            "up" => 18,
            "down" => 36
        ),
        "及" => array(
            "住" => 45,
            "所" => 43,
            "性" => 24,
            "別" => 26,
            "電" => 6,
            "個" => 27,
            "left" => 48,
            "right" => 37.5,
            "up" => 45,
            "down" => 9
        ),
        "特" => array(
            "住" => 30,
            "所" => 28,
            "性" => 40,
            "別" => 42,
            "電" => 11.5,
            "個" => 41.5,
            "left" => 32.5,
            "right" => 53,
            "up" => 50,
            "down" => 4
        )
    );

    /**
     * 参照物与其它比较参照物之间的距离（毫米）
     */
    public const comparativeSymbolsDistance = array(
        "住" => array(
            "width" => array(
                "別" => 72,
                "個" => 71.5,
                "性" => 70.5,
                "及" => 57,
                "電" => 53,
                "思" => 51,
                "意" => 50,
                "特" => 50
            ),
            "height" => array()
        ),
        "所" => array(
            "width" => array(
                "別" => 70,
                "個" => 69,
                "性" => 68,
                "及" => 57,
                "電" => 51,
                "意" => 48,
                "思" => 49,
                "特" => 48
            ),
            "height" => array()
        ),
        "意" => array(
            "width" => array(
                "住" => 49.5,
                "個" => 51,
                "所" => 48,
                "別" => 47,
                "性" => 46,
                "電" => 26
            ),
            "height" => array()
        ),
        "思" => array(
            "width" => array(
                "住" => 50,
                "個" => 50,
                "所" => 49,
                "別" => 46,
                "性" => 45,
                "電" => 26
            ),
            "height" => array()
        ),
        "性" => array(
            "width" => array(
                "住" => 70.5,
                "所" => 68,
                "特" => 54,
                "意" => 46,
                "思" => 45,
                "及" => 39.5,
                "電" => 20.5
            ),
            "height" => array()
        ),
        "別" => array(
            "住" => 72,
            "所" => 70,
            "意" => 36,
            "思" => 34.5,
            "及" => 26,
            "特" => 42,
            "left" => 74.5,
            "right" => 11,
            "up" => 14.5,
            "down" => 39.5
        ),
        "電" => array(
            "住" => 51,
            "所" => 49,
            "意" => 15.5,
            "思" => 14,
            "及" => 6,
            "特" => 11.5,
            "left" => 77.5,
            "right" => 8,
            "up" => 18,
            "down" => 36
        ),
        "個" => array(
            "住" => 71,
            "所" => 69,
            "意" => 35,
            "思" => 34,
            "及" => 27,
            "特" => 41,
            "left" => 80,
            "right" => 5.5,
            "up" => 18,
            "down" => 36
        ),
        "及" => array(
            "住" => 45,
            "所" => 43,
            "性" => 24,
            "別" => 26,
            "電" => 6,
            "個" => 27,
            "left" => 48,
            "right" => 37.5,
            "up" => 45,
            "down" => 9
        ),
        "特" => array(
            "住" => 30,
            "所" => 28,
            "性" => 40,
            "別" => 42,
            "電" => 11.5,
            "個" => 41.5,
            "left" => 32.5,
            "right" => 53,
            "up" => 50,
            "down" => 4
        )
    );

    /**
     * 取得某区域到参照物之间的距离（像素单位）
     *
     * @param Simple $simple
     * @param String $areaType
     */
    public static function distanceFromReferenceSymbol(Simple $simple, String $areaType)
    {
        $widthTriangleBlock = Triangle::withAxis(Axis::withVertex(($simple->getReferenceBlockFront()
            ->getBoundingBox()
            ->getVertices())[0]), Axis::withVertex(($simple->getReferenceBlockFront()
            ->getBoundingBox()
            ->getVertices())[1]));
        $heightTriangleBlock = Triangle::withAxis(Axis::withVertex(($simple->getReferenceBlockFront()
            ->getBoundingBox()
            ->getVertices())[0]), Axis::withVertex(($simple->getReferenceBlockFront()
            ->getBoundingBox()
            ->getVertices())[3]));
        
        $widthPixMm = $simple->getWidthPixMmFront();
        $referenceSymbol = $simple->getReferenceSymbolFront();
        
        $hypotenuse = $widthPixMm * SimpleFront::lengthToReferenceSymbol[$referenceSymbol->getText()][$areaType]["left"];
        $leftX = ($referenceSymbol->getBoundingBox()->getVertices())[0]->getX() - $widthTriangleBlock->getCos() * $hypotenuse;
        $leftY = ($referenceSymbol->getBoundingBox()->getVertices())[0]->getY() - $widthTriangleBlock->getSin() * $hypotenuse;
        
        $hypotenuse = $widthPixMm * SimpleFront::lengthToReferenceSymbol[$referenceSymbol->getText()][$areaType]["up"];
        $upX = ($referenceSymbol->getBoundingBox()->getVertices())[0]->getX() - $heightTriangleBlock->getCos() * $hypotenuse;
        $upY = ($referenceSymbol->getBoundingBox()->getVertices())[0]->getY() - $heightTriangleBlock->getSin() * $hypotenuse;
        
        $hypotenuse = $widthPixMm * SimpleFront::lengthToReferenceSymbol[$referenceSymbol->getText()][$areaType]["right"];
        $rightX = ($referenceSymbol->getBoundingBox()->getVertices())[0]->getX() + $widthTriangleBlock->getCos() * $hypotenuse;
        $rightY = ($referenceSymbol->getBoundingBox()->getVertices())[0]->getY() + $widthTriangleBlock->getSin() * $hypotenuse;
        
        $hypotenuse = $widthPixMm * SimpleFront::lengthToReferenceSymbol[$referenceSymbol->getText()][$areaType]["down"];
        $downX = ($referenceSymbol->getBoundingBox()->getVertices())[0]->getX() + $heightTriangleBlock->getCos() * $hypotenuse;
        $downY = ($referenceSymbol->getBoundingBox()->getVertices())[0]->getY() + $heightTriangleBlock->getSin() * $hypotenuse;
        $referenceArea[] = Axis::withXY($leftX, $leftY);
        $referenceArea[] = Axis::withXY($upX, $upY);
        $referenceArea[] = Axis::withXY($rightX, $rightY);
        $referenceArea[] = Axis::withXY($downX, $downY);
        
        $bounds = [];
        foreach ($referenceArea as $vertex) {
            $bounds[] = sprintf('(%d,%d)', $vertex->getX(), $vertex->getY());
        }
        print($areaType . ' distance from reference symbol: ' . join(', ', $bounds) . PHP_EOL);
        
        return $referenceArea;
    }

    /**
     * 取得某区域的四点坐标
     *
     * @param Simple $simple
     * @param String $areaType
     */
    public static function getArea(Simple $simple, String $areaType)
    {
        $referenceArea = SimpleFront::distanceFromReferenceSymbol($simple, $areaType);
        $referenceSymbol = $simple->getReferenceSymbolFront();
        
        $triangleLeftUp = Triangle::withAxis($referenceArea[0], Axis::withVertex(($referenceSymbol->getBoundingBox()->getVertices())[0]));
        $triangleRightUp = Triangle::withAxis($referenceArea[1], Axis::withVertex(($referenceSymbol->getBoundingBox()->getVertices())[0]));
        $triangleRightDown = Triangle::withAxis($referenceArea[2], Axis::withVertex(($referenceSymbol->getBoundingBox()->getVertices())[0]));
        $triangleLeftDown = Triangle::withAxis($referenceArea[3], Axis::withVertex(($referenceSymbol->getBoundingBox()->getVertices())[0]));
        
        $area[] = Triangle::withLine($triangleLeftUp->getAdjacent(), $triangleLeftUp->getOpposite(), null, $referenceArea[1])->getPointLeft();
        $area[] = Triangle::withLine($triangleRightUp->getAdjacent(), $triangleRightUp->getOpposite(), null, $referenceArea[2])->getPointLeft();
        $area[] = Triangle::withLine($triangleRightDown->getAdjacent(), $triangleRightDown->getOpposite(), null, $referenceArea[3])->getPointLeft();
        $area[] = Triangle::withLine($triangleLeftDown->getAdjacent(), $triangleLeftDown->getOpposite(), null, $referenceArea[0])->getPointLeft();
        
        $bounds = [];
        foreach ($area as $vertex) {
            $bounds[] = sprintf('(%d,%d)', $vertex->getX(), $vertex->getY());
        }
        print($areaType . ' area vertices: ' . join(', ', $bounds) . PHP_EOL);
        
        return $area;
    }

    /**
     * 取得某区域内的内容（画面辅正后）
     *
     * @param Simple $simple
     * @param String $areaType
     */
    public static function getContent(Simple $simple, String $areaType)
    {
        $symbols = $simple->getSimpleSymbols();
        $area = SimpleFront::getArea($simple, $areaType);
        $content = array();
        $text = null;
        
        foreach ($symbols as $symbol) {
            $vertices = $symbol->getBoundingBox()->getVertices();
            if ($vertices[0]->getX() >= $area[0]->getX() and $vertices[1]->getX() <= $area[1]->getX() and $vertices[0]->getY() >= $area[0]->getY() and $vertices[3]->getY() <= $area[3]->getY()) {
                $content[] = $symbol;
            }
        }
        
        $content = SimpleFront::sortContent($content);
        
        foreach ($content as $symbol) {
            $text .= $symbol->getText();
            
            $detectedBreak = $symbol->getProperty()->getDetectedBreak();
            if (null !== $detectedBreak) {
                $text .= " ";
            }
        }
        
        return $text;
    }

    /**
     * 整理内容的文字顺序
     *
     * @param Simple $simple
     */
    public static function sortContent(Array $content)
    {
        $lines = array();
        $sorted = array();
        
        usort($content, array(
            "SimpleFront",
            "cmpareBySymbolX"
        ));
        
        foreach ($content as $symbol) {
            $vertices = $symbol->getBoundingBox()->getVertices();
            $set = false;
            
            foreach ($lines as &$line) {
                if ($vertices[3]->getY() > ($line[0]->getBoundingBox()->getVertices())[0]->getY() and $vertices[0]->getY() < ($line[0]->getBoundingBox()->getVertices())[3]->getY()) {
                    $line[] = $symbol;
                    $set = true;
                    break;
                }
            }
            
            if (! $set) {
                $lines[$vertices[0]->getY()] = array(
                    $symbol
                );
            }
        }
        
        ksort($lines);
        
        foreach ($lines as $line) {
            foreach ($line as $symbol) {
                $sorted[] = $symbol;
            }
        }
        
        return $sorted;
    }

    /**
     * 按照symbol的横坐标排序
     *
     * @param Symbol $a
     * @param Symbol $b
     */
    public static function cmpareBySymbolX(Symbol $a, Symbol $b)
    {
        $ax = $a->getBoundingBox()->getVertices()[0]->getX();
        $bx = $b->getBoundingBox()->getVertices()[0]->getX();
        if ($ax == $bx) {
            return 0;
        }
        return ($ax < $bx) ? - 1 : 1;
    }

    /**
     * 姓名
     *
     * @param Simple $simple
     */
    public static function getName(Simple $simple)
    {
        $text = SimpleFront::getContent($simple, "name");
        
        $text = str_replace("氏", "", $text);
        $text = str_replace("名 ", "", $text);
        print "氏名:" . $text . PHP_EOL;
        return $text;
    }

    /**
     * 住址
     *
     * @param Simple $simple
     */
    public static function getAddress(Simple $simple)
    {
        $text = SimpleFront::getContent($simple, "address");
        
        $text = str_replace("住", "", $text);
        $text = str_replace("所 ", "", $text);
        print "住所:" . $text . PHP_EOL;
        return $text;
    }

    /**
     * 住址
     *
     * @param Simple $simple
     */
    public static function getSex(Simple $simple)
    {
        $text = SimpleFront::getContent($simple, "sex");
        
        $text = str_replace("性", "", $text);
        $text = str_replace("別 ", "", $text);
        print "性別:" . $text . PHP_EOL;
        return $text;
    }

    /**
     * 生日
     *
     * @param Simple $simple
     */
    public static function getBirthday(Simple $simple)
    {
        $text = SimpleFront::getContent($simple, "birthday");
        
        $text = str_replace("生 ", "", $text);
        print "生年月日:" . $text . PHP_EOL;
        return $text;
    }

    /**
     * 有效日期
     *
     * @param Simple $simple
     */
    public static function getExpire(Simple $simple)
    {
        $text = SimpleFront::getContent($simple, "expire");
        
        $text = str_replace("生", "", $text);
        $text = str_replace("ま", "", $text);
        $text = str_replace("で", "", $text);
        $text = str_replace("有", "", $text);
        $text = str_replace("効 ", "", $text);
        print "有効期限:" . $text . PHP_EOL;
        return $text;
    }
}