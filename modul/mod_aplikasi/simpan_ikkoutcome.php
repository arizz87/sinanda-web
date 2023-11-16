<?php
require_once'../../koneksi.php';
//require_once 'fungsi.php';
//include'datediff.php';
 
	
		$uraian=htmlspecialchars($_POST['uraian'], ENT_QUOTES); 
		$pembagi=htmlspecialchars($_POST['pembagi'], ENT_QUOTES); 
		$pembilang=htmlspecialchars($_POST['pembilang'], ENT_QUOTES);   
	   
		$carikode = mysqli_query($GLOBALS["___mysqli_ston"],"select max(id_outcome) maxKode from tb_outcome where  tahun='$_SESSION[tahun]'") or die (mysqli_error());
		// menjadikannya array
		$data= mysqli_fetch_array($carikode);
   
		$no= $data['maxKode'];
		$noUrut= $no + 1;
		
		$carikode2 = mysqli_query($GLOBALS["___mysqli_ston"],"select max(kode_ikk) maxKode2 from tb_outcome where  tahun='$_SESSION[tahun]'") or die (mysqli_error());
		// menjadikannya array
		$data2= mysqli_fetch_array($carikode2);
   
		$no2= $data2['maxKode2'];
		$noUrut2= $no2 + 1;
	 
		$SQL=mysqli_query($con, "insert into tb_outcome values ('$noUrut', '$uraian','$_POST[iddata]', '$pembilang','$pembagi','$noUrut2','$_SESSION[tahun]')"); 
?>