<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$config = parse_ini_file('config.ini');
include('auth.php');
if (isset($_POST['user_mail']) && isset($_POST['user_password']))
{
	if (auth($_POST['user_mail'], $_POST['user_password']))
	{
		$_SESSION['access_granted'] = 1;
		if (incrementTraffic($_POST['user_mail']))
			header('Location: /minishop/');
		else
		{
			echo "Traffic incrementation error";
			exit;
		}
	}
	else {
		$_SESSION['access_granted'] = 0;
		header('Location: logpage.php');
	}
}

function incrementTraffic($user_mail)
{
	$bdd = mysqli_connect('localhost', 'minishop', 'toto', 'db_ft_minishop');
	if (mysqli_connect_errno()) {
		printf("Échec de la connexion : %s\n", mysqli_connect_error());
		exit();
	}
	$sql = sprintf('UPDATE `users` SET user_traffic = user_traffic + 1 '
		.'WHERE user_mail = "%s"', $user_mail);
	if (mysqli_query($bdd, $sql))
		return true;
	else
		return false;
}

/*
if (!auth($_POST['login'], $_POST['passwd']))
{
	$_SESSION['loggued_on_user'] = '';
	echo "ERROR\n";
	exit (1);
}
else
{
	$_SESSION['loggued_on_user'] = $_POST['user_mail'];
 */
?>
