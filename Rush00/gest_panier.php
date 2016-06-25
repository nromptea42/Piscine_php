<?php
  include('include/head.php');
  if ($_GET[action] == 'add')
  {
    if (!isset($_SESSION[panier]))
      $_SESSION[panier] = [];
    if (getProduct($mysqli, $_GET[id]))
    {
      if (!checkPanier($_SESSION[panier], $_GET[id])) {
        $product = array(
          'id' => $_GET[id],
          'nb' => 1,
        );
        array_push($_SESSION[panier], $product);
      }
      else {
        $_SESSION[panier] = incPanier($_SESSION[panier], $_GET[id]);
      }
    }
    header('location: index.php');
  }
  if ($_GET[action] == 'del' && isset($_SESSION[panier])) {
    if (checkPanier($_SESSION[panier], $_GET[id])){
      $_SESSION[panier] = delPanier($_SESSION[panier], $_GET[id]);
    }
  header('location: panier.php');
  }
  if ($_GET[action] == 'valid' && isset($_SESSION[panier])) {
    print_r($_SESSION[panier]);
  }
?>
