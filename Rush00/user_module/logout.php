<?php
session_start();
$_SESSION['access_granted'] = '';
setcookie('access_granted', "", time() - 3600, "/");
setcookie('PHPSESSID', "", time() - 3600, "/");
if (isset($_SERVER['HTTP_COOKIE'])) {
	$cookies = explode(';', $_SERVER['HTTP_COOKIE']);
	foreach($cookies as $cookie) {
		$parts = explode('=', $cookie);
		$name = trim($parts[0]);
		setcookie($name, '', time()-1000);
		setcookie($name, '', time()-1000, '/');
	}
}
header("Location: /minishop/index.php");
?>
