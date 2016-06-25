<?php

session_start();

if ($_GET['login'] && $_GET['passwd'] && $_GET['submit'])
{
	$_SESSION['login'] = $_GET['login'];
	$_SESSION['passwd'] = $_GET['passwd'];
}
?>

<html><body>
<form name="index.php" action="index.php" method="GET">
	Identifiant: <input type="text" name="login" value="<?php echo $_SESSION['login']; ?>" required /> 
	<br />
	Mot de passe: <input type="password" name="passwd" value="<?php echo $_SESSION['passwd']; ?>" required />
<input type="submit" name="submit" value="OK" />
</form>
</body></html>
