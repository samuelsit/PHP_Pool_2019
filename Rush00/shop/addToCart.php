<?php
session_start();
include_once("ft_cart.php");

$art_id = isset($_GET['art_id']) ? $_GET['art_id'] : NULL;
$art_name = isset($_GET['art_nom']) ? $_GET['art_nom'] : NULL;
$art_pa = isset($_GET['art_pa']) ? $_GET['art_pa'] : NULL;
$art_photo = isset($_GET['art_photo']) ? $_GET['art_photo'] : NULL;

ajouterArticle($art_id, 1, $art_pa, $art_photo, $art_name);
if (isset($_COOKIE['nbArt'])) {
    $nb = $_COOKIE['nbArt'];
    $nb++;
    setcookie("nbArt", $nb, time()+3600*24, "/");
}
else
    setcookie("nbArt", 1, time()+3600*24, "/");

header("Location: ".$_SERVER['HTTP_REFERER']);
?>