<?php 
    require_once "./db_connect.php";
    $sql = "INSERT INTO `chat` (`id`, `name`, `comment`, `password`, `created_at`) VALUES (2, 'itaya', 'com1', '111', '2017-08-13 04:00:00');";
    $result = mysql_query($sql);
    mysql_free_result($result);
 ?>　
