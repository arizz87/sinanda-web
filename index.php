<?php
require_once 'koneksi.php';
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Aplikasi SINANDA</title> 
  <link rel="shortcut icon" href="images/brebes2.png" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/> 
  <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css"> 
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">  
  <link rel="stylesheet" href="./plugins/toastr/toastr.min.css"> 
  <link rel="stylesheet" href="./dist/css/adminlte.min.css"> 
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="css/menu.css"/>
  <link rel="stylesheet" href="css/main.css"/> 
  <link rel="stylesheet" href="css/bgimg.css"/> 
  <link rel="stylesheet" href="css/font.css"/>
  <link rel="stylesheet" href="css/font-awesome.min.css"/>
<style>
button, input, optgroup, select, textarea {
  margin: 0;
  font-family: inherit;
  font-size: 14px;
  line-height: inherit;
}
 
</style>
</head>
<body class="hold-transition sidebar-mini">  

     <button type="button"  onClick="login()" class="btn btn-default" id=login>Login</button>

<div class="background"></div>
	<div class="backdrop"></div> 
	<div class="login-form-container" id="login-form">
	<div  class="animate__animated animate__rubberBand animate__repeat-2">
		<div class="login-form-content">
			<div class="login-form-header">
				<div class="logo">
				<img src="img/logo-sinanda.png" width=140 height=120 /></h1>
				</div>
				<div style="color:green; font-size:24px; font-weight:600">S I N A N D A</div>
      <div style="color:brown; font-size:16px; font-weight:600">(Sistem Layanan Penyediaan Data)</div> <hr>
       </center> 
			</div>
			<form method="post" action="" class="login-form" enctype="multipart/form-data" id="formLogin">
			  <div class="input-container"> 
			 <select class="form-control" name="tahun" id="tahun" style="height:35px;width:100%;font-size:14px;">
			 <?php
			 $jenis=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM tb_tahun where status='1' order by tahun_anggaran DESC");
			 while($array_jenis=mysqli_fetch_array($jenis)){
			 echo "<option value=\"$array_jenis[tahun_anggaran]\">$array_jenis[tahun_anggaran]</option>\n";
			 }
			 ?>  
            </select>
				</div>
				<div class="input-container">
					<i class="fa fa-user"></i>
					<input type="text" class="input" id="username" name="username" placeholder="Username">
				</div>
				<div class="input-container">
					<i class="fa fa-lock"></i>
					<input type="password" class="input" id="password" name="password" placeholder="Password"/> 
				</div>   
				<div id="ceklogin"></div>
				<br>
				<div class="input" align=center>
				<button type="button"  onClick="login()" value="Login" class="btn btn-success" style=width:350px><i class="fa fa-sign-in"></i> Login</button>
				</div>
			</form> 
		</div></div>
	</div> 

	
   <div class="modal fade" id="myModalsdata" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static">
	<div class="modal-dialog modal-xs"> 
				<div class="modal-content"> 
					<div class="modal-header"> 
						<h5 class="modal-title" id="myModalLabel2"><i class="fa fa-info-circle"></i> <b>Info</b></h4> 
					</div> 
					<form method="post" action="login.php"> 
					<input type="hidden" class="form-control" id="usernamex" name="usernamex">
					<input type="hidden" class="form-control" id="passwordx" name="passwordx">
					<input type="hidden" class="form-control" id="tahunx" name="tahunx">
					 <div class="modal-body with-padding"> 
				    Login berhasil silahkan menjalankan Aplikasi SINANDA. 
                    </div><hr>
					<table border="0" align="right"> 
					 <tbody><tr> 
					 <td> </td>  
					 <td> 
					<button type="submit" style="font-size:13px" class="btn btn-success"><i class="fa fa-check"></i> OK</button></td>  
					 <td>&nbsp;&nbsp;&nbsp;</td> 
					 </tr></tbody></table></div> 
					</form>
			</div> 
		</div>
<script>

</script> 
<script src="./plugins/jquery/jquery.min.js"></script> 
<script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script> 
<script src="./plugins/sweetalert2/sweetalert2.min.js"></script> 
<script src="./plugins/toastr/toastr.min.js"></script> 
<script src="./dist/js/adminlte.min.js"></script> 
<script src="./dist/js/demo.js"></script> 
<script src="./modul/js/sinanda-login.js"></script> 
</body>
</html>
