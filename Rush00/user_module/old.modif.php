<?php
//session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$config = parse_ini_file('../config.ini');
//set_include_path($config['include_path']);
include('http://localhost:8080/minishop/includes/modificationTemplate.php');
if (isset($_GET['user_id']) && isset($_SESSION['user_id']) && (
	$_GET['user_id'] == $_SESSION['user_id'])) {
	$_SESSION['action'] = $_GET['action'];
	$_SESSION['mod_auth'] = 1;
}
else {
	$_SESSION['mod_auth'] = 1;
}

if (isset($_POST['submit']) && $_SESSION['mod_auth'] == 1)
{
	if ($_SESSION['action'] == "modification")
		modifyUser();
}
elseif (isset($_SESSION['action']) && $_SESSION['action'] == "del")
{
	if (delUser())
		header('Location: logout.php');
}

function getUserInfos()
{

}

function modifyUser()
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
		$user_title, $token, $active, $user_address, $user_city, $user_zipcode, $user_country, $user_tel, $_SESSION['user_id']);
	echo $sql;
	if (mysqli_query($bdd, $sql)) {
		header('Location: logpage.php');
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($bdd);
	}
	mysqli_close($bdd);
}

function delUser()
{
	$bdd = mysqli_connect("localhost", "minishop", "toto", "db_ft_minishop");
	if (mysqli_connect_errno()) {
		printf("Échec de la connexion : %s\n", mysqli_connect_error());
		exit();
	}
	sanitizePost();
	$sql = sprintf('DELETE FROM `users` WHERE user_id=%d', $_SESSION['user_id']);
	if (mysqli_query($bdd, $sql)) {
		return true;
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($bdd);
		exit;
	}
	mysqli_close($bdd);
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

?>
