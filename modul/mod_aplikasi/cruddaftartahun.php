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
			$SQL = mysqli_query($con, "SELECT * FROM tb_tahun WHERE id_tahun='".$_POST['id_tahun']."'");
			$return = mysqli_fetch_array($SQL,MYSQLI_ASSOC);
			echo json_encode($return);
			break; 
		 
	}	 
	
?>
