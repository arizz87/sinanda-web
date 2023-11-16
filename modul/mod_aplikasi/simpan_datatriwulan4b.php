<?php
require_once'../../koneksi.php';
//require_once 'fungsi.php';
//include'datediff.php';
 
	
		$idpembagi=$_POST['idpembagi']; 
		$angka=str_replace(".","",$_POST['angka']);//09-09-2016
	   
	   $carikode = mysqli_query($GLOBALS["___mysqli_ston"],"select max(id_nilai) maxKode from tb_nilai_ikk_tri1") or die (mysqli_error());
		// menjadikannya array
		$data= mysqli_fetch_array($carikode);
   
		$no= $data['maxKode'];
		$noUrut= $no + 1;
		
		$cek=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1 where id_ikk='".$_POST['idpembagi']."' and id_bidang='".$_SESSION['id_bidang']."' and triwulan=4 and tahun='".$_SESSION['tahun']."'"));  
		if ($cek){
		$SQL = mysqli_query($con, "update tb_nilai_ikk_tri1 set angka_pembagi='$angka' where id_ikk='".$_POST['idpembagi']."' and id_bidang='".$_SESSION['id_bidang']."' and triwulan=4 and tahun='".$_SESSION['tahun']."'");	
		}else{
		$SQL=mysqli_query($con, "insert into tb_nilai_ikk_tri1 values ('$noUrut', '$idpembagi', '$_SESSION[id_bidang]','0','$angka','4','0','$_SESSION[tahun]')"); 
		}
?>