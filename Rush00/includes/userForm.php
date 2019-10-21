<?php 
$bdd = mysqli_connect("localhost", "minishop", "toto", "db_ft_minishop");
$user_fetch = mysqli_query($bdd, "SELECT * FROM users WHERE user_id = ".$_GET['user_id']."");
$user = mysqli_fetch_assoc($user_fetch);
if ($user['user_title'] == 'M')
	$title= "Monsieur";
else
	$title = "Madame";
?>
				<div>
						<label for="user_title">Civilite :</label>
						<select id="user_title" name="user_title" required>
								<?php //echo '<option value="'.$user['user_title'].'">'.$title.'</option>'; ?>
								<option value="F">Madame</option>
								<option value="M">Monsieur</option>
								<option value="NB">Je ne souhaite pas communiquer sur mon genre</option>
						</select>
				</div>
				<div>
						<label for="user_firstname">Prenom :</label>
						<input id="user_firstname" type="text" name="user_firstname" value="<?php echo $user['user_firstname']; ?>" required />
				</div>
				<div>
						<label for="user_name">Nom :</label>
						<input id="user_name" type="text" name="user_name" value="<?php echo $user['user_name']; ?>" required />
				</div>
				<div>
						<label for="user_mail">Mail :</label>
						<input id="user_mail" type="email" name="user_mail" value="<?php echo $user['user_mail']; ?>" required />
				</div>
				<div>
						<label for="user_password">Mot de passe :</label>
						<input id="user_password" type="password" name="user_password" value="" required />
				</div>
				<div>
						<label for="user_address">Adresse :</label>
						<input id="user_address" type="text" name="user_address" value="<?php echo $user['user_address']; ?>" required />
				</div>
				<div>
						<label for="user_city">Ville :</label>
						<input id="user_city" type="text" name="user_city" value="<?php echo $user['user_city']; ?>" required />
				</div>
				<div>
						<label for="user_zipcode">Code postal :</label>
						<input id="user_zipcode" type="text" name="user_zipcode" value="<?php echo $user['user_zipcode']; ?>" required />
				</div>
				<div>
						<label for="user_country">Pays :</label>
						<input id="user_country" type="text" name="user_country" value="<?php echo $user['user_country']; ?>" required />
				</div>
				<div>
						<label for="user_tel">Numero de telephone :</label>
						<input id="user_tel" type="tel" name="user_tel" value="<?php echo $user['user_tel']; ?>" required />
				</div>
<!--<script>
var els = [
	'user_firstname',
	'user_name',
	'user_mail',
	'user_address',
	'user_city',
	'user_zipcode',
	'user_country',
	'user_tel'
	];

for (var i = 0; i < els.length; i++) {
	document.getElementById(els[i]).value = getCookie(els[i]).replace(/\+/g, " ");
}

tit = getCookie('user_title');
if (tit == "F")
	tit = 0;
else if (tit == "M")
	tit = 1;
else
	tit = 2;
document.getElementById('user_title').selectedIndex = tit;

</script>
-->