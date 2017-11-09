<?php
$filename = "kadai2.txt";

//echo "Hello World";
$fp = fopen($filename,'w');

fwrite($fp,'test');

fclose($fp);
 ?>
