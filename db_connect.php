<?php
	$dbhost = 'my.dbhost.com';
	$dbuser = 'username';
	$dbpass = 'password';
	$link = mysqli_connect($dbhost, $dbuser, $dbpass) or die ('cannot connect to db : ' . mysqli_error($link));
	$dbname = 'queuedb';
	mysqli_select_db($link, $dbname);
?>