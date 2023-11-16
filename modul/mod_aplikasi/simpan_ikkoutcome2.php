<?php
require_once'../../koneksi.php';
//require_once 'fungsi.php';
//include'datediff.php';
 
	
		$uraian=htmlspecialchars($_POST['uraian'], ENT_QUOTES); 
		$pembagi=htmlspecialchars($_POST['pembagi'], ENT_QUOTES); 
		$pembilang=htmlspecialchars($_POST['pembilang'], ENT_QUOTES);   
	    $id=$_POST['idupdate'];//09-09-2016 
	   
		$SQL = mysqli_query($con, "update tb_outcome set uraian_outcome='$uraian',pembilang='$pembilang',pembagi='$pembagi',datapersen='$_POST[iddata]' where id_outcome='$id'");
?>