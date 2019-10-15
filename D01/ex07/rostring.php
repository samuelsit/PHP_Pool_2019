#!/usr/bin/php
<?php

if ($argc == 0)
	exit;
else {
	$argv[1] = trim($argv[1]);
	$argv[1] = preg_replace("/ +/", " ", $argv[1]);
	$tab = explode(" ", $argv[1]);
	foreach ($tab as $key) {
		if ($key != $tab[0]) {
			echo $key." ";
		}
	}
	echo $tab[0]."\n";
}
?>
