#!/usr/bin/php
<?php

if ($argc == 4)
{
	

	$first = $res[2];
	$third = $res[0];
	$ascii = ord($res[1]);
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
