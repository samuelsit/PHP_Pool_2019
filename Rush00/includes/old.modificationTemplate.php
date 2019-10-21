<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!doctype html>
<html>
	<head>
	<?php include('header.php'); ?>
	</head>
	<?php include('nav.php'); ?>
<body>
<form action="modif.php" accept-charset="utf-8" method="POST">
	<?php include('userForm.php'); ?>
	<div>
		<input name="submit" type="submit" value="Modification">
	</div>
</form>
</body>
</html>


