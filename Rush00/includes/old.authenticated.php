<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<div id="authenticated">
<?php
	if ($_SESSION['user_traffic'] > 1) {
?>
	<p>Contents de vous revoir <?php echo $_SESSION['user_firstname']; ?></p>
<?php
	}
	else {
?>
	<p>Bienvenue parmis nous <?php echo $_SESSION['user_firstname']; ?></p>
<?php
	}
?>
</div>
