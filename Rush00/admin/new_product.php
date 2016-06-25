<?php
  include('../include/head.php');

  $ext = array('jpg','gif','png','jpeg');
  $uploads_dir = '../img';
  if (!checkAdmin($mysqli, $_SESSION[id]))
    header('location: ../index.php');
  if ($_POST[submit] == "Publier")
  {
    $error = [];
    if (!$_POST[name] || !$_POST[price] || !$_POST[cat] || !$_POST[desc]) {
      array_push($error, "Tout les champs sont obligatoires");
    }
    else {
      if (!preg_match("/^[A-z0-9 ]+$/", $_POST[name])) {
        array_push($error, "Nom: Mauvais Format");
      }
      if (!preg_match("/^[A-z0-9;]+$/", $_POST[cat])) {
        array_push($error, "Catégories: Mauvais format");
      }
      if (!preg_match("/^[A-z 0-9.-]+$/", $_POST[desc])) {
        array_push($error, "Description: Mauvais format");
      }
    }
    if (!empty($_FILES[fichier][name]))
    {
      $link = "img/".$_FILES[fichier][name];
      if(in_array(strtolower(pathinfo($_FILES['fichier']['name'], PATHINFO_EXTENSION)),$ext)) {
        $name = $_FILES[fichier][name];
        if(!move_uploaded_file($_FILES[fichier][tmp_name], "$uploads_dir/$name")) {
          array_push($error, "Erreur Upload Image");
        }
      }
    }
    else {
      $link = "img/nocar.png";
    }
    if (!$error) {
      $query = mysqli_query($mysqli, "INSERT INTO `products` (`name`, `prix`, `categorie`, `desc`, `img`)
        VALUES ('".$_POST[name]."', '".$_POST[price]."', '".$_POST[cat]."', '".$_POST[desc]."', '".$link."')");
      $success = "Produit Ajouté";
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Ajouter un Produit</title>
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
    <h1><a href="index.php"><--Retour</a>Ajouter un Produit</h1>
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
      <label>Name : <input type="text" name="name" value="<?php echo $_POST[name]; ?>"></label>
      <label>Prix : <input type="number" name="price" value="<?php echo $_POST[price]; ?>"></label>
      <label>Catégories : <input type="text" name="cat" placeholder="cat1;cat2;cat3..." value="<?php echo $_POST[cat]; ?>"></label>
      <label>Description : <input type="text" name="desc"></label>
      <input name="fichier" type="file" value=""/>
      <input type="submit" name="submit" value="Publier">
    </form>
  </content>
</body>
</html>
