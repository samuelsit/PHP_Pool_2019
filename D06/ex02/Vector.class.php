<?php

require_once '../ex01/Vertex.class.php';

class Vector {
    private $_x;
    private $_y;
    private $_z;
    private $_w = 0.00;
    private $_dest;
    private $_orig;
    static public $verbose = FALSE;

    public function __construct(array $arr) {
        if (array_key_exists('dest', $arr) && $arr['dest'] instanceof Vertex && (count($arr) == 2 || count($arr) == 1)) {
            if (array_key_exists('orig', $arr) && $arr['orig'] instanceof Vertex)
                $this->_orig = $arr['orig'];
            else
                $this->_orig = new Vertex(array('x' => 0, 'y' => 0, 'z' => 0, 'w' => 1));
            $this->_dest = $arr['dest'];
            $this->_x = $this->_dest->getX() - $this->_orig->getX();
            $this->_y = $this->_dest->getY() - $this->_orig->getY();
            $this->_z = $this->_dest->getZ() - $this->_orig->getZ();
        }
        if (self::$verbose == TRUE)
            printf("Vector( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f ) constructed\n", $this->_x, $this->_y, $this->_z, $this->_w);
    }

    public function magnitude() {
        return (sqrt(pow($this->_x, 2) + pow($this->_y, 2) + pow($this->_z, 2)));
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

    public function __toString() {
        $str = sprintf("Vector( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f )", $this->_x, $this->_y, $this->_z, $this->_w);
        return ($str);
    }

    public function __destruct() {
        if (self::$verbose == TRUE)
            printf("Vector( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f ) destructed\n", $this->_x, $this->_y, $this->_z, $this->_w);
    }

    public static function doc() {
        $doc = file_get_contents(__DIR__.'/Vector.doc.txt');
        echo "\n".$doc."\n";
    }
}

?>