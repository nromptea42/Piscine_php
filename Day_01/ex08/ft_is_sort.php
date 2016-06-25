<?php

function ft_is_sort($str)
{
	$mine = $str;
	sort($str);
	$i = 0;
	foreach ($str as $data)
	{
		if ($data != $mine[$i])
			return (false);
		$i++;
	}
	return (true);
}

?>
