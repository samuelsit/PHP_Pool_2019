<?php
session_start();
include_once("ft_cart.php");

supprimePanier();

header('Location: panier.php');

?>