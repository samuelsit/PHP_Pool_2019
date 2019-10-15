#!/usr/bin/php
<?php

function ft_is_sort($isSortedArray)
{
	$sortedArray = $isSortedArray;
	sort($sortedArray);
	if (!(array_diff_assoc($isSortedArray, $sortedArray)))
		return (TRUE);
	else
		return (FALSE);
}

?>
