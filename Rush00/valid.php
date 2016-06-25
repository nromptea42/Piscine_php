<?php
  include("include/head.php");
  if (!$_SESSION[id])
    header('location: panier.php');
  if (isset($_SESSION[panier]) && count($_SESSION[panier]) > 0) {
  $panier = [];
  foreach ($_SESSION[panier] as $key => $value) {
    array_push($panier, implode('|', $value));
  }
  $panier = (implode(' ', $panier));

  $query = mysqli_query($mysqli, "INSERT INTO `commands` (`id_user`, `cmd`) VALUES ('".$_SESSION[id]."','".$panier."')");
  $_SESSION[panier] = [];
  header('location: panier.php');
}
?>
