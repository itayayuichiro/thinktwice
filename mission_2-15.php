<?php 
    require_once "./db_connect.php";
	$edit_flag = false;
  if (!empty($_POST['name']) && !empty($_POST['comment']) && empty($_POST['edit_num']) ) {
    $d = date('Y/m/d H:i:s');
    $sql = "INSERT INTO `chat` (`name`, `comment`, `password`, `created_at`) VALUES (\"{$_POST['name']}\",\"{$_POST['comment']}\",\"{$_POST['password']}\", \"{$d}\");";
    $result = mysql_query($sql);
  }else if(!empty($_POST['name']) && !empty($_POST['comment']) && !empty($_POST['edit_num'])){
    $sql = "select * from chat where id = {$_POST['edit_num']}";
    $result = mysql_query($sql);
    $content = mysql_fetch_row($result);
    if ($_POST['password']  == $content[3]) {
        $sql = "update chat set name = \"{$_POST['name']}\",comment = \"{$_POST['comment']}\" where id = {$_POST['edit_num']}";
        echo "更新しました<br>";
        $result = mysql_query($sql);
    }else{
        echo "パスワードが違うため、編集に失敗しました。<br>";
    }
  }else if (empty($_POST['name']) && empty($_POST['comment']) && !empty($_POST['del_number'])) {

    $sql = "delete from chat where id = {$_POST['del_number']}";
    $result = mysql_query($sql);
  }else if(empty($_POST['name']) && empty($_POST['comment']) && empty($_POST['del_number']) && !empty($_POST['edit_id'])){
    $sql = "select * from chat where id = {$_POST['edit_id']}";
    $result = mysql_query($sql);
    $row = mysql_fetch_row($result);
    $edit_id = $row[0];
	$name_text = $row[1];
	$comment_text = $row[2];
	$password_text = $row[3];
	$edit_flag =true;
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
<h1>簡易掲示板</h1>
	<?php 
        $sql = "select * from chat";
        $result = mysql_query($sql);
        while ($content = mysql_fetch_row($result)) {
        	echo $content[0]." 名前 : ".$content[1]." ".$content[4]."<br>";
        	echo $content[2]."<br>";
    ?>
            <form action="./mission_2-15.php" method="post" accept-charset="utf-8" >
                <input type="hidden" name="edit_id" value="<?php echo $content[0]; ?>">
                [<input type="submit" name="" value="編集">]
            </form>
            <form action="./mission_2-15.php" method="post" accept-charset="utf-8" id="del_form_<?php echo $content[0] ?>">
                <input type="hidden" name="del_number" value="<?php echo $content[0] ?>" placeholder="">
                [<input type="button" name="" value="削除" onclick="kakunin('<?php echo $content[0] ?>')">]
            </form>

    <?php
        	echo "<hr>";
        }

	 ?>
     <br>
    入力フォーム<br>
    <?php if (!$edit_flag): ?>
    <form action="./mission_2-15.php" method="post" accept-charset="utf-8">
        名前：<input type="text" name="name" value="" placeholder=""><br>
        コメント：<input type="text" name="comment" value="" placeholder=""><br>
        パスワード：<input type="password" name="password" value="" placeholder=""><br>
        <input type="submit" name="" value="送信">
    </form>
    <?php elseif ($edit_flag): ?>
    <form action="./mission_2-15.php" method="post" accept-charset="utf-8">
        名前：<input type="text" name="name" value="<?php echo $name_text;  ?>" placeholder=""><br>
        コメント：<input type="text" name="comment" value="<?php echo $comment_text;  ?>" placeholder=""><br>
        パスワード：<input type="password" name="password" value="" placeholder=""><br>
        <input type="hidden" name="edit_num" value="<?php echo $edit_id;  ?>">
        <input type="submit" name="" value="送信">
    </form>

    <?php endif ?>
    <script>
        function kakunin(id){
            if(window.confirm('本当にいいんですね？')){
                document.getElementById("del_form_"+id).submit();
            }else{

            }
        }

    </script>
</body>
</html>