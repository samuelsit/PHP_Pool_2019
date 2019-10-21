<html>
<head>
    <?php
        include('http://localhost:8080/minishop/includes/header.php');
        session_start();
    ?>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        if ($_COOKIE['ur_role_id'] != 2 || $_SESSION['access_granted'] != 1)
            header("Location: accessDenied.php");
        include 'http://localhost:8080/minishop/includes/nav.php';
        require_once('create.php');
        $bdd = mysqliConnect();
        $product = mysqli_query($bdd, "SELECT * FROM articles");
    ?>
    <br><br><br><br><br>
    <div style="border-radius: 10px; background-image: url('../ressources/img/bg.jpg'); background-position: 20% 30%;">
    <div style="border-radius: 10px; background-color: rgba(255, 255, 255, 0.5); margin: 5% 30% 5% 30%;" class="col-6">
        <h1 class="text-center bold">Administration Produits</h1>
    </div>
    </div>
    <hr><br><br><br>
    <div class="row">
        <?php
    while ($row = mysqli_fetch_assoc($product)) {
          echo '<div style="margin-bottom: 1%;" class="col-3 text-center">
                    <a href="modifProd.php?art_id='.$row['art_id'].'"><img height="18%" class="border product_img" src="../ressources/img/produit/'.$row['art_photo'].'" style="margin-bottom: 2%;">
                    <b style="font-size: 1vw;">'.substr($row['art_nom'], 0, 22).' | '.$row['art_pa'].' €</b><br></a>
                </div>';
        }
        ?>
    </div>
</body>
</html>