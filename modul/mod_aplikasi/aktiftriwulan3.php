<?php
require_once'../../koneksi.php';
//require_once 'fungsi.php';
//include'datediff.php';
  
		$id=$_POST['id_ikk'];//09-09-2016 
	   
	   $aktif=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ikk_bidang where id_ikk='".$id."'"));  
	   
	   if ($aktif['tri3']==0){
		$SQL = mysqli_query($con, "update tb_ikk_bidang set tri3='1' where id_ikk='".$id."'");
	   }else{
		$SQL = mysqli_query($con, "update tb_ikk_bidang set tri3='0' where id_ikk='".$id."'");
	   }
?>