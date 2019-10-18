<?php

require_once('auth.php');
session_start();

if ($_POST['login'] && $_POST['passwd'] && auth($_POST['login'], $_POST['passwd'])){
	$_SESSION['loggued_on_user'] = $_POST['login'];
    echo '<html>
    <head>
        <style>
        body
        {
            text-align: center;
            font-weight: bold;
            background-color:lightgrey;
        }
        </style>
    </head>
    <body>
        <iframe name="chat" src="chat.php" width="100%" height="550px" frameborder="0"></iframe><hr>
        <iframe src="speak.php" width="100%" height="50px" frameborder="0"></iframe>
    </body>
</html>';
}
else
{
	$_SESSION['loggued_on_user'] = "";
    header('Location: index.html');
}

?>