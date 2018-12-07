
<?php
	session_start();
	include("../koneksi.php");
	function cekpass($pass,$passVer){
		$cocok=false;
		if(md5($pass) == md5($passVer)){
			$cocok=true;
		}
		return $cocok;
	}
	function isicoba($namm){
		$UsrLgn = $namm;
	}
	
	$usr_Id="";$usr_lgn="";$usr_nam="";$usr_pw="";$usr_JK="";$usr_Telp="";$usr_Alm="";$usr_ttl="";
	if(isset($_SESSION['UserLogin']) && $_SESSION['UserLogin'] !=""){
		$UsrLgn=$_SESSION['UserLogin'];
		$sql="select * from user where UserLogin='$UsrLgn'";
		$result=$conn->query($sql);
		
		
		if($result->num_rows>0){
			while($row=$result->fetch_assoc()){
				$usr_Id=$row["IdUser"];
				$usr_lgn=$row['UserLogin'];
				$usr_nam=$row["NamaUser"];
				$usr_pw=$row["PasswordUser"];
				$usr_JK=$row["JenisKelamin"];
				$usr_Telp=$row["NoTelp"];
				$usr_Alm=$row["Alamat"];
				$usr_ttl=$row["TanggalLahir"];
			}
		}
		else{
			echo " 0 result";
		}
	}
	else{
		header("location:login.php");
	}
	
	
	$IdUser="";//<-- ini gak boleh dihapus
	
	
	$conn->close();
	
	//5486718b3496396344b004e2fb6eabda
?>

<html>
	<head>
		<title>Edit User</title>
		<script type="text/javascript">
		function checkpass(){
			var pas=document.getElementsByName('passUser_pass')[0].value;
			var verif=document.getElementsByName('passUser_verif')[0].value;
			if(pas == verif){
				document.getElementsByName('upd_btn')[0].disabled=false;
				document.getElementById('verifk').innerHTML="Cocok";
				document.getElementById('verifk').style.color="Green";
			}
			else{
				document.getElementsByName('upd_btn')[0].disabled=true;
				document.getElementById('verifk').style.color="Red";
				document.getElementById('verifk').innerHTML="tidak Cocok!";
			}
		}
		</script>
	</head>
	<body>
		
		<a href="index.php">Kembali</a>
		<h3 align="center">Edit User</h3>
		
		<form method="post" action="update.php">
			<fieldset><legend>Edit User</legend>
			<?php echo "<label> Id User : </label>".$usr_Id."<br><br>";?>
			<label> Nama User Login : </label> <span id="nmUsrLgn"><?php echo $usr_lgn;?></span> <input type="hidden" disabled name="nmUsrLgn_txt" value="<?php echo $usr_lgn; ?>"/><br><br>
			<label>Nama : </label><input type="text" value="<?php echo $usr_nam;?>" placeholder="Nama" name="nmaUser_txt" size="15" required /><br><br>
			<label>Password : </label><input type="password" onkeyup="checkpass()" value="" placeholder="Password" name="passUser_pass" size="15" required /><br><br>
			<label>Password Verify : </label><input type="password" value="" onkeyup="checkpass()" placeholder="Password Verifikasi" name="passUser_verif" required />
			<span id="verifk"></span><br><br>
			<label>Jenis Kelamin : </label><input type="radio" value="L" placeholder="Jenis Kelamin" name="Jk_rbt" required <?php if($usr_JK=="L")echo'checked="checked"';?> />Laki-laki
			<input type="radio" value="P" placeholder="Jenis Kelamin" name="Jk_rbt" required <?php if($usr_JK=="P")echo'checked="checked"';?>/>Perempuan<br><br>
			
			<label>No. Telpon : </label><input type="text" value="<?php echo $usr_Telp;?>" placeholder="Telephone Number" name="NoTelp_txt" required /><br><br>
			<label>Alamat : </label><input type="text" value="<?php echo $usr_Alm;?>" size="50" placeholder="Alamat" name="Alamat_txt" required /><br><br>
			<label>Tanggal Lahir : </label><input type="date" value="<?php echo $usr_ttl;?>" name="ttl_date" required /><br><br>
			<input type="submit" value="Update" name="upd_btn" size="10"/>&nbsp;&nbsp;<input type="reset" value="Reset" name="rst_btn" size="10"/>
			</fieldset>
		</form>
		
	</body>
</html>