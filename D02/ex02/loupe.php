#!/usr/bin/php
<?php
	if (!$argv[1] || $argc != 2)
		exit ;
	$page = file_get_contents($argv[1]);
	$page = preg_replace_callback("/(<a )(.*?)(>)(.*)(<\/a>)/s",
		function($matches) {
			
			$matches[0] = preg_replace_callback("/( title=\")(.*?)(\")/",
			function($matches) {
            	return ($matches[1].strtoupper($matches[2]).$matches[3]);
			}, $matches[0]);
			
			$matches[0] = preg_replace_callback("/(>)(.*?)(<)/s",	
			function($matches) {
            	return ($matches[1].strtoupper($matches[2]).$matches[3]);
			}, $matches[0]);
			
			return ($matches[0]);
		
		}, $page);
	echo $page;
?>