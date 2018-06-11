<?php

class Triangle
{

    public const sinArray = array(
        0 => 0,
        1 => 0.017452,
        2 => 0.034899,
        3 => 0.052336,
        4 => 0.069756,
        5 => 0.087156,
        6 => 0.104528,
        7 => 0.121869,
        8 => 0.139173,
        9 => 0.156434,
        10 => 0.173648,
        11 => 0.190809,
        12 => 0.207912,
        13 => 0.224951,
        14 => 0.241922,
        15 => 0.258819,
        16 => 0.275637,
        17 => 0.292372,
        18 => 0.309017,
        19 => 0.325568,
        20 => 0.34202,
        21 => 0.358368,
        22 => 0.374607,
        23 => 0.390731,
        24 => 0.406737,
        25 => 0.422618,
        26 => 0.438371,
        27 => 0.45399,
        28 => 0.469472,
        29 => 0.48481,
        30 => 0.5,
        31 => 0.515038,
        32 => 0.529919,
        33 => 0.544639,
        34 => 0.559193,
        35 => 0.573576,
        36 => 0.587785,
        37 => 0.601815,
        38 => 0.615661,
        39 => 0.62932,
        40 => 0.642788,
        41 => 0.656059,
        42 => 0.669131,
        43 => 0.681998,
        44 => 0.694658,
        45 => 0.707107,
        46 => 0.71934,
        47 => 0.731354,
        48 => 0.743145,
        49 => 0.75471,
        50 => 0.766044,
        51 => 0.777146,
        52 => 0.788011,
        53 => 0.798636,
        54 => 0.809017,
        55 => 0.819152,
        56 => 0.829038,
        57 => 0.838671,
        58 => 0.848048,
        59 => 0.857167,
        60 => 0.866025,
        61 => 0.87462,
        62 => 0.882948,
        63 => 0.891007,
        64 => 0.898794,
        65 => 0.906308,
        66 => 0.913545,
        67 => 0.920505,
        68 => 0.927184,
        69 => 0.93358,
        70 => 0.939693,
        71 => 0.945519,
        72 => 0.951057,
        73 => 0.956305,
        74 => 0.961262,
        75 => 0.965926,
        76 => 0.970296,
        77 => 0.97437,
        78 => 0.978148,
        79 => 0.981627,
        80 => 0.984808,
        81 => 0.987688,
        82 => 0.990268,
        83 => 0.992546,
        84 => 0.994522,
        85 => 0.996195,
        86 => 0.997564,
        87 => 0.99863,
        88 => 0.999391,
        89 => 0.999848,
        90 => 1,
        91 => 0.999848,
        92 => 0.999391,
        93 => 0.99863,
        94 => 0.997564,
        95 => 0.996195,
        96 => 0.994522,
        97 => 0.992546,
        98 => 0.990268,
        99 => 0.987688,
        100 => 0.984808,
        101 => 0.981627,
        102 => 0.978148,
        103 => 0.97437,
        104 => 0.970296,
        105 => 0.965926,
        106 => 0.961262,
        107 => 0.956305,
        108 => 0.951057,
        109 => 0.945519,
        110 => 0.939693,
        111 => 0.93358,
        112 => 0.927184,
        113 => 0.920505,
        114 => 0.913545,
        115 => 0.906308,
        116 => 0.898794,
        117 => 0.891007,
        118 => 0.882948,
        119 => 0.87462,
        120 => 0.866025,
        121 => 0.857167,
        122 => 0.848048,
        123 => 0.838671,
        124 => 0.829038,
        125 => 0.819152,
        126 => 0.809017,
        127 => 0.798636,
        128 => 0.788011,
        129 => 0.777146,
        130 => 0.766044,
        131 => 0.75471,
        132 => 0.743145,
        133 => 0.731354,
        134 => 0.71934,
        135 => 0.707107,
        136 => 0.694658,
        137 => 0.681998,
        138 => 0.669131,
        139 => 0.656059,
        140 => 0.642788,
        141 => 0.62932,
        142 => 0.615661,
        143 => 0.601815,
        144 => 0.587785,
        145 => 0.573576,
        146 => 0.559193,
        147 => 0.544639,
        148 => 0.529919,
        149 => 0.515038,
        150 => 0.5,
        151 => 0.48481,
        152 => 0.469472,
        153 => 0.45399,
        154 => 0.438371,
        155 => 0.422618,
        156 => 0.406737,
        157 => 0.390731,
        158 => 0.374607,
        159 => 0.358368,
        160 => 0.34202,
        161 => 0.325568,
        162 => 0.309017,
        163 => 0.292372,
        164 => 0.275637,
        165 => 0.258819,
        166 => 0.241922,
        167 => 0.224951,
        168 => 0.207912,
        169 => 0.190809,
        170 => 0.173648,
        171 => 0.156434,
        172 => 0.139173,
        173 => 0.121869,
        174 => 0.104528,
        175 => 0.087156,
        176 => 0.069756,
        177 => 0.052336,
        178 => 0.034899,
        179 => 0.017452,
        180 => 0,
        181 => - 0.017452,
        182 => - 0.034899,
        183 => - 0.052336,
        184 => - 0.069756,
        185 => - 0.087156,
        186 => - 0.104528,
        187 => - 0.121869,
        188 => - 0.139173,
        189 => - 0.156434,
        190 => - 0.173648,
        191 => - 0.190809,
        192 => - 0.207912,
        193 => - 0.224951,
        194 => - 0.241922,
        195 => - 0.258819,
        196 => - 0.275637,
        197 => - 0.292372,
        198 => - 0.309017,
        199 => - 0.325568,
        200 => - 0.34202,
        201 => - 0.358368,
        202 => - 0.374607,
        203 => - 0.390731,
        204 => - 0.406737,
        205 => - 0.422618,
        206 => - 0.438371,
        207 => - 0.45399,
        208 => - 0.469472,
        209 => - 0.48481,
        210 => - 0.5,
        211 => - 0.515038,
        212 => - 0.529919,
        213 => - 0.544639,
        214 => - 0.559193,
        215 => - 0.573576,
        216 => - 0.587785,
        217 => - 0.601815,
        218 => - 0.615661,
        219 => - 0.62932,
        220 => - 0.642788,
        221 => - 0.656059,
        222 => - 0.669131,
        223 => - 0.681998,
        224 => - 0.694658,
        225 => - 0.707107,
        226 => - 0.71934,
        227 => - 0.731354,
        228 => - 0.743145,
        229 => - 0.75471,
        230 => - 0.766044,
        231 => - 0.777146,
        232 => - 0.788011,
        233 => - 0.798636,
        234 => - 0.809017,
        235 => - 0.819152,
        236 => - 0.829038,
        237 => - 0.838671,
        238 => - 0.848048,
        239 => - 0.857167,
        240 => - 0.866025,
        241 => - 0.87462,
        242 => - 0.882948,
        243 => - 0.891007,
        244 => - 0.898794,
        245 => - 0.906308,
        246 => - 0.913545,
        247 => - 0.920505,
        248 => - 0.927184,
        249 => - 0.93358,
        250 => - 0.939693,
        251 => - 0.945519,
        252 => - 0.951057,
        253 => - 0.956305,
        254 => - 0.961262,
        255 => - 0.965926,
        256 => - 0.970296,
        257 => - 0.97437,
        258 => - 0.978148,
        259 => - 0.981627,
        260 => - 0.984808,
        261 => - 0.987688,
        262 => - 0.990268,
        263 => - 0.992546,
        264 => - 0.994522,
        265 => - 0.996195,
        266 => - 0.997564,
        267 => - 0.99863,
        268 => - 0.999391,
        269 => - 0.999848,
        270 => - 1,
        271 => - 0.999848,
        272 => - 0.999391,
        273 => - 0.99863,
        274 => - 0.997564,
        275 => - 0.996195,
        276 => - 0.994522,
        277 => - 0.992546,
        278 => - 0.990268,
        279 => - 0.987688,
        280 => - 0.984808,
        281 => - 0.981627,
        282 => - 0.978148,
        283 => - 0.97437,
        284 => - 0.970296,
        285 => - 0.965926,
        286 => - 0.961262,
        287 => - 0.956305,
        288 => - 0.951057,
        289 => - 0.945519,
        290 => - 0.939693,
        291 => - 0.93358,
        292 => - 0.927184,
        293 => - 0.920505,
        294 => - 0.913545,
        295 => - 0.906308,
        296 => - 0.898794,
        297 => - 0.891007,
        298 => - 0.882948,
        299 => - 0.87462,
        300 => - 0.866025,
        301 => - 0.857167,
        302 => - 0.848048,
        303 => - 0.838671,
        304 => - 0.829038,
        305 => - 0.819152,
        306 => - 0.809017,
        307 => - 0.798636,
        308 => - 0.788011,
        309 => - 0.777146,
        310 => - 0.766044,
        311 => - 0.75471,
        312 => - 0.743145,
        313 => - 0.731354,
        314 => - 0.71934,
        315 => - 0.707107,
        316 => - 0.694658,
        317 => - 0.681998,
        318 => - 0.669131,
        319 => - 0.656059,
        320 => - 0.642788,
        321 => - 0.62932,
        322 => - 0.615661,
        323 => - 0.601815,
        324 => - 0.587785,
        325 => - 0.573576,
        326 => - 0.559193,
        327 => - 0.544639,
        328 => - 0.529919,
        329 => - 0.515038,
        330 => - 0.5,
        331 => - 0.48481,
        332 => - 0.469472,
        333 => - 0.45399,
        334 => - 0.438371,
        335 => - 0.422618,
        336 => - 0.406737,
        337 => - 0.390731,
        338 => - 0.374607,
        339 => - 0.358368,
        340 => - 0.34202,
        341 => - 0.325568,
        342 => - 0.309017,
        343 => - 0.292372,
        344 => - 0.275637,
        345 => - 0.258819,
        346 => - 0.241922,
        347 => - 0.224951,
        348 => - 0.207912,
        349 => - 0.190809,
        350 => - 0.173648,
        351 => - 0.156434,
        352 => - 0.139173,
        353 => - 0.121869,
        354 => - 0.104528,
        355 => - 0.087156,
        356 => - 0.069756,
        357 => - 0.052336,
        358 => - 0.034899,
        359 => - 0.017452,
        360 => 0
    );

