<?php 
$dbname = 'co_778_it_3919_com';

if (!mysql_connect('localhost', 'co-778.it.3919.c', '9UI6tEwe')) {
    echo 'Could not connect to mysql';
    exit;
}

$sql = "SHOW TABLES FROM $dbname";
$result = mysql_query($sql);

if (!$result) {
    echo "DB Error, could not list tables\n";
    echo 'MySQL Error: ' . mysql_error();
    exit;
}

while ($row = mysql_fetch_row($result)) {
    echo "Table: {$row[0]}<br>";
}

mysql_free_result($result);

 ?>　
