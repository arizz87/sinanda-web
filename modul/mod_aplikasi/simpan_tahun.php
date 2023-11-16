<?php
require_once'../../koneksi.php';
//require_once 'fungsi.php';
//include'datediff.php';
 
	
		$tahun=htmlspecialchars($_POST['tahun'], ENT_QUOTES); 
		$namakepala=htmlspecialchars($_POST['namakepala'], ENT_QUOTES); 
		$nip=htmlspecialchars($_POST['nip'], ENT_QUOTES); 
		$status=htmlspecialchars($_POST['statuss'], ENT_QUOTES);    
	   
	    $carikode = mysqli_query($GLOBALS["___mysqli_ston"],"select max(id_tahun) maxKode from tb_tahun") or die (mysqli_error());
		// menjadikannya array
		$data= mysqli_fetch_array($carikode);
   
		$no= $data['maxKode'];
		$noUrut= $no + 1;
	 
		$SQL=mysqli_query($con, "insert into tb_tahun values ('$noUrut', '$tahun', '$namakepala','$nip','$status')"); 
?>