<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
?>
<!doctype html>
<html lang="fr">
	<head>
		<?php include_once("http://localhost:8080/minishop/includes/header.php"); ?>
	</head>
<body>
		<?php include_once("http://localhost:8080/minishop/includes/nav.php"); ?>
	<div id="user_table">
		<table>
<table>
	<thead>
		<tr>
			<th>ID</th>
			<th>Nom</th>
			<th>Pr&eacute;nom</th>
			<th>Mail</th>
			<th>Nombre de connexions</th>
			<th>Nombre de commandes</th>
			<th>Taux de conversions</th>
			<th>&Eacute;diter</th>
			<th>Supprimer</th>
		</tr>
	</thead>
	<tbody>
<?php


	$bdd = mysqli_connect('localhost', 'minishop', 'toto', 'db_ft_minishop');
	if (mysqli_connect_errno()) {
		printf("Echec de la connexion : %s\n", mysqli_connect_errno());
		exit();
	}
	$query = sprintf("select user_id, user_name, user_firstname, user_traffic, user_mail, user_orders, round((user_orders/user_traffic*100),2) as user_conversion from users left join (select ord_user, count(ord_id) as user_orders from orders group by ord_user) as temp on user_id=ord_user order by user_name");
	$result = mysqli_query($bdd, $query);
	if ($result)
	{
			while ($user = mysqli_fetch_assoc($result))
			{
?>
		<tr>
			<th><?php echo $user['user_id']; ?></th>
			<td><?php echo $user['user_name']; ?></td>
			<td><?php echo $user['user_firstname']; ?></td>
			<td><?php echo $user['user_mail']; ?></td>
			<td><?php echo $user['user_traffic']; ?></td>
			<td><?php echo $user['user_orders']; ?></td>
			<td><?php echo $user['user_conversion']; ?></td>
			<td><a href="http://localhost:8080/minishop/user_module/modif.php?action=modification&user_id=<?php echo $user['user_id']; ?>"><img class="manage_button" src="http://localhost:8080/minishop/ressources/img/edit_icon_small.png" alt="edit icon" /></a></td>
			<td><a class="del" href="http://localhost:8080/minishop/user_module/modif.php?action=del&user_id=<?php echo $user['user_id']; ?>"><img class="manage_button" src="http://localhost:8080/minishop/ressources/img/del_icon_small.jpg" alt="edit icon" /></a></td>
		</tr>

<?php
			}
	} else {
		echo "no users";
		exit;
	}
?>
</tbody>
</table>
</div>
</html>
<?php

function getUsers()
{
	$bdd = mysqli_connect('localhost', 'minishop', 'toto', 'db_ft_minishop');
	if (mysqli_connect_errno()) {
		printf("Echec de la connexion : %s\n", mysqli_connect_errno());
		exit();
	}
	$query = sprintf("select user_id from user");
	if ($result = mysqli_query($bdd, $query))
	{
		if (mysqli_num_rows($result))
		{
			return $result;
		}
	}
	else {
		echo "no users";
		exit;
	}
}

?>
