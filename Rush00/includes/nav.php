<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/*if ((isset($_COOKIE['access_granted']) && $_COOKIE['access_granted'] == 1) || (isset($_SESSION['access_granted']) && $_SESSION['access_granted'] == 1)) {
	$auth = 1;	
	include('http://localhost:8080/minishop/includes/authenticated.php');
}
else
	$auth = 0;
*/
//echo __DIR__;

?>
<div id="nav-container">
	<nav>
	<ul>
		<li><a href="http://localhost:8080/minishop/index.php" class="sep">Accueil</a><span class="sep"> |</span></li>
		<li class="dropdown"><a href="http://localhost:8080/minishop/shop/allProd.php" class="sep">Categories</a><span class="sep"> | </span>
			<ul>
				<li><a href="http://localhost:8080/minishop/shop/video.php" class="sep">Video-Surveillance</a></li>
				<li><a href="http://localhost:8080/minishop/shop/alarme.php" class="sep">Alarme</a></li>
				<li><a href="http://localhost:8080/minishop/shop/controle.php" class="sep">Contrôle d'accès</a></li>
			</ul>
		</li>
		<li class="dropdown">Services<span class="sep"> | </span>
			<ul>
				<li><a href="http://localhost:8080/minishop/shop/service_1.php" class="sep">Qualité</a></li>
				<li><a href="http://localhost:8080/minishop/shop/service_2.php" class="sep">Accompagnement</a></li>
			</ul>
		</li>
		<li class="dropdown"><a href="http://localhost:8080/minishop/user_module/logpage.php" class="sep">Mon compte</a><span class="sep"> | </span>
		<li><a href="http://localhost:8080/minishop/shop/panier.php" class="sep">Panier</a></li>
		<li><a href="http://localhost:8080/minishop/shop/panier.php" style="padding: 1%;border: 3px solid #08a8ad; border-radius: 50%;" class="sep"><span id="nbarti"></span></a></li>
	</ul>
	</nav>
</div>
<script>
if(document.cookie.indexOf('nbArt=')!=-1){
	document.getElementById('nbarti').innerText = getCookie('nbArt');
}else{
	document.getElementById('nbarti').innerText = 0;
}
</script>