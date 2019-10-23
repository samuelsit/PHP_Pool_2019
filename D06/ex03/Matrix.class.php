<?php

class Matrix {
    const IDENTITY = "IDENTITY";
    const SCALE = "SCALE";
    const RX = "Ox ROTATION";
    const RY = "Oy ROTATION";
    const RZ = "Oz ROTATION";
    const TRANSLATION = "TRANSLATION";
    const PROJECTION = "PROJECTION";
    static public $verbose = FALSE;
    private $_matrix = array();
    private $_preset;
    private $_scale;
    private $_angle;
    private $_vtc;
    private $_fov;
    private $_ratio;
    private $_near;
    private $_far;

    public function __construct(Array $arr) {
        if (Self::$verbose) {
            if ($this->_preset == Self::IDENTITY)
                echo "Matrix " . $this->_preset . " instance constructed\n";
            else
                echo "Matrix " . $this->_preset . " preset instance constructed\n";
        }
    }

    public function __toString() {
        $representation = "M | vtcX | vtcY | vtcZ | vtxO\n-----------------------------\nx | %0.2f | %0.2f | %0.2f | %0.2f\ny | %0.2f | %0.2f | %0.2f | %0.2f\nz | %0.2f | %0.2f | %0.2f | %0.2f\nw | %0.2f | %0.2f | %0.2f | %0.2f";
        $str = vsprintf($representation, array($this->matrix[0], $this->matrix[1], $this->matrix[2], $this->matrix[3], $this->matrix[4], $this->matrix[5], $this->matrix[6], $this->matrix[7], $this->matrix[8], $this->matrix[9], $this->matrix[10], $this->matrix[11], $this->matrix[12], $this->matrix[13], $this->matrix[14], $this->matrix[15]));
        return ($str);
    }

    function __destruct() {
        if (self::$verbose)
            printf("Matrix instance destructed\n");
    }

    public static function doc() {
        $doc = file_get_contents(__DIR__.'/Vector.doc.txt');
        echo "\n".$doc."\n";
    }
}

?>