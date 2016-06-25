<?php

$i = 0;
foreach($_GET as $key => $value)
{
	$res[$i] = $value;
	$i++;
}

if ($res[0] == "set")
	setcookie($res[1], $res[2], time()+50000);
else if ($res[0] == "get")
	echo $_COOKIE[$res[1]]."\n";
else if ($res[0] == "del")
{
	$yep = $_COOKIE[$res[1]];
	setcookie($res[1], $yep, time()-1);
}

?>