    // 左点
    private $pointLeft = null;

    // 右点
    private $pointRight = null;

    // 斜边
    private $hypotenuse = null;

    // 对边
    private $opposite = null;

    // 临边
    private $adjacent = null;

    // 构造函数
    public static function withAxis(Axis $pointLeft, Axis $pointRight)
    {
        $instance = new self();
        $instance->pointLeft = $pointLeft;
        $instance->pointRight = $pointRight;
        $instance->setAdjacent($pointRight->getX() - $pointLeft->getX());
        $instance->setOpposite($pointRight->getY() - $pointLeft->getY());
        $instance->setHypotenuse(sqrt($instance->adjacent * $instance->adjacent + $instance->opposite * $instance->opposite));
        
        return $instance;
    }

    // 构造函数
    public static function withLine($adjacent, $opposite, $pointLeft, $pointRight)
    {
        $instance = new self();
        $instance->adjacent = $adjacent;
        $instance->opposite = $opposite;
        
        if (null === $pointLeft && null !== $pointRight) {
            $instance->pointRight = $pointRight;
            $instance->pointLeft = Axis::withXY($pointRight->getX() - $instance->adjacent, $pointRight->getY() - $instance->opposite);
            
            return $instance;
        } else if (null !== $pointLeft && null === $pointRight) {
            $instance->pointLeft = $pointLeft;
            $instance->pointRight = Axis::withXY($pointLeft->getX() + $instance->adjacent, $pointRight->getY() + $instance->opposite);
            
            return $instance;
        } else {
            echo "create triangle with line was wrong";
            return null;
        }
    }

