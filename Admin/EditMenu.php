
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
	
	$menu_Id="";$menu_jdl="";$menu_IdJen="";$menu_hrg="";$menu_gbr="";$menu_stat="";$direk="../menu/";$gbrfile="";
	if(isset($_SESSION['AdminLogin']) && $_SESSION['AdminLogin'] !=""){
		if(isset($_GET['idmen'])){
			$menu_Id=$_GET['idmen'];
		}
		else{
			header("location:index.php");
		}
		
		
		$sql="select * from menu where IdMenu=$menu_Id ";
		$result=$conn->query($sql);
		
		
		if($result->num_rows>0){
			while($row=$result->fetch_assoc()){
				$menu_jdl=$row['JudulMenu'];
				$menu_IdJen=$row['IdJenis'];
				$menu_hrg=$row['Harga'];
				$menu_gbr=$row['NamaGambar'];
				$menu_stat=$row['status'];
				$gbrfile=$direk.$menu_gbr;
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
		<title>Edit Menu</title>
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
		<h3 align="center">Edit Menu</h3>
		
		<form method="post" enctype="multipart/form-data" action="updatemenu.php">
			<fieldset><legend>Edit Menu</legend>
			<label> Judul Menu : </label>
			<input type="text" placeholder="Judul Menu" name="JdlMenu_txt" value="<?php echo $menu_jdl; ?>" required /><br><br>
			<label>Jenis Menu : </label><input type="radio" value="1" placeholder="Jenis Menu" name="Jm_rbt" <?php if($menu_IdJen=="1")echo'checked="checked"';?> required />Makanan<input type="radio" value="2" placeholder="Jenis Menu" name="Jm_rbt" required <?php if($menu_IdJen=="2")echo'checked="checked"';?>/>Minuman<br><br>
			<label>Harga Jual: </label><input type="number" value="<?php echo $menu_hrg;?>" placeholder="Harga Jual" name="Hrg_txt" required /><br><br>
			<label>Pilih Gambar : </label><input type="file" name="fileGbr" value="<?php echo $gbrfile;?>"accept=".jpg*" required />
			<span id="verifk"></span><br><br>
			<label>Status : </label><input type="checkbox" value="1" placeholder="Ada" name="stat_ck" <?php if($menu_stat=="1")echo'checked="checked"';?>/>Tampil<br><br>
			<input type="submit" value="Update" name="upd_btn" size="10"/>&nbsp;&nbsp;<input type="reset" value="Reset" name="rst_btn" size="10"/>
			</fieldset>
		</form>
		
	</body>
</html>