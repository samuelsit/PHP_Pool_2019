#!/usr/bin/php
<?php
    if ($argc == 4) {
        $nb1 = trim($argv[1]);
        $ope = trim($argv[2]);
        $nb2 = trim($argv[3]);
        if (!is_numeric($nb1) || !is_numeric($nb2))
            echo 'Incorrect Parameters'."\n";
        else {
            if ($ope == '+')
                $res = $nb1 + $nb2;
            if ($ope == '-')
                $res = $nb1 - $nb2;
            if ($ope == '/')
                $res = $nb1 / $nb2;
            if ($ope == '*')
                $res = $nb1 * $nb2;
            if ($ope == '%')
                $res = $nb1 % $nb2;
            echo $res."\n";
        }
    }
    else {
        echo 'Incorrect Parameters'."\n";
    }
?>