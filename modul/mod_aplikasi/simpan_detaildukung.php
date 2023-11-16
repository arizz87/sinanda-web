<?php
	//Connection Database

require_once '../../fungsi.php'; 

require_once'../../koneksi.php'; 

		
		$iddata = $_POST['iddata'];
		$iddata1 = $_POST['iddata1'];
		$iddata2 = $_POST['iddata2'];
		$iddata3 = $_POST['iddata3'];
		$iddata4 = $_POST['iddata4'];
		for ($i = 0; $i < count($_POST['kodedata']); $i++)
		{
		$kodedata = $_POST['kodedata'][$i];
		if (!empty($kodedata)){
			
		$cek = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select * from tb_datadukung_bidang where id_data='$kodedata' and id_bidang='$iddata' and tahun='$_POST[idtahun]'")); 
		if($cek){
		$SQL = mysqli_query($con, "update tb_datadukung_bidang set id_bidang='$iddata' where id_data='$idx'");	
		}else{
		$sql_simpan21=mysqli_query($GLOBALS["___mysqli_ston"], "insert into tb_datadukung_bidang values ('', '$kodedata','$iddata', '$iddata1', '$iddata2', '$iddata3', '$iddata4', '0','$_POST[idtahun]')");
		}
		}
		} 

	
?>
  