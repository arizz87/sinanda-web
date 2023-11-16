<?php
	//Connection Database
	require_once'../../koneksi.php'; 
	
		for ($i = 0; $i < count($_POST['kode']); $i++)
		{
		$id = $_POST['kode'][$i];
		$uraian = $_POST['uraiansalin'][$i];
		
		$carikode2 = mysqli_query($GLOBALS["___mysqli_ston"],"select max(kode_ikk) maxKode2 from tb_outcome where tahun='$_SESSION[tahun]'") or die (mysqli_error());
		$data2= mysqli_fetch_array($carikode2);
   
		$no2= $data2['maxKode2'];
		$noUrut2= $no2 + 1;
		
		if (!empty($id)){
		$cek=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM tb_outcome where id_outcome='".$id."' and tahun='$_POST[tahun]'")); 
		 
		$SQL=mysqli_query($con, "insert into tb_outcome values ('', '$uraian','$cek[datapersen]', '','','$noUrut2','$_SESSION[tahun]')"); 
		}					
		} 

	
?>
