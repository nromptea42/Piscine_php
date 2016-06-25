<head>
	<meta charset="UTF-8" />
	<title>Rush</title>
	<link rel="stylesheet" type="text/css" href="layout/layout.css">
</head>

<div class="head">
	<div style="width: 25%; display: inline-block;">
		<a href="index.php">
			<img border="0" title="accueil" class="accueil" src="http://cliparts.co/cliparts/pc5/8xa/pc58xaKni.png">
		</a>
	</div>
	<div class="yes">
		<div class="title">_CARSHOP_</div>
		<div style="float: right;">
			<a href="panier.php"><img border="0" title="panier" class="panier" src="http://www.contactdistance.fr/wp-content/uploads/2014/12/panier.png"></a>
		</div>
		<?php if ($_SESSION[id]) { ?>
			<div class="form">
				<div style="display: inline-block;">Bonjour <?php echo getName($mysqli, $_SESSION[id]); ?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</div> <a href="logout.php">Logout</a></div>
			</div>
		<?php }
		else { ?>
		<form action="login.php" method="post" class="form">
			Identifiant: <input type="text" name="id" value="" />
			Mot de passe: <input type="password" name="passwd" value="" />
			<input type="submit" name="submit" value="Connexion" />
		</form>
		<?php } ?>
	</div>
</div>
