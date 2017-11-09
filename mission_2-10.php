<?php 
    require_once "./db_connect.php";
    $sql = "show columns FROM chat";
    $result = mysql_query($sql);

    if (!$result) {
        echo "DB Error, could not list tables\n";
        echo 'MySQL Error: ' . mysql_error();
        exit;
    }

    while ($row = mysql_fetch_row($result)) {
        echo "Table: {$row[0]}:{$row[1]}<br>";
    }
    mysql_free_result($result);
 ?>　
