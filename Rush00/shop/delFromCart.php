<?php
session_start();
include_once("ft_cart.php");

$art_id = isset($_GET['art_id']) ? $_GET['art_id'] : NULL;
$qte = isset($_GET['qte']) ? $_GET['qte'] : NULL;

supprimerArticle($art_id);
setcookie("nbArt", $_COOKIE['nbArt'] - $qte, time()+3600*24, "/");

header('Location: panier.php');

?>