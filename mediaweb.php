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
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Aplikasi SINANDA</title>
  <link rel="shortcut icon" href="images/brebes2.png" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css"> 
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script type="text/javascript" src="modul/js/jquery.min.js"></script>
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

.inputbox {
   position: relative;
  border: 1px solid #D3D3D3;
  background-color: #fff;
  vertical-align: middle;
  display: inline-block;
  overflow: hidden;
  white-space: nowrap;
  margin: 0;
  padding: 0;
  -moz-border-radius: 5px 5px 5px 5px;
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
	padding: 1px 6px 2px;
  
}

.inputbox:focus{
  -moz-box-shadow: 0 0 3px 0 #D3D3D3;
  -webkit-box-shadow: 0 0 3px 0 #D3D3D3;
  box-shadow: 0 0 3px 0 #D3D3D3;
}

.combobox {
    border: 1px solid #DCDCDC;
    font-weight: normal;
    height: 22px;
	padding: 1px 3px 2px;
    z-index: 1000;
	-moz-border-radius: 4px 4px 4px 4px;
    -webkit-border-radius: 4px 4px 4px 4px;
     border-radius: 4px 4px 4px 4px;
}

.combobox:focus{
  -moz-box-shadow: 0 0 3px 0 #D3D3D3;
  -webkit-box-shadow: 0 0 3px 0 #D3D3D3;
  box-shadow: 0 0 3px 0 #D3D3D3;
}

.inputboxnonaktif {
    border: 1px solid #999999;
	background-color:#E2E2D3;
    font-weight: normal;
    height: 22px;
	padding: 1px 5px 2px;
    z-index: 1000;
	text-transform:uppercase;
	-moz-border-radius: 4px 4px 4px 4px;
    -webkit-border-radius: 4px 4px 4px 4px;
     border-radius: 4px 4px 4px 4px;
}
.tombol{
  background:#006666;
  color:white;
  border-top:0;
  border-left:0;
  border-right:0;
  border-bottom:5px solid #ffff;
  padding:10px 20px;
  text-decoration:none;
  font-family:sans-serif;
  font-size:10pt;
}
</style>

<script type="text/javascript">
$(window).load(function() { $("#loading").fadeOut("slow"); })
</script>
</head>
<?PHP
if($_SESSION['level']=='user'){
?>
<body class="hold-transition sidebar-mini layout-fixed">
<div id="loading"></div>
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-cyan">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
       
        <a class="nav-link" href="?modul=aplikasi&proses=seting-akun">
           <i class="fa fa-user-circle"></i>  <b>&nbsp;<?PHP echo $_SESSION['namaops'] ; ?> <?PHP if (($_SESSION['level']=="user") or ($_SESSION['level']=="admin" and $_SESSION['akses']=="3" )) { echo " - "; echo $_SESSION['namasek']; }?></b>
          </a> 
        <a class="nav-link" data-toggle="modal" href="#keluarx">
           <i class="fa fa-power-off"></i> <b>&nbsp;Logout</b>
          </a> 
     
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a class="brand-link navbar-cyan" href="#" class="brand-link">
      <img src="images/brebes2.png" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="caret">S I N A N D A</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      
		<?PHP 
		 if($_SESSION['level']=='user'){
		If ($_GET['proses']=="detail-data-tri1"){
		$treemenu="menu-open";
		$aktifmenu="active";
		$aktiftri1="active";
		}else if ($_GET['proses']=="data-triwulan2"){
		$treemenu="menu-open";
		$aktifmenu="active";
		$aktiftri2="active";
		}else if ($_GET['proses']=="data-triwulan3"){
		$treemenu="menu-open";
		$aktifmenu="active";
		$aktiftri3="active";
		}else if ($_GET['proses']=="data-triwulan4"){
		$treemenu="menu-open";
		$aktifmenu="active";
		$aktiftri4="active";
		} 
		 }
		
		?>
		
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
		<?php if($_SESSION['level']=='user'){ ?> 	   
          <li class="nav-item has-treeview">
            <a href="dashboard" class="nav-link <?php echo $dashboard ?>">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard 
              </p>
            </a>
            
          </li>  
          <li class="nav-item has-treeview <?php echo $treemenu; ?>">
		    <a href="#" class="nav-link <?php echo $aktifmenu; ?>">
              <i class="nav-icon fas fa-th-large"></i>
              <p>
               Master Data
                <i class="fas fa-angle-left right"></i> 
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="data-triwulan1" class="nav-link <?php echo $aktiftri1 ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Triwulan 1</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="data-triwulan2" class="nav-link <?php echo $aktiftri2 ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Triwulan 2</p>
                </a>
              </li>  
              <li class="nav-item">
                <a href="data-triwulan3" class="nav-link <?php echo $aktiftri3 ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Triwulan 3</p>
                </a>
              </li>   
              <li class="nav-item">
                <a href="data-triwulan4" class="nav-link <?php echo $aktiftri4 ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Triwulan 4</p>
                </a>
              </li>   
            </ul>
          </li>   
          <li class="nav-item has-treeview <?php echo $treetools; ?>">
		    <a href="#" class="nav-link <?php echo $aktiftools; ?>">
              <i class="nav-icon fas fa-cog"></i>
              <p>
               Tools
                <i class="fas fa-angle-left right"></i> 
              </p>
            </a>
            <ul class="nav nav-treeview"> 
              <li class="nav-item">
                <a href="daftar-user-pengguna" class="nav-link <?php echo $aktifpengguna ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar User Pengguna</p>
                </a>
              </li>
               
		  <li class="nav-item has-treeview">
            <a data-toggle="modal" href="#keluarx" class="nav-link">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
               Logout
              </p>
            </a>
            
          </li>  
            </ul>
          </li>  
		<?php 
		} 
		?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) --> 
    <!-- /.content-header -->
