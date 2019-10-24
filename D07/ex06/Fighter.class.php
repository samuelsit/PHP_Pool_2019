<?php

abstract Class Fighter {
    public function __construct(string $type) {
        $this->name = $type;
    }
    abstract public function fight($target);
}

?>