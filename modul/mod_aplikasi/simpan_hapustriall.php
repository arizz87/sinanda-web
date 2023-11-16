<?php
require_once'../../koneksi.php'; 
 
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to mysql: " . mysqli_connect_error();
	}
	
		
	for ($i = 0; $i < count($_POST['idcekdukung']); $i++)
    {
	$id = $_POST['idcekdukung'][$i]; 
	
	$cek1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_upload_data_tri1 where id_data='".$id."'"));   
	
		if (!empty($id)){ 
		$file1 = "../file-data-dukung/$cek1[nama_file]";
		if (file_exists($file1)){
		unlink($file1); 
		}
	 
		$SQL = mysqli_query($con, "DELETE FROM tb_datadukung_bidang WHERE id_dukung='$id'");
		$SQL2 = mysqli_query($con, "DELETE FROM tb_upload_data_tri1 WHERE id_data='$id'");	 	 
	}} 
 
?>	
