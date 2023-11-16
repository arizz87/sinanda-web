<?php
	//Connection Database
	require_once'../../koneksi.php';
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to mysql: " . mysqli_connect_error();
	}
	
	switch ($_POST['type']) {
		
		//Tampilkan Data 
		case "get": 
			$SQL = mysqli_query($con, "SELECT * FROM tb_datadukung_bidang WHERE id_dukung='".$_POST['id_dukung']."'");
			$return = mysqli_fetch_array($SQL,MYSQLI_ASSOC);
			echo json_encode($return);
			break; 
		 
	}	 
	
?>
