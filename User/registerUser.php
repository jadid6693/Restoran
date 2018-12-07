
<?php
	session_start();
	$_SESSION['UserLogin']="";
	include("../koneksi.php");
	function cekpass($pass,$passVer){
		$cocok=false;
		if(md5($pass) == md5($passVer)){
			$cocok=true;
		}
		return $cocok;
	}
	function isicoba($namm){
		$UsrLgn = $namm.$IdUser;
	}
	
	
	$UsrLgn="";
	$namuser="";$passuser="";$telpuser="";$almuser="";$ttluser="";$Jk="";$hasil="";
	if(isset($_POST['reg_btn'])){
		if($_POST['nmaUser_txt'] != "" && $_POST['passUser_pass'] != "" && $_POST['NoTelp_txt'] != "" && $_POST['Alamat_txt'] != "" && $_POST['ttl_date'] != ""){
			
			$cocok=cekpass($_POST['passUser_pass'],$_POST['passUser_verif']);
			if($cocok){
				
				$namuser=$_POST['nmaUser_txt'];
				$UsrLgn=$_POST['nmUsrLgn_txt'];
				$passuser=$_POST['passUser_pass'];
				$Jk=$_POST['Jk_rbt'];
				$telpuser=$_POST['NoTelp_txt'];
				$almuser=$_POST['Alamat_txt'];
				$ttluser=$_POST['ttl_date'];
			}
			
		}
		
	}
	if($namuser!="" && $passuser!="" && $telpuser!="" && $almuser!="" && $ttluser!=""){
		
		$passuser=md5($passuser);
		$sql="insert into user(UserLogin,NamaUser,PasswordUser,JenisKelamin,NoTelp,Alamat,TanggalLahir) values('$UsrLgn','$namuser','$passuser','$Jk','$telpuser','$almuser','$ttluser')";
		$result=$conn->query($sql);
		if($result){$hasil="berhasil disimpan";}
		else{$hasil="gagal disimpan ";}
	}
	$sql="select * from user";
	$result=$conn->query($sql);
	//arr user
	$arr_user=[];
	//END OF user
	$IdUser=0;
	$UsrLgn="";
	if($result->num_rows>0){
		while($row=$result->fetch_assoc()){
			
			$arr_user[]=Array($row["IdUser"],
								$row['UserLogin'],
								$row["NamaUser"],
								$row["PasswordUser"],
								$row["JenisKelamin"],
								$row["NoTelp"],
								$row["Alamat"],
								$row["TanggalLahir"]);
			$IdUser=$row['IdUser'];
			//$cetak=$cetak."id: ".$row["id"]." - Name: ".$row["nama"]." ".$row["roda"]."<br>";
		}
	}
	else{
		echo " 0 result";
	}
	
	$IdUser++;
	
	$conn->close();
	
	//5486718b3496396344b004e2fb6eabda
?>

<html>
	<head>
		<title>Register User</title>
		<script type="text/javascript">
		function checkpass(){
			var pas=document.getElementsByName('passUser_pass')[0].value;
			var verif=document.getElementsByName('passUser_verif')[0].value;
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
			var nam=$ini;
			nam=nam.substr(0,4)+"<?php echo $IdUser ?>";
			document.getElementById('nmUsrLgn').innerHTML=nam;
			document.getElementsByName('nmUsrLgn_txt')[0].value=nam;
			
			//alert(nam.substr(0,3)+"");
		}
		</script>
	</head>
	<body>
		<?php echo $hasil;?>
		<a href="../index.php">Kembali Ke Utama</a>
		<h3 align="center">List User kami</h3>
		<table border="1" style="margin-left:auto;margin-right:auto;width:800px;">
			<tr>
				<th>Id User</th>
				<th>Nama User Login</th>
				<th>Nama User</th>
				<th>Password User</th>
				<th>Jenis Kelamin</th>
				<th>NoTelp</th>
				<th>Alamat</th>
				<th>Tanggal Lahir</th>
			</tr>
			<?php
			for($i=0;$i<count($arr_user);$i++){
				echo "<tr>";
				//echo "<td style='text-align:center;'><img src='images/".$arr_barang[$i][0].".jpg' width='100px'/></td>";
				echo "<td>".$arr_user[$i][0]."</td>";
				echo "<td>".$arr_user[$i][1]."</td>";
				echo "<td>".$arr_user[$i][2]."</td>";
				echo "<td>".$arr_user[$i][3]."</td>";
				echo "<td>".$arr_user[$i][4]."</td>";
				echo "<td>".$arr_user[$i][5]."</td>";
				echo "<td>".$arr_user[$i][6]."</td>";
				echo "<td>".$arr_user[$i][7]."</td>";
				//echo "<td><a href='detail.php?id=".$arr_barang[$i][0]."'>beli</a></td>";
				echo "</tr>";
			}
			?>
			
		</table>
		<form method="post">
			<fieldset><legend>Register User</legend>
			<?php echo "<label> Id User : </label>".$IdUser."<br><br>";?>
			<label> Nama User Login : </label><span id="nmUsrLgn"></span><input type="hidden" name="nmUsrLgn_txt" value=""/><br><br>
			<label>Nama : </label><input type="text" value="" onkeyup="isi(this.value)" placeholder="Nama" name="nmaUser_txt" size="15" required /><br><br>
			<label>Password : </label><input type="password" onkeyup="checkpass()" value="" placeholder="Password" name="passUser_pass" size="15" required /><br><br>
			<label>Password Verify : </label><input type="password" value="" onkeyup="checkpass()" placeholder="Password Verifikasi" name="passUser_verif" required />
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