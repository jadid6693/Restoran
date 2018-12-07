
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
		$AdmLgn = $namm.$IdAdmin;
	}
	
	if(isset($_SESSION['AdminLogin'])==false || isset($_SESSION['AdminLogin']) && $_SESSION['AdminLogin'] != 'SuperAdm' ){
		header("location:index.php?psn=tidak bisa selain super Admin !");
	}
	$AdmLgn="";
	$namadmin="";$passadmin="";$telpadmin="";$almadmin="";$ttladmin="";$Jk="";$hasil="";
	if(isset($_POST['reg_btn'])){
		if($_POST['nmaAdmin_txt'] != "" && $_POST['passAdmin_pass'] != "" && $_POST['NoTelp_txt'] != "" && $_POST['Alamat_txt'] != "" && $_POST['ttl_date'] != ""){
			
			$cocok=cekpass($_POST['passAdmin_pass'],$_POST['passAdmin_verif']);
			if($cocok){
				
				$namadmin=$_POST['nmaAdmin_txt'];
				$AdmLgn=$_POST['nmAdmLgn_txt'];
				$passadmin=$_POST['passAdmin_pass'];
				$Jk=$_POST['Jk_rbt'];
				$telpadmin=$_POST['NoTelp_txt'];
				$almadmin=$_POST['Alamat_txt'];
				$ttladmin=$_POST['ttl_date'];
			}
			
		}
		
	}
	if($namadmin!="" && $passadmin!="" && $telpadmin!="" && $almadmin!="" && $ttladmin!=""){
		
		$passadmin=md5($passadmin);
		$sql="insert into admin(AdminLogin,NamaAdmin,PasswordAdmin,JenisKelamin,NoTelp,Alamat,TanggalLahir) values('$AdmLgn','$namadmin','$passadmin','$Jk','$telpadmin','$almadmin','$ttladmin')";
		$result=$conn->query($sql);
		if($result){$hasil="berhasil disimpan";}
		else{$hasil="gagal disimpan ";}
	}
	
	$sql="select * from admin";
	$result=$conn->query($sql);
	//arr admin
	$arr_admin=[];
	//END OF admin
	$IdAdmin=0;
	$AdmLgn="";
	if($result->num_rows>0){
		while($row=$result->fetch_assoc()){
			
			$arr_admin[]=Array($row["IdAdmin"],
								$row['AdminLogin'],
								$row["NamaAdmin"],
								$row["PasswordAdmin"],
								$row["JenisKelamin"],
								$row["NoTelp"],
								$row["Alamat"],
								$row["TanggalLahir"]);
			$IdAdmin=$row['IdAdmin'];
			//$cetak=$cetak."id: ".$row["id"]." - Name: ".$row["nama"]." ".$row["roda"]."<br>";
		}
	}
	else{
		echo " 0 result";
	}
	$IdAdmin++;
	
	
	$conn->close();
	
	//5486718b3496396344b004e2fb6eabda
?>

<html>
	<head>
		<title>Register Admin</title>
		<script type="text/javascript">
		function checkpass(){
			var pas=document.getElementsByName('passAdmin_pass')[0].value;
			var verif=document.getElementsByName('passAdmin_verif')[0].value;
			if(pas === verif){
				document.getElementsByName('reg_btn')[0].disabled=false;
				document.getElementById('verifk').innerHTML="Cocok";
				document.getElementById('verifk').style.color="Green";
			}
			else{
				document.getElementsByName('reg_btn')[0].disabled=true;
				document.getElementById('verifk').style.color="Red";
				document.getElementById('verifk').innerHTML="tidak Cocok!";
			}
		}
		function isi($ini){
			var nam=$ini;//ini bisa -> document.getElementsByName('nmaAdmin_txt')[0].value;
			nam=nam.substr(0,4)+"<?php echo $IdAdmin ?>";
			document.getElementById('nmAdmLgn').innerHTML=nam;
			document.getElementsByName('nmAdmLgn_txt')[0].value=nam;
			//nam=nam.substr(0,4);
		}
		</script>
	</head>
	<body>
		<?php echo $hasil;?>
		<a href="index.php">Kembali</a>
		<h3 align="center">List Admin kami</h3>
		<table border="1" style="margin-left:auto;margin-right:auto;width:800px;">
			<tr>
				<th>Id Admin</th>
				<th>Nama Admin Login</th>
				<th>Nama Admin</th>
				<th>Password Admin</th>
				<th>Jenis Kelamin</th>
				<th>NoTelp</th>
				<th>Alamat</th>
				<th>Tanggal Lahir</th>
			</tr>
			<?php
			for($i=0;$i<count($arr_admin);$i++){
				echo "<tr>";
				//echo "<td style='text-align:center;'><img src='images/".$arr_barang[$i][0].".jpg' width='100px'/></td>";
				echo "<td>".$arr_admin[$i][0]."</td>";
				echo "<td>".$arr_admin[$i][1]."</td>";
				echo "<td>".$arr_admin[$i][2]."</td>";
				echo "<td>".$arr_admin[$i][3]."</td>";
				echo "<td>".$arr_admin[$i][4]."</td>";
				echo "<td>".$arr_admin[$i][5]."</td>";
				echo "<td>".$arr_admin[$i][6]."</td>";
				echo "<td>".$arr_admin[$i][7]."</td>";
				//echo "<td><a href='detail.php?id=".$arr_barang[$i][0]."'>beli</a></td>";
				echo "</tr>";
			}
			?>
			
		</table>
		<form method="post">
			<fieldset><legend>Register Admin</legend>
			<?php echo "<label> Id Admin : </label>".$IdAdmin."<br><br>";?>
			<label> Nama Admin Login : </label><span id="nmAdmLgn"></span><input type="hidden" name="nmAdmLgn_txt" value=""/><br><br>
			<label>Nama : </label><input type="text" value="" onkeyup="isi(this.value)" placeholder="Nama" name="nmaAdmin_txt" size="15" required /><br><br>
			<label>Password : </label><input type="password" onkeyup="checkpass()" value="" placeholder="Password" name="passAdmin_pass" size="15" required /><br><br>
			<label>Password Verify : </label><input type="password" value="" onkeyup="checkpass()" placeholder="Password Verifikasi" name="passAdmin_verif" required />
			<span id="verifk"></span><br><br>
			<label>Jenis Kelamin : </label><input type="radio" value="L" placeholder="Jenis Kelamin" name="Jk_rbt" required />Laki-laki<input type="radio" value="P" placeholder="Jenis Kelamin" name="Jk_rbt" required />Perempuan<br><br>
			
			<label>No. Telpon : </label><input type="text" value="" placeholder="Telephone Number" name="NoTelp_txt" required /><br><br>
			<label>Alamat : </label><input type="text" value="" size="50" placeholder="Alamat" name="Alamat_txt" required /><br><br>
			<label>Tanggal Lahir : </label><input type="date" value="" name="ttl_date" required /><br><br>
			<input type="submit" value="Register" name="reg_btn" size="10"/>&nbsp;&nbsp;<input type="reset" value="Reset" name="rst_btn" size="10"/>
			</fieldset>
		</form>
		
	</body>
</html>