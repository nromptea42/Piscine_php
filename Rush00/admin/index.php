<?php
  include('../include/head.php');
  if (!checkAdmin($mysqli, $_SESSION[id]))
    header('location: ../index.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../layout/layout.css">
    <title>Administration</title>
  </head>
  <body style="background-image: url('https://i.ytimg.com/vi/F3I0wRGAkxo/maxresdefault.jpg');background-size: 100%;">
  <div style="height:80%;width:50%;position:absolute;left:25%;">
    <div style="height:20%;width:100%;background-color:#909090;border-radius:15px;padding-left:5%;padding-right:5%;vertical-align:middle;">
      <h1 style="text-align:center;font-size:5vmin;color:floralwhite;padding-top:5%;">Administration</h1>
    </div>
    <div style="height:80%;width:100%;background-color:#909090;border-radius:15px;padding-left:5%;padding-right:5%;text-align:center;">
     <h3 style="font-size:4vmin;font-family:Florence,cursive;">Hello <?php echo getName($mysqli, $_SESSION[id]); ?></h3>
      <nav>
        <table id="adm_table">
          <tr><td class="adm_list"><a href="users.php">Users</a></td></tr>
          <tr><td class="adm_list"><a href="products.php">Products</a></td></tr>
          <tr><td class="adm_list"><a href="new_product.php">Add Products</a></td></tr>
          <tr><td class="adm_list"><a href="orders.php">Orders</a></td></tr>
          <tr><td class="adm_list"><a href="../index.php">Retour</a></td></tr>
        </table>
      </nav>
    </div>
  </div>
  </body>
