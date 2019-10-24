<?php

Class UnholyFactory {
    public $arr = array();

    public function absorb($fighter) {
        $type = $fighter->name;
        if (is_subclass_of($fighter, Fighter)) {
            if (!(array_key_exists($type, $this->arr))) {
                $this->arr[$type] = get_class($fighter);
                    print("(Factory absorbed a fighter of type ".$type.")\n");
            }
            else
                print("(Factory already absorbed a fighter of type ".$type.")\n");
        }
        else
            print("(Factory can't absorb this, it's not a fighter)\n");
    }

    public function fabricate($type) {
        if (array_key_exists($type, $this->arr)) {
            print("(Factory fabricates a fighter of type ".$type.")\n");
            return (New $this->arr[$type]);
        }
        else {
            print("(Factory hasn't absorbed any fighter of type ".$type.")\n");
            return NULL;
        }
    }
}

?>