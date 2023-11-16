<?php
require_once'../../koneksi.php';
//require_once 'fungsi.php';
//include'datediff.php';
  
		$id=$_POST['id_ikk'];//09-09-2016 
	     
		$SQL = mysqli_query($con, "update tb_nilai_ikk_tri1 set validasi='0'  where id_ikk='".$_POST['id_ikk']."'  and id_bidang='".$_POST['id_bidang']."' and triwulan=3  and tahun='".$_SESSION['tahun']."'");
 
?>