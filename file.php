<?php 
    require_once "./db_connect.php";
    print_r($_POST);
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
		    <form action="./file.php" method="post" accept-charset="utf-8">
		        名前：<input type="text" name="login_id" value="" placeholder=""><br>
		        パスワード：<input type="password" name="login_pass" value="" placeholder=""><br>
				<input type="file" name="ffff"></input>
		        <input type="submit" name="" value="送信">
		    </form>
		    <a href="./mission_3-6.php">新規登録</a>
  </div>
</body>
<style>
	
</style>
</html>