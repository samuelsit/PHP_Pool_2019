<?php

$bdd = mysqli_connect("localhost", "root", "123456", "db_ft_minishop");
        if (mysqli_connect_errno()) {
                printf("Échec de la connexion : %s\n", mysqli_connect_error());
                exit();
		}
$sql = "source /dump.php";
mysqli_query($bdd, $sql);

?>
