
<?php
	session_start();
	include("../koneksi.php");
	$pesn="";
	if(isset($_SESSION['AdminLogin']) && $_SESSION['AdminLogin']!="" ){
		header("location:index.php");
	}
	else{
		$_SESSION['AdminLogin']="";
	}
	if(isset($_GET['psn'])){
		$pesn=$_GET['psn'];
	}
	
?>

<html>
	<head>
		<title>Login Admin</title>
		<style type="text/css">
			#pesan{
				color:red;
			}
		</style>
	</head>
	<body>
		<a href="../index.php">Kembali Ke Utama</a>
		<h3 align="center">Halaman Login</h3>
		<span id="pesan"><?php echo $pesn?></span>
		<form name="form1" method="post" action="ceklogin.php">
			<fieldset><legend>Login Admin</legend>
			<label>Nama Admin Login: </label><input type="text" value="" placeholder="Nama" name="nmaAdminLgn_txt" size="15" required /><br><br>
			<label>Password : </label><input type="password" value="" placeholder="Password" name="passAdmin_pass" size="15" required /><br><br>
			<input type="submit" value="Login User" name="lgn_btn" size="10"/>&nbsp;&nbsp;<input type="reset" value="Reset" name="rst_btn" size="10"/>
			</fieldset>
		</form>
		<form method="post" action="registerAdmin.php">
			<input type="submit" value="Register" name="regis_btn" size="10"/>
		</form>
	</body>
</html>