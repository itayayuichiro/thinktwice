<!DOCTYPE html>
<html>
<head>
  <title>input + </title>
</head>
<body>
  <?php 
  if (!empty($_GET['input_text'])) {
    $filename = "kadai5.txt";
    $fp = fopen($filename,'w');
    fwrite($fp,$_GET['input_text']);
    fclose($fp);
  }
  ?>
  <form action="./mission_1-5.php" method="get" accept-charset="utf-8">
    <input type="text" name="input_text" value="" placeholder="">  
    <input type="submit" name="" value="">
  </form>
</body>
</html>