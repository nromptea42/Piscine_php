<?php
  include('../include/head.php');

  $ext = array('42', 'jpg','gif','png','jpeg');
  $uploads_dir = '../img';
  if (!checkAdmin($mysqli, $_SESSION[id]))
    header('location: ../index.php');
  if (!getProduct($mysqli, $_GET[id]))
    header('location: products.php');
  if ($_POST[submit] == "Publier")
  {
    $error = [];
    if (!$_POST[name] || !$_POST[price] || !$_POST[cat]) {
      array_push($error, "Tout les champs sont obligatoires");
    }
    else {
      if (!preg_match("/^[A-z0-9 ]+$/", $_POST[name])) {
        array_push($error, "Nom: Mauvais Format");
      }
      if (!preg_match("/^[A-z0-9;]+$/", $_POST[cat])) {
        array_push($error, "Catégories: Mauvais format");
      }
    }
    if (!$error) {
      //if (mysqli_query($mysqli, "UPDATE products set name = '".$_POST[name]."', prix = '$_POST[price]', categorie = '$_POST[cat]', desc = '$_POST[desc]' WHERE id = '$_GET[id]'") === false) {
      if (mysqli_query($mysqli, "UPDATE products SET name = '$_POST[name]', prix = '$_POST[price]', categorie = '$_POST[cat]'  WHERE id = '$_GET[id]'") === false) {
        array_push($error, "Update fail");
      }
      else
        $success = "Produit Ajouté";
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Modifier Produit</title>
  <link rel="stylesheet" type="text/css" href="../layout/admin-post.css">
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
    <h1><a href="index.php"><--Retour</a>Modifier produit : <?php echo getProduct($mysqli, $_GET[id])[name]; ?></h1>
  </header>
  <div class="content">
    <?php if ($error) { ?>
      <div class="mess error">
    <?php readArray($error); ?>
      </div>
    <?php } elseif ($success) {?>
      <div class="mess success">
    <?php echo $success; ?>
      </div>
    <?php } ?>
    <form class="form-style-4" action="" method="post" enctype="multipart/form-data">
      <label>Name : <input type="text" name="name" value="<?php echo getProduct($mysqli, $_GET[id])[name]; ?>"></label>
      <label>Prix : <input type="number" name="price" value="<?php echo getProduct($mysqli, $_GET[id])[prix]; ?>"></label>
      <label>Catégories : <input type="text" name="cat" placeholder="cat1;cat2;cat3..." value="<?php echo getProduct($mysqli, $_GET[id])[categorie]; ?>"></label>
      <input type="submit" name="submit" value="Publier">
    </form>
  </content>
</body>
</html>
