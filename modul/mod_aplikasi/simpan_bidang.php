<?php
require_once'../../koneksi.php';
//require_once 'fungsi.php';
//include'datediff.php';
 
	 
		$bidang=htmlspecialchars($_POST['nama'], ENT_QUOTES); 
		$nama=htmlspecialchars($_POST['namakabid'], ENT_QUOTES); 
		$nip=htmlspecialchars($_POST['nip'], ENT_QUOTES);    
	   
	   $carikode = mysqli_query($GLOBALS["___mysqli_ston"],"select max(id_bidang) maxKode from tb_bidang") or die (mysqli_error());
		// menjadikannya array
		$data= mysqli_fetch_array($carikode);
   
		$no= $data['maxKode'];
		$noUrut= $no + 1; 
	 
		$SQL=mysqli_query($con, "insert into tb_bidang values ('$noUrut', '$bidang', '$nama','$nip')"); 
?>