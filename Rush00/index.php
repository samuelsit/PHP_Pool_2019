<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//$config = parse_ini_file('config.ini');
//$_SESSION['rd'] = $config['rd'];

?>
<html>
<head>
    <?php
        include('http://localhost:8080/minishop/includes/header.php');
    ?>
</head>
<body>
    <?php
        include('http://localhost:8080/minishop/includes/nav.php');
        require_once('shop/create.php');
        $bdd = mysqliConnect();
        $video = mysqli_query($bdd, "SELECT * FROM articles WHERE art_fam >= 1 AND art_fam <= 22 AND art_quantity != 0 LIMIT 0,8");
        $alarme = mysqli_query($bdd, "SELECT * FROM articles WHERE art_fam >= 23 AND art_fam <= 49 AND art_quantity != 0 LIMIT 0,8");
        $controle = mysqli_query($bdd, "SELECT * FROM articles WHERE art_fam >= 50 AND art_fam <= 64 AND art_quantity != 0 LIMIT 0,8");
    ?>
        <br><br><br><br><br>
    <div style="border-radius: 10px; background-image: url('ressources/img/bg.jpg'); background-position: 20% 30%;">
    <div style="border-radius: 10px; background-color: rgba(255, 255, 255, 0.5); margin: 5% 30% 5% 30%;" class="col-6">
        <h1 class="text-center bold">Nos meilleures ventes</h1>
    </div>
    </div>
    <hr><br><br><br>
    <h1>Vidéo-Surveillance</h1>
    <hr>    
    <div class="row">
        <?php
    while ($rowv = mysqli_fetch_assoc($video)) {
          echo '<div style="margin-bottom: 1%;" class="col-3 text-center">
                    <img height="18%" class="border product_img" src="ressources/img/produit/'.$rowv['art_photo'].'" style="margin-bottom: 2%;">
                    <b style="font-size: 1vw;">'.substr($rowv['art_nom'], 0, 22).' | '.$rowv['art_pa'].' €</b><br>
                    <b title="Ajouter au panier" style="font-size: 3vw;"><a href="shop/addToCart.php?art_id='.$rowv['art_id'].'&art_pa='.$rowv['art_pa'].'&art_photo='.$rowv['art_photo'].'&art_nom='.substr($rowv['art_nom'], 0, 22).'">+</a></b>
                </div>';
        }
        ?>
    </div>
    <h1>Alarme</h1>
    <hr>
    <div class="row">
    <?php
    while ($rowa = mysqli_fetch_assoc($alarme)) {
          echo '<div style="margin-bottom: 1%;" class="col-3 text-center">
                    <img height="18%" class="border product_img" src="ressources/img/produit/'.$rowa['art_photo'].'" style="margin-bottom: 2%;">
                    <b style="font-size: 1vw;">'.substr($rowa['art_nom'], 0, 22).' | '.$rowa['art_pa'].' €</b><br>
                    <b title="Ajouter au panier" style="font-size: 3vw;"><a href="shop/addToCart.php?art_id='.$rowa['art_id'].'&art_pa='.$rowa['art_pa'].'&art_photo='.$rowa['art_photo'].'&art_nom='.substr($rowa['art_nom'], 0, 22).'">+</a></b>
                </div>';
        }
        ?>
    </div>
    <h1>Contrôle d'accès</h1>
    <hr>
    <div class="row">
    <?php
    while ($rowc = mysqli_fetch_assoc($controle)) {
          echo '<div style="margin-bottom: 1%;" class="col-3 text-center">
                    <img height="18%" class="border product_img" src="ressources/img/produit/'.$rowc['art_photo'].'" style="margin-bottom: 2%;">
                    <b style="font-size: 1vw;">'.substr($rowc['art_nom'], 0, 22).' | '.$rowc['art_pa'].' €</b><br>
                    <b title="Ajouter au panier" style="font-size: 3vw;"><a href="shop/addToCart.php?art_id='.$rowc['art_id'].'&art_pa='.$rowc['art_pa'].'&art_photo='.$rowc['art_photo'].'&art_nom='.substr($rowc['art_nom'], 0, 22).'">+</a></b>
                </div>';
        }
        ?>
    </div>
</body>
</html>