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

    public function __construct($arr = NULL) {
        if (isset($arr)) {
            $this->_setAtrr($arr);
            $this->_checkAtrr();
            for ($i = 0; $i < 16; $i++)
                $this->_matrix[$i] = 0;
            if (self::$verbose) {
                if ($this->_preset == self::IDENTITY)
                    echo "Matrix " . $this->_preset . " instance constructed\n";
                else
                    echo "Matrix " . $this->_preset . " preset instance constructed\n";
            }
            $this->_createMatrix();
        }
    }

    private function _setAtrr(Array $arr) {
        if (array_key_exists('preset', $arr)) {
            $this->_preset = $arr['preset'];
        }
        if (array_key_exists('scale', $arr)) {
            $this->_scale = $arr['scale'];
        }
        if (array_key_exists('angle', $arr)) {
            $this->_angle = $arr['angle'];
        }
        if (array_key_exists('vtc', $arr) && $arr['vtc'] instanceof Vector) {
            $this->_vtc = $arr['vtc'];
        }
        if (array_key_exists('fov', $arr)) {
            $this->_fov = $arr['fov'];
        }
        if (array_key_exists('ratio', $arr)) {
            $this->_ratio = $arr['ratio'];
        }
        if (array_key_exists('near', $arr)) {
            $this->_near = $arr['near'];
        }
        if (array_key_exists('far', $arr)) {
            $this->_far = $arr['far'];
        }
    }

    private function _checkAtrr() {
        if (!isset($this->_preset))
            $this->_error();
        if ($this->_preset == self::SCALE && !isset($this->_scale))
            $this->_error();
        if (($this->_preset == self::RX || $this->_preset == self::RY || $this->_preset == self::RZ) && !isset($this->_angle))
            $this->_error();
        if ($this->_preset == self::TRANSLATION && !isset($this->_vtc))
            $this->_error();
        if ($this->_preset == self::PROJECTION && (!isset($this->_fov) || !isset($this->_ratio) || !isset($this->_near) || !isset($this->_far)))
            $this->_error();
    }

    private function _error() {
        echo 'Error';
        exit();
    }

    private function _createMatrix() {
        if ($this->_preset == self::IDENTITY)
            $this->_identity(1);
        else if ($this->_preset == self::TRANSLATION)
            $this->_translation();
        else if ($this->_preset == self::SCALE)
            $this->_identity($this->_scale);
        else if ($this->_preset == self::RX)
            $this->_rotation_x();
        else if ($this->_preset == self::RY)
            $this->_rotation_y();
        else if ($this->_preset == self::RZ)
            $this->_rotation_z();
        else if ($this->_preset == self::PROJECTION)
            $this->_projection();
    }

    private function _identity($_scale) {
        $this->_matrix[0] = $_scale;
        $this->_matrix[5] = $_scale;
        $this->_matrix[10] = $_scale;
        $this->_matrix[15] = 1;
    }

    private function _translation() {
        $this->_identity(1);
        $this->_matrix[3] = $this->_vtc->getX();
        $this->_matrix[7] = $this->_vtc->getY();
        $this->_matrix[11] = $this->_vtc->getZ();
    }

    private function _rotation_x() {
        $this->_identity(1);
        $this->_matrix[0] = 1;
        $this->_matrix[5] = cos($this->_angle);
        $this->_matrix[6] = -sin($this->_angle);
        $this->_matrix[9] = sin($this->_angle);
        $this->_matrix[10] = cos($this->_angle);
    }

    private function _rotation_y() {
        $this->_identity(1);
        $this->_matrix[0] = cos($this->_angle);
        $this->_matrix[2] = sin($this->_angle);
        $this->_matrix[5] = 1;
        $this->_matrix[8] = -sin($this->_angle);
        $this->_matrix[10] = cos($this->_angle);
    }

    private function _rotation_z() {
        $this->_identity(1);
        $this->_matrix[0] = cos($this->_angle);
        $this->_matrix[1] = -sin($this->_angle);
        $this->_matrix[4] = sin($this->_angle);
        $this->_matrix[5] = cos($this->_angle);
        $this->_matrix[10] = 1;
    }

    private function _projection() {
        $this->_identity(1);
        $this->_matrix[5] = 1 / tan(0.5 * deg2rad($this->_fov));
        $this->_matrix[0] = $this->_matrix[5] / $this->_ratio;
        $this->_matrix[10] = -1 * (-$this->_near - $this->_far) / ($this->_near - $this->_far);
        $this->_matrix[14] = -1;
        $this->_matrix[11] = (2 * $this->_near * $this->_far) / ($this->_near - $this->_far);
        $this->_matrix[15] = 0;
    }

    public function mult(Matrix $rhs) {
        $tmp = array();
        for ($i = 0; $i < 16; $i += 4) {
            for ($j = 0; $j < 4; $j++) {
                $tmp[$i + $j] = 0;
                $tmp[$i + $j] += $this->_matrix[$i + 0] * $rhs->_matrix[$j + 0];
                $tmp[$i + $j] += $this->_matrix[$i + 1] * $rhs->_matrix[$j + 4];
                $tmp[$i + $j] += $this->_matrix[$i + 2] * $rhs->_matrix[$j + 8];
                $tmp[$i + $j] += $this->_matrix[$i + 3] * $rhs->_matrix[$j + 12];
            }
        }
        $matrice = new Matrix();
        $matrice->_matrix = $tmp;
        return ($matrice);
    }

    public function transformVertex(Vertex $vtx) {
        $tmp = array();
        $tmp['x'] = ($vtx->getX() * $this->_matrix[0]) + ($vtx->getY() * $this->_matrix[1]) + ($vtx->getZ() * $this->_matrix[2]) + ($vtx->getW() * $this->_matrix[3]);
        $tmp['y'] = ($vtx->getX() * $this->_matrix[4]) + ($vtx->getY() * $this->_matrix[5]) + ($vtx->getZ() * $this->_matrix[6]) + ($vtx->getW() * $this->_matrix[7]);
        $tmp['z'] = ($vtx->getX() * $this->_matrix[8]) + ($vtx->getY() * $this->_matrix[9]) + ($vtx->getZ() * $this->_matrix[10]) + ($vtx->getW() * $this->_matrix[11]);
        $tmp['w'] = ($vtx->getX() * $this->_matrix[11]) + ($vtx->getY() * $this->_matrix[13]) + ($vtx->getZ() * $this->_matrix[14]) + ($vtx->getW() * $this->_matrix[15]);
        $tmp['color'] = $vtx->getColor();
        $vertex = new Vertex($tmp);
        return ($vertex);
    }

    public function __toString() {
        $representation = "M | vtcX | vtcY | vtcZ | vtxO\n-----------------------------\nx | %0.2f | %0.2f | %0.2f | %0.2f\ny | %0.2f | %0.2f | %0.2f | %0.2f\nz | %0.2f | %0.2f | %0.2f | %0.2f\nw | %0.2f | %0.2f | %0.2f | %0.2f";
        $str = vsprintf($representation, array($this->_matrix[0], $this->_matrix[1], $this->_matrix[2], $this->_matrix[3], $this->_matrix[4], $this->_matrix[5], $this->_matrix[6], $this->_matrix[7], $this->_matrix[8], $this->_matrix[9], $this->_matrix[10], $this->_matrix[11], $this->_matrix[12], $this->_matrix[13], $this->_matrix[14], $this->_matrix[15]));
        return ($str);
    }

    public function __destruct() {
        if (self::$verbose)
            printf("Matrix instance destructed\n");
    }

    public static function doc() {
        $doc = file_get_contents(__DIR__.'/Matrix.doc.txt');
        echo "\n".$doc."\n";
    }
}

?>