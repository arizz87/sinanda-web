<?php
require_once 'koneksi.php';
require_once 'fungsi.php';
//require_once 'fungsi.php';
session_start();
//print_r($_POST['passwd']);
if(!empty($_SESSION['kode_user'])){
}else{
	header('location: index.php');
}
?> 
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en"> 
<head> 
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="x-ua-compatible" content="ie=edge">

<title>Aplikasi SINANDA</title> 
<link rel="shortcut icon" href="images/brebes2.png" />

<!-- Font Awesome Icons -->
<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="dist/css/adminlte.min.css?n=1">
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> 
<!-- Ionicons --> 
<link rel="stylesheet" href="css/animate.min.css"/>
<!-- Theme style -->  
   
<script type="text/javascript" src="modul/js/jquery.min.js"></script>
<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    }); 
  });
</script>
<style>
li {list-style:none;cursor:pointer}
#loading {
position: fixed;
left: 0px;
top: 0px;
width: 100%;
height: 100%;
z-index: 9999;
background: url(img/loadings.gif) 50% 50% no-repeat #fff;
}
</style>
<script src="plugins/sweetalert2/sweetalert2.min.js"></script> 
<script src="plugins/toastr/toastr.min.js"></script> 
<link rel="stylesheet" href="plugins/toastr/toastr.min.css"> 
	<script src="plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
    <script src="plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
    <script src="plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
    <!-- date-range-picker -->
    <script src="js/moment.min.js" type="text/javascript"></script>
    <!-- bootstrap datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="plugins/datepicker/locales/bootstrap-datepicker.id.js" type="text/javascript"></script>
    <!-- bootstrap rangepicker -->
	<script src="plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- bootstrap color picker -->
    <script src="plugins/colorpicker/bootstrap-colorpicker.min.js" type="text/javascript"></script>
    <!-- bootstrap time picker -->
    <script src="plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>
    <!-- iCheck 1.0.1 -->
    <script src="plugins/iCheck/icheck.min.js"></script>
    <!-- Page script -->
	<link href="plugins/datepicker/datepicker3.css" rel="stylesheet"/> 
    <!-- iCheck for checkboxes and radio inputs 
    <link href="plugins/iCheck/all.css" rel="stylesheet" type="text/css" /> -->
    <!-- Bootstrap Color Picker -->
    <link href="plugins/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet"/>
    <!-- Bootstrap time Picker -->
    <link href="plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet"/> 
    <link rel="stylesheet" href="plugins/pace-progress/themes/purple/pace-theme-flash.css">
	<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>  
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script> 
<script type="text/javascript">
$(window).load(function() { $("#loading").fadeOut("slow"); })
</script>
</head>

<?php 
$cariuser=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * FROM tb_user where kode_user='".$_SESSION['kode_user']."'"));
$cariusersek=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * FROM tb_user,tb_npsn where tb_npsn.npsn=tb_user.NPSN and kode_user='".$_SESSION['kode_user']."'"));
if ($cariuser['status']=="0"){
?>
<body onload="showModalsakun()" class="hold-transition sidebar-collapse layout-navbar-fixed layout-top-nav layout-footer-fixed">
<?php
}else{
?>	
 <body class="hold-transition sidebar-collapse layout-navbar-fixed layout-top-nav layout-footer-fixed">
<?PHP
}

