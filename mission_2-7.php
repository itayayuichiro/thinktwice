<?php 
    require_once "./db_connect.php";
    $result = mysql_query('
        CREATE TABLE `test_table` (
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `name` varchar(30) DEFAULT NULL,
          `user_id` varchar(30) DEFAULT NULL,
          `status` int(10) DEFAULT NULL,
          PRIMARY KEY (`id`),
          UNIQUE KEY `id` (`id`)
        ) ENGINE=InnoDB;
    ');

 ?>　