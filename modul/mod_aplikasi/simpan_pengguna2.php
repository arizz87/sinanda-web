<?php
require_once'../../koneksi.php';
//require_once 'fungsi.php';
//include'datediff.php';
 
	
		$username=htmlspecialchars($_POST['username'], ENT_QUOTES); 
		$nama=htmlspecialchars($_POST['nama'], ENT_QUOTES); 
		$bidang=htmlspecialchars($_POST['bidang'], ENT_QUOTES); 
		$level=htmlspecialchars($_POST['level'], ENT_QUOTES);   
		$pass=$_POST['passw'];//09-09-2016
		$password = password_hash($pass, PASSWORD_DEFAULT); // hash password
	  
		if ($pass!=""){
		$SQL = mysqli_query($con, "update tb_user set username='$username',password='$password',level='$level',nama_pengguna='$nama',id_bidang='$bidang' where kode_user='$_POST[idupdate]'");
		} else{
		$SQL = mysqli_query($con, "update tb_user set username='$username',level='$level',nama_pengguna='$nama',id_bidang='$bidang' where kode_user='$_POST[idupdate]'");
		}
		
		
?>