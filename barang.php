<?php
	session_start();
	include_once("koneksi.php");
	
	$sql="select * from baju";
	
	$result=$conn->query($sql);
	//arr barang
	
	$arr_barang=[];
	//END OF Barang
	
	if($result->num_rows>0){
		while($row=$result->fetch_assoc()){
			
			$arr_barang[]=Array($row["id"],
								$row["label"],
								$row["keterangan"],
								$row["harga"],
								$row["status"]);
			
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
		<title>P12 jualan baju</title>
	</head>
	<body>
		<a href="index.php">kembali</a>
		<h3 align="center">List baju kami</h3>
		<table border="1" style="margin-left:auto;margin-right:auto;width:800px;">
			<tr>
				<th>&nbsp;</th>
				<th>id</th>
				<th>label</th>
				<th>keterangan</th>
				<th>harga</th>
				<th>&nbsp;</th>
			</tr>
			<?php
			for($i=0;$i<count($arr_barang);$i++){
				echo "<tr>";
				echo "<td style='text-align:center;'><img src='images/".$arr_barang[$i][0].".jpg' width='100px'/></td>";
				echo "<td>".$arr_barang[$i][0]."</td>";
				echo "<td>".$arr_barang[$i][1]."</td>";
				echo "<td>".$arr_barang[$i][2]."</td>";
				echo "<td>".$arr_barang[$i][3]."</td>";
				echo "<td><a href='detail.php?id=".$arr_barang[$i][0]."'>beli</a></td>";
				echo "</tr>";
			}
			?>
			
		</table>
	</body>
</html>