<?php
	session_start();
	include("../koneksi.php");
	if(isset($_SESSION['AdminLogin'])==false || $_SESSION['AdminLogin']==""){
		header("location:login.php?psn=logindulu");
	}
	$JdlMenu="";$IdJenis="";$HrgMenu="";$GbrMenu="";$StatMenu="";$hasil="";
	if(isset($_POST['simpan_btn'])){
		
		if(isset($_POST['stat_ck'])){
			$StatMenu=1;
		}else{$StatMenu=0;}
		if($_POST['JdlMenu_txt']!="" && $_POST['Jm_rbt']!="" && $_POST['Hrg_txt']!="" && $_FILES['fileGbr']['name']!="" ){
			$targetdir="../menu/";$targetfile=$targetdir.basename($_FILES["fileGbr"]["name"]);$UploadOk=1;
			$JdlMenu=$_POST['JdlMenu_txt'];$IdJenis=$_POST['Jm_rbt'];$HrgMenu=$_POST['Hrg_txt'];$GbrMenu=basename($_FILES['fileGbr']['name']);
			if(file_exists($targetfile)){$UploadOk=0;}
			if($UploadOk==1){
				//copy($_FILES["file"]["tmp_name"],$targetfile)or die("tdk tercopy");
				if(move_uploaded_file($_FILES["fileGbr"]["tmp_name"],$targetfile)){$hasil="Terupload";}else{$hasil="errorupload";}
			}
			$sql="insert into menu(IdJenis,JudulMenu,Harga,NamaGambar,status) values($IdJenis,'$JdlMenu',$HrgMenu,'$GbrMenu',$StatMenu)";
			$result=$conn->query($sql);
			if($result){$hasil=$hasil." berhasil disimpan";}
			else{$hasil=$hasil." gagal disimpan ";}
		}
		
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
		<?php echo $hasil;?>
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
		<form method="post" enctype="multipart/form-data">
			<fieldset><legend>Tambah Menu</legend>
			<label> Judul Menu : </label><input type="text" placeholder="Judul Menu" name="JdlMenu_txt" value="" required /><br><br>
			<label>Jenis Menu : </label><input type="radio" value="1" placeholder="Jenis Menu" name="Jm_rbt" required />Makanan<input type="radio" value="2" placeholder="Jenis Menu" name="Jm_rbt" required />Minuman<br><br>
			<label>Harga Jual: </label><input type="number" value="0" placeholder="Harga Jual" name="Hrg_txt" required /><br><br>
			<label>Pilih Gambar : </label><input type="file" name="fileGbr" accept=".jpg*" required />
			<span id="verifk"></span><br><br>
			<label>Status : </label><input type="checkbox" value="1" placeholder="Ada" name="stat_ck" checked="checked"/>Tampil<br><br>
			<input type="submit" value="Simpan" name="simpan_btn" size="10"/>&nbsp;&nbsp;<input type="reset" value="Reset" name="rst_btn" size="10"/>
			</fieldset>
		</form>
	</body>
</html>