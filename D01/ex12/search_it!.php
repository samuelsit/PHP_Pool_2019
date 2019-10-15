#!/usr/bin/php
<?php
    $key = $argv[1];
    foreach ($argv as $arg) {
        if ($arg != $argv[0] && $arg != $argv[1]) {
            $couple = explode(':', $arg);
            if ($couple[0] == $key) {
                echo $couple[1]."\n";
                exit();
            }
            else
                continue;
        }
    }
?>