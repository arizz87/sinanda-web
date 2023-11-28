<?php
//Connection Database
	require_once'../../koneksi.php';
	require_once'../../fungsi.php'; 

$idhapus=$_GET['idhapus']; 

$cek=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ikk_bidang where id_bidang='".$idhapus."'"));

if(!$cek){	
$SQL = mysqli_query($con, "DELETE FROM tb_bidang WHERE id_bidang='$idhapus'");	 
}
 
?>