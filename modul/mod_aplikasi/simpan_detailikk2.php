<?php
require_once'../../koneksi.php';
//require_once 'fungsi.php';
//include'datediff.php';
 
	 
		$id=$_POST['idupdate'];//09-09-2016 
		$aktif1=$_POST['aktif1'];//09-09-2016 
		$aktif2=$_POST['aktif2'];//09-09-2016 
		$aktif3=$_POST['aktif3'];//09-09-2016 
		$aktif4=$_POST['aktif4'];//09-09-2016 
	   
		$SQL = mysqli_query($con, "update tb_ikk_bidang set tri1='$aktif1',tri2='$aktif2',tri3='$aktif3',tri4='$aktif4' where id_ikk='$id'");
		 
?>