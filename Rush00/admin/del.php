<?php
  include('../include/head.php');
  if ($_GET[type] == 'prod' && $_GET[id] && checkAdmin($mysqli, $_SESSION[id]))
  {
    if (getProduct($mysqli, $_GET[id])[img] != "img/nocar.png") {
      if (file_exists(getProduct($mysqli, $_GET[id])[img]))
        unlink("../".getProduct($mysqli, $_GET[id])[img]);
    }
    $query = mysqli_query($mysqli, "DELETE FROM products WHERE id = '$_GET[id]'");
    header('location: products.php');
  }
  if ($_GET[type] == 'user' && $_GET[id] && ($_SESSION[id] == $_GET[id] || checkAdmin($mysqli, $_SESSION[id])))
  {
    $query = mysqli_query($mysqli, "DELETE FROM users WHERE id = '$_GET[id]'");
    if ($_SESSION[id] == $_GET[id]) {
      header('location: logout.php');
    }
    else {
      header('location: users.php');
    }
  }
  else {
    echo "NOP";
  }
?>
