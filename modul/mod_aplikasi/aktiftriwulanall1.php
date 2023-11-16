<?php
require_once'../../koneksi.php';
//require_once 'fungsi.php';
//include'datediff.php';
  
		$id=$_POST['id_bidang'];//09-09-2016 
	   
	   $aktif=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ikk_bidang where id_bidang='".$id."' and tahun='".$_SESSION['tahun']."'"));  
	   
	   if ($aktif['tri1']==0){
		$SQL = mysqli_query($con, "update tb_ikk_bidang set tri1='1' where id_bidang='".$id."' and tahun='".$_SESSION['tahun']."'");
	   }else{
		$SQL = mysqli_query($con, "update tb_ikk_bidang set tri1='0' where id_bidang='".$id."' and tahun='".$_SESSION['tahun']."'");
	   }
?>