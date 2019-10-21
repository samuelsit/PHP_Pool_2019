<?php
session_start();
include_once("ft_cart.php");
include_once("create.php");

if ($_SESSION['access_granted'] == 1) {
    $bdd = mysqliConnect();
    $last_id = mysqli_query($bdd, "SELECT MAX(ctl_id) AS max_id FROM cart_ligne");
    $max = mysqli_fetch_assoc($last_id);
    if (empty($max['max_id']))
        $ctl_id = 1;
    else
        $ctl_id = $max['max_id'] + 1;
    $ctl_user = $_SESSION['user_id'];
    // Inserer le panier avec l'id de l'user dans la bdd
    $nbArticles=count($_SESSION['panier']['idProduit']);
    for ($i=0 ;$i < $nbArticles ; $i++) {
        $ctl_art = $_SESSION['panier']['idProduit'][$i];
        $ctl_art_qte = $_SESSION['panier']['qteProduit'][$i];
        $ctl_art_pa = $_SESSION['panier']['prixProduit'][$i];
        addCartLine($ctl_id, $ctl_user, $ctl_art, $ctl_art_qte, $ctl_art_pa);
    }
    $ord_mnt = $_SESSION['panier']['mntPanier'];
    $ord_user = $ctl_user;
    $ord_cart = $ctl_id;
    addOrder($ord_mnt, $ord_user, $ord_cart);

    // reinitialiser le panier
    supprimePanier();

    // redirection vers admin pour visionner les commandes, PDF, etc...
    header("Location: admin.php");
}
else {
    header("Location: ../user_module/logpage.php");
}
?>