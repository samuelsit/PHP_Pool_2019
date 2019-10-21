<?php
session_start();
date_default_timezone_set('Europe/Paris');

if (file_exists('../private/chat'))
	getMsg();

function getMsg()
{
	$lock = flock('../private/chat');
	$msgs = unserialize(file_get_contents('../private/chat'));
	foreach ($msgs as $key => $msg)
	{
		$time = date('H:i', $msg['time']);
		echo "[$time] <b>{$msg['login']}</b>: {$msg['msg']}<br />";
	}
}
