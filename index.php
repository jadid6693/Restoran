<?php
	session_start();
	include("koneksi.php");
	
	$sql = "SELECT * FROM menu";
	$result = $conn->query($sql);
	
	$arr_menu=[];
	if ($result->num_rows > 0) {
    // output data of each row
		while($row = $result->fetch_assoc()) {
			$arr_menu[]=array($row['IdMenu'],$row['IdJenis'],$row['JudulMenu'],$row['Harga'],$row['NamaGambar'],$row['status']);
		}
	} else {
		echo "0 results";
	}
	$conn->close();
?>
<html>
	<head> <title>RestOn</title> 
	
	</head>
	
	<body> 
		<div style="width:100%;">
			<div style="background-color:4190B6;width:50%;height:100px;float:left;">
				<p style="font-family:BlackChancery;text-align:left;font-size:50pt;color:white;margin-left:20px;margin-top:5px;">Resto-Online</p>

			    
			</div>
			
			<div style="background-color:4190B6;width:50%;height:100px;float:left;">
				<a href="User/login.php" ><input type="button" value="Login" name="login_btn" style="width:100px;height:50px;font-size:15pt;position:relative;float:right;margin-top:25px;margin-right:10px;background-color:41C1B6;color:white"></a>
			</div>
			
		</div>
		<div style="width:100%;">
			<div style="background-color:E8DDD2;width:30%;float:left;height:300px;">
						<img src="menu/ayam-bakar.jpg" style="max-width:100%;height:250px;margin-top:20px;margin-left:10px;">
						
			</div>
			
			<div style="background-color:E8DDD2;width:50%;float:left;height:300px;">
						<p style="font-size:15pt;text-indent:20px;text-align:justify;">Selamat datang di web Resto-On disini anda bisa memesan berbagai makanan, dan minuman.Resto kami menerima pemesanan secara offline 
						dan bisa anda kunjungi di Jl Sumatra no 85. disini kami menawarkan berbagai promo yang bisa membuat anda merasa puas dengan pelayanan 
						yang kami berikan. </p>
						<p style="font-size:15pt;text-indent:20px;text-align:justify;">	Untuk bisa berbelanja disini anda perlu login terlebih dahulu dengan cara klik tombol login, setelah login anda baru bisa berbelanja
						disini , Apabila anda belum memiliki akun anda bisa menekan tombol login lalu pilih buat akun baru. Selamat berbelanja di Resto-Online kami.
						</p>
			</div>
			
			<div style="background-color:E8DDD2;width:20%;float:left;height:300px;text-align:right;">
					
					<input type="button" value="Lihat Menu" name="menu_btn" style="width:200px;height:50px;font-size:15pt;position:relative;margin-top:25px;margin-right:10px;background-color:41C1B6;color:white">
					<input type="button" value="Lihat Daftar Belanja" name="list_btn" style="width:200px;height:50px;font-size:15pt;position:relative;margin-top:25px;margin-right:10px;background-color:41C1B6;color:white">				</div>		
		</div>
		<div style="width:100%;">
				
					<?php
					for($i=0;$i<count($arr_menu);$i++){
					echo "<div style='background-color:E8DDD2;width:20%;float:left;height:300px;text-align:right;margin-top:5px;'>";
						
					echo "<img src='menu/".$arr_menu[$i][4]."'   style='width:270px;height:170px;margin-top:30px;margin-right:30px;margin-left:10px;'/>";
					echo		"<h3 style='text-align:center;'>".$arr_menu[$i][2]."</h3><p style='text-align:center;'>Rp. ".number_format($arr_menu[$i][3])."</p>";
					echo "</div>";
					}
					
					?>
					
		</div>
		
		<div style="width:100%;">
				<div style="margin-top:5px;width:100%;background-color:00518B;height:100px;float:left;text-align:center;color:white;">
					<p>&copy; 2018 - <?php echo date("Y"); ?></p>
				</div>
		</div>
	</body>
</html> 