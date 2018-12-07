<?php
	session_start();
	include("../koneksi.php");//c1748cef0ad084aa2265c358957bbfe6 -> md5=restosuper
	function cekpass($pass,$passVer){
		$cocok=false;
		if(md5($pass) == md5($passVer)){
			$cocok=true;
		}
		return $cocok;
	}
	$hasil="";
	if(isset($_SESSION['AdminLogin']) && $_SESSION['AdminLogin'] !=""){
		if(isset($_POST['upd_btn'])){
			if($_POST['JdlMenu_txt'] != "" && $_POST['passAdmin_pass'] != "" && $_POST['NoTelp_txt'] != "" && $_POST['Alamat_txt'] != "" && $_POST['ttl_date'] != ""){
			
				$cocok=cekpass($_POST['passAdmin_pass'],$_POST['passAdmin_verif']);
				if($cocok){
					
					$namadmin=$_POST['nmaAdmin_txt'];
					$AdmLgn=$_SESSION['AdminLogin'];
					$passadmin=md5($_POST['passAdmin_pass']);
					$Jk=$_POST['Jk_rbt'];
					$telpadmin=$_POST['NoTelp_txt'];
					$almadmin=$_POST['Alamat_txt'];
					$ttladmin=$_POST['ttl_date'];
				}
				
				$sql="update menu set NamaAdmin='$namadmin',PasswordAdmin='$passadmin',JenisKelamin='$Jk',NoTelp='$telpadmin',Alamat='$almadmin',TanggalLahir='$ttladmin' where AdminLogin='$AdmLgn'";
				$result=$conn->query($sql);
				if($result){$hasil="berhasil disimpan";}
				else{$hasil="gagal disimpan ";}
			}
			else{
				header('location:UpdateAdmin.php?psn=isidulu');
			}
		}
		if($_SESSION['AdminLogin'] != ""){
			header('location:index.php?psn='.$hasil);
		}
		else{
			header('location:Login.php?psn=logintidakCocok');
		}
	}
	else{
		header('location:Login.php?psn=logindulu');
	}
	
	
	$conn->close();
?>