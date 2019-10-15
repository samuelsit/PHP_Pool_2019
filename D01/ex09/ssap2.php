#!/usr/bin/php
<?php
if ($argc != 0) {
	$arr = array();
	foreach ($argv as $elem)
	{
		if ($elem != $argv[0])
		{
			$tmp = preg_split("/ +/", trim($elem));
			if ($tmp[0] != "")
				$arr = array_merge($arr, $tmp);
		}
	}

	foreach ($arr as $num)
	{
		if (is_numeric($num) == TRUE)
		{
			$numeric[] = $num;
		}
	}
	sort($numeric, SORT_STRING);

	$alphabetic = array();
	foreach ($arr as $alpha)
	{
		if (ctype_alpha($alpha) == TRUE)
		{
			$alphabetic[] = $alpha;
		}
	}
	sort($alphabetic, SORT_NATURAL | SORT_FLAG_CASE);

	$ascii = array();
	foreach ($arr as $asc)
	{
		if (is_numeric($asc) == FALSE && ctype_alpha($asc) == FALSE)
		{
			$ascii[] = $asc;
		}
	}
	sort($ascii);

	foreach($alphabetic as $keyAlpha)
	{
		echo $keyAlpha."\n";
	}
	foreach($numeric as $keyNum)
	{
		echo $keyNum."\n";
	}
	foreach($ascii as $keyAsc)
	{
		echo $keyAsc."\n";
	}
}
?>
