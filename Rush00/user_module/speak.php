<?php
session_start();
date_default_timezone_set('Europe/Paris');
if (!isset($_SESSION['loggued_on_user']) || $_SESSION['loggued_on_user'] === '')
	err();

if ($_POST['msg'] !== '' && $_POST['submit'] === 'OK')
{
	storeMsg($_POST['msg']);
	header('Location: speak.php');
}

function err($err = "ERROR\n")
{
	echo $err;
	exit();
}

function storeMsg($txt)
{
	$msg['login'] = $_SESSION['loggued_on_user'];
	$msg['time'] = time();
	$msg['msg'] = $txt;
	$append = true;
	if (!file_exists('../private'))
		mkdir('../private');
	if (!file_exists('../private/chat'))
	{
		$append = false;
		file_put_contents('../private/chat');
	}
	$lock = flock('../private/chat', LOCK_EX);
	if (!lock)
		err();
	if ($append)
	{
		$msgs = unserialize(file_get_contents('../private/chat'));
		$msgs[] = $msg;
	}
	else
		$msgs[] = $msg;
	file_put_contents('../private/chat', serialize($msgs));
	flock($lock, LOCK_UN);
}
?>

<head>
<script langage="javascript">top.frames['chat'].location = 'chat.php';</script>
</head>
<form action="speak.php" method="POST">
<input type="text" name="msg" value="">
<input name="submit" type="submit" value="OK">
</form>


