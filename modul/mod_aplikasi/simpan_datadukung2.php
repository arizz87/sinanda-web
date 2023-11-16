<?php
require_once'../../koneksi.php';
//require_once 'fungsi.php';
//include'datediff.php';
 
	
		
		$uraian=htmlspecialchars($_POST['uraian'], ENT_QUOTES); 
		$kode=strtoupper(htmlspecialchars($_POST['kode'], ENT_QUOTES));
		$status=htmlspecialchars($_POST['statuss'], ENT_QUOTES);   
	    $id=$_POST['idupdate'];//09-09-2016 
	   
		$SQL = mysqli_query($con, "update tb_ouput_data set uraian_data='$uraian',kode_data='$kode' where id='$id'");
?>