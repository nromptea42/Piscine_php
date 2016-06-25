#!/usr/bin/php
<?php
if ($argc > 1)
{
	$i = 0;
	$j = 0;
	foreach ($argv as $elem)
	{
		if ($i != 0)
			$res[$j++] = $elem;
		$i++;
	}
	$aff = array();
	foreach ($res as $data)
	{
		$tab = explode(" ", $data);
		$j = 0;
		$tac = array();
		foreach ($tab as $k)
		{
			if ($elem != "")
				$tac[$j++] = $k;
		}
		foreach ($tac as $m)
			$aff[$count++] = $m;
	}
	sort($aff, SORT_FLAG_CASE | SORT_STRING);
	$i = 0;
	$j = 0;
	$aff_2 = array();
	while($aff[$i] != NULL)
	{
		$ascii = ord($aff[$i]);
		if (($ascii >= 65 && $ascii <= 90) || ($ascii >= 97 && $ascii <= 122))
			echo "$aff[$i]\n";	
		$i++;
	}
	$i = 0;
	$j = 0;
	$aff_3 = array();
	while($aff[$i] != NULL)
	{
		$ascii = ord($aff[$i]);
		if ($ascii >= 48 && $ascii <= 57)
			echo "$aff[$i]\n";
		$i++;
	}
	$i = 0;
	$j = 0;
	$aff_2 = array();
	while($aff[$i] != NULL)
	{
		$ascii = ord($aff[$i]);
		if (($ascii >= 65 && $ascii <= 90) || ($ascii >= 97 && $ascii <= 122) || ($ascii >= 48 && $ascii <= 57))
			;
		else
			echo "$aff[$i]\n";	
		$i++;
	}
}
?>