<section class="content">
        <section class="header">
          <ol class="breadcrumb" style="background-color:#373434">
            <li><a href="#"><div style="color:#FFF">SISTEM LAYANAN PENYEDIAAN DATA (SINANDA) DINPERINAKER KAB. BREBES</div></a></li>
          </ol>
        </section>
        </section>
		
		
		
		<!-- /.content -->
    <!-- Main content -->
    <section class="content">
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
			
			date_default_timezone_set('Asia/Jakarta');	
			$tahun=date('Y');
            ?> 
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b></b>
        </div><div class="form-group">
		<div class="row">
		<div class="col-sm-7"><font style="font-size:14px;color:black">
         <strong>&copy; 2023 - Dinas Perindustrian dan Tenaga Kerja (Dinperinaker) Kab. Brebes </strong></font> 
		</div>
		<div class="col-sm-5" align=right><font style="font-size:14px;color:brown">
       <strong><?php echo "IP anda : ". get_client_ip()." - Browser : ".get_client_browser().""; ?> </strong></font>
		</div></div></div>
      </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<div class="modal fade" id="keluarx" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                </button>
                Anda yakin mau keluar dari Program ini ?
            </div>
            <div class="modal-footer">
                  <a href="logout.php"><button type="button" style="font-size:13px" class="btn btn-success"><i class="fa fa-check"></i> Keluar</button></a>
                  <button type="button" class="btn btn-danger" style="font-size:13px" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
            </div>
        </div>
    </div>
</div>      
<!-- jQuery -->
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
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) --> 
<!-- AdminLTE for demo purposes -->
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
	<script src="dist/js/demo.js"></script>  
	<script src="plugins/sweetalert2/sweetalert2.min.js"></script> 
	<script src="plugins/toastr/toastr.min.js"></script> 
	<link rel="stylesheet" href="plugins/toastr/toastr.min.css">  
	<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="plugins/datatables/dataTables.responsive.css">
	<script src="plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
	<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
	<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	
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
    <!-- Bootstrap WYSIHTML5 -->
 <script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>   
<script type="text/javascript">
      $(function () {
		 
        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd-mm-yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();
		 $('#tgl_lahir').datepicker({autoclose: 'true', format: 'dd-mm-yyyy', language: 'id'});
		 $('#tgl_surat').datepicker({autoclose: 'true', format: 'dd-mm-yyyy', language: 'id'});
		  $('#tmt_angkat').datepicker({autoclose: 'true', format: 'dd-mm-yyyy', language: 'id'});
		   $('#tmt_surtug').datepicker({autoclose: 'true', format: 'dd-mm-yyyy', language: 'id'});
        
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
		
        //Date range as a button
        $('#daterange-btn').daterangepicker(
                {
                  ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                    'Last 7 Days': [moment().subtract('days', 6), moment()],
                    'Last 30 Days': [moment().subtract('days', 29), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                  },
                  startDate: moment().subtract('days', 29),
                  endDate: moment()
                },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        );

        //iCheck for checkbox and radio inputs
        /*$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });*/

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
          showInputs: false
        });
      });
        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
          showInputs: false
        });	  
    </script>
    
<script>
      $(function () {
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": true,
 		  "responsive": true,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });

    </script>	
</body>
<?PHP
}else{
	echo "<link href='style.css' rel=stylesheet type=text/css>";
				echo "<br><font style=font-size:16px;color:red><center>ACCESS DENIED! <br>
						Halaman website diblokir.<br><br></font> ";
				echo "<a href='dashboard.php' style='color:#265180'><button type='button' class='btn btn-danger btn-sm'><i class='fa fa-backward'></i> <b>KEMBALI</b></button></a></center>";
}
?>
</html>
