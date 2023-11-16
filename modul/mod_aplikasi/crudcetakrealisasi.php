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
			$SQL = mysqli_query($con, "SELECT * FROM tb_ikk_bidang where tahun='$_SESSION[tahun]' and id_data='$_POST[id_data]'  and id_bidang='$_POST[id_bidang]' ");
			$return = mysqli_fetch_array($SQL,MYSQLI_ASSOC);
			echo json_encode($return);
			break; 
		 
	}	 
	
?>
