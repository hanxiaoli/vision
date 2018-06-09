    <?php

    class SimpleFront extends Simple
    {

        // // 参照物对象
        // private $simple = null;
        
        // 正面参照物标准
        public const referenceWidth = array(
            "住" => array(
                "別" => 72,
                "個" => 71,
                "性" => 69.5,
                "電" => 51,
                "及" => 45,
                "思" => 37.5,
                "意" => 36,
                "特" => 30,
                "left" => 3,
                "right" => 82.5,
                "up" => 11,
                "down" => 43
            ),
            "所" => array(
                "別" => 70,
                "個" => 69,
                "性" => 67.5,
                "電" => 49,
                "及" => 43,
                "意" => 34,
                "思" => 35.5,
                "特" => 28,
                "left" => 5,
                "right" => 80.5,
                "up" => 11,
                "down" => 43
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

        // 参照物symbol
        private $referenceSymbol = null;

        // 卡范围
        private $cardArea = null;

        // MyNumber范围
        private $mynumberArea = null;

        // MyNumber号码
        private $mynumber = null;

        // 构造函数
        public static function withSymbol($referenceSymbol)
        {
            $instance = new self();
            $instance->referenceSymbol = $referenceSymbol;
            // $instance->cardArea = SimpleFront::getArea($instance->referenceSymbol, self::timesTo[$referenceSymbol->getText()]["card"]);
            return $instance;
        }

        // 通过参照物取特定范围
        public static function getArea($simple)
        {
            $referenceSymbol = $simple->getReferenceSymbolFront();
            
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
            
            $othersReferenceArray = SimpleFront::referenceWidth[$simple->getReferenceSymbolFront()->getText()];
            $pixMm = null;
            foreach ($othersReferenceArray as $key => $another) {
                if (array_key_exists($key, $simple->getReferenceSymbolArrayFront())) {
                    $a = ($simple->getReferenceSymbolArrayFront())[$key];
                    $pixMm = Triangle::withAxis(Axis::withVertex(($referenceSymbol->getBoundingBox()->getVertices())[0]), Axis::withVertex((($simple->getReferenceSymbolArrayFront())[$key]->getBoundingBox()->getVertices())[0]))->getHypotenuse() / $another;
                    break;
                }
            }
            
            if (null !== $pixMm) {
                $hypotenuse = $pixMm * abs(SimpleFront::referenceWidth[$referenceSymbol->getText()]["left"]);
                $leftX = ($referenceSymbol->getBoundingBox()->getVertices())[0]->getX() - $widthTriangleBlock->getCos() * $hypotenuse;
                $leftY = ($referenceSymbol->getBoundingBox()->getVertices())[0]->getY() - $widthTriangleBlock->getSin() * $hypotenuse;
                
                $hypotenuse = $pixMm * abs(SimpleFront::referenceWidth[$referenceSymbol->getText()]["up"]);
                $upX = ($referenceSymbol->getBoundingBox()->getVertices())[0]->getX() - $heightTriangleBlock->getCos() * $hypotenuse;
                $upY = ($referenceSymbol->getBoundingBox()->getVertices())[0]->getY() - $heightTriangleBlock->getSin() * $hypotenuse;
                
                $hypotenuse = $pixMm * abs(SimpleFront::referenceWidth[$referenceSymbol->getText()]["right"]);
                $rightX = ($referenceSymbol->getBoundingBox()->getVertices())[0]->getX() - $widthTriangleBlock->getCos() * $hypotenuse;
                $rightY = ($referenceSymbol->getBoundingBox()->getVertices())[0]->getY() - $widthTriangleBlock->getSin() * $hypotenuse;
                
                $hypotenuse = $pixMm * abs(SimpleFront::referenceWidth[$referenceSymbol->getText()]["down"]);
                $downX = ($referenceSymbol->getBoundingBox()->getVertices())[0]->getX() - $heightTriangleBlock->getCos() * $hypotenuse;
                $downY = ($referenceSymbol->getBoundingBox()->getVertices())[0]->getY() - $heightTriangleBlock->getSin() * $hypotenuse;
                
                $referenceArea[0] = Axis::withXY($leftX, $leftY);
                echo "referenceArea[0]:" . $referenceArea[0]->getX() . "," . $referenceArea[0]->getY() . PHP_EOL;
                
                $referenceArea[1] = Axis::withXY($upX, $upY);
                echo "referenceArea[1]:" . $referenceArea[1]->getX() . "," . $referenceArea[1]->getY() . PHP_EOL;
                
                $referenceArea[2] = Axis::withXY($rightX, $rightY);
                echo "referenceArea[2]:" . $referenceArea[2]->getX() . "," . $referenceArea[2]->getY() . PHP_EOL;
                
                $referenceArea[3] = Axis::withXY($downX, $downY);
                echo "referenceArea[3]:" . $referenceArea[3]->getX() . "," . $referenceArea[3]->getY() . PHP_EOL;
                
                $triangleLeftUp = Triangle::withAxis($referenceArea[0], Axis::withVertex(($referenceSymbol->getBoundingBox()->getVertices())[0]));
                $triangleRightUp = Triangle::withAxis($referenceArea[1], Axis::withVertex(($referenceSymbol->getBoundingBox()->getVertices())[0]));
                $triangleRightDown = Triangle::withAxis($referenceArea[2], Axis::withVertex(($referenceSymbol->getBoundingBox()->getVertices())[0]));
                $triangleLeftDown = Triangle::withAxis($referenceArea[3], Axis::withVertex(($referenceSymbol->getBoundingBox()->getVertices())[0]));
                
                $area = array();
                $area[0] = Triangle::withLine($triangleLeftUp->getAdjacent(), $triangleLeftUp->getOpposite(), null, $referenceArea[1])->getPointLeft();
                $area[1] = Triangle::withLine($triangleRightUp->getAdjacent(), $triangleRightUp->getOpposite(), null, $referenceArea[2])->getPointLeft();
                $area[2] = Triangle::withLine($triangleRightDown->getAdjacent(), $triangleRightDown->getOpposite(), null, $referenceArea[3])->getPointLeft();
                $area[3] = Triangle::withLine($triangleLeftDown->getAdjacent(), $triangleLeftDown->getOpposite(), null, $referenceArea[0])->getPointLeft();
                
                echo "area [0]:" . "x=" . $area[0]->getX() . ", y=" . $area[0]->getY() . PHP_EOL;
                echo "area [1]:" . "x=" . $area[1]->getX() . ", y=" . $area[1]->getY() . PHP_EOL;
                echo "area [2]:" . "x=" . $area[2]->getX() . ", y=" . $area[2]->getY() . PHP_EOL;
                echo "area [3]:" . "x=" . $area[3]->getX() . ", y=" . $area[3]->getY() . PHP_EOL;
                
                return $area;
            } else {
                echo "error getArea 1";
            }
        }
        
        // public static function getSin($referenceBlock)
        // {
        // Triangle::withAxis(Axis::withVertex(($referenceBlock->getBoundingBox()->getVertices())[0]), Axis::withVertex(($referenceBlock->getBoundingBox()->getVertices())[1]))->getSin();
        // }
        
        // public static function getCos($referenceBlock)
        // {
        // Triangle::withAxis(Axis::withVertex(($referenceBlock->getBoundingBox()->getVertices())[0]), Axis::withVertex(($referenceBlock->getBoundingBox()->getVertices())[1]))->getCos();
        // }
        
        // // 取卡中各种内容的范围
        // public function contentsArea()
        // {
        // echo "------------------Get name area front"
        // $referenceTimes = null;
        // switch ($this->referenceSymbol->getText()) {
        // case "思":
        // $referenceTimes = array(
        // 79,
        // 22,
        // 86,
        // 6
        // );
        // break;
        // default:
        // echo "cardArea error";
        // }
        // return Simple::getArea($this->referenceSymbol, $referenceTimes);
        // }
    }