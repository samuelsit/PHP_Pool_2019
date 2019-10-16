<?php
$variables = $_GET;

foreach ($variables as $key => $val)
{
	echo $key.": ".$val."\n";
}
?>