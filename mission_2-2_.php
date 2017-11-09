<?php
if (!empty($_POST['name'])) {
	$time_filename='counter.txt';
	$fp1=fopen($time_filename,"r+");
	$count=fread($fp1,20);
	$count++;
	fseek($fp1, 0);
	fwrite($fp1,$count);
	fclose($fp1);

	/*filename1='counter.txt';
	$fp1=fopen(filename1,"r+");
	$count=fgets(fp1,32);
	$count++;
	fseek($fp1,0);
	fputs($fp1,$count);
	flock($fp1,LOCK_UN);
	fclose($fp1);*/

	$filename='mission2-2.txt';
	date_default_timezone_set('Asia/Tokyo');
	$fp=fopen($filename,"a");
	$name=htmlspecialchars($_POST['name']);
	$comment=htmlspecialchars($_POST['comment']);

	fwrite($fp,$count);
	fwrite($fp,"<>");
	fwrite($fp,$name);
	fwrite($fp,"<>");
	fwrite($fp,$comment);
	fwrite($fp,"<>");
	fwrite($fp,date("Y/m/d H:i:s", time()));
	fwrite($fp,"\r\n");
	clearstatcache();
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>

<form action="mission_2-2_.php" method="post">
  名前: <input type="text" name="name" />
  コメント: <input type="text" name="comment" />
  <input type="submit" />
</form>

</body>
</html>
