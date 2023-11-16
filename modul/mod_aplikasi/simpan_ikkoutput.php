<?php
require_once'../../koneksi.php';
//require_once 'fungsi.php';
//include'datediff.php';
 
	
		$uraian=htmlspecialchars($_POST['uraian'], ENT_QUOTES); 
		$pembagi=htmlspecialchars($_POST['pembagi'], ENT_QUOTES); 
		$pembilang=htmlspecialchars($_POST['pembilang'], ENT_QUOTES);   
	   
	   $carikode = mysqli_query($GLOBALS["___mysqli_ston"],"select max(id_output) maxKode from tb_output_ikk") or die (mysqli_error());
		// menjadikannya array
		$data= mysqli_fetch_array($carikode);
   
		$no= $data['maxKode'];
		$noUrut= $no + 1;
	 
		$SQL=mysqli_query($con, "insert into tb_output_ikk values ('$noUrut', '$uraian', '$pembilang','$pembagi')"); 
?>