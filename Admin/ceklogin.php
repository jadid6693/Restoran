
<?php
	session_start();
	include("../koneksi.php");//c1748cef0ad084aa2265c358957bbfe6 -> md5=restosuper
	
	if(isset($_SESSION['AdminLogin'])){
		if(isset($_POST['lgn_btn'])){
			if(isset($_POST['nmaAdminLgn_txt']) && isset($_POST['passAdmin_pass']) && $_POST['nmaAdminLgn_txt'] !="" && $_POST['passAdmin_pass'] !=""){
				
					$AdminLogin=$_POST['nmaAdminLgn_txt'];
					$pass=$_POST['passAdmin_pass'];
					$pass=md5($pass);
					$sql="select * from admin where AdminLogin='$AdminLogin' and PasswordAdmin='$pass'";
					$result=$conn->query($sql);
					if($result->num_rows>0){
						while($row=$result->fetch_assoc()){
							$_SESSION['AdminLogin']=$row['AdminLogin'];
						}
					}
					else{
						$_SESSION['AdminLogin']="";
					}
				
			}
			else{
				header('location:Login.php?psn=logindulu');
			}
		}
		if($_SESSION['AdminLogin'] != ""){
			header('location:index.php');
		}
		else{
			header('location:Login.php?psn=logintidakCocok');
		}
	}
	else{
		header('location:Login.php?psn=logindulu');
	}
	
	
	$conn->close();
	
	//5486718b3496396344b004e2fb6eabda
?>