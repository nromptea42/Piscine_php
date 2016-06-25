<?php
include('include/head.php');
if ($_SESSION[id])
  header('location: index.php');
if ($_POST[submit] == "Connexion")
{
  $error = [];
  if (!$_POST[id] || !$_POST[passwd]) {
    array_push($error, "Tout les champs sont obligatoires");
  }
  if (!$error)
  {
    $query = mysqli_query($mysqli, "SELECT * FROM users WHERE email = '".$_POST[id]."' || name = '".$_POST[id]."' && passwd = '".hash('whirlpool', $_POST[passwd])."'");
    $user = mysqli_fetch_array($query);
    if ($user[passwd] == hash('whirlpool', $_POST[passwd])) {
      $_SESSION[id] = $user[id];
      header('location: index.php');
    }
    else {
      array_push($error, "Mauvais mot de passe / User");
    }
  }
}
?>
<html>
<body>

  <?php
  include("layout/header.php");
  include("layout/menu.php");
  ?>
  <div class="content">
    <h1 style="text-align: center">Login</h1>
    <?php readArray($error); ?>
    <br>
    <form action="" method="post">
      Id : <input type="text" name="id" value="<?php echo $_POST[id]; ?>">
      Pass : <input type="password" name="passwd" value="">
      <input type="submit" name="submit" value="Connexion">
    </form>
    <p>Pas de compte ? <a href="create.php">Créer en un</a></p>
  </div>

  <?php include("layout/footer.php"); ?>
</body>
</html>
