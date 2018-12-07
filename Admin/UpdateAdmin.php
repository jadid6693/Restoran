
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
		$AdmLgn = $namm;
	}
	
	$adm_Id="";$adm_lgn="";$adm_nam="";$adm_pw="";$adm_JK="";$adm_Telp="";$adm_Alm="";$adm_ttl="";
	if(isset($_SESSION['AdminLogin']) && $_SESSION['AdminLogin'] !=""){
		$AdmLgn=$_SESSION['AdminLogin'];
		$sql="select * from admin where AdminLogin='$AdmLgn'";
		$result=$conn->query($sql);
		
		
		if($result->num_rows>0){
			while($row=$result->fetch_assoc()){
				$adm_Id=$row["IdAdmin"];
				$adm_lgn=$row['AdminLogin'];
				$adm_nam=$row["NamaAdmin"];
				$adm_pw=$row["PasswordAdmin"];
				$adm_JK=$row["JenisKelamin"];
				$adm_Telp=$row["NoTelp"];
				$adm_Alm=$row["Alamat"];
				$adm_ttl=$row["TanggalLahir"];
			}
		}
		else{
			echo " 0 result";
		}
	}
	else{
		header("location:login.php");
	}
	
	
	$IdAdmin="";//<-- ini gak boleh dihapus
	
	
	$conn->close();
	
	//5486718b3496396344b004e2fb6eabda
?>

<html>
	<head>
		<title>Edit Admin</title>
		<script type="text/javascript">
		function checkpass(){
			var pas=document.getElementsByName('passAdmin_pass')[0].value;
			var verif=document.getElementsByName('passAdmin_verif')[0].value;
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
		<h3 align="center">Edit Admin</h3>
		
		<form method="post" action="update.php">
			<fieldset><legend>Edit Admin</legend>
			<?php echo "<label> Id Admin : </label>".$adm_Id."<br><br>";?>
			<label> Nama Admin Login : </label> <span id="nmAdmLgn"><?php echo $adm_lgn;?></span> <input type="hidden" disabled name="nmAdmLgn_txt" value="<?php echo $adm_lgn; ?>"/><br><br>
			<label>Nama : </label><input type="text" value="<?php echo $adm_nam;?>" placeholder="Nama" name="nmaAdmin_txt" size="15" required /><br><br>
			<label>Password : </label><input type="password" onkeyup="checkpass()" value="" placeholder="Password" name="passAdmin_pass" size="15" required /><br><br>
			<label>Password Verify : </label><input type="password" value="" onkeyup="checkpass()" placeholder="Password Verifikasi" name="passAdmin_verif" required />
			<span id="verifk"></span><br><br>
			<label>Jenis Kelamin : </label><input type="radio" value="L" placeholder="Jenis Kelamin" name="Jk_rbt" required <?php if($adm_JK=="L")echo'checked="checked"';?> />Laki-laki
			<input type="radio" value="P" placeholder="Jenis Kelamin" name="Jk_rbt" required <?php if($adm_JK=="P")echo'checked="checked"';?>/>Perempuan<br><br>
			
			<label>No. Telpon : </label><input type="text" value="<?php echo $adm_Telp;?>" placeholder="Telephone Number" name="NoTelp_txt" required /><br><br>
			<label>Alamat : </label><input type="text" value="<?php echo $adm_Alm;?>" size="50" placeholder="Alamat" name="Alamat_txt" required /><br><br>
			<label>Tanggal Lahir : </label><input type="date" value="<?php echo $adm_ttl;?>" name="ttl_date" required /><br><br>
			<input type="submit" value="Update" name="upd_btn" size="10"/>&nbsp;&nbsp;<input type="reset" value="Reset" name="rst_btn" size="10"/>
			</fieldset>
		</form>
		
	</body>
</html>