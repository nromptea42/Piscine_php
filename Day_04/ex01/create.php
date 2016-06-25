<?PHP
function pr($data)
{
	echo "<pre>";
	print_r($data); // or var_dump($data);
	echo "</pre>";
}
function ft_error()
{
	echo "ERROR\n";
	exit;
}

if ($_POST['submit'] !== "OK")
	ft_error();
if (!$_POST["login"] || !$_POST["passwd"])
	ft_error();
$path = "../private/";
$file = $path . "passwd";
$big_key = 0;
if (file_exists($file))
{
	$array = unserialize(file_get_contents($file));
//	pr($array);
	foreach ($array as $key => $c)
	{
		if ($c["login"] === $_POST["login"])
			ft_error();
		$big_key = $key;
	}
}
$array[$big_key + 1]["login"] = $_POST["login"];
$array[$big_key + 1]["passwd"] = hash("sha256", $_POST["passwd"]);
if (!(file_exists($path)))
{
	mkdir($path);
}
file_put_contents($file, serialize($array));
echo "OK\n";
?>
