#!/usr/bin/php
<?php
    if ($argc == 2) {
        $ismore = strpos($argv[1], '+');
        $isless = strpos($argv[1], '-');
        $ismult = strpos($argv[1], '*');
        $isdiv = strpos($argv[1], '/');
        $ismod = strpos($argv[1], '%');
        
        if ($ismore !== FALSE)
            $ope = '+';
        else if ($isless !== FALSE)
            $ope = '-';
        else if ($ismult !== FALSE)
            $ope = '*';
        else if ($isdiv !== FALSE)
            $ope = '/';
        else if ($ismod !== FALSE)
            $ope = '%';

        if (isset($ope)) {
            $number = explode($ope, $argv[1]);
            $nb1 = trim($number[0]);
            $nb2 = trim($number[1]);
        }
        if (!is_numeric($nb1) || !is_numeric($nb2) || ($ope != '+' && $ope != '-' && $ope != '*' && $ope != '/' && $ope != '%')) {
            echo 'Syntax Error'."\n";
            exit();
        }
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
    else {
        echo 'Incorrect Parameters'."\n";
    }
?>