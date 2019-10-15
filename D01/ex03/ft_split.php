#!/usr/bin/php
<?php

function ft_split($str)
{
	$arr = explode(" ", $str);
	sort($arr);
	$res = array();
	foreach($arr as $key)
	{
		if (($key != ""))
			$res[] = $key;
	}
	unset($arr);
	return ($res);
}

?>
