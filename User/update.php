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
	if(isset($_SESSION['UserLogin']) && $_SESSION['UserLogin'] !=""){
		if(isset($_POST['upd_btn'])){
			if($_POST['nmaUser_txt'] != "" && $_POST['passUser_pass'] != "" && $_POST['NoTelp_txt'] != "" && $_POST['Alamat_txt'] != "" && $_POST['ttl_date'] != ""){
			
				$cocok=cekpass($_POST['passUser_pass'],$_POST['passUser_verif']);
				if($cocok){
					
					$namuser=$_POST['nmaUser_txt'];
					$UsrLgn=$_SESSION['UserLogin'];
					$passuser=md5($_POST['passUser_pass']);
					$Jk=$_POST['Jk_rbt'];
					$telpuser=$_POST['NoTelp_txt'];
					$almuser=$_POST['Alamat_txt'];
					$ttluser=$_POST['ttl_date'];
				}
				
				$sql="update user set NamaUser='$namuser',PasswordUser='$passuser',JenisKelamin='$Jk',NoTelp='$telpuser',Alamat='$almuser',TanggalLahir='$ttluser' where UserLogin='$UsrLgn'";
				$result=$conn->query($sql);
				if($result){$hasil="berhasil disimpan";}
				else{$hasil="gagal disimpan ";}
			}
			else{
				header('location:UpdateUser.php?psn=isidulu');
			}
		}
		if($_SESSION['UserLogin'] != ""){
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