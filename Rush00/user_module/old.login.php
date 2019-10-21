<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//include_once('http://localhost:8080/minishop/user_module/auth.php');

if (isset($_POST['user_mail']) && isset($_POST['user_password']))
{
	if (auth($_POST['user_mail'], $_POST['user_password']))
	{
		$_SESSION['access_granted'] = "ok";
		if (incrementTraffic($_POST['user_mail']))
			header('Location: /minishop/');
		else
		{
			echo "Traffic incrementation error";
			exit;
		}
	}
	else {
		$_SESSION['access_granted'] = "refused";
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

function auth($user_mail, $user_password)
{
	$bdd = mysqli_connect("localhost", "minishop", "toto", "db_ft_minishop");
	if (mysqli_connect_errno()) {
    printf("Échec de la connexion : %s\n", mysqli_connect_error());
    exit();
	}
	$salt_query = sprintf("SELECT user_id, user_salt, user_password FROM users WHERE user_mail = '%s'", $user_mail);
	if ($result = mysqli_query($bdd, $salt_query))
	{
		$row = mysqli_fetch_assoc($result);
		$pass = hash('whirlpool', $user_password.$row['user_salt']);
		if ($pass == $row['user_password'])
		{
			$_SESSION['user_id'] = $row['user_id'];
			setSession();
			return true;
		}
		else
			return false;
	}
}

function setSession()
{
	$bdd = mysqli_connect("localhost", "minishop", "toto", "db_ft_minishop");
	if (mysqli_connect_errno()) {
    printf("Échec de la connexion : %s\n", mysqli_connect_error());
    exit();
	}
	$query = sprintf("SELECT user_id, user_mail, user_name, user_firstname, user_traffic, ur_role_id FROM users LEFT JOIN user_role ON ur_user_id = user_id WHERE user_id = %d", $_SESSION['user_id']);
	echo $query;
	if ($result = mysqli_query($bdd, $query)) {
		if (mysqli_num_rows($result)) {
			$row = mysqli_fetch_assoc($result);
			$_SESSION['user_name'] = $row['user_name'];
			$_SESSION['user_firstname'] = $row['user_firstname'];
			$_SESSION['user_name'] = $row['user_name'];
			$_SESSION['user_traffic'] = $row['user_traffic'];
			$_SESSION['user_role_id'] = $row['ur_role_id'];
			$_SESSION['user_mail'] = $row['user_mail'];
			$_SESSION['user_traffic'] = $row['user_traffic'];
			setcookie('access_granted', true, time()+60*60*24*30, "/");
			setcookie('user_role_id', $row['ur_role_id'], time()+60*60*24*30, "/");
		}
	}
	else {
		echo "connexion error";
	}
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
