<?php
	//Connection Database
	require_once'../../koneksi.php'; 
	
		for ($i = 0; $i < count($_POST['kode']); $i++)
		{
		$id = $_POST['kode'][$i];
		$uraian = $_POST['uraiansalin'][$i];
		if (!empty($id)){
		$cek=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM tb_ouput_data where kode_data='".$id."' and tahun='$_SESSION[tahun]'"));	
		if ($cek){
		$SQL = mysqli_query($con, "update tb_ouput_data set uraian_data='$uraian',kode_data='$kode' where id='$idxx'");	
		}else{
		$SQL=mysqli_query($con, "insert into tb_ouput_data values ('', '$uraian', '$id','$_SESSION[tahun]')"); 
		}
		
		}					
		} 

	
?>
