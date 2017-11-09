<!DOCTYPE html>
<html>
<head>
  <title>output</title>
</head>
<body>
  <?php 
    $filename = "kadai6.txt";
    $array = file($filename);
    print_r($array);
  ?>
</body>
</html>