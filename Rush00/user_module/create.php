<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define('MANDATORY', array (
	'user_name',
	'user_firstname',
	'user_mail',
	'user_password',
	'user_title',
	'user_address',
	'user_city',
	'user_zipcode',
	'user_country',
	'user_tel'
));

handleErrors();
addUser();


function error($msg = NULL)
{
	if ($msg)
		echo $msg;
	//header('Location: index.html');
}

function addUser()
{
	$bdd = mysqli_connect("localhost", "minishop", "toto", "db_ft_minishop");
	if (mysqli_connect_errno()) {
		printf("Échec de la connexion : %s\n", mysqli_connect_error());
		exit();
	}
	sanitizePost();
	if (!exists($_POST['user_mail'], $bdd))
	{
		foreach($_POST as $key => $value)
			$$key = htmlspecialchars($value);
		$salt = getSalt();
		$token = getSalt();
		$active = 0;
		$user_password = hash('whirlpool', $_POST['user_password'].$salt);
		$sql = sprintf('INSERT INTO `users` (user_name, user_firstname, user_mail, '
			.'user_password, user_salt, user_title, user_activation_token, '
			.'user_active, user_address, user_city, user_zipcode, user_country, user_tel)'
		   .' VALUES ("%s", "%s", "%s", "%s", "%s", "%s", "%s", %d, "%s", "%s", "%s", "%s", "%s")',
			$user_name, $user_firstname, $user_mail, $user_password, $salt,
			$user_title, $token, $active, $user_address, $user_city, $user_zipcode, $user_country, $user_tel);
		if (mysqli_query($bdd, $sql)) {
			if (setUserStatus($bdd, $user_mail, 1))
				header('Location: logpage.php');
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($bdd);
		}
		mysqli_close($bdd);
	}
	else
		userExists();
}

function setUserStatus($bdd, $user_mail, $role)
{
	$query = sprintf('SELECT user_id FROM users WHERE user_mail = "%s"', $user_mail);
	if ($result = mysqli_query($bdd, $query))
	{
		if (mysqli_num_rows($result))
		{
			$row = mysqli_fetch_assoc($result);
			$_SESSION['user_id'] = $row['user_id'];
			$_SESSION['user_mail'] = $user_mail;
		}
	}
	else {
		echo "connection error";
	}
	$sql = sprintf("INSERT INTO user_role (ur_user_id, ur_role_id) VALUES (%d, %d)", $_SESSION['user_id'], $role);
	if (mysqli_query($bdd, $sql)) {
		return true;
	}
	else {
		error("Unable to add role to user");
		return false;
	}
}

function userExists() {
	echo "Ther is already an account for {$_SESSION['user_mail']}. You can login or reset your password if you have lost it\n";
}

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
	echo $randomString;
	return $randomString;
}

function handleErrors()
{
	if ($_POST['submit'] !== "Inscription")
		error();
	if (!issetKeys($_POST, MANDATORY))
		error();
}

function issetKeys($array, $keys) {
	foreach ($keys as $i => $key) {
		if (!array_key_exists($key, $array))
			return false;
	}
	return true;
}

function mysqliQuery($bdd, $query)
{
	$res = mysqli_query($bdd, $query);
	$row = mysqli_fetch_assoc($res);
	print_r($row);
}


function mysqliConnect()
{
	$bdd = mysqli_connect("localhost", "monishop", "toto", "db_ft_minishop");
	if (mysqli_connect_errno()) {
    printf("Échec de la connexion : %s\n", mysqli_connect_error());
    exit();
	}
	return $bdd;
}

function exists($user_mail, $bdd)
{
	$query = sprintf('SELECT user_mail FROM `users` WHERE user_mail = "%s"', $user_mail);
	if ($result = mysqli_query($bdd, $query))
	{
		if (mysqli_num_rows($result))
		{
			$row = mysqli_fetch_assoc($result);
			$_SESSION['user_mail'] = $row['user_mail'];
			return true;
		}
		return false;
	}
	else {
		echo "connection error";
	}
}

?>
