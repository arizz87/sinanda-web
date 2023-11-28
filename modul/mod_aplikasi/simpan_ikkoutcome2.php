<?php
require_once'../../koneksi.php';
//require_once 'fungsi.php';
//include'datediff.php';
 
	
		$uraian=htmlspecialchars($_POST['uraian'], ENT_QUOTES); 
		$pembagi=htmlspecialchars($_POST['pembagi'], ENT_QUOTES); 
		$pembilang=htmlspecialchars($_POST['pembilang'], ENT_QUOTES);   
	    $id=$_POST['idupdate'];//09-09-2016 
		
	    $cek = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select * from  tb_ikk_bidang where id_data='$id'")); 

		if(!$cek){	
		$SQL = mysqli_query($con, "update tb_outcome set uraian_outcome='$uraian',pembilang='$pembilang',pembagi='$pembagi',datapersen='$_POST[iddata]' where id_outcome='$id'");
		}
?>