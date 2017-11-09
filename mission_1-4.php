<!DOCTYPE html>
<html>
<head>
  <title>input form</title>
</head>
<body>
  <?php 
  if (!empty($_GET['input_text'])) {
    echo $_GET['input_text']; 
  }
  ?>
  <form action="./mission_1-4.php" method="get" accept-charset="utf-8">
    <input type="text" name="input_text" value="" placeholder="">  
    <input type="submit" name="" value="">
  </form>
</body>
</html>