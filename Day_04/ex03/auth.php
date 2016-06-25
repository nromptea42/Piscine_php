<?PHP
function auth($login, $passwd) {
	$file = "../private/passwd";
	$array = unserialize(file_get_contents($file));
	foreach ($array as $key => $c)
	{
		if ($c['login'] == $login && $c['passwd'] == hash('sha256', $passwd)) {
			return true;
		}
	}
	return false;
}
?>