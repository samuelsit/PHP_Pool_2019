#!/usr/bin/php
<?php

while (1)
{
	echo "Entrez un nombre: ";
	$nb = trim(fgets(STDIN));
	$isOdd = substr($nb, -1, 1);
	if (feof(STDIN) == TRUE)
		exit;
	if (!is_numeric($nb))
		print("'$nb' n'est pas un chiffre\n");
	else {
		if ($isOdd % 2 == 0)
			echo "Le chiffre $nb est Pair\n";
		else
			echo "Le chiffre $nb est Impair\n";
	}
}

?>
