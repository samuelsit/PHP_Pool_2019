<?php

Class NightsWatch {
    public $arr =  array();

    public function recruit($fighter) {
        if ($fighter instanceof Ifighter)
            $this->arr[] = $fighter;
    }

    public function fight() {
        foreach ($this->arr as $fighter)
            $fighter->fight();
    }
}

?>