    public function getDegree($sin = null)
    {
        if (null === $sin) {
            $sin = $this->getSin();
        }
        
        $startIndex = null;
        $endIndex = null;
        if (0 < $this->adjacent and 0 <= $this->opposite) {
            $startIndex = 0;
            $endIndex = 90;
        } else if (0 >= $this->adjacent and 0 < $this->opposite) {
            $startIndex = 90;
            $endIndex = 180;
        } else if (0 > $this->adjacent and 0 >= $this->opposite) {
            $startIndex = 180;
            $endIndex = 270;
        } else {
            $startIndex = 270;
            $endIndex = 360;
        }
        
        $index = null;
        $closest = null;
        for ($i = $startIndex; $i <= $endIndex; $i ++) {
            if ($closest === null || abs($sin - $closest) > abs(self::sinArray[$i] - $sin)) {
                $index = $i;
                $closest = self::sinArray[$i];
            }
        }
        
        print('block degree: ' . $index . PHP_EOL);
        
        return $index;
    }
    
    // 取正弦
    public function getSin()
    {
        return $this->opposite / $this->hypotenuse;
    }

    // 取余弦
    public function getCos()
    {
        return $this->adjacent / $this->hypotenuse;
    }

    // 取正切
    public function getTan()
    {
        return $this->opposite / $this->adjacent;
    }

    // 取余切
    public function getCot()
    {
        return $this->adjacent / $this->opposite;
    }

    // 设定斜边
    public function setHypotenuse($hypotenuse)
    {
        $this->hypotenuse = $hypotenuse;
    }

    // 取斜边
    public function getHypotenuse()
    {
        return $this->hypotenuse;
    }

    // 设定对边
    public function setOpposite($opposite)
    {
        $this->opposite = $opposite;
    }

    // 取对边
    public function getOpposite()
    {
        return $this->opposite;
    }

    // 设定临边
    public function setAdjacent($adjacent)
    {
        $this->adjacent = $adjacent;
    }

    // 取临边
    public function getAdjacent()
    {
        return $this->adjacent;
    }

    // 设定左点
    public function setPointLeft($pointLeft)
    {
        $this->pointLeft = $pointLeft;
    }

    // 取左点
    public function getPointLeft()
    {
        return $this->pointLeft;
    }

    // 设定右点
    public function setPointRight($pointRight)
    {
        $this->pointRight = $pointRight;
    }

    // 取右点
    public function getPointRight()
    {
        return $this->pointRight;
    }
}

