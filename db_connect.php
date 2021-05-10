<?php
	$dbhost = '';
	$dbuser = '';
	$dbpass = '';
	$link = mysqli_connect($dbhost, $dbuser, $dbpass) or die ('cannot connect to db : ' . mysqli_error($link));
	$dbname = '';
	mysqli_select_db($link, $dbname);
?>