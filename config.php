<?php
	//define('domain', 'http://localhost/qnushare/');	
	
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$dbname = 'qnushare';

	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	mysqli_set_charset($conn, 'UTF8');

	date_default_timezone_set('Asia/Ho_Chi_Minh'); 
	$date_current = '';
	$date_current = date("Y-m-d H:i:sa");
?>