<?php
	session_start();
	$_SESSION['UserLogin']="";
	header("location:Login.php");
?>