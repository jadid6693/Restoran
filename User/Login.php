
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
		<h2 align="center">Halaman Login</h2>
		<span id="pesan"><?php echo $pesn?></span>
		<div style="width:50%;height:400px;margin:auto;text-align:center;">
			<form name="form1" method="post" action="ceklogin.php">
			
		  	
				<fieldset style="width:50%;height:200px;margin:auto;background-color:C1E8B7;text-align:left;"><legend>Login User</legend>
				<label style="font-size:15pt;">Nama User Login: </label><input type="text" value="" placeholder="Nama" name="nmaUserLgn_txt" size="15" style="font-size:15pt;"required /><br><br>
				<label style="font-size:15pt;">Password : </label><input type="password" value="" placeholder="Password" name="passUser_pass" size="15" style="font-size:15pt;" required /><br><br>
				<input type="submit" value="Login User" name="lgn_btn" size="15" style="font-size:15pt;"/>&nbsp;&nbsp;<input type="reset" value="Reset" name="rst_btn" size="15"style="font-size:15pt;"/>
				</fieldset>
				
			</form>
			<form method="post" action="registerUser.php">
				<input type="submit" value="Register" name="regis_btn" size="15" style="font-size:15pt;"/>
			</form>
		</div>
	</body>
</html>