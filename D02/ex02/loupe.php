#!/usr/bin/php
<?php

if (!$argv[1] || $argc != 2)
	exit ;

$file = file($argv[1]);
$str = implode($file);

$res = preg_replace_callback(
	"/=\".*\"/",
	function ($search) {
		return strtoupper($search[0]);
	},
	$str
);

$res = preg_replace_callback(
	"/\">.*</",
	function ($search) {
		return strtoupper($search[0]);
	},
	$res
);

$res = preg_replace_callback(
	"/(http[s]?:\/\/www.[\w]+.[\w]+>)([\s\w\s]*<)/",
	function ($search) {
		return $search[1].strtoupper($search[2]);
	},
	$res
);

echo $res;
?>
