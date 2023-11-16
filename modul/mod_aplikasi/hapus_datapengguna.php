<?php
//Connection Database
	require_once'../../koneksi.php';
	require_once'../../fungsi.php'; 

$idhapus=$_GET['idhapus']; 
	
$SQL = mysqli_query($con, "DELETE FROM tb_user WHERE kode_user='$idhapus'");	 
 
 
?>