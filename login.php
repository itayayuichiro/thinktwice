<?php 
    require_once "./db_connect.php";
    if (!empty($_POST['login_id']) && !empty($_POST['login_pass'])) {
    	$sql = "select * from users where id = '{$_POST['login_id']}' and password = '{$_POST['login_pass']}' and flag = 1";
	    $result = mysql_query($sql);
	    $row = mysql_fetch_row($result);
	    if (!empty($row)) {
	    	setcookie("login", 1);
	    	setcookie("name", $row[2]);
			$login = true;
    		$name = $row[2];
 			echo "<script>location.href='./board.php'</script>";
	    }
    }
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>入力フォーム</title>
	<link rel="stylesheet" href="./bootstrap.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

</head>
<body>
<div class="container">
	<h1>簡易掲示板</h1>
			<h1>ログインしてください</h1>
		    <form action="./login.php" method="post" accept-charset="utf-8">
		        名前：<input type="text"  class="form-control" name="login_id" value="" placeholder=""><br>
		        パスワード：<input type="password"  class="form-control" name="login_pass" value="" placeholder=""><br>
		        <button type="submit" class="btn btn-primary">ログイン</button>
		    </form>
		    <a href="./new.php">新規登録</a>
		   
  </div>
</body>
<style>
	
</style>
</html>