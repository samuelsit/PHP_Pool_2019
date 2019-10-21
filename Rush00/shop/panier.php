<html>
<head>
    <?php
        include('http://localhost:8080/minishop/includes/header.php');
        session_start();
        include_once("ft_cart.php");
    ?>
</head>
<body>
    <?php include 'http://localhost:8080/minishop/includes/nav.php'; ?>
    <br><br><br><br><br>
    <div style="border-radius: 10px; background-image: url('../ressources/img/bg.jpg'); background-position: 20% 30%;">
    <div style="border-radius: 10px; background-color: rgba(255, 255, 255, 0.5); margin: 5% 30% 5% 30%;" class="col-6">
        <h1 class="text-center bold">Panier</h1>
    </div>
    </div>
    <hr><br><br><br>
    <form method="post" action="panier.php">
        <table>
            <?php
                if (creationPanier())
                {
                    $nbArticles=count($_SESSION['panier']['idProduit']);
                    if ($nbArticles <= 0)
                    echo "<h1 class='bold text-center'>Votre panier est vide.</h1>";
                    else
                    {
                        echo "<thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ARTICLE</th>
                                        <th>QTE</th>
                                        <th>PRIX</th>
                                    </tr>
                                </thead>
                                <tbody>";
                        for ($i=0 ;$i < $nbArticles ; $i++)
                        {
                            $id = $i + 1;
                            echo "<tr>";
                            echo "<td>".$id."</ td>";
                            echo "<td><img style=\"width: 16vw; height: 8vw;\" src=\"../ressources/img/produit/".$_SESSION['panier']['photoProduit'][$i]."\"><br>".htmlspecialchars($_SESSION['panier']['nameProduit'][$i])."</ td>";
                            echo "<td>".htmlspecialchars($_SESSION['panier']['qteProduit'][$i])."</td>";
                            echo "<td>".htmlspecialchars($_SESSION['panier']['prixProduit'][$i])."</td>";
                            echo "<td><a href=\"delFromCart.php?art_id=".$_SESSION['panier']['idProduit'][$i]."&qte=".$_SESSION['panier']['qteProduit'][$i]."\">X</a></td>";
                            echo "</tr>";
                        }

                        echo "<tr><td colspan=\"2\"> </td>";
                        echo "<td colspan=\"2\">";
                        echo "Total : ".MontantGlobal()." €";
                        echo "</td></tr>";

                        echo "<tr><td colspan=\"4\">";
                        echo "<input type=\"submit\" value=\"Rafraichir\"/>";
                        echo "<input type=\"hidden\" name=\"action\" value=\"refresh\"/>";
                        echo "<a href=\"delCart.php\">Vider le panier</a> | ";
                        echo "<a href=\"success.php\">Payer</a>";
                        echo "</td></tr>";
                        echo "</tbody>";
                    }
                }
            ?>
        </table>
    </form>
</body>
</html>