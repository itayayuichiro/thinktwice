<?php 
    require_once "./db_connect.php";
    if (!empty($_POST['name']) && !empty($_POST['password'])) {
	    $id = uniqid("ID");
	    $sql  = "INSERT INTO users(id,password,name) VALUES ('".$id."','".$_POST['password']."','".$_POST['name']."');";
	    $result = mysql_query($sql);
	    $login = true;
	    setcookie("login", 1);
    	setcookie("name", $_POST['name']);
    }else{
	    $login = false;
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
 <?php 
 	if ($login == false) {
?>
<h1>簡易掲示板</h1>
    新規登録フォーム<br>
    <form action="./mission_3-6.php" method="post" accept-charset="utf-8">
        名前：<input type="text" name="name" value="" placeholder=""><br>
        パスワード：<input type="password" name="password" value="" placeholder=""><br>
        <input type="submit" name="" value="送信">
    </form>
<?php
 	}else{
 		$sql  = "select * from users where id ='".$id."'";
 		 $result = mysql_query($sql);
	    $row = mysql_fetch_row($result);
	    #print_r($row);
 ?>
    登録情報<br>
    ID:<?php echo $row[0]; ?><br>
    name:<?php echo $row[1]; ?><br>
    パスワード:<?php echo $row[2]; ?><br>
    <a href="./">戻る</a>
<?php
 		
 	}
 ?>

</body>
</html>
