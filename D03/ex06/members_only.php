<?php
if (($_SERVER['PHP_AUTH_USER'] != 'zaz') || ($_SERVER['PHP_AUTH_PW'] != 'jaimelespetitsponeys')) {
    header('HTTP/1.0 401 Unauthorized');
    header("WWW-Authenticate: Basic realm=''Espace membres''");
    echo "<html><body>Cette zone est accessible uniquement aux membres du site</body></html>"."\n";
}
else {
    echo "<html><body>"."\n"."Bonjour Zaz<br />"."\n"."<img src='data:image/png;base64,".base64_encode(file_get_contents('../img/42.png'))."'></body>"."\n"."</html>"."\n";
}
?>