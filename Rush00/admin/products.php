<?php

include('../include/head.php');
$query = mysqli_query($mysqli, 'SELECT * FROM products');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Product</title>
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
    <h1><a href="index.php"><--Retour</a>Online products (<?php echo mysqli_num_rows($query) ?>)</h1>
  </header>
  <div class="content">
    <?php while($product = mysqli_fetch_assoc($query)) { ?>
      <div class="product">
        <span class="elem"><img src="<?php echo "../$product[img]"; ?>" alt="" /></span>
        <span class="elem"><b><?php echo $product[name]; ?></b></span>
        <span class="elem"><?php echo $product[prix]; ?> €</span>
        <span class="elem"><?php echo $product[desc]; ?></span>
        <span class="elem"><?php showCatA($mysqli, $product[id]); ?></span>
        <span class="elem"><a href="del.php?type=prod&id=<?php echo $product[id]; ?>">Delete</a> - <a href="update_product.php?id=<?php echo $product[id]; ?>">Update</a></span>
    </div>
    <?php }
    if (mysqli_num_rows($query) == 0) {
      echo "No products, <a href='new_product.php'>Add one !</a>";
    }
    ?>
  </div>
</body>
</html>
