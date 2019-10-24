<?php

Class Jaime extends Lannister {
    public function sleepWith($i) {
        if ($i instanceof Cersei)
            print("With pleasure, but only in a tower in Winterfell, then.\n");
        else
            parent::sleepWith($i);
    }
}

?>