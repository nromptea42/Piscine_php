#!/usr/bin/php
<?PHP

$ret = "";

while (42)
{
	echo"Entrez un nombre: ";
	$handle = fopen("php://stdin", 'r'); 
	$ret = fgets($handle);
	if ($ret == false)
	{
		echo"^D\n";
		break;
	}
	$tab = explode("\n", $ret);
	if (is_numeric($tab[0]))
	{
		if ($tab[0] % 2 == 0)
			echo "Le chiffre $tab[0] est Pair\n";
		else
			echo "Le chiffre $tab[0] est Impair\n";
	}
	else
		echo"'$tab[0]' n'est pas un chiffre\n";
}
?>
