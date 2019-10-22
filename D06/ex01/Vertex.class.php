<?php

require_once '../ex00/Color.class.php';

class Vertex {
    private $_x;
    private $_y;
    private $_z;
    private $_w = 1;
    private $_color;
    static public $verbose = FALSE;

    public function __construct(array $arr) {
        if (array_key_exists('x', $arr) && array_key_exists('y', $arr) && array_key_exists('z', $arr) && (count($arr) == 3 || count($arr) == 4 || count($arr) == 5)) {
            if (array_key_exists('color', $arr) == FALSE)
                $this->_color = new Color(array('red' => 255, 'green' => 255, 'blue' => 255));
            else if (array_key_exists('color', $arr) && $arr['color'] instanceof Color)
                $this->_color = $arr['color'];
            if (array_key_exists('w', $arr))
                $this->_w = $arr['w'];
            $this->_x = floatval($arr['x']);
            $this->_y = floatval($arr['y']);
            $this->_z = floatval($arr['z']);
            if (array_key_exists('w', $arr))
                $this->_w = floatval($arr['w']);
        }
        if (self::$verbose == TRUE)
            printf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f, Color( red: %3d, green: %3d, blue: %3d ) ) constructed\n", $this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue);
    }

    public function getX() {
        return ($this->_x);
    }
    
    public function getY() {
        return ($this->_y);
    }

    public function getZ() {
        return ($this->_z);
    }

    public function getW() {
        return ($this->_w);
    }

    public function getColor() {
        return ($this->_color);
    }

    public function setX($x) {
        $this->_x = $x;
    }

    public function setY($y) {
        $this->_y = $y;
    }

    public function setZ($z) {
        $this->_z = $z;
    }

    public function setW($w) {
        $this->_w = $w;
    }

    public function setColor($color) {
        $this->_color = $color;
    }

    public function __toString() {
        if (self::$verbose == TRUE)
            $str = sprintf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f, Color( red: %3d, green: %3d, blue: %3d ) )", $this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue);
        else
            $str = sprintf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f )", $this->_x, $this->_y, $this->_z, $this->_w);
        return ($str);
    }

    public function __destruct() {
        if (self::$verbose == TRUE)
            printf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f, Color( red: %3d, green: %3d, blue: %3d ) ) destructed", $this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue);    }

    public static function doc() {
        $doc = file_get_contents(__DIR__.'/Vertex.doc.txt');
        echo "\n".$doc."\n";
    }
}

?>