<?php
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

//handleErrors();
//addUser();

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
			$$key = $value;
		$salt = getSalt();
		$token = getSalt();
		$active = 0;
		$user_password = hash('whirlpool', $_POST['user_password'].$salt);
		$sql = sprintf("INSERT INTO `users` (user_name, user_firstname, user_mail, "
			."user_password, user_salt, user_title, user_activation_token, "
			."user_active, user_address, user_city, user_zipcode, user_country, user_tel)"
		   ." VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', %d, '%s', '%s', '%s', '%s', '%s')",
			$user_name, $user_firstname, $user_mail, $user_password, $salt,
			$user_title, $token, $active, $user_address, $user_city, $user_zipcode, $user_country, $user_tel);
		if (mysqli_query($bdd, $sql)) {
			header('Location: index.html');
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($bdd);
		}
		mysqli_close($bdd);
	}
	else
		userExists();
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
	$bdd = mysqli_connect("localhost", "minishop", "toto", "db_ft_minishop");
	if (mysqli_connect_errno()) {
    printf("Échec de la connexion : %s\n", mysqli_connect_error());
    exit();
	}
	return $bdd;
}

function exists($user_mail, $bdd)
{
	$query = sprintf("SELECT user_mail FROM `users` WHERE user_mail = '%s'", $user_mail);
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

function addCartLine($ctl_id, $ctl_user, $ctl_art, $ctl_art_qte, $ctl_art_pa)
{
	$bdd = mysqli_connect("localhost", "minishop", "toto", "db_ft_minishop");
	if (mysqli_connect_errno()) {
		printf("Échec de la connexion : %s\n", mysqli_connect_error());
		exit();
	}
	$sql = sprintf("INSERT INTO `cart_ligne` (ctl_id, ctl_user, "
			."ctl_art, ctl_art_qte, ctl_art_pa) VALUES ('%d', '%d', '%d', '%d', '%d')",
			$ctl_id, $ctl_user, $ctl_art, $ctl_art_qte, $ctl_art_pa);
	if (!mysqli_query($bdd, $sql)) {
		echo "Error: " . $sql . "<br>" . mysqli_error($bdd);
	}
	mysqli_close($bdd);
	return true;
}

function addOrder($ord_mnt, $ord_user, $ord_cart)
{
	$bdd = mysqli_connect("localhost", "minishop", "toto", "db_ft_minishop");
	if (mysqli_connect_errno()) {
		printf("Échec de la connexion : %s\n", mysqli_connect_error());
		exit();
	}
	$sql = sprintf("INSERT INTO `orders` (ord_date, "
			."ord_mnt, ord_user, ord_cart) VALUES ('%s', '%d', '%d', '%d')",
			date('d/m/Y'), $ord_mnt, $ord_user, $ord_cart);
	if (!mysqli_query($bdd, $sql)) {
		echo "Error: " . $sql . "<br>" . mysqli_error($bdd);
	}
	mysqli_close($bdd);
	return true;
}

function UpdateProduct($nom, $prix, $ref, $desc, $art_id, $qte)
{
	$bdd = mysqli_connect("localhost", "minishop", "toto", "db_ft_minishop");
	if (mysqli_connect_errno()) {
		printf("Échec de la connexion : %s\n", mysqli_connect_error());
		exit();
	}
	$sql = sprintf("UPDATE articles SET art_nom = '%s', art_pa = '%d', art_ref = '%s', art_desc = '%s', art_quantity = '%d' WHERE art_id = '%d'", $nom, $prix, $ref, $desc, $qte, $art_id);
	if (!mysqli_query($bdd, $sql)) {
		echo "Error: " . $sql . "<br>" . mysqli_error($bdd);
	}
	mysqli_close($bdd);
	return true;
}
?>
