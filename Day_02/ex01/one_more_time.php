#!/usr/bin/php
<?php

if ($argc > 1)
{
	date_default_timezone_set(GMT);
	$nb = 0;
	$tab = explode(" ", $argv[1]);
	$nb = preg_match("/([Ll]undi|[Mm]ardi|[Mm]ercredi|[Jj]eudi|[Vv]endredi|[Ss]amedi|[Dd]imanche])/", $tab[0]);
	$nb = $nb + preg_match("/^[0-9]{1,2}/", $tab[1]);
	$nb = $nb + preg_match("/^([Jj]anvier|[Ff]evrier|[Mm]ars|[Aa]vril|[Mm]ai|[Jj]uin|[Jj]uillet|[Aa]out|[Ss]eptembre|[Oo]ctobre|[Nn]ovembre|[Dd]ecembre)/", $tab[2]);
	$nb = $nb + preg_match("/^[1-3][0|9][0-9][0-9]/", $tab[3]);
	$hour = explode(":", $tab[4]);
	$ok = count($tab);
	$nb = $nb + preg_match("/[0-1][0-9]/", $hour[0]);
	$nb = $nb + preg_match("/[0-5][0-9]/", $hour[1]);
	$nb = $nb + preg_match("/[0-5][0-9]/", $hour[2]);
	$count = count($hour);
	if ($count == 3 && $nb == 7 && $ok == 5)
	{
		if ($hour[0] == "00")
			$hour[0] = "23";
		else if ($hour[0] == "01")
			$hour[0] = "00";
		else
			$hour[0] = $hour[0] - 1;
		if ($tab[2] == "Janvier" || $tab[2] == "janvier")
			$tab[2] = "January";
		if ($tab[2] == "fevrier" || $tab[2] == "Fevrier")
			$tab[2] = "February";
		if ($tab[2] == "Mars" || $tab[2] == "mars")
			$tab[2] = "March";
		if ($tab[2] == "Avril" || $tab[2] == "avril")
			$tab[2] = "April";
		if ($tab[2] == "Mai" || $tab[2] == "mai")
			$tab[2] = "May";
		if ($tab[2] == "Juin" || $tab[2] == "juin")
			$tab[2] = "June";
		if ($tab[2] == "Juillet" || $tab[2] == "juillet")
			$tab[2] = "July";
		if ($tab[2] == "Aout" || $tab[2] == "Aout")
			$tab[2] = "August";
		if ($tab[2] == "Septembre" || $tab[2] == "septembre")
			$tab[2] = "September";
		if ($tab[2] == "Octobre" || $tab[2] == "octobre")
			$tab[2] = "October";
		if ($tab[2] == "Novembre" || $tab[2] == "novembre")
			$tab[2] = "November";
		if ($tab[2] == "Decembre" || $tab[2] == "decembre")
			$tab[2] = "December";
		$lol = "$tab[1] $tab[2] $tab[3] $hour[0]:$hour[1]:$hour[2]\n";
		echo strtotime($lol)."\n";
	}
	else
		echo "Wrong Format\n";
}
?>
