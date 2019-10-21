<?php 
session_start();
$config = parse_ini_file('config.ini');
set_include_path($config['include_path']);
?>
<!doctype html>
<html lang="fr">
	<?php include('header.php'); ?>
<body>
	<?php include('nav.php'); ?>
	<form action="login.php" method="POST">
		<div class="form_input">
			<label for="user_mail">Mail :</label>
			<input type="text" name="user_mail" value="" />
		</div>
		<div class="form_input">
			<label for="user_password">Mot de passe :</label>
			<input type="password" name="user_password" value="" />
		</div>
		<div class="form_input submit_button">
		<input name="submit" type="submit" value="Login">
		</div>
	</form>
	<div>
<h1>Index</h1>
		<a href="registration.php" title="Creer son compte">Creer son compte</a>
		<a href="modif.html" title="Reinitialiser mon mot de passe">Modifier mon mot de passe</a>
	</div>
</body>
</html>
