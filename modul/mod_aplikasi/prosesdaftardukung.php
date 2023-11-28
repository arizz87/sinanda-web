<?php
error_reporting(0);
$mode=$_GET['mode'];
	require_once'../../koneksi.php'; 
	require_once'../../fungsi.php';
	
session_start();  
?>
	 <script src="plugins/select2/js/select2.full.min.js"></script>
	 <link rel="stylesheet" href="plugins/select2/select2.css"> 
<script type="text/javascript">
      $(function () {
		 $(".select2").select2(); 
        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd-mm-yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask(); 
		  $('#tgldari').datepicker({autoclose: 'true', format: 'dd-mm-yyyy', language: 'id'}); 
		  $('#tglsampel').datepicker({autoclose: 'true', format: 'dd-mm-yyyy', language: 'id'}); 
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
	function check_session(){
	$.ajax({
		url: "modul/mod_aplikasi/check_session.php",
		method: "POST",
		success: function(data){
			if(data == "1"){
				alert("Maaf anda sudah logout, Silahkan login kembali.");
				window.location.href = "logout.php";
			}
		}
	})		
	}

 
function specialonly(myfield, e, dec)
{
var key;
var keychar;
if (window.event)
 key = window.event.keyCode;
else if (e)
 key = e.which;
else
 return true;
keychar = String.fromCharCode(key);
// control keys
if ((key==null) || (key==0) || (key==8) || 
 (key==9) || (key==13) || (key==27) )
 return true;
// numbers
else if ((("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-`&()/ ").indexOf(keychar) > -1))
 return true;
// decimal point jump
else if (dec && (keychar == "."))
 {
 myfield.form.elements[dec].focus();
 return false;
 }
else
 return false;
}
  

function numbersonly(myfield, e, dec)
{
var key;
var keychar;
if (window.event)
 key = window.event.keyCode;
else if (e)
 key = e.which;
else
 return true;
keychar = String.fromCharCode(key);
// control keys
if ((key==null) || (key==0) || (key==8) || 
 (key==9) || (key==13) || (key==27) )
 return true;
// numbers
else if ((("0123456789:.").indexOf(keychar) > -1))
 return true;
// decimal point jump
else if (dec && (keychar == "."))
 {
 myfield.form.elements[dec].focus();
 return false;
 }
else
 return false;
}
 
</script> 

<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
<style>
	.scroll{
		display:block;
		border:1px solid red;
		padding:5px;
		margin-top:5px;
		width:300px;
		height:50px;
		overflow:scroll;
	}
	.auto{
 	display:block;
		border:1px solid #DCDCDC;
		padding:5px;
		margin-top:5px;
		width:100%;
		height:520px;
		overflow:auto;
	}
	.auto2{
 	display:block;
		border:1px solid #DCDCDC;
		padding:5px;
		margin-top:5px;
		width:100%;
		height:420px;
		overflow:auto;
	}
	
	</style>	
<?php
if($mode=='dokumen-tambahdata'){ 
$id_dok =$_GET['kode'];

$rs = mysqli_query($GLOBALS["___mysqli_ston"],"select * from tb_ouput_data where id='$id_dok'");
$item = mysqli_fetch_array($rs);  
 
?> 
           <div class="modal-header">
					<h5 class="modal-title" id="myModalLabel3"><i class="fa fa-plus"></i> <b>Tambah Data</b></h5> 
					</div> 
		  <div class="modal-body"> 
			<form enctype="multipart/form-data" class="form-horizontal" method="post"  name="formDetail" id="formDetail">  
		<div class="row">
          <!-- left column -->
          <div class="col-md-12">
		  <div class="card card-info"> 
          <!-- /.card-header -->
          <div class="card-body">
		  <font style="font-size:14px" color="black">
						<div class="form-group row"> 
                          <div class="col-sm-12">Uraian Data Dukung
                           <textarea class="form-control" id=uraian name=uraian rows=2 placeholder="Masukan Uraian Data Dukung" style="font-size:14px"><?php echo $item['uraian_data'] ?></textarea>
                          </div>  					  
                        </div>
						<div class="form-group row"> 
                          <div class="col-sm-6">Kode Data
                             <input type="text" class="form-control" name="kode" id="kode" autocomplete="off" style="text-transform:uppercase;font-size:13px" value="<?php echo $item['kode_data'] ?>">
                          </div>  			  
                        </div> 
					 </font>
            <!-- /.row -->
          </div> 
        </div>
		</div> </div> 	
					</div>	
            <div class="modal-footer">
                <button type="button" style="font-size:13px" onClick="simpan()"  class="btn btn-success"><i class="fa fa-save"></i> Simpan</button> 
				 <button type="button" style="font-size:13px" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
            </div>
						</form>
<?php 
}
?>		
<?php
if($mode=='dokumen-editdata'){ 
$id_dok =$_GET['kode'];

$rs = mysqli_query($GLOBALS["___mysqli_ston"],"select * from tb_ouput_data where id='$id_dok'");
$item = mysqli_fetch_array($rs);  
?> 
           <div class="modal-header">
					<h5 class="modal-title" id="myModalLabel3"><i class="fa fa-plus"></i> <b>Tambah Data</b></h5> 
					</div> 
		  <div class="modal-body"> 
			<form enctype="multipart/form-data" class="form-horizontal" method="post"  name="formDetail" id="formDetail">  			 
			<input type="hidden" class="form-control" id="idupdate" name="idupdate" value="<?php echo $id_dok ?>">   			  
		<div class="row">
          <!-- left column -->
          <div class="col-md-12">
		  <div class="card card-info"> 
          <!-- /.card-header -->
          <div class="card-body">
		  <font style="font-size:14px" color="black">
						<div class="form-group row"> 
                          <div class="col-sm-12">Uraian Data Dukung
                           <textarea class="form-control" id=uraian name=uraian rows=2 placeholder="Masukan Uraian Data Dukung" style="font-size:14px"><?php echo $item['uraian_data'] ?></textarea>
                          </div>  					  
                        </div>
						<div class="form-group row"> 
                          <div class="col-sm-6">Kode Data
                             <input type="text" class="form-control" name="kode" id="kode" autocomplete="off" style="text-transform:uppercase;font-size:13px" value="<?php echo $item['kode_data'] ?>">
                          </div>  		  
                        </div> 
					 </font>
            <!-- /.row -->
          </div> 
        </div>
		</div> </div> 	
					</div>	
            <div class="modal-footer">
                <button type="button" style="font-size:13px" onClick="simpanedit()"  class="btn btn-success"><i class="fa fa-save"></i> Simpan</button> 
				 <button type="button" style="font-size:13px" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
            </div>
						</form>
<?php 
}
?>	

<?php
if($mode=='dokumen-hapusdata'){ 
$id_dok =$_GET['kode']; 
$rs = mysqli_query($GLOBALS["___mysqli_ston"],"select * from tb_ouput_data where id='$id_dok'");
$item = mysqli_fetch_array($rs); 
$cek1 = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select * from tb_datadukung_bidang where id_data='$id_dok'")); 
$cek2 = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select * from tb_outcome where pembilang='$id_dok'")); 
$cek3 = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select * from tb_outcome where pembagi='$id_dok'")); 
?> 
           <div class="modal-header">
					<h5 class="modal-title" id="myModalLabel3"><i class="fa fa-eraser"></i> <b>Hapus Data</b></h5> 
					</div> 
		<div class="modal-body"> 
			<form enctype="multipart/form-data" class="form-horizontal" method="post"  name="formDetail" id="formDetail">  
		<div class="row">
          <!-- left column -->
          <div class="col-md-12">
		  <div class="card card-info"> 
          <!-- /.card-header -->
          <div class="card-body">
		  <font style="font-size:14px" color="black">
						<div class="form-group row"> 
                          <div class="col-sm-12">Uraian Data Dukung
                           <textarea class="form-control" disabled rows=2 placeholder="Masukan Uraian Data Dukung" style="font-size:14px"><?php echo $item['uraian_data'] ?></textarea>
                          </div>  					  
                        </div>
						<div class="form-group row"> 
                          <div class="col-sm-6">Kode Data
                             <input type="text" class="form-control" disabled autocomplete="off" style="text-transform:uppercase;font-size:13px" value="<?php echo $item['kode_data'] ?>">
                          </div>  		  
                        </div> 
					 </font>
            <!-- /.row -->
          </div> 
        </div>
		</div> </div> 	
		
			<form enctype="multipart/form-data" class="form-horizontal" method="post"  name="formSetuju" id="formSetuju">  			 
			<input type="hidden" class="form-control" id="idhapus" name="idhapus" value="<?php echo $id_dok ?>">   			 
			<input type="hidden" class="form-control" id="type" name="type" value="hapus"> 
			 <div class="alert alert-danger alert-dismissible"> 
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Peringatan!</h5>
				  Anda yakin ingin menghapus Data ini ? Pastikan data sudah di cek.
                </div> 
					</div>	 
            <div class="modal-footer">
			<?php 
			if($cek1  or $cek2  or $cek3){ 
			?>
            <button type="button" style="font-size:13px" class="btn btn-secondary" disabled title="Data Sedang Digunakan, Silahkan Refresh Halaman"><i class="fa fa-trash"></i> Hapus</button>
			<?php
			}else{
			?>
			<button type="button" style="font-size:13px" onClick="submitHapus()"  class="btn btn-info"><i class="fa fa-trash"></i> Hapus</button>
			<?php
			}
			?>
				 <button type="button" style="font-size:13px" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
            </div>
						</form>
<?php 
}
?>	 


<?php
if($mode=='dokumen-salindata'){ 
$id_dok =$_GET['kode'];  
?> 
<div class="modal-header">
						<h5 class="modal-title" id="myModalLabel"><i class="fa fa-copy"></i> <b>Salin Data</b></h5>
						<button type="button"  id="close" name="close" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body"> 
				<form enctype="multipart/form-data" class="form-horizontal" method="post">	
			 <div class="row alert alert-info">  
								   <div class="col-sm-4">
								    <select class="form-control" name="tahun" style="font-size:13px" id="tahun"> 
									 <option value="">-- Pilih Tahun Anggaran --</option>
									<?php
									$date=date("Y"); 
									$tahun=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT distinct tahun FROM tb_ouput_data where tahun < $_SESSION[tahun] order by tahun DESC");
									while($array_tahun=mysqli_fetch_array($tahun)){  
									echo "<option value=\"$array_tahun[tahun]\">Tahun Anggaran $array_tahun[tahun]</option>\n";
									} 
									?> 
									</select> 
									</div>  
									<div class="col-sm-2"><button type=button onClick="ceksalindata()"  class="btn btn-primary" style="font-size:13px"><i class="fa fa-search"></i> Cek Data</button>
							  </div>   
						</div>
						<div id="listdata"></div> 
						</form>
						</div> 
            <div class="modal-footer">
                <button type="button"  onClick="submitSalindata()" style="font-size:13px" class="btn btn-success" ><i class="fa fa-save"></i> Simpan</button>
				<button type="button" style="font-size:13px" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
            </div>
						
<?php
}
?> 