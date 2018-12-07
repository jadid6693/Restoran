
<?php
	session_start();
	include("../koneksi.php");
	$pesn="";
	if(isset($_SESSION['UserLogin'])){
		
	}
	else{
		$_SESSION['UserLogin']="";
	}
	if(isset($_GET['psn'])){
		$pesn=$_GET['psn'];
	}
	
?>

<html>
	<head>
		<title>Login User</title>
		<style type="text/css">
			#pesan{
				color:red;
			}
		</style>
	</head>
	<body>
		<h3 align="center">Halaman Login</h3>
		<span id="pesan"><?php echo $pesn?></span>
		<a href="../index.php">Kembali</a>
		<form name="form1" method="post" action="ceklogin.php">
			<fieldset><legend>Login User</legend>
			<label>Nama User Login: </label><input type="text" value="" placeholder="Nama" name="nmaUserLgn_txt" size="15" required /><br><br>
			<label>Password : </label><input type="password" value="" placeholder="Password" name="passUser_pass" size="15" required /><br><br>
			<input type="submit" value="Login User" name="lgn_btn" size="10"/>&nbsp;&nbsp;<input type="reset" value="Reset" name="rst_btn" size="10"/>
			</fieldset>
		</form>
		<form method="post" action="registerUser.php">
			<input type="submit" value="Register" name="regis_btn" size="10"/>
		</form>
	</body>
</html>