#!/usr/bin/php
<?php

function enlenver_espace($str)
{
	$str = trim($str);
	$str = preg_replace("/ +/", " ", $str);
	return ($str);
}
if ($argc == 2)
	echo enlenver_espace($argv[1])."\n";

?>
