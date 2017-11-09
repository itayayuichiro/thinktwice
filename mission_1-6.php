<!DOCTYPE html>
<html>
<head>
  <title>input form</title>
</head>
<body>
  <?php 
  if (!empty($_GET['input_text'])) {
    $filename = "kadai6.txt";
    $fp = fopen($filename,'a');
    fwrite($fp, $_GET['input_text'] . PHP_EOL);
    fclose($fp);
  }
  ?>
  <form action="./mission_1-6.php" method="get" accept-charset="utf-8">
    <input type="text" name="input_text" value="" placeholder="">  
    <input type="submit" name="" value="">
  </form>
</body>
</html>