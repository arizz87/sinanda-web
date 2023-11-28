<?php
//Connection Database
	require_once'../../koneksi.php';
	require_once'../../fungsi.php'; 

$idhapus=$_GET['idhapus']; 

$cek1 = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select * from tb_datadukung_bidang where id_data='$idhapus'")); 
$cek2 = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select * from tb_outcome where pembilang='$idhapus'")); 
$cek3 = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select * from tb_outcome where pembagi='$idhapus'")); 
		
if($cek1  or $cek2  or $cek3){ 	
$SQL = mysqli_query($con, "DELETE FROM tb_ouput_data WHERE id='$idhapusxx'");	 
}else{
$SQL = mysqli_query($con, "DELETE FROM tb_ouput_data WHERE id='$idhapus'");	 
}	
 
?>