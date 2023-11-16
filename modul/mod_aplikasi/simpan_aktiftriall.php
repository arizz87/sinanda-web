<?php
require_once'../../koneksi.php'; 


		$aktif1=$_POST['iddata1'];//09-09-2016  
		
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to mysql: " . mysqli_connect_error();
	}
	
	for ($i = 0; $i < count($_POST['idcekdukung']); $i++)
    {
	$id = $_POST['idcekdukung'][$i]; 
 

	if (!empty($id)){
 
		$SQL = mysqli_query($con, "update tb_datadukung_bidang set posting='$aktif1' where id_dukung='$id'");
 
	}} 
 
?>	
