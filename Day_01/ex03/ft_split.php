<?PHP
function ft_split($str)
{
	$tab = explode(" ",$str);
	$j = 0;
	foreach ($tab as $elem)
	{
		if ($elem != "")
			$res[$j++] = $elem;
	}
	sort($res);
	return($res);
}
?>
