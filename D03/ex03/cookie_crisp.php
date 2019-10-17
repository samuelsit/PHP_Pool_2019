<?php

if (isset($_GET['action']) && isset($_GET['name']) && isset($_GET['value']) && $_GET['action'] == 'set')
	setcookie($_GET['name'], $_GET['value'], time() + 365*24*60*60);

elseif (isset($_GET['action']) && isset($_GET['name']) && $_GET['action'] == 'get' && isset($_COOKIE[$_GET['name']]))
	echo $_COOKIE[$_GET['name']] . "\n";

elseif (isset($_GET['action']) && isset($_GET['name']) && $_GET['action'] == 'del')
	setcookie($_GET['name']);
?>
