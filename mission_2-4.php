<?php 
    echo $_POST['del_number'];
    
  if (!empty($_POST['name']) && !empty($_POST['comment'])) {
    echo $_POST['name'];
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
  }else if (empty($_POST['name']) && empty($_POST['comment']) && !empty($_POST['del_number'])) {
	$filename = "memo.txt";
    $array = file($filename);
    $new_text = "";
    for ($i=0; $i < count($array); $i++) { 
    	$content =  explode("<>",$array[$i]);
    	if ($content[0] != $_POST['del_number']) {
    		$new_text = $new_text . $content[0]."<>" .$content[1]."<>".$content[2]."<>".$content[3]."<>". PHP_EOL;
    	}
    }
    $fp = fopen($filename,'w');
	fwrite($fp, $new_text);
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
	入力フォーム<br>
	<form action="./mission_2-4.php" method="post" accept-charset="utf-8">
		名前：<input type="text" name="name" value="" placeholder=""><br>
		コメント：<input type="text" name="comment" value="" placeholder=""><br>
		<input type="submit" name="" value="送信">
	</form>
	<?php 
		$filename = "memo.txt";
        $array = file($filename);
        for ($i=0; $i < count($array); $i++) { 
        	# code...
        	$content =  explode("<>",$array[$i]);
        	echo $content[0]." ".$content[1]." ".$content[3]."<br>";
        	echo $content[2]."<br>";
        	echo "<hr>";

        }

	 ?>
	 削除フォーム<br>
	 <form action="./mission_2-4.php" method="post" accept-charset="utf-8">
		<input type="number" name="del_number" value="" placeholder="">
		<input type="submit" name="" value="削除依頼">
	 </form>
</body>
</html>