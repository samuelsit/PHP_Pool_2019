<?php

if ($_GET && $_GET['action'] == 'set')
	setcookie($_GET['name'], $_GET['value'], time() + 24*60*60);

elseif ($_GET && $_GET['action'] == 'get' && $_COOKIE[$_GET['name']])
	echo $_COOKIE[$_GET['name']] . "\n";

elseif ($_GET['action'] && $_GET['name'] && $_GET['action'] == 'del')
	setcookie($_GET['name']);
?>
