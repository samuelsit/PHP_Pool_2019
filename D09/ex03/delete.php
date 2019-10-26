<?php

foreach ($_GET as $getval) {
    $file = file_get_contents('list.csv');
    $line = explode("\n", $file);
    foreach ($line as $l) {
        $tab = explode(";", $l);
        if ($tab[1] == $getval) {
            $elem = $tab[1].';'.$tab[1]."\n";
            $file = str_replace($elem, '', $file);
            file_put_contents('list.csv', $file);
        }
    }
}

?>