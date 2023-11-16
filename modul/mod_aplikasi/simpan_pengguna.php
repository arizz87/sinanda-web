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
	   
	   $carikode = mysqli_query($GLOBALS["___mysqli_ston"],"select max(kode_user) maxKode from tb_user") or die (mysqli_error());
		// menjadikannya array
		$data= mysqli_fetch_array($carikode);
   
		$no= $data['maxKode'];
		$noUrut= $no + 1;
	 
		$SQL=mysqli_query($con, "insert into tb_user values ('$noUrut', '$username', '$password','$nama','$bidang','$level')"); 
?>