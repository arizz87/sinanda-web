<?php
require_once'./koneksi.php';
//require_once 'fungsi.php';
//include'datediff.php'; 

		$username=$_POST['usernametukarx'];//09-09-2016
		$password=$_POST['passtukarx'];//09-09-2016
		
		$sql_check="SELECT * FROM tb_user WHERE username='".$username."'";
		$result=mysqli_query($GLOBALS["___mysqli_ston"], $sql_check);
		$getUser=mysqli_num_rows($result);
		$getDataUser=mysqli_fetch_array($result);
		// Apabila username dan password ditemukan
		if($getUser === 1 && $getDataUser['level']=='user'){
			if ($getDataUser['password']) {
				session_start();
				$_SESSION['kode_user']	=$getDataUser['kode_user'];
				$_SESSION['level']		=$getDataUser['level'];
				$_SESSION['username']	=$getDataUser['username'];
				$_SESSION['namaops']	= $getDataUser['nama_operator'];
				$_SESSION['namasek']	= $getDataUser['nama_sekolah'];
				$_SESSION['npsn']		=$getDataUser['NPSN'];
				$_SESSION['akses']		=$getDataUser['akses']; 
				echo "<script>alert('Login berhasil silahkan manfaatkan akses data dengan bijak.');</script>";
				header("location:dashboard");
				//echo "Is Valid User";
			} 
		} else if($getUser === 1 && $getDataUser['level']=='admin'){
			if ($getDataUser['password']) {
				session_start();
				$_SESSION['kode_user']	=$getDataUser['kode_user'];
				$_SESSION['level']		=$getDataUser['level'];
				$_SESSION['username']	=$getDataUser['username'];
				$_SESSION['namaops']	= $getDataUser['nama_operator'];
				$_SESSION['namasek']	= $getDataUser['nama_sekolah'];
				$_SESSION['npsn']		=$getDataUser['NPSN'];
				$_SESSION['akses']		=$getDataUser['akses']; 
				echo "<script>alert('Login berhasil silahkan manfaatkan akses data dengan bijak.');</script>";
				header("location:home");
				//echo "Is Valid User";
			} 
		} 

?>