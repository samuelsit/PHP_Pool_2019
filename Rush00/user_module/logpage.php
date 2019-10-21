<?php 
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!doctype html>
<html lang="fr">
	<head>
	<?php include('http://localhost:8080/minishop/includes/header.php'); ?>
	</head>
<body>
	<?php include('http://localhost:8080/minishop/includes/nav.php'); 
	if (isset($_SESSION['access_granted']) && $_SESSION['access_granted'] == 1)
	{
		echo "<p class='alert'>Vous &ecirc;tes d&eacute;j&agrave; connecte</p>";
	}
	else {
	?>
	<form action="http://localhost:8080/minishop/user_module/login.php" method="POST">
		<div class="form_input">
			<label for="user_mail">Mail :</label>
			<input type="text" name="user_mail" value="<?php if (isset($_SESSION['user_mail'])) { echo $_SESSION['user_mail']; } ?>" />
		</div>
		<div class="form_input">
			<label for="user_password">Mot de passe :</label>
			<input type="password" name="user_password" value="" />
		</div>
		<div class="form_input submit_button">
		<input id="log" name="submit" type="submit" value="Login">
		</div>
	</form>
<?php if (isset($_SESSION['access_granted']) && $_SESSION['access_granted'] == 0)
	{
	?>
	<div class="refused">
		<p class="alert">L'identifiant et/ou le mot de passe fourni est erron&eacute;.</p>
	</div>
<?php
	}
?>
	<div>
		<a href="registration.php" title="Creer son compte">Creer son compte</a>
<?php
	}
	if (isset($_SESSION['access_granted']) && $_SESSION['access_granted'] == 1)
	{
		
?>		
		<a href="http://localhost:8080/minishop/shop/admin.php?user_id=<?php echo $_SESSION['user_id']; ?>" class="sep">Mes commandes</a>
		<a href="http://localhost:8080/minishop/includes/modificationTemplate.php?user_id=<?php echo $_SESSION['user_id']; ?>" title="Modifier mon compte">Modifier mon compte</a>
		<a class="del" href="http://localhost:8080/minishop/user_module/modif.php?action=del&user_id=<?php echo $_SESSION['user_id']; ?>" title="Supprimer mon compte">Supprimer mon compte</a>
		<a href="http://localhost:8080/minishop/user_module/logout.php" title="Se d&eacute;connecter">Se d&eacute;connecter</a>
<?php } ?>
	</div>
</body>
</html>
