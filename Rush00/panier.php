<?php
$page = "Panier";
include('include/head.php');
if (!$_SESSION[panier])
  $_SESSION[panier] = [];
foreach ($_SESSION[panier] as $key => $product) {
  if (!getProduct($mysqli, $product[id])){
    $link = "gest_panier.php?action=del&id=$product[id]";
    header("location: $link");
  }
}
?>
<html>
<body>
  <?php
  include("layout/header.php");
  include("layout/menu.php");
  ?>

  <div class="content">
    <?php
    if (isset($_SESSION[panier]) && count($_SESSION[panier]) > 0)
    {
      foreach ($_SESSION[panier] as $key => $product) {
        ?>
        <div class="produit_panier">
          <div class="colonne_panier"><img src="<?php echo getProduct($mysqli, $product[id])[img]; ?>"></div>
          <div class="colonne_panier"><br /><?php echo getProduct($mysqli, $product[id])[name]; ?></div>
          <div class="colonne_panier"><br />Quantité : <?php echo $product[nb]; ?></div>
          <div class="colonne_panier"><br />Prix : <?php echo getProduct($mysqli, $product[id])[prix]; ?>€</div>
          <div class="colonne_panier"><br /><a href="gest_panier.php?action=del&id=<?php echo $product[id]; ?>"><button class="button" type="button">Supprimer du panier</button></a></div>
        </div>
        <hr>
        <?php
      }
    }
    else {
      echo "Empty";
    }
    ?>
    <?php if ($_SESSION[id]) {
    ?> <a href="valid.php"><button class="button_cart green">
		<div class="title_cart">Validate</div>
		<div class="price_cart"><?php echo getTotal($mysqli, $_SESSION[panier]);?></div>
	</button></a> <?php }
    else { ?>
      <a href="login.php">Connectez-vous pour commander</a>
    <?php } ?>
    </div>
  </div>
  <?php include("layout/footer.php"); ?>
</body>
</html>
