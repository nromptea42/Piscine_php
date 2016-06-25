#!/usr/bin/php
<?php
$i = 0;
$j = 0;
if ($argc >= 2)
{
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
	sort($aff);
	$i = 0;
	foreach ($aff as $ty)
		echo "$ty\n";
}
?>
