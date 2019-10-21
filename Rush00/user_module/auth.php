<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//$config = parse_ini_file('config.ini');


function auth($user_mail, $user_password)
{
	$bdd = mysqli_connect("localhost", "minishop", "toto", "db_ft_minishop");
	$salt_query = sprintf("SELECT user_id, user_salt, user_password FROM users WHERE user_mail = '%s'", $user_mail);
	if ($result = mysqli_query($bdd, $salt_query))
	{
		$row = mysqli_fetch_assoc($result);
		$pass = hash('whirlpool', $user_password.$row['user_salt']);
		if ($pass == $row['user_password'])
		{
			$_SESSION['user_id'] = $row['user_id'];
			$_SESSION['access_granted'] = 1;
			setSession($row['user_id']);
			return true;
		}
		else
			return false;
	}
}

function setSession($id)
{
	$bdd = mysqli_connect("localhost", "minishop", "toto", "db_ft_minishop");
	$query = sprintf("SELECT user_id, user_mail, user_name, user_firstname, user_traffic, ur_role_id FROM users LEFT JOIN user_role ON ur_user_id = user_id WHERE user_id = %d", $id);
	echo $query;
	if ($result = mysqli_query($bdd, $query)) {
		if (mysqli_num_rows($result)) {
			$row = mysqli_fetch_assoc($result);
			print_r($row);
			$_SESSION['user_name'] = $row['user_name'];
			$_SESSION['user_firstname'] = $row['user_firstname'];
			$_SESSION['user_name'] = $row['user_name'];
			$_SESSION['user_traffic'] = $row['user_traffic'];
			$_SESSION['user_role_id'] = $row['ur_role_id'];
			$_SESSION['user_mail'] = $row['user_mail'];
			setcookie('access_granted', true, time()+60*60*24*30, "/");
			setcookie('ur_role_id', $row['ur_role_id'], time()+60*60*24*30, "/");
		}
	}
	else {
		echo "connexion error";
	}
}

?>
