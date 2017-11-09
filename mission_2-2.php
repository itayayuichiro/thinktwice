<?php 
  if (!empty($_POST['name']) && !empty($_POST['comment'])) {
    $filename = "memo.txt";
    $fp = fopen($filename,'a+');
    $array = file($filename);
    for ($i=0; $i < count($array); $i++) { 
        $content =  explode("<>",$array[$i]);
        $id = $content[0]+1;
    }
    if ($id == "") {
        $id = 1;
    }
    fwrite($fp, $id."<>" .$_POST['name']."<>".$_POST['comment']."<>".date('Y/m/d H:i:s')."<>". PHP_EOL);
    fclose($fp);
  }

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>入力フォーム</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<form action="./mission_2-2.php" method="post" accept-charset="utf-8">
		名前：<input type="text" name="name" value="" placeholder=""><br>
		コメント<input type="text" name="comment" value="" placeholder=""><br>
		<input type="submit" name="" value="送信">
	</form>
</body>
</html>