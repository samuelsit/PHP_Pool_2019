#!/usr/bin/php
<?php

$finger = shell_exec('finger -l');

preg_match_all('/Login: ([\w]+)/', $finger, $who);
preg_match_all('/\) on ([\w]+)/', $finger, $where);
preg_match_all('/On since [a-zA-Z]+ ([a-zA-Z0-9_ :]*) \(/', $finger, $when);

$i = 0;

foreach ($who[1] as $login) {
    while ($where[1][$i] && $when[1][$i]) {
        echo $login."  ".$where[1][$i]."  ".$when[1][$i]."\n";
        $i++;
    }
}
?>