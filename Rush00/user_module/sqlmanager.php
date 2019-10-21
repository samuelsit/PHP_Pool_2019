<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



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
}

function mysqliConnect()
{
	$bdd = mysqli_connect('localhost', 'minishop', 'toto', 'db_ft_minishop');
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

?>
