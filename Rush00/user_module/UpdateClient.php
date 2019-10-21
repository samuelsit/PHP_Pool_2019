<?php

$id = isset($_GET['user_id']) ? $_GET['user_id'] : NULL;
//echo $_REQUEST['user_id'];
$user_name = isset($_POST['user_name']) ? $_POST['user_name'] : NULL;
$user_title = isset($_POST['user_title']) ? $_POST['user_title'] : NULL;
$user_firstname = isset($_POST['user_firstname']) ? $_POST['user_firstname'] : NULL;
$user_mail = isset($_POST['user_mail']) ? $_POST['user_mail'] : NULL;
$user_password = isset($_POST['user_password']) ? $_POST['user_password'] : NULL;
$user_address = isset($_POST['user_address']) ? $_POST['user_address'] : NULL;
$user_city = isset($_POST['user_city']) ? $_POST['user_city'] : NULL;
$user_zipcode = isset($_POST['user_zipcode']) ? $_POST['user_zipcode'] : NULL;
$user_country = isset($_POST['user_country']) ? $_POST['user_country'] : NULL;
$user_tel = isset($_POST['user_tel']) ? $_POST['user_tel'] : NULL;

modifyUser($id, $user_name, $user_firstname, $user_mail, $user_password, $user_title, $user_address, $user_city, $user_zipcode, $user_country, $user_tel);

function modifyUser($id, $user_name, $user_firstname, $user_mail, $user_password, $user_title, $user_address, $user_city, $user_zipcode, $user_country, $user_tel)
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

header('Location: http://localhost:8080/minishop/includes/modificationTemplate.php?user_id='.$id.'');

?>