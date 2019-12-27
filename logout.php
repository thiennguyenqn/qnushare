<?php
	require_once 'session.php';
	session_destroy();
	echo '<script> location.href="./";</script>';
?>