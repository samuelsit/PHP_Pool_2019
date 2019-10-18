<?php
session_start();
$titre = "formulaire";
if (isset($_GET['login']) && isset($_GET['passwd']) && isset($_GET['submit']) && $_GET['submit'] == "OK")
{
	$_SESSION['login'] = $_GET['login'];
	$_SESSION['passwd'] = $_GET['passwd'];
}
?>

<html>
	<head>
	<style>
		input[type=submit] {
			width: 65.2vw;
			height: 4vw;
			border: none;
			font-size: 3vw;
			font-weight: bold;
			border-bottom: double grey;
		}
		input[type=password] {
			width: 46.7vw;
			height: 4vw;
			font-size: 3vw;
			text-align: center;
			margin-bottom: 1%;
			font-weight: bold;
		}
		input[type=text] {
			width: 50vw;
			height: 4vw;
			font-size: 3vw;
			text-align: center;
			margin-bottom: 1%;
			font-weight: bold;
		}
		body
		{
			font-weight: bold;
			font-size: 3vw;
			margin-top: 8%;
			margin-left: 15%;
			background-color:lightgrey;
		}
		</style>
	</head>
	<body>
		<form method="GET" action="index.php">
			Identifiant: <input name="login" type="text" value="<?php if (isset($_SESSION['login'])) echo $_SESSION['login']; ?>" />
			<br />
			Mot de Passe: <input type="password" name="passwd" value="<?php if (isset($_SESSION['passwd'])) echo $_SESSION['passwd']; ?>" />
			<br />
			<input type="submit" name="submit" value="OK" />
			<br />
		</form>
	</body>
</html>
