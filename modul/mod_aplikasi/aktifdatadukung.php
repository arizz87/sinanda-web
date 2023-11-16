<?php
require_once'../../koneksi.php';
//require_once 'fungsi.php';
//include'datediff.php';
  
		$id=$_POST['id_dukung'];//09-09-2016 
	   
	   $aktif=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_datadukung_bidang where id_dukung='".$id."'"));  
	   
	   if ($aktif['posting']==0){
		$SQL = mysqli_query($con, "update tb_datadukung_bidang set posting='1' where id_dukung='".$id."'");
	   }else{
		$SQL = mysqli_query($con, "update tb_datadukung_bidang set posting='0' where id_dukung='".$id."'");
	   }
?>