<?php
$mysqli = mysqli_connect('localhost', 'user', 'pass');

mysqli_query($mysqli, "CREATE DATABASE IF NOT EXISTS `ecommerce` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci");

$mysqli = mysqli_connect('localhost', 'user', 'pass', 'ecommerce');

mysqli_query($mysqli, "CREATE TABLE `commands` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `cmd` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1");

mysqli_query($mysqli, "CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `desc` varchar(500) NOT NULL,
  `categorie` varchar(100) NOT NULL,
  `prix` int(11) NOT NULL,
  `img` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1");

mysqli_query($mysqli, "CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `passwd` varchar(150) NOT NULL,
  `group` varchar(10) NOT NULL DEFAULT 'user',
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1");

mysqli_query($mysqli, "INSERT INTO `users` (`id`, `name`, `email`, `passwd`, `group`, `img`) VALUES
(1, 'Lucas', 'lscariot@student.42.fr', '344907e89b981caf221d05f597eb57a6af408f15f4dd7895bbd1b96a2938ec24a7dcf23acb94ece0b6d7b0640358bc56bdb448194b9305311aff038a834a079f', 'admin', 'http://www.game-of-thrones.fr/wp-content/uploads/2014/04/dragon-adulte-gameofthrones.jpg'),
(2, 'nromptea', 'nromptea@student.42.fr', 'f7183c75bd8920a6955b227cab113c5f985af3bbe346d48359743ea81949e3c3ed99c5d2c6b921e09f7a27a1a97811146fb678305b98cfd71ca3542126ff2bbe', 'admin', 'http://femininisrael.com/wp-content/uploads/2015/05/signe-du-taureau.png')
");

mysqli_query($mysqli, "INSERT INTO `products` (`id`, `name`, `desc`, `categorie`, `prix`, `img`) VALUES
(1, 'Tesla', '...', 'sportive;electrique;familiale', 120599, 'img/tesla.png'),
(2, 'Renault', '...', 'familiale;lent', 14989, 'img/renault.png');");


mysqli_query($mysqli, "ALTER TABLE `commands`
  ADD PRIMARY KEY (`id`)");

mysqli_query($mysqli, "ALTER TABLE `products`
  ADD PRIMARY KEY (`id`)");

mysqli_query($mysqli, "ALTER TABLE `users`
  ADD PRIMARY KEY (`id`)");

mysqli_query($mysqli, "ALTER TABLE `commands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT");

mysqli_query($mysqli, "ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4");

mysqli_query($mysqli, "ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21");

/*

mysqli_query($mysqli, "");

mysqli_query($mysqli, "");

*/

?>
