<?php

Class Lannister {
    public function sleepWith($i) {
        if (is_subclass_of($i, "Lannister"))
            print ("Not even if I'm drunk !\n");
        else
            print ("Let's do this.\n");
    }
}

?>