<?PHP
function pr($data)
{
	echo "<pre>";
	print_r($data);
	echo "</pre>";
}
function ft_error()
{
	echo "ERROR\n";
	exit;
}
if ($_POST['submit'] !== "OK")
	ft_error();
if (!$_POST["login"] || !$_POST["newpw"] || !$_POST["oldpw"])
	ft_error();
$file = "../private/passwd";
$big_key = 0;
$found = false;
$array = unserialize(file_get_contents($file));
//pr($array);
foreach ($array as $key => $c)
{
	if ($c["login"] === $_POST["login"]) {
		$found = true;
		$my_password = $c["passwd"];
		$my_key = $key;
	}
	$big_key = $key;
}
if ($found == true) {
	if (hash("sha256", $_POST["oldpw"]) == $my_password) {
		$array[$my_key]['passwd'] = hash('sha256', $_POST['newpw']);
		file_put_contents($file, serialize($array));
		echo "OK\n";
	}
	else {
		ft_error();
	}
}
else {
	ft_error();
}
?>
