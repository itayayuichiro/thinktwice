<?php 
    require_once "./db_connect.php";
    $result = mysql_query('
        CREATE TABLE `chat` (
          `id` int(11) NOT NULL,
          `name` varchar(30) DEFAULT NULL,
          `comment` varchar(100) DEFAULT NULL,
          `password` varchar(30) DEFAULT NULL,
          `created_at` datetime DEFAULT NULL,
          PRIMARY KEY (`id`),
          UNIQUE KEY `id` (`id`)
        ) ENGINE=InnoDB;
    ');

 ?>　
