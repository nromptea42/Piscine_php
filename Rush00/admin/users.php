<?php

include('../include/head.php');
$query = mysqli_query($mysqli, 'SELECT * FROM users');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Users</title>
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
    <h1><a href="index.php"><--Retour</a>Users (<?php echo mysqli_num_rows($query) ?>)</h1>
  </header>
  <div class="content">
    <?php while($user = mysqli_fetch_assoc($query)) { ?>
      <div class="product">
        <span class="elem"></span>
        <span class="elem" style="margin-top: 10px;"><b><?php echo $user[name]; ?></b></span>
        <span class="elem" style="margin-top: 10px;width:30%;"><?php echo $user[email]; ?></span>
        <span class="elem" style="margin-top: 10px;width:19%;"><?php echo $user[group]; ?></span>
        <span class="elem" style="margin-top: 10px;width:14%;"><a href="del.php?type=user&id=<?php echo $user[id]; ?>">Delete Product</a></span>
      </div>
    <?php } ?>
  </div>
</body>
</html>
