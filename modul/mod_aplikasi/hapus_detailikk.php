<?php
//Connection Database
	require_once'../../koneksi.php';
	require_once'../../fungsi.php'; 

$idhapus=$_GET['idhapus']; 
	
$SQL = mysqli_query($con, "DELETE FROM tb_ikk_bidang WHERE id_ikk='$idhapus'");	
$SQL2 = mysqli_query($con, "DELETE FROM tb_nilai_ikk_tri1 WHERE id_ikk='$idhapus'");	 	  
 
 
?>