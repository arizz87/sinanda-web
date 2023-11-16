<?php
require_once 'koneksi.php';
$hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu");
$bulan = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"); 
	//session_start();
	//include('koneksi.php');
	
	$username = $_POST['usernamex'];
	$password = $_POST['passwordx'];
	
		$sql_check="SELECT * FROM tb_user WHERE username='".$username."'";
		$result=mysqli_query($GLOBALS["___mysqli_ston"], $sql_check);
		$getUser=mysqli_num_rows($result);
		$getDataUser=mysqli_fetch_array($result);
		// Apabila username dan password ditemukan
		if ($getUser === 1 && $getDataUser['level']=='admin') {
			if (password_verify($password,$getDataUser['password'])) {
				session_start();
				$_SESSION['kode_user']	=$getDataUser['kode_user'];
				$_SESSION['level']		=$getDataUser['level'];
				$_SESSION['username']	=$getDataUser['username'];
				$_SESSION['nama_pengguna']	= $getDataUser['nama_pengguna']; 
				$_SESSION['id_bidang']	= $getDataUser['id_bidang'];  
				$_SESSION['tahun']=$_POST['tahunx'];
				header("location:home");
				//echo "Is Valid User";
			}else{
		echo "<link href='style.css' rel=stylesheet type=text/css>";
				echo "<br><font style=font-size:16px;color:red><center>ACCESS DENIED! <br>
						Halaman website diblokir.<br><br></font> ";
				echo "<a href='dashboard.php' style='color:#265180'><button type='button' class='btn btn-danger btn-sm'><i class='fa fa-backward'></i> <b>KEMBALI</b></button></a></center>";

		} 
		}else if($getUser === 1 && $getDataUser['level']!='admin'){
			if (password_verify($password,$getDataUser['password'])) {
				session_start();
				$_SESSION['kode_user']	=$getDataUser['kode_user'];
				$_SESSION['level']		=$getDataUser['level'];
				$_SESSION['username']	=$getDataUser['username'];
				$_SESSION['nama_pengguna']	= $getDataUser['nama_pengguna'];
				$_SESSION['id_bidang']	= $getDataUser['id_bidang'];
				$_SESSION['tahun']=$_POST['tahunx'];
				header("location:dashboard");
				//echo "Is Valid User";
			}else{
		echo "<link href='style.css' rel=stylesheet type=text/css>";
				echo "<br><font style=font-size:16px;color:red><center>ACCESS DENIED! <br>
						Halaman website diblokir.<br><br></font> ";
				echo "<a href='dashboard.php' style='color:#265180'><button type='button' class='btn btn-danger btn-sm'><i class='fa fa-backward'></i> <b>KEMBALI</b></button></a></center>";

		} 
		}else{
		echo "<link href='style.css' rel=stylesheet type=text/css>";
				echo "<br><font style=font-size:16px;color:red><center>ACCESS DENIED! <br>
						Halaman website diblokir.<br><br></font> ";
				echo "<a href='dashboard.php' style='color:#265180'><button type='button' class='btn btn-danger btn-sm'><i class='fa fa-backward'></i> <b>KEMBALI</b></button></a></center>";

		}
?>

<link rel="stylesheet" href="./dist/css/adminlte.min.css"> 