<?php
require_once'../../koneksi.php';
//require_once 'fungsi.php';
//include'datediff.php';
 
	
		$nama=htmlspecialchars($_POST['nama'], ENT_QUOTES); 
		$nama_kabid=htmlspecialchars($_POST['namakabid'], ENT_QUOTES); 
		$nip=htmlspecialchars($_POST['nip'], ENT_QUOTES);  
		$id=$_POST['idupdate'];//09-09-2016 
	   
		$SQL = mysqli_query($con, "update tb_bidang set nama_bidang='$nama',nama_kabid='$nama_kabid',nip_kabid='$nip' where id_bidang='$id'");
		 
?>