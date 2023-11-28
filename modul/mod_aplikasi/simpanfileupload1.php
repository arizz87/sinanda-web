<?php
require_once'../../koneksi.php';
require_once'../../fungsi.php'; 
//require_once 'fungsi.php';
//include'datediff.php';


		  $iddukung=$_POST['iddukung']; 
		
		  $file1      		= $_FILES['file1']['tmp_name'];
		  $ImageName1       = $_FILES['file1']['name'];
		  $ImageType1       = $_FILES['file1']['type'];
		  $size_file1    	= $_FILES['file1']['size']; 
  
  $carikodex = mysqli_query($GLOBALS["___mysqli_ston"],"select max(id_upload) maxKodex from tb_upload_data_tri1") or die (mysqli_error());
  // menjadikannya array
  $datax= mysqli_fetch_array($carikodex);
   
    $nox= $datax['maxKodex'];
    $noUrut= $nox + 1;
	$cekdata=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ouput_data where id='".$iddukung."'"));  
 
	$acak1   = rand(000,999);
	$gabung1 = "data-dukung-kode_".$cekdata['kode_data']."-bidang".$_SESSION['id_bidang']."-".$acak1;	
	$ext1x = substr(strrchr($ImageName1, "."), 1);
	$namafile= $gabung1.".". $ext1x;
		
		if (!empty($file1) and $size_file1 <= 5000000){
		$cek=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_upload_data_tri1 where id_data='".$_POST['iddukung']."' and id_bidang='".$_SESSION['id_bidang']."' and tahun='".$_SESSION['tahun']."'"));  
		if ($cek){
			$file = "../file-data-dukung/$cek[nama_file]";
			if (file_exists($file)){
			unlink($file);
			}
		move_uploaded_file($file1,"../file-data-dukung/$namafile"); 	
		$SQL = mysqli_query($con, "update tb_upload_data_tri1 set nama_file='$namafile' where id_data='".$_POST['iddukung']."' and id_bidang='".$_SESSION['id_bidang']."' and tahun='".$_SESSION['tahun']."'");	
		}else{
		move_uploaded_file($file1,"../file-data-dukung/$namafile"); 	
		$SQL=mysqli_query($con, "insert into tb_upload_data_tri1 values ('$noUrut', '$iddukung', '$_SESSION[id_bidang]','$namafile','0','$_SESSION[tahun]')"); 
		}		
		}
?>