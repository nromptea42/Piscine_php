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
foreach ($res as $data)
{
	if ($i != 0)
		echo "$data ";
	$i++;
}
echo "$res[0]\n";
?>
