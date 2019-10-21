<?php
require_once('create.php');
$bdd = mysqliConnect();
$fetch_photo = mysqli_query($bdd, "SELECT art_photo FROM articles WHERE art_id = ".$_GET['art_id']."");
$photo = mysqli_fetch_assoc($fetch_photo);
$art_photo = $photo['art_photo'];

$nom = isset($_POST['nom']) ? $_POST['nom'] : NULL;
$prix = isset($_POST['prix']) ? $_POST['prix'] : NULL;
$ref = isset($_POST['ref']) ? $_POST['ref'] : NULL;
$desc = isset($_POST['desc']) ? $_POST['desc'] : NULL;
$qte = isset($_POST['qte']) ? $_POST['qte'] : NULL;

if (!empty($_FILES['avatar']['name'])) {
    if (!move_uploaded_file($_FILES['avatar']['tmp_name'], "../ressources/img/produit/".$art_photo."")) {
        header("Location: admin.php");
    }
}

UpdateProduct($nom, $prix, $ref, $desc, $_GET['art_id'], $qte);
header("Location: ".$_SERVER['HTTP_REFERER']);

?>