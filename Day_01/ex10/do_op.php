#!/usr/bin/php
<?php

if ($argc == 4)
{
	$first = $argv[1];
	$third = $argv[3];
	$tab = explode(" ", $argv[2]);
	$j = 0;
	foreach ($tab as $elem)
	{
		if ($elem != "")
			$res[$j++] = $elem;
	}
	$ascii = ord($res[0]);
	if ($ascii == 43)
		$res = $first + $third;
	else if ($ascii == 45)
		$res = $first - $third;
	else if ($ascii == 42)
		$res = $first * $third;
	else if ($ascii == 47)
		$res = $first / $third;
	else if ($ascii == 37)
		$res = $first % $third;
	echo "$res\n";
}
else
	echo "Incorrect Parameters\n";
?>
