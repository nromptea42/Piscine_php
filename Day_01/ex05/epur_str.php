#!/usr/bin/php
<?php

$tab = explode(" ",$argv[1]);
$j = 0;
foreach ($tab as $elem)
{
	if ($elem != "")
		$res[$j++] = $elem;
}
$i = 0;
$nb = count($res);
foreach ($res as $data)
{
	if ($i++ != $nb - 1)
		echo "$data ";
	else
		echo "$data\n";
}
?>
