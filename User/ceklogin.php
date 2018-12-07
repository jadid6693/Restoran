
<?php
	session_start();
	include("../koneksi.php");
	
	if(isset($_SESSION['UserLogin'])){
		if(isset($_POST['lgn_btn'])){
			if(isset($_POST['nmaUserLgn_txt']) && isset($_POST['passUser_pass']) && $_POST['nmaUserLgn_txt'] !="" && $_POST['passUser_pass'] !=""){
				
					$UserLogin=$_POST['nmaUserLgn_txt'];
					$pass=$_POST['passUser_pass'];
					$pass=md5($pass);
					$sql="select * from user where UserLogin='$UserLogin' and PasswordUser='$pass'";
					$result=$conn->query($sql);
					if($result->num_rows>0){
						while($row=$result->fetch_assoc()){
							$_SESSION['UserLogin']=$row['UserLogin'];
						}
					}
					else{
						$_SESSION['UserLogin']="";
					}
				
			}
			else{
				header('location:Login.php?psn=logindulu');
			}
		}
		if($_SESSION['UserLogin'] != ""){
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