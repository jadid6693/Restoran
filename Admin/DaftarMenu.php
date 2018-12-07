<?php
	session_start();
	include("../koneksi.php");
	
	if(isset($_SESSION['AdminLogin'])==false || $_SESSION['AdminLogin'] =="" ){
		header('location:login.php?psn=logindulu');
	}
	
	$sql="select * from menu as m, jenis as j where m.IdJenis=j.IdJenis";
	$result=$conn->query($sql);
	//arr menu
	$arr_menu=[];
	//END OF menu
	if($result->num_rows>0){
		while($row=$result->fetch_assoc()){
			
			$arr_menu[]=Array($row["IdMenu"],
								$row['JudulJenis'],
								$row["JudulMenu"],
								$row["Harga"],
								$row["NamaGambar"],
								$row["status"]);
		}
	}
	else{
		echo " 0 result";
	}
	
	$conn->close();
	
?>
<html>
	<head>
		<title>Halaman Daftar Menu</title>
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
		<a href="index.php">Kembali ke Admin</a>
		<h3 align="center">List Menu kami</h3>
		<table border="1" style="margin-left:auto;margin-right:auto;width:800px;">
			<tr>
				<th>Id Menu</th>
				<th>Jenis Menu</th>
				<th>Judul Menu</th>
				<th>Harga</th>
				<th>Gambar</th>
				<th>Status</th>
				<th colspan="2">Aksi</th>
			</tr>
			<?php
			for($i=0;$i<count($arr_menu);$i++){
				echo "<tr>";
				//echo "<td style='text-align:center;'><img src='images/".$arr_barang[$i][0].".jpg' width='100px'/></td>";
				echo "<td>".$arr_menu[$i][0]."</td>";
				echo "<td>".$arr_menu[$i][1]."</td>";
				echo "<td>".$arr_menu[$i][2]."</td>";
				echo "<td>Rp. ".number_format($arr_menu[$i][3])."</td>";
				echo "<td style='text-align:center;'><img src='../menu/".$arr_menu[$i][4]."' width='100px'/></td>";
				echo "<td>".$arr_menu[$i][5]."</td>";
				echo "<td><a href='editmenu.php?idmen=".$arr_menu[$i][0]."'>EDIT</a>&nbsp;</td><td>&nbsp;<a href='hapusmenu.php?idmen=".$arr_menu[$i][0]."'>HAPUS</a></td>";
				//echo "<td><a href='detail.php?id=".$arr_barang[$i][0]."'>beli</a></td>";
				echo "</tr>";
			}
			?>
		</table>
		<form method="post" action="tambahmenu.php">
			<input type="submit" name="Add_btn" value="Tambah Menu"size="10" />
		</form>
	</body>
</html>