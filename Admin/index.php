
<?php
	session_start();
	include("../koneksi.php");
	$pesn="";$pesn2="";
	if(isset($_SESSION['AdminLogin'])){
		if($_SESSION['AdminLogin']!=""){
			$admlgn=$_SESSION['AdminLogin'];
			$sql="select * from admin where AdminLogin='$admlgn'";
			$result=$conn->query($sql);
			
			$nm_admin="";
			if($result->num_rows>0){
				while($row=$result->fetch_assoc()){
					$nm_admin=$row["NamaAdmin"];
				}
			}
			else{
				echo " 0 result";
			}
			$pesn=$nm_admin;
			
			if(isset($_GET['psn'])){
				$pesn2=$_GET['psn'];
			}
		}
		else{
			header("location:Login.php?psn=logindulu");
		}
		
	}
	else{
		header("location:Login.php?psn=logindulu");
	}
	
	$conn->close();
?>

<html>
	<head>
		<title>Halaman Admin</title>
		<style type="text/css">
			#pesan2{
				color:Yellow;
			}
			#pesan{
				color:Green;
			}
		</style>
	</head>
	<body>
		<span id="pesan2"><?php echo $pesn2?></span>
		<h3 align="center">Halo Selamat Datang,&nbsp;<span id="pesan"><?php echo $pesn?></span></h3>
		<a href="logout.php">Logout</a>
		<br><a href="UpdateAdmin.php">Edit Akun</a><br><a href="registerAdmin.php">Register Admin</a>
		<br><a href="DaftarMenu.php">Daftar Menu</a>
		
	</body>
</html>