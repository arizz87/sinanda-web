<?php
require_once'../../koneksi.php';
//require_once 'fungsi.php';
//include'datediff.php';
 
	
		$tahun=htmlspecialchars($_POST['tahun'], ENT_QUOTES); 
		$namakepala=htmlspecialchars($_POST['namakepala'], ENT_QUOTES); 
		$nip=htmlspecialchars($_POST['nip'], ENT_QUOTES); 
		$status=htmlspecialchars($_POST['statuss'], ENT_QUOTES);    
	    
		$SQL = mysqli_query($con, "update tb_tahun set tahun_anggaran='$tahun',nama_kepala='$namakepala',nip='$nip',status='$status' where id_tahun='$_POST[idupdate]'");
?>