<?php
//Connection Database
	require_once'../../koneksi.php'; 
	require_once '../../fungsi.php';

	$nama=htmlspecialchars($_GET['nama'], ENT_QUOTES);//09-09-2016
	$kode_user=strtoupper(htmlspecialchars($_GET['kode_user'], ENT_QUOTES));//09-09-2016
	$nama_kabid=htmlspecialchars($_GET['nama_kabid'], ENT_QUOTES);//09-09-2016 
	$nip=htmlspecialchars($_GET['nip'], ENT_QUOTES);//09-09-2016
	$pass=$_GET['password'];//09-09-2016
	$password = password_hash($pass, PASSWORD_DEFAULT); // hash password
	 
	
	$tampil =mysqli_query($con,"SELECT * FROM tb_user where kode_user='$kode_user'");
	$cek    = mysqli_fetch_array($tampil);
	 
	if ($cek['kode_user']==$_SESSION['kode_user']){
	if ($pass!=""){
	$SQL = mysqli_query($con, "update tb_user set nama_pengguna='$nama',password='$password' where kode_user='$kode_user'");
	}else{
	$SQL = mysqli_query($con, "update tb_user set nama_pengguna='$nama' where kode_user='$kode_user'"); 
	}
	
	$SQL = mysqli_query($con, "update tb_bidang set nama_kabid='$nama_kabid',nip_kabid='$nip' where id_bidang='$cek[id_bidang]'");
	}
?>