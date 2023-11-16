<?php
	//Connection Database

require_once '../../fungsi.php'; 

require_once'../../koneksi.php'; 

		
		$iddata = $_POST['iddata'];
		$iddata1 = $_POST['iddata1'];
		$iddata2 = $_POST['iddata2'];
		$iddata3 = $_POST['iddata3'];
		$iddata4 = $_POST['iddata4'];
		for ($i = 0; $i < count($_POST['kodeikk']); $i++)
		{
		$kodeikk = $_POST['kodeikk'][$i];
		if (!empty($kodeikk)){
		$sql_simpan21=mysqli_query($GLOBALS["___mysqli_ston"], "insert into tb_ikk_bidang values ('', '$kodeikk','$iddata', '$iddata1', '$iddata2', '$iddata3', '$iddata4', '0','$_POST[idtahun]')");
		
		}
		} 

	
?>
  