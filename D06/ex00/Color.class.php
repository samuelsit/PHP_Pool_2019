<?php

class Color {
    public $red;
    public $green;
    public $blue;
    public static $verbose = FALSE;

    public function __construct(array $arr) {
        if (array_key_exists('rgb', $arr) && count($arr) == 1) {
            $rgb = intval($arr['rgb']);
            $this->red = ($rgb / 256*256) % 256;
            $this->green = ($rgb / 256) % 256;
            $this->blue = $rgb % 256;
        }
        else if (array_key_exists('red', $arr) && array_key_exists('green', $arr) && array_key_exists('blue', $arr) && count($arr) == 3) {
            $this->red = intval($arr['red']);
            $this->green = intval($arr['green']);
            $this->blue = intval($arr['blue']);
        }
        if (self::$verbose == TRUE)
            printf("Color( red: %3d, green: %3d, blue: %3d ) constructed.\n", $this->red, $this->green, $this->blue);
    }

    public function add($Color) {
        return (new Color(array('red' => $this->red + $Color->red, 'green' => $this->green + $Color->green, 'blue' => $this->blue + $Color->blue)));
    }

    public function sub($Color) {
        return (new Color(array('red' => $this->red - $Color->red, 'green' => $this->green - $Color->green, 'blue' => $this->blue - $Color->blue)));
    }

    public function mult($mult) {
        return (new Color(array('red' => $this->red * $mult, 'green' => $this->green * $mult, 'blue' => $this->blue * $mult)));
    }

    public static function doc() {
        $doc = file_get_contents(__DIR__.'/Color.doc.txt');
        echo "\n".$doc."\n";
    }

    public function __destruct() {
        if (self::$verbose == TRUE)
            printf("Color( red: %3d, green: %3d, blue: %3d ) destructed.\n", $this->red, $this->green, $this->blue);
    }

    public function __toString() {
        $str = sprintf("Color( red: %3d, green: %3d, blue: %3d )", $this->red, $this->green, $this->blue);
        return ($str);
    }
}

?>