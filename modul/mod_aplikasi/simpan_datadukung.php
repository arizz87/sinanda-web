<?php
require_once'../../koneksi.php';
//require_once 'fungsi.php';
//include'datediff.php';
 
	
		$uraian=htmlspecialchars($_POST['uraian'], ENT_QUOTES); 
		$kode=strtoupper(htmlspecialchars($_POST['kode'], ENT_QUOTES));
		$status=htmlspecialchars($_POST['statuss'], ENT_QUOTES);   
	   
	   $carikode = mysqli_query($GLOBALS["___mysqli_ston"],"select max(id) maxKode from tb_ouput_data") or die (mysqli_error());
		// menjadikannya array
		$data= mysqli_fetch_array($carikode);
   
		$no= $data['maxKode'];
		$noUrut= $no + 1;
	 
		$data = mysqli_query($GLOBALS["___mysqli_ston"],"select * from tb_ouput_data where kode_data='$kode' and tahun='$_SESSION[tahun]'");
		$cek = mysqli_fetch_array($data);  
		if ($cek){
		$SQL = mysqli_query($con, "update tb_ouput_data set uraian_data='$uraian',kode_data='$kode' where id='$idxx'");	
		}else{
		$SQL=mysqli_query($con, "insert into tb_ouput_data values ('$noUrut', '$uraian', '$kode','$_SESSION[tahun]')"); 
		}
?>