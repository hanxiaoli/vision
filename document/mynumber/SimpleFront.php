<?php

class SimpleFront extends Simple
{

    // TODO 该定义没有被使用
    /**
     * 各区域到参照物左上角之间的距离（参照物宽度或高度的倍数）
     */
    public const timesTo = array(
        "思" => array(
            "card" => array(
                79,
                22,
                86,
                6
            ),
            "name" => array(
                79,
                - 17,
                75,
                - 13
            ),
            "address" => array(
                79,
                - 13,
                75,
                - 11.5
            ),
            "sex" => array(
                7,
                22,
                86,
                - 5
            ),
            "birthday" => array(
                13,
                - 13,
                13,
                - 11.5
            ),
            "expire" => array(
                - 11.5,
                - 13,
                86,
                - 11.5
            ),
            "electronic" => array(
                79,
                22,
                86,
                6
            ),
            "serial1" => array(
                79,
                22,
                86,
                6
            ),
            "serial2" => array(
                79,
                22,
                86,
                6
            )
        ),
        "住" => array()
    );

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

    // 正面参照物标准
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
                "left" => 3,
                "right" => 82.5,
                "up" => 11,
                "down" => 43
            )
        ),
        "所" => array(
            "name" => array(
                "nameLeft" => 5,
                "nameRight" => 76,
                "nameUp" => 11,
                "nameDown" => - 1
            ),
            "card" => array(
                "left" => 5,
                "right" => 80.5,
                "up" => 11,
                "down" => 43
            )
        ),
        "意" => array(
            "住" => 36,
            "別" => 36,
            "個" => 35,
            "所" => 34,
            "性" => 34,
            "電" => 15.5,
            "left" => 39,
            "right" => 46.5,
            "up" => 45,
            "down" => 9
        ),
        "思" => array(
            "住" => 33.5,
            "所" => 35.5,
            "別" => 34.5,
            "個" => 34,
            "性" => 32.5,
            "電" => 14,
            "left" => 40.5,
            "right" => 45,
            "up" => 45,
            "down" => 9
        ),
        "性" => array(
            "住" => 70,
            "所" => 68,
            "意" => 34,
            "思" => 32.5,
            "及" => 24,
            "特" => 40,
            "left" => 72.5,
            "right" => 13,
            "up" => 14.5,
            "down" => 39.5
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

    // "思"字作为参照物时，内容区域的各边与参照物对象左上角点之间的距离
    
    /**
     * 参照物与其它比较参照物之间的距离（毫米）
     */
    public const comparativeSymbolsDistance = array(
        "住" => array(
            "width" => array(
                "別" => 72,
                "個" => 71,
                "性" => 69.5,
                "電" => 51,
                "及" => 45,
                "思" => 37.5,
                "意" => 36,
                "特" => 30
            ),
            "height" => array()
        ),
        "所" => array(
            "width" => array(
                "別" => 70,
                "個" => 69,
                "性" => 67.5,
                "電" => 49,
                "及" => 43,
                "意" => 34,
                "思" => 35.5,
                "特" => 28
            ),
            "height" => array()
        ),
        "意" => array(
            "住" => 36,
            "別" => 36,
            "個" => 35,
            "所" => 34,
            "性" => 34,
            "電" => 15.5,
            "left" => 39,
            "right" => 46.5,
            "up" => 45,
            "down" => 9
        ),
        "思" => array(
            "住" => 33.5,
            "所" => 35.5,
            "別" => 34.5,
            "個" => 34,
            "性" => 32.5,
            "電" => 14,
            "left" => 40.5,
            "right" => 45,
            "up" => 45,
            "down" => 9
        ),
        "性" => array(
            "住" => 70,
            "所" => 68,
            "意" => 34,
            "思" => 32.5,
            "及" => 24,
            "特" => 40,
            "left" => 72.5,
            "right" => 13,
            "up" => 14.5,
            "down" => 39.5
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
        
        $hypotenuse = $widthPixMm * abs(SimpleFront::lengthToReferenceSymbol[$referenceSymbol->getText()][$areaType]["left"]);
        $leftX = ($referenceSymbol->getBoundingBox()->getVertices())[0]->getX() - $widthTriangleBlock->getCos() * $hypotenuse;
        $leftY = ($referenceSymbol->getBoundingBox()->getVertices())[0]->getY() - $widthTriangleBlock->getSin() * $hypotenuse;
        
        $hypotenuse = $widthPixMm * abs(SimpleFront::lengthToReferenceSymbol[$referenceSymbol->getText()][$areaType]["up"]);
        $upX = ($referenceSymbol->getBoundingBox()->getVertices())[0]->getX() - $heightTriangleBlock->getCos() * $hypotenuse;
        $upY = ($referenceSymbol->getBoundingBox()->getVertices())[0]->getY() - $heightTriangleBlock->getSin() * $hypotenuse;
        
        $hypotenuse = $widthPixMm * abs(SimpleFront::lengthToReferenceSymbol[$referenceSymbol->getText()][$areaType]["right"]);
        $rightX = ($referenceSymbol->getBoundingBox()->getVertices())[0]->getX() + $widthTriangleBlock->getCos() * $hypotenuse;
        $rightY = ($referenceSymbol->getBoundingBox()->getVertices())[0]->getY() + $widthTriangleBlock->getSin() * $hypotenuse;
        
        $hypotenuse = $widthPixMm * abs(SimpleFront::lengthToReferenceSymbol[$referenceSymbol->getText()][$areaType]["down"]);
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

}