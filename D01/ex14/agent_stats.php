#!/usr/bin/php
<?php
if ($argc == 2) {
    $total = 0;
    $nb = 0;
    if ($argv[1] == 'moyenne') {
        while ($line = fgets(STDIN)) {
            $tab = explode(";", $line);
            if ($tab[1] != "" && is_numeric($tab[1]) && $tab[2] != "moulinette") {
                $note = $tab[1];
                $total += $note;
                $nb++;
            }
        }
        $moyenne = $total / $nb;
        echo $moyenne."\n";
    }
    else if ($argv[1] == 'moyenne_user') {
        $csv = array();
        while ($line = fgets(STDIN)) {
            $csv[] = $line;
        }
        sort($csv);
        
    }
}//31 adam
?>