
<?php
	session_start();
	include("../koneksi.php");
	$pesn="";$pesn2="";
	if(isset($_SESSION['UserLogin'])){
		if($_SESSION['UserLogin']!=""){
			$usrlgn=$_SESSION['UserLogin'];
			$sql="select * from user where UserLogin='$usrlgn'";
			$result=$conn->query($sql);
			
			$nm_user="";
			if($result->num_rows>0){
				while($row=$result->fetch_assoc()){
					$nm_user=$row["NamaUser"];
				}
			}
			else{
				echo " 0 result";
			}
			$pesn=$nm_user;
			
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
		<title>Halaman User</title>
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
		<br><a href="UpdateUser.php">Edit Akun</a>
		<br><a href="transaksi.php">Lihat Keranjang</a>
		
		
	</body>
</html>