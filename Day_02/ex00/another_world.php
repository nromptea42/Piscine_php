#!/usr/bin/php
<?php

if ($argc > 1)
{
	$str = $argv[1];
	$trimmed = trim($str, " \t");
	$tab = explode(" ", $trimmed);
	$j = 0;
	foreach ($tab as $elem)
	{
		if ($elem != "")
			$res[$j++] = $elem;
	}
	$i = 0;
	$count = count($res);
	foreach ($res as $data)
	{
		if ($i != $count - 1)
			echo "$data ";
		else
			echo "$data\n";
		$i++;
	}
}

?>
