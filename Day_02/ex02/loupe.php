#!/usr/bin/php
<?php

$fd = fopen($argv[1], 'r');

while ($line = fgets($fd))
{
	$i = 0;
	$check = 0;
	$check_2 = 0;
	while ($line[$i])
	{
		if ($line[$i] == '<' && $line[$i + 1] == 'a')
		{
			$check = 1;
			$i = $i + 2;
		}
		if ($line[$i] == '<' && $line[$i + 1] == '/' && $line[$i + 2] == 'a' && $line[$i + 3] == '>' && $check == 1)
			$check = 0;
		if ($check == 1 && ($line[$i] == '"' || $line[$i] == '>') && $check_2 == 0)
			$check_2 = 1;
		else if ($check == 1 && $check_2 == 1 && ($line[$i] == '<' || $line[$i] == '"'))
			$check_2 = 0;
		if ($check == 1)
		{
			if ($check_2 == 1)
			{
				$ascii = ord($line[$i]) - 32;
				if ($ascii >= 65 && $ascii <=90)
					$line[$i] = chr($ascii);
			}
		}
		$i++;
	}
	echo $line;
}
?>
