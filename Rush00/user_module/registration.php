<?php
session_start();
?>
<!doctype html>
<html lang="fr">
	<head>
		<?php include_once("http://localhost:8080/minishop/includes/header.php"); ?>
    </head>
<body>
	<?php include_once("http://localhost:8080/minishop/includes/nav.php"); 
	
	if ($_COOKIE['access_granted'] == 1)
            header("Location: http://localhost:8080/minishop/shop/accessDenied.php");

	?>
	<form action="create.php" accept-charset="utf-8" method="POST">
		<div>
			<label for="user_title">Civilite :</label>
			<select name="user_title" required>
				<option value="F">Madame</option>
				<option value="M">Monsieur</option>
				<option value="NB">Je ne souhaite pas communiquer sur mon genre</option>
			</select>
		</div>
		<div>
			<label for="user_firstname">Prenom :</label>
			<input type="text" name="user_firstname" value="" required />
		</div>
		<div>
			<label for="user_name">Nom :</label>
			<input type="text" name="user_name" value="" required />
		</div>
		<div>
			<label for="user_mail">Mail :</label>
			<input type="email" name="user_mail" value="" required />
		</div>
		<div>
			<label for="user_password">Mot de passe :</label>
			<input type="password" name="user_password" value="" required />
		</div>
		<div>
			<label for="check_password">Verification du mot de passe :</label>
			<input type="password" name="check_password" value="" required />
		</div>
		<div>
			<label for="user_address">Adresse :</label>
			<input type="text" name="user_address" value="" required />
		</div>
		<div>
			<label for="user_city">Ville :</label>
			<input type="text" name="user_city" value="" required />
		</div>
		<div>
			<label for="user_zipcode">Code postal :</label>
			<input type="text" name="user_zipcode" value="" required />
		</div>
		<div>
			<label for="user_country">Pays :</label>
			<input type="text" name="user_country" value="" required />
		</div>
		<div>
			<label for="user_tel">Numero de telephone :</label>
			<input type="tel" name="user_tel" value="" required />
		</div>
		<div>
			<input name="submit" type="submit" value="Inscription">
		</div>
	</form>
</body>
</html>
