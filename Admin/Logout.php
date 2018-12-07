<?php
	session_start();
	$_SESSION['AdminLogin']="";
	header("location:Login.php");
?>