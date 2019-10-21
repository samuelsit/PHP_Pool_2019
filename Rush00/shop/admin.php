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
        if ($_SESSION['access_granted'] != 1)
            header("Location: accessDenied.php");
        include 'http://localhost:8080/minishop/includes/nav.php';
        require_once('create.php');
    ?>
    <br><br><br><br><br>
    <div style="border-radius: 10px; background-image: url('../ressources/img/bg.jpg'); background-position: 20% 30%;">
    <div style="border-radius: 10px; background-color: rgba(255, 255, 255, 0.5); margin: 5% 30% 5% 30%;" class="col-6">
        <h1 class="text-center bold">Administration</h1>
    </div>
    </div>
    <?php
    if (isset($_COOKIE['ur_role_id']) && $_COOKIE['ur_role_id'] == 2) {
    echo '<div class="row text-right">
        <div class="col-6">
            <h2><a href="modifAllProduits.php">Modifier produits</a></h2>
        </div>
        <div class="col-6">
            <h2><a href="http://localhost:8080/minishop/admin_module/admin_users.php">Modifier clients</a></h2>
        </div>
    </div>';
    }
    ?>
    <hr>
    <h1>Mes commandes</h1>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>DATE</th>
                <th>MONTANT</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php
        $i = 1;
        $bdd = mysqliConnect();
        $command = mysqli_query($bdd, "SELECT * FROM orders WHERE ord_user = ".$_SESSION['user_id']."");
        while ($user_com = mysqli_fetch_assoc($command)) {
            echo '<tr>
                    <td>'.$i.'</td>
                    <td>'.$user_com['ord_date'].'</td>
                    <td>'.$user_com['ord_mnt'].' €</td>
                    <td><h1><a href="showOrder.php?order_id='.$user_com['ord_cart'].'">+</h1></td>
                </tr>';
            $i++;
        }
            ?>
        </tbody>
    </table>
</body>
</html>