#!/usr/bin/php
<?php

$arr = array();
foreach ($argv as $elem)
{
	if ($elem != $argv[0])
	{
		$tmp = preg_split("/ +/", trim($elem));
		if ($tmp[0] != "")
			$arr = array_merge($arr, $tmp);
	}
}
sort($arr);
foreach ($arr as $key)
	echo $key."\n";

?>
