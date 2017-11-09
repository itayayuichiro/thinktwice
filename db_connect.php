<?php 
	#error_reporting(E_ALL);
#	$link = mysql_connect('mysql451.db.sakura.ne.jp', 'ity-y', 'rushiruerisu4385');
#	$link = mysql_connect('localhost', 'co-778.it.3919.c', '9UI6tEwe');
	$link = mysql_connect('127.0.0.1', 'root', '');
#	$db_selected = mysql_select_db('ity-y_youtuber', $link);
	$db_selected = mysql_select_db('think_db', $link);
	mysql_query("set names utf8",$link); 
#	mysql_close($link);
 ?>