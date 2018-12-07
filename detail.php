<?php
	session_start();
	include_once("koneksi.php");
	
	if(isset($_POST['back_btn'])){
		header("location:barang.php");
	}
	if(isset($_POST['beli_btn'])){
		
		$id_baju=$_POST["id_txt"];
		$jumlah=$_POST['jumlah_txt'];
		$index_ses=$_POST['ses_txt'];
		//cek apakah ada idnya di session
		$posisi=-1;
		for($j=0;$j<count($_SESSION['dtrans']);$j++){
			if($id_baju==$_SESSION['dtrans'][$j][0]){
				$posisi=$j;break;
			}
		}
		
		//jika ada disession, ganti jumlah_txt
		if($posisi>-1){$_SESSION['dtrans'][$posisi][1]=$jumlah;}
		else{
			//jika tidak ada disession maka buat baru, susunannya
			//0 -> id
			//1 -> label
			//2 -> keterangan
			//3 -> harga
			//4 -> jumlah
			
		}
	}
	
	if(isset($_GET["id"])){
		$id=$_GET["id"];
		$sql="select * from baju where id=$id";
	}
	$result=$conn->query($sql);
	//arr barang
	
	$barang_id="";
	$barang_label="";
	$barang_keterangan="";
	$barang_harga="";
	$barang_status="";
	//END OF Barang
	
	if($result->num_rows>0){
		while($row=$result->fetch_assoc()){
			
			$barang_id=$row["id"];
			$barang_label=$row["label"];
			$barang_keterangan=$row["keterangan"];
			$barang_harga=$row["harga"];
			$barang_status=$row["status"];
			
			//$cetak=$cetak."id: ".$row["id"]." - Name: ".$row["nama"]." ".$row["roda"]."<br>";
		}
	}
	else{
		echo " 0 result";
	}
	$conn->close();
?>
<html>
	<head>
		<title>P12 Jualan Baju</title>
	</head>
	<body>
		<form method="post">
			<?php
				echo "<h3>".$barang_label."</h3>";
				echo "<img src='images/".$barang_id.".jpg' height='250px'/>";
				echo "<p>".$barang_keterangan."</p>";
				echo "<h4>".$barang_harga."</h4>";
				echo "<hr width='100%'/>";
				//cek apakah ada jumlahnya disession
				$cek=-1;
				for($k=0;$k<count($_SESSION['trans']);$k++){
					if($_SESSION['trans'][$k][0]==$barang_id){
						$cek=$k;break;
					}
				}
				if($cek>-1){echo "<input type='text' value='".$_SESSION['trans'][$cek][1]."' name='cekid_txt' />";}
				else{echo "<input type='text' value='".$_SESSION['trans'][$cek][1]."' name='cekid_txt'/>";}
				
				echo "<input type='text' value='0' name='jumlah_txt'/><br>";
				echo "<input type='submit' value='beli' name='beli_btn'/>&nbsp;&nbsp;&nbsp;";
				echo "<input type='submit' value='kembali ke list' name='back_btn'/>&nbsp;&nbsp;&nbsp;";
				echo "<input type='text' value='".$barang_id."' name='id_txt'/>&nbsp;&nbsp;&nbsp;";
			?>
		</form>
	</body>
</html>