<?php

$file = file_get_contents('list.csv');
$line = explode("\n", $file);
echo json_encode($line);

?>