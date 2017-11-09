<?php 
	error_reporting(E_ALL);
	$edit_flag = false;
  if (!empty($_POST['name']) && !empty($_POST['comment']) && empty($_POST['edit_num']) ) {
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
    fwrite($fp, $id."<>" .$_POST['name']."<>".$_POST['comment']."<>".$_POST['password']."<>".date('Y/m/d H:i:s')."<>". PHP_EOL);
    fclose($fp);
  }else if(!empty($_POST['name']) && !empty($_POST['comment']) && !empty($_POST['edit_num'])){
  	$filename = "memo.txt";
    $array = file($filename);
    $new_text = "";
    for ($i=0; $i < count($array); $i++) { 
    	$content =  explode("<>",$array[$i]);
    	if ($content[0] == $_POST['edit_num'] && $_POST['password'] == $content[3]) {
    		$new_text = $new_text . $content[0]."<>" .$_POST['name']."<>".$_POST['comment']."<>".$content[3]."<>".$content[4]."<>". PHP_EOL;
    	}else if($content[0] == $_POST['edit_num'] && $_POST['password'] != $content[3]){
    		echo "パスワードが違うため、編集に失敗しました。<br>";
    		$new_text = $new_text . $content[0]."<>" .$content[1]."<>".$content[2]."<>".$content[3]."<>".$content[4]."<>". PHP_EOL;
    	}else{
    		$new_text = $new_text . $content[0]."<>" .$content[1]."<>".$content[2]."<>".$content[3]."<>".$content[4]."<>". PHP_EOL;
    	}
    }
    $fp = fopen($filename,'w');
	fwrite($fp, $new_text);
    fclose($fp);
  }else if (empty($_POST['name']) && empty($_POST['comment']) && !empty($_POST['del_number'])) {
	$filename = "memo.txt";
    $array = file($filename);
    $new_text = "";
    for ($i=0; $i < count($array); $i++) { 
    	$content =  explode("<>",$array[$i]);
    	if ($content[0] != $_POST['del_number']) {
    		$new_text = $new_text . $content[0]."<>" .$content[1]."<>".$content[2]."<>".$content[3]."<>".$content[4]."<>". PHP_EOL;
    	}
    }
    $fp = fopen($filename,'w');
	fwrite($fp, $new_text);
    fclose($fp);
  }else if(empty($_POST['name']) && empty($_POST['comment']) && empty($_POST['del_number']) && !empty($_POST['edit_id'])){
  	$filename = "memo.txt";
    $array = file($filename);
    $new_text = "";
    for ($i=0; $i < count($array); $i++) { 
    	$content =  explode("<>",$array[$i]);
    	if ($content[0] == $_POST['edit_id']) {
    		$edit_id = $content[0];
    		$name_text = $content[1];
    		$comment_text = $content[2];
    		$password_text = $content[3];
    		$edit_flag =true;
    	}
    }
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
	<?php if (!$edit_flag): ?>
	<form action="./mission_2-6.php" method="post" accept-charset="utf-8">
		名前：<input type="text" name="name" value="" placeholder=""><br>
		コメント：<input type="text" name="comment" value="" placeholder=""><br>
		パスワード：<input type="password" name="password" value="" placeholder=""><br>
		<input type="submit" name="" value="送信">
	</form>
	<?php elseif ($edit_flag): ?>
	<form action="./mission_2-6.php" method="post" accept-charset="utf-8">
		名前：<input type="text" name="name" value="<?php echo $name_text;  ?>" placeholder=""><br>
		コメント：<input type="text" name="comment" value="<?php echo $comment_text;  ?>" placeholder=""><br>
		パスワード：<input type="password" name="password" value="" placeholder=""><br>
		<input type="hidden" name="edit_num" value="<?php echo $edit_id;  ?>">
		<input type="submit" name="" value="送信">
	</form>

	<?php endif ?>

	編集フォーム<br>
	<form action="./mission_2-6.php" method="post" accept-charset="utf-8">
		編集したい番号 
		<select name="edit_id">
			<?php 
				$filename = "memo.txt";
		        $array = file($filename);
		        for ($i=0; $i < count($array); $i++) { 
		        	$content =  explode("<>",$array[$i]);
		        	echo $i;
		        ?>
		        <option value="<?php echo $content[0]; ?>"><?php echo $content[0]; ?></option>
		        <?php
		        }
			 ?>
		</select>
		<input type="submit" name="" value="編集">
	</form>
	<?php 
		$filename = "memo.txt";
        $array = file($filename);
        for ($i=0; $i < count($array); $i++) { 
        	$content =  explode("<>",$array[$i]);
        	echo $content[0]." 名前 : ".$content[1]." ".$content[4]."<br>";
        	echo $content[2]."<br>";
        	echo "<hr>";
        }

	 ?>
	 削除フォーム<br>
	 <form action="./mission_2-6.php" method="post" accept-charset="utf-8">
		<input type="number" name="del_number" value="" placeholder="">
		<input type="submit" name="" value="削除依頼">
	 </form>
</body>
</html>