<?php 
    require_once "./db_connect.php";
    $sql = "select * from chat";
    $result = mysql_query($sql);
    while ($row = mysql_fetch_row($result)) {
        echo "{$row[0]}:{$row[1]}:{$row[2]}:{$row[3]}:{$row[4]}<br>";
    }
 ?>　
