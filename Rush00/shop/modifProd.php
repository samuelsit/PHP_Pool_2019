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
        $art_id = isset($_GET['art_id']) ? $_GET['art_id'] : NULL;
        $product = mysqli_query($bdd, "SELECT * FROM articles WHERE art_id = ".$art_id."");
        $row = mysqli_fetch_assoc($product);
    ?>
    <br><br><br><br><br>
    <div style="border-radius: 10px; background-image: url('../ressources/img/bg.jpg'); background-position: 20% 30%;">
    <div style="border-radius: 10px; background-color: rgba(255, 255, 255, 0.5); margin: 5% 30% 5% 30%;" class="col-6">
        <h1 class="text-center bold">Administration Produits #<?php echo $art_id; ?></h1>
    </div>
    </div>
    <hr><br><br><br>
    <form action="UpdateProduct.php?art_id=<?php echo $art_id; ?>" method="POST" enctype="multipart/form-data">
    <div class="row">
        <?php
        echo '<div class="col-1"></div>';
          echo '<div style="margin-bottom: 1%;" class="col-3">
                    <label for="avatar"><img height="18%" class="border product_img" src="../ressources/img/produit/'.$row['art_photo'].'" style="margin-bottom: 2%;"></label><br><br><br>
                    <h3>Il en reste: </h3><input type="number" style="font-size: 2vw;" name="qte" value="'.$row['art_quantity'].'"/>
                </div>';
        echo '<input style="display:none;" type="file" id="avatar" name="avatar" accept="image/png, image/jpeg">';
        echo '<div class="col-2"></div>';
        echo '<div class="col-5">
                <h3>Nom de l\'article: </h3>
                <input type="text" style="font-size: 2vw;" name="nom" value="'.$row['art_nom'].'"/><br>
                <h3>Prix de l\'article: </h3>
                <input type="text" style="font-size: 2vw;" name="prix" value="'.$row['art_pa'].'"/> €<br>
                <h3>Référence de l\'article: </h3>
                <input type="text" style="font-size: 2vw;" name="ref" value="'.$row['art_ref'].'"/><br>
                <h3>Description de l\'article: </h3>
                <textarea style="font-size: 2vw;" rows="5" cols="33" name="desc">'.$row['art_desc'].'</textarea><br>
            </div>';
        ?>
    </div>
    <br><br><br><br><br><br><br><br><br>
    <div class="text-right">
        <button type="submit">Modifier</button>
    </div>
    </form>
</body>
</html>