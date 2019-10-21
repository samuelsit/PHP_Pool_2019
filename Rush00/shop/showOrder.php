<html>
<head>
    <?php
        include('http://localhost:8080/minishop/includes/header.php');
        session_start();
    ?>
    <style type="text/css" media="print">
        #nav-container {
            display: none;
        }
        #print {
            display: none;
        }
        footer {
            display: none;
        }
    </style>
</head>
<body>
    <?php
        if ($_SESSION['access_granted'] != 1)
            header("Location: accessDenied.php");
        include 'http://localhost:8080/minishop/includes/nav.php';
        $ctl_id = isset($_GET['order_id']) ? $_GET['order_id'] : NULL;
        require_once('create.php');
        $bdd = mysqliConnect();
        $fetch_cart = mysqli_query($bdd, "SELECT * FROM cart_ligne WHERE ctl_id = ".$ctl_id."");
    ?>
    <br><br><br><br><br>
    <div style="border-radius: 10px; background-image: url('../ressources/img/bg.jpg'); background-position: 20% 30%;">
    <div style="border-radius: 10px; background-color: rgba(255, 255, 255, 0.5); margin: 5% 30% 5% 30%;" class="col-6">
        <h1 class="text-center bold">Commande #<?php echo $ctl_id ?></h1>
    </div>
    </div>
    <hr><br><br><br>
    <form method="post" action="panier.php">
        <table>
            <?php
                        echo "<thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ARTICLE</th>
                                        <th>QTE</th>
                                        <th>PRIX</th>
                                    </tr>
                                </thead>
                                <tbody>";
                        $id = 1;
                        $mnt = 0;
                        while ($cart = mysqli_fetch_assoc($fetch_cart))
                        {
                            $fetch_photo = mysqli_query($bdd, "SELECT art_photo FROM articles WHERE art_id = ".$cart['ctl_art']."");
                            $photo = mysqli_fetch_assoc($fetch_photo);
                            $fetch_nom = mysqli_query($bdd, "SELECT art_nom FROM articles WHERE art_id = ".$cart['ctl_art']."");
                            $nom = mysqli_fetch_assoc($fetch_nom);
                            echo "<tr>";
                            echo "<td>".$id."</ td>";
                            echo "<td><img style=\"width: 16vw; height: 8vw;\" src=\"../ressources/img/produit/".$photo['art_photo']."\"><br>".$nom['art_nom']."</ td>";
                            echo "<td>".$cart['ctl_art_qte']."</td>";
                            echo "<td>".$cart['ctl_art_pa']."</td>";
                            echo "</tr>";
                            $id++;
                            $mnt += $cart['ctl_art_pa'];
                        }

                        echo "<tr><td colspan=\"2\"> </td>";
                        echo "<td colspan=\"2\">";
                        echo "Total : ".$mnt." €";
                        echo "</td></tr>";
                        echo "</tbody>";
            ?>
        </table>
    </form>
    <div id="print">
        <button OnClick="javascript:window.print()">Imprimer une facture</button>
    </div>
    <br><br><br><br><br><br>
    <?php include 'footer.html' ?>
</body>
</html>