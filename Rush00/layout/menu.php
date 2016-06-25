<div class="menu">
	<a class="text_menu" href="index.php">Accueil</a>
	<a class="text_menu" href="panier.php">Panier(<?php echo count($_SESSION[panier]); ?>)</a>
	<?php if (!$_SESSION[id]) { ?><a class="text_menu" href="create.php">Creer son Compte</a><?php }?>
	<?php if (checkAdmin($mysqli, $_SESSION[id])) { ?><a class="text_menu" href="admin">Admin</a><?php }?>
	<?php if ($_SESSION[id]) { ?><a class="text_menu" href="profil.php">Profil</a><?php }?>
</div>
