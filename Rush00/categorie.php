<?php
$page = $_GET[name];
include('include/head.php');
$query = mysqli_query($mysqli, "SELECT * FROM products");
?>
<html>
<body>
  <?php
  include("layout/header.php");
  include("layout/menu.php");
  ?>
  <div class="content">
    <?php
    while($product = mysqli_fetch_assoc($query))
    {
      if (array_search($_GET[name], explode(';', $product[categorie])) !== false) { ?>
        <div class="produit">
          <div class="colonne"><img src="<?php echo $product[img]; ?>"></div>
          <div class="colonne"><br /><?php echo $product[name]; ?><br /><br /><br /><?php echo $product[desc]; ?><br><?php showCat($mysqli, $product[id]); ?></div>
          <div class="colonne">
            <br /><?php echo $product[prix]; ?>€<br /><br /><br />
            <a href="gest_panier.php?action=add&id=<?php echo $product[id]; ?>"><button class="button" type="button">Ajouter au panier</button></a>
          </div>
        </div>
        <?php }
      } ?>
    </div>
    <?php include("layout/footer.php"); ?>
  </body>
  </html>