if($_SESSION['level']=='user'){
?>  

<div id="loading"></div>
<div class="modal fade" id="keluarx" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                </button>
               <font style='font-size:16px'>Anda yakin mau keluar dari Sistem ini ?</font>
            </div>
            <div class="modal-footer">
                  <a href="logout.php"><button type="button" style="font-size:14px" class="btn btn-success"><i class="fa fa-check"></i> Keluar</button></a>
                  <button type="button" class="btn btn-danger" style="font-size:14px" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
            </div>
        </div>
    </div>
</div>   
 
   
<div class="wrapper"> 
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
     <a href="#" class="navbar-brand"> 
        <span class="brand-text font-weight-light"><img src="img/logo-sinanda.png" width=50 height=45 /> <font style=color:#3e3c3b><b>S I N A N D A <span class="text-sm">Sistem Informasi Layanan Data</span></b></font>
      </a> 
      <!-- Right navbar links -->
       
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
 
   <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
	<?php
            //print_r($_GET);
            $select_modul="SELECT *FROM eps_modul WHERE url_seo='".$_GET['modul']."'";
            $query_modul=mysqli_query($GLOBALS["___mysqli_ston"], $select_modul);
            $array_modul=mysqli_fetch_array($query_modul);
            if(!empty($_GET['proses']) and !empty($_GET['modul'])){
                if(file_exists("modul/$array_modul[folder]/$_GET[proses].php")) {
                    include("modul/$array_modul[folder]/$_GET[proses].php");
                }else{
                    echo "<h2>Error !<br/>Halaman tidak ditemukan !</h2>";
                }
            }
            ?> 
    </div>
    </div>
    </div>
    </div> 
    <!-- /.content -->
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
 
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
   <footer class="main-footer"> 
   <?php
   	if ($_GET['proses']=="dashboard"){
	$cekuser=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * FROM tb_user where kode_user='".$_SESSION['kode_user']."'"));
	$cekbidang=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * FROM tb_bidang where id_bidang='".$cekuser['id_bidang']."'"));	
  
	?> 
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto float-right">
        <!-- Messages Dropdown Menu -->  
		<li class="nav-item dropdown"> 
		    <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fa fa-1x fa-th-large"></i> 
             <font style=color:#3e3c3b><span class="text-sm"> &nbsp;Menu</span></font>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-header">Pilihan Menu</span> 
            <div class="dropdown-divider"></div>
            <a href="data-triwulan1" class="dropdown-item">
              <i class="fas fa-dot-circle mr-2"></i>Data Triwulan 1	 
            </a>
            <div class="dropdown-divider"></div>
            <a href="data-triwulan2" class="dropdown-item">
              <i class="fas fa-dot-circle mr-2"></i>Data Triwulan 2
            </a>
            <div class="dropdown-divider"></div>
            <a href="data-triwulan3" class="dropdown-item">
              <i class="fas fa-dot-circle mr-2"></i>Data Triwulan 3
            </a>  
            <div class="dropdown-divider"></div>
            <a href="data-triwulan4" class="dropdown-item">
              <i class="fas fa-dot-circle mr-2"></i>Data Triwulan 4
            </a>  
          </div>
        </li>  
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-1x fa-user"></i> 
            <font style=color:#3e3c3b> &nbsp;<span class="text-sm">Profil</span></font>
          </a>
		  <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right">
            <span class="dropdown-header"><font style="font-size:14px"> <i class="fas fa-user-circle"></i> Profil Pengguna | <a href="update-pengguna" title="Update Pengguna"><i class="fas fa-edit"></i></a></span>
			<div class="dropdown-divider"></div>
				 <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
               <div class="media-body"> 
			   <table cellspacing="0"  cellpadding="1" border="0"  width="100%"> 
					<tr class="text-sm text-muted" style="font-size:11px" height=35>
					<td><p style="font-size:11.5px">Nama Pengguna</td> 
					<td><p style="font-size:13px"><b><?php echo $cekuser['nama_pengguna'] ?></td> 
					</tr> 
					<tr class="text-sm text-muted" style="font-size:11px" height=35>
					<td width="32%"><p style="font-size:11.5px">Nama Bidang</td> 
					<td width="68%"><p style="font-size:12px"><b><?php echo $cekbidang['nama_bidang'] ?></p></td> 
					</tr>  
					<tr class="text-sm text-muted" style="font-size:11px" height=35>
					<td><p style="font-size:11.5px">Nama Ka Bidang</td> 
					<td><p style="font-size:13px"><b><?php echo $cekbidang['nama_kabid'] ?></td> 
					</tr>
					<tr class="text-sm text-muted" style="font-size:11px" height=35>
					<td><p style="font-size:11.5px">N I P</td> 
					<td><p style="font-size:13px"><b><?php echo $cekbidang['nip_kabid'] ?></td> 
					</tr>
				</table>  
                </div>
              </div>
              <!-- Message End -->
            </a>
          </div> 
        </li> 
		  <a data-toggle="modal" href="#keluarx" class="nav-link">
        <span><i class="fa fa-1x fa-power-off"></i></span>
		 <font style=color:#3e3c3b> &nbsp;<span class="text-sm">Logout</span></font>
      </a>  	
      </ul>
		<?php
		} 
		?> 
		<?php
		if (($_GET['proses']=="detail-data-tri1") or ($_GET['proses']=="detail-data-tri2") or ($_GET['proses']=="detail-data-tri3") or ($_GET['proses']=="detail-data-tri4") or ($_GET['proses']=="update-pengguna")){
		?>
		<ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto float-right">
        <!-- Messages Dropdown Menu -->  
        <!-- Notifications Dropdown Menu --> 
		  <!-- Messages Dropdown Menu -->  
		<li class="nav-item dropdown"> 
		    <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fa fa-1x fa-th-large"></i> 
             <font style=color:#3e3c3b><span class="text-sm"> &nbsp;Menu</span></font>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-header">Pilihan Menu</span> 
            <div class="dropdown-divider"></div>
            <a href="data-triwulan1" class="dropdown-item">
              <i class="fas fa-dot-circle mr-2"></i>Data Triwulan 1	 
            </a>
            <div class="dropdown-divider"></div>
            <a href="data-triwulan2" class="dropdown-item">
              <i class="fas fa-dot-circle mr-2"></i>Data Triwulan 2
            </a>
            <div class="dropdown-divider"></div>
            <a href="data-triwulan3" class="dropdown-item">
              <i class="fas fa-dot-circle mr-2"></i>Data Triwulan 3
            </a>  
            <div class="dropdown-divider"></div>
            <a href="data-triwulan4" class="dropdown-item">
              <i class="fas fa-dot-circle mr-2"></i>Data Triwulan 4
            </a>  
          </div>
        </li>  
        <li class="nav-item dropdown">
          <a class="nav-link" href="dashboard">
            <i class="fa fa-1x fa-backward"></i>  
            <font style=color:#3e3c3b> &nbsp; <span class="text-sm">&nbsp;Kembali</span></font>
          </a> 
        </li> 
        <li class="nav-item dropdown">
           <a data-toggle="modal" href="#keluarx" class="nav-link">
        <span><i class="fa fa-1x fa-power-off"></i></span>
		 <font style=color:#3e3c3b> &nbsp;<span class="text-sm">Logout</span></font>
      </a>  	
        </li>   
      </ul> 
	  <?php
		}
		?>
  </footer>
</div> 
  
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
 
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script> 
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->  
	<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="plugins/datatables/dataTables.responsive.css">
	<script src="plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
	<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script> 
    <!-- date-range-picker -->
    <script src="js/moment.min.js" type="text/javascript"></script>
</body>
<?PHP
}else{
	echo "<link href='style.css' rel=stylesheet type=text/css>";
				echo "<br><font style=font-size:16px;color:red><center>ACCESS DENIED! <br>
						Halaman website diblokir.<br><br></font> ";
				echo "<a href='home.php' style='color:#265180'><button type='button' class='btn btn-danger btn-sm'><i class='fa fa-backward'></i> <b>KEMBALI</b></button></a></center>";
}
?>
</html>
