<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$config = parse_ini_file('../config.ini');
//set_include_path($config['include_path']);
//include('http://localhost:8080/minishop/includes/modificationTemplate.php?user_id='.$_GET['user_id'].'');
/*
if (isset($_GET['user_id']) && isset($_GET['action']) && $_GET['action'] == 'modification' && isset($_COOKIE['ur_role_id']))
{
	if (isset($_GET['user_id']) && !isset($_POST['submit']))
			getUserInfos($_GET['user_id']);
	if (isset($_POST['submit']) && $_POST['submit'] == "Modification")
	{
		if (modifyUser($_GET['user_id']))
			{
				if ($_COOKIE['ur_role_id'] == 2)
					header('Location: http://localhost:8080/minishop/admin_module/admin_users');
			}
			else {
				header('Location: http://localhost:8080/minishop/user_module/logpage.php');
			}
	}
}

elseif (isset($_SESSION['user_id']) && $_GET['action'] == 'modification' && isset($_COOKIE['ur_role_id']) && $_COOKIE['ur_role_id'] == 1)
{
	if (isset($_POST['submit']) && $_POST['submit'] == "Modification") {
		if (isset($_SESSION['user_id']) && !isset($_POST['submit']))
			getUserInfos($_SESSION['user_id']);
		if (modifyUser($_SESSION['user_id']))
		{
			if ($_COOKIE['ur_role_id'] == 2)
				header('Location: http://localhost:8080/minishop/admin_module/admin_users');
		}
		else {
			header('Location: http://localhost:8080/minishop/user_module/logpage.php');
		}
	}
}
*/
if ($_GET['action'] == "del")
{
	if (delUser($_GET['user_id']))
	{
		if ($_COOKIE['ur_role_id'] == 2)
			header('Location: http://localhost:8080/minishop/admin_module/admin_users.php');
		else
			header('Location: http://localhost:8080/minishop/user_module/logout.php');
	}
}
/*

function getUserInfos($id)
{
	$bdd = mysqli_connect("localhost", "minishop", "toto", "db_ft_minishop");
	if (mysqli_connect_errno()) {
		printf("Échec de la connexion : %s\n", mysqli_connect_error());
		exit();
	}
	$query = sprintf('SELECT *, ur_role_id FROM users LEFT JOIN user_role ON user_id=ur_user_id WHERE user_id = %d', $id);
	$result = mysqli_query($bdd, $query);
	if ($result)
	{
		$user = mysqli_fetch_assoc($result);
		//print_r($user);
		foreach ($user as $key => $value)
		{
			$_SESSION[$key] = $value;
			//setcookie($key, $value, time()+60*60*24*30, "/");
		}
		//print_r($_SESSION);
	}
	mysqli_close($bdd);

}

function modifyUser($id)
{
	$bdd = mysqli_connect("localhost", "minishop", "toto", "db_ft_minishop");
	if (mysqli_connect_errno()) {
		printf("Échec de la connexion : %s\n", mysqli_connect_error());
		exit();
	}
	sanitizePost();
	foreach($_POST as $key => $value)
		$$key = htmlspecialchars($value);
	$salt = getSalt();
	$token = getSalt();
	$active = 1;
	$user_password = hash('whirlpool', $_POST['user_password'].$salt);
	$sql = sprintf('UPDATE `users` SET user_name="%s", user_firstname="%s"'
		.', user_mail="%s", user_password="%s", user_salt="%s"'
		.', user_title="%s", user_activation_token="%s", user_active=%d'
		.', user_address="%s", user_city="%s", user_zipcode="%s"'
		.', user_country="%s", user_tel="%s" WHERE user_id=%d',
		$user_name, $user_firstname, $user_mail, $user_password, $salt,
		$user_title, $token, $active, $user_address, $user_city, $user_zipcode, $user_country, $user_tel, $id);
	if (mysqli_query($bdd, $sql)) {
		return (true);
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($bdd);
	}
	mysqli_close($bdd);
}
*/
function delUser($id)
{
	$bdd = mysqli_connect("localhost", "minishop", "toto", "db_ft_minishop");
	if (mysqli_connect_errno()) {
		printf("Échec de la connexion : %s\n", mysqli_connect_error());
		exit();
	}
	$sql = sprintf('DELETE FROM `users` WHERE user_id=%d', $id);
	if (mysqli_query($bdd, $sql)) {
		return true;
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($bdd);
		exit;
	}
	mysqli_close($bdd);
}
/*
function sanitizePost()
{
	foreach ($_POST as $key => $value)
		$_POST[$key] = htmlspecialchars($value);
}

function getSalt($length = 10) {
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
}
*/
?>
