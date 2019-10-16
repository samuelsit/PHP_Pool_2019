#!/usr/bin/php
<?php

if (count($argv) > 1)
{
	$str = $argv[1];
	$str = preg_replace('/\s+/', ' ', $str);
	$str = trim($str);
	echo $str . "\n";
}

?>
