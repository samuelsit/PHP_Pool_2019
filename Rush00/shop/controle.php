<html>
<head>
    <?php
        include 'http://localhost:8080/minishop/includes/header.php';
    ?>
</head>
<body>
    <?php
        include 'http://localhost:8080/minishop/includes/nav.php';
        include 'create.php';
        $bdd = mysqliConnect();
        $product = mysqli_query($bdd, "SELECT * FROM articles WHERE art_fam >= 50 AND art_fam <= 64 AND art_quantity != 0");
    ?>
        <br><br><br><br><br>
    <div style="border-radius: 10px; background-image: url('../ressources/img/bg.jpg'); background-position: 20% 30%;">
    <div style="border-radius: 10px; background-color: rgba(255, 255, 255, 0.5); margin: 5% 30% 5% 30%;" class="col-6">
        <h1 class="text-center bold">Contrôle d'accès</h1>
    </div>
    </div>
    <hr><br><br><br>
    <div class="row">
        <?php
    while ($row = mysqli_fetch_assoc($product)) {
          echo '<div style="margin-bottom: 1%;" class="col-3 text-center">
                    <img height="18%" class="border product_img" src="../ressources/img/produit/'.$row['art_photo'].'" style="margin-bottom: 2%;">
                    <b style="font-size: 1vw;">'.substr($row['art_nom'], 0, 22).' | '.$row['art_pa'].' €</b><br>
                    <b title="Ajouter au panier" style="font-size: 3vw;"><a href="addToCart.php?art_id='.$row['art_id'].'&art_pa='.$row['art_pa'].'&art_photo='.$row['art_photo'].'&art_nom='.substr($row['art_nom'], 0, 22).'">+</a></b>
                </div>';
        }
        ?>
    </div>
</body>
</html>