<?php
include('../include/head.php');
$query = mysqli_query($mysqli, 'SELECT * FROM commands');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Orders</title>
  <link rel="stylesheet" type="text/css" href="../layout/admin_prod.css">
</head>
<body>
  <nav>
    <ul>
      <li><a href="index.php"><-Retour</a></li>
      <li><a href="users.php">Users</a></li>
      <li><a href="products.php">Products</a></li>
      <li><a href="new_product.php">Add products</a></li>
    </ul>
  </nav>
  <header>
    <h1><a href="index.php"><--Retour</a>Orders (<?php echo mysqli_num_rows($query) ?>)</h1>
  </header>
  <div class="content">
    <?php while($order = mysqli_fetch_assoc($query)) {
      ?>
      <h1>Commande #<?php echo $order[id]; ?> - <?php echo getUser($mysqli, $order[id_user])[name]; ?></h1> <?php
      $product = (explode(' ', $order[cmd]));
      foreach ($product as $key => $value) {
        $product = (explode('|', $value));
        ?>
        <div class="product">
          <span class="elem"></span>
          <span class="elem"><b><?php echo getProduct($mysqli, $product[0])[name]; ?></b></span>
          <span class="elem"><?php echo getProduct($mysqli, $product[0])[prix]; ?> E</span>
          <span class="elem">Quantité : <?php echo $product[1]; ?></span>
          <span class="elem"></span>
          <span class="elem"><a href="del.php?type=prod&id=<?php echo $product[id]; ?>">Delete Product</a></span>
        </div>
        <?php
        }
      ?>
    <hr>
    <?php } ?>
  </div>
</body>
</html>
