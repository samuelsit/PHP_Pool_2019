#!/usr/bin/php
<?php

function isOdd($nb)
{
	if ($nb % 2 == 0)
		echo "Le chiffre $nb est Pair\n";
	else
		echo "Le chiffre $nb est Impair\n";
}

while (1)
{
	echo "Entrez un nombre: ";
	$nb = trim(fgets(STDIN));
	if (feof(STDIN) == TRUE)
		exit;
	if (!is_numeric($nb))
		print("'$nb' n'est pas un chiffre\n");
	else
		isOdd($nb);
}

?>
