<?php
  session_start();
  include('db.php');
  function checkUser($mysqli, $email)
  {
    $query = mysqli_query($mysqli, "SELECT * FROM users WHERE email = '".$email."'");
    $user = mysqli_fetch_array($query);
    if ($user[email] == $email) {
      return (1);
    }
    return (0);
  }
  function checkAdmin($mysqli, $id)
  {
    $query = mysqli_query($mysqli, "SELECT * FROM users WHERE id = '".$id."'");
    $user = mysqli_fetch_array($query);
    if ($user[group] == "admin") {
      return (1);
    }
    return (0);
  }

  function getName($mysqli, $id)
  {
    $query = mysqli_query($mysqli, "SELECT * FROM users WHERE id = '".$id."'");
    $user = mysqli_fetch_array($query);
    if ($user) {
      return $user[name];
    }
    return (NULL);
  }

  function getUser($mysqli, $id)
  {
    $query = mysqli_query($mysqli, "SELECT * FROM users WHERE id = '".$id."'");
    $user = mysqli_fetch_array($query);
    if ($user) {
      return $user;
    }
    return (NULL);
  }

  function getTotal($mysqli, $array)
  {
    $nb = 0;
    if (!$array) {
      return (0);
    }
    foreach ($array as $key => $value) {
      $nb = $nb + getProduct($mysqli, $value[id])[prix] * $value[nb];
    }
    return ($nb);
  }

  function readArray($array)
  {
    if (!$array)
      return ;
    foreach ($array as $key => $value) {
        echo "$value<br>";
    }
  }

  function incPanier($array, $id)
  {
    foreach ($array as $key => $value) {
      if ($value[id] == $id)
        $array[$key][nb]++;
    }
    return ($array);
  }

  function delPanier($array, $id)
  {
    foreach ($array as $key => $value) {
      if ($value[id] == $id)
        unset($array[$key]);
    }
    return array_values(array_filter($array));
  }

  function checkPanier($array, $id)
  {
    foreach ($array as $key => $value) {
      if ($value[id] == $id)
        return ($array);
    }
    return (NULL);
  }

  function getProduct($mysqli, $id)
  {
    $query = mysqli_query($mysqli, "SELECT * FROM products WHERE id = '".$id."'");
    if ($query)
      $product = mysqli_fetch_array($query);
    if ($product) {
      return $product;
    }
    return (NULL);
  }

  function showCat($mysqli, $id)
  {
    $query = mysqli_query($mysqli, "SELECT * FROM products WHERE id = '".$id."'");
    $product = mysqli_fetch_array($query);
    if ($product) {
      $cat = explode(';', $product[categorie]);
      foreach ($cat as $key => $value) {
        if ($key > 0)
          echo " - ";
        ?><a href="categorie.php?name=<?php echo $value ?>"><?php echo $value ?></a><?php
      }
    }
  }

  function showCatA($mysqli, $id)
  {
    $query = mysqli_query($mysqli, "SELECT * FROM products WHERE id = '".$id."'");
    $product = mysqli_fetch_array($query);
    if ($product) {
      $cat = explode(';', $product[categorie]);
      foreach ($cat as $key => $value) {
        if ($key > 0)
          echo " - ";
        ?><a href="../categorie.php?name=<?php echo $value ?>"><?php echo $value ?></a><?php
      }
    }
  }
?>
