<?PHP

include('auth.php');
session_start();

if (!$_GET['login'] || !$_GET['passwd']) {
	ft_error();
}
if (auth($_GET['login'], $_GET['passwd']) == false) {
	$_SESSION['loggued_on_user'] = "";
	ft_error();
}
else {
	$_SESSION['loggued_on_user'] = $_GET['login'];
	echo "OK\n";
}

function pr($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}
function ft_error()
{
	echo "ERROR\n";
}
?>