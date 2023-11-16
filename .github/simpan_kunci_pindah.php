<?php
//Connection Database
	require_once'../../koneksi.php';
	 
$notik=$_POST['notik'];//09-09-2016 
$lokasi_file1    = $_FILES['kartu']['tmp_name'];
$tipe_file1      = $_FILES['kartu']['type'];
$nama_file1      = $_FILES['kartu']['name'];
$size_file1     = $_FILES['kartu']['size'];

$acak1           = rand(000,999);
$gabung1 = "etika-".$_POST['notik']."-".$acak1;	
$ext1x = substr(strrchr($nama_file1, "."), 1);
$nama_baru1 = $gabung1.".". $ext1x;

date_default_timezone_set('Asia/Jakarta');	
$tgl2x=date('d-m-Y H:i:s');
$tglxx=substr($tgl2x,0,2);
$blnxx=substr($tgl2x,3,2);
$thnxx=substr($tgl2x,6,4);
$jamxx=substr($tgl2x,11,2);
$menitxx=substr($tgl2x,14,2);
$detikxx=substr($tgl2x,17,2);
$tglaproval = $thnxx."-".$blnxx."-".$tglxx." ".$jamxx.":".$menitxx.":".$detikxx;	

$rs = mysqli_query($GLOBALS["___mysqli_ston"],"select * from tb_tambahpd where no_tiket='$notik'");
$cari = mysqli_fetch_array($rs); 

$carihist=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * FROM tb_histori where no_tiket='".$cari['no_histori']."' order by id_histori DESC"));

$SQL = mysqli_query($con, "update tb_tambahpd set status_verifikasi='Menunggu persetujuan.',status_aprove='0',tgl_usulan='$tglaproval' where no_tiket='$notik'");
$SQL2=mysqli_query($GLOBALS["___mysqli_ston"], "update tb_histori set tgl_histori='$tglaproval' where id_histori='$carihist[id_histori]'");

if ((!empty($lokasi_file1) and $size_file1 <= 1000000)){
 
	move_uploaded_file($lokasi_file1,"../file_dok5/$nama_baru1");
	
$SQLX = mysqli_query($con, "update tb_tambahpd set status_edit='$nama_baru1' where no_tiket='$notik'");	
}	


?>