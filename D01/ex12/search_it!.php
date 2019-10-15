#!/usr/bin/php
<?php
    $key = $argv[1];
    foreach ($argv as $arg) {
        if ($arg != $argv[0] && $arg != $argv[1]) {
            $couple = explode(':', $arg);
            if ($couple[0] == $key) {
                $search = $couple[1];
            }
            else
                continue;
        }
    }
    if (isset($search)) {
        echo $search."\n";
    }
?>