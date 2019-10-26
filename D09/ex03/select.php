<?php

$file = file_get_contents('list.csv');
$line = explode("\n", $file);
return ($line);

?>