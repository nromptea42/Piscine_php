<?php include("include/head.php"); ?>
<html>
<body>

<?php
include("layout/header.php");
include("layout/menu.php");
?>

<?php
	$image = getUser($mysqli, $_SESSION[id])[img];
?>
<div class="content">
	<br /><div class="profile">Ton login est : <?php echo getUser($mysqli, $_SESSION[id])[name]; ?></div><br />
	<div class="profile">Ton email est : <?php echo getUser($mysqli, $_SESSION[id])[email]; ?></div><br /><img src="<?php echo $image?>" style="width:20vmin;"></img>
	<div><a href="admin/del.php?type=user&id=<?php echo $_SESSION[id]; ?>" style="text-decoration:none"><button id="profile_button" class="champs_button" type="button">Supprimer le compte</button></a></div>
</div>

<?php include("layout/footer.php"); ?>

</body>
</html>
