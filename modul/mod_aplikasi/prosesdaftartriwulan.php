<?php
error_reporting(0);
$mode=$_GET['mode'];
	require_once'../../koneksi.php'; 
	require_once'../../fungsi.php';
	
session_start();  
?>
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
		  $('#tglsampel2').datepicker({autoclose: 'true', format: 'dd-mm-yyyy', language: 'id'});
		  $('#tgldari2').datepicker({autoclose: 'true', format: 'dd-mm-yyyy', language: 'id'});
		  $('#tglsampai').datepicker({autoclose: 'true', format: 'dd-mm-yyyy', language: 'id'}); 
		  $('#tglsampai2').datepicker({autoclose: 'true', format: 'dd-mm-yyyy', language: 'id'}); 
		  $('#tgldariedit').datepicker({autoclose: 'true', format: 'dd-mm-yyyy', language: 'id'});
		  $('#tglsampaiedit').datepicker({autoclose: 'true', format: 'dd-mm-yyyy', language: 'id'});
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
if($mode=='dokumen-input-triwulan1-a'){ 
$id_dok =$_GET['kode'];

$rs = mysqli_query($GLOBALS["___mysqli_ston"],"select * from tb_ikk_bidang where id_ikk='$id_dok'");
$item = mysqli_fetch_array($rs);  
$cekikk=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_outcome where id_outcome='".$item['id_data']."'"));   
$pembilang=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ouput_data where id='".$cekikk['pembilang']."'")); 
$pembagi=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ouput_data where id='".$cekikk['pembagi']."'"));  
$cek=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1 where id_ikk='".$id_dok."' and id_bidang='".$_SESSION['id_bidang']."' and triwulan=1 and tahun='".$_SESSION['tahun']."'"));
?> 
           <div class="modal-header">
					<h5 class="modal-title" id="myModalLabel3"><i class="fa fa-edit"></i> <b>Input Data</b></h5> 
					</div> 
		  <div class="modal-body"> 
			<form enctype="multipart/form-data" class="form-horizontal" method="post"  name="formDetail" id="formDetail">   
			<input type="hidden" class="form-control" id=idpembilang name=idpembilang  style="font-size:13px" value="<?php echo $item['id_ikk'] ?>">   
		<?php
		if ($cekikk['datapersen']==1){
		?>
		  <div class="alert alert-warning" style="font-size:13px"> 
		  <font style="font-size:16px" color="black"><?php echo $pembilang['uraian_data']."<b> (Kode ".$pembilang['kode_data'].")</b> " ?>
		  </div>
		<?php
		}else{
		?> 
		  <div class="alert alert-warning" style="font-size:13px"> 
		  <font style="font-size:16px" color="black"><?php echo $cekikk['uraian_outcome']?>
		  </div>
		<?php
		}
		?> 
				
						<?php
						if ($cek['validasi']==0){
						?>
						<div class="form-group row">  
                          <div class="col-sm-7"> </div>  					  
                          <div class="col-sm-5">Masukan Angka
                         <input type="text" class="form-control" name="angka" id="angka" onkeypress="return numbersonly(this, event)"  autocomplete="off" style="text-align:right" value="<?php echo rupiah2($cek['angka_pembilang']) ?>"> 
						</div>  					  
                        </div>  
						<?php
						}else{
						?>
						<div class="form-group row">  
                          <div class="col-sm-7"> </div>  					  
                          <div class="col-sm-5">Masukan Angka
                         <input type="text" class="form-control" name="angka" id="angka" readonly  autocomplete="off" style="text-align:right" value="<?php echo rupiah2($cek['angka_pembilang']) ?>"> 
						</div>  					  
                        </div>
						<font style="font-size:15px;color:red"><b>Keterangan :</b> Maaf data anda sudah di Validasi.</font>
						<?php
						}
						?>
					 </font>  
					</div>	
            <div class="modal-footer">
				<?php
				if ($cek['validasi']==0){
				?>
                <button type="button" style="font-size:13px" onClick="simpan1a()"  class="btn btn-success"><i class="fa fa-save"></i> Simpan</button> 
				<?php
				}
				?>
				<button type="button" onclick=tutup() style="font-size:13px" class="btn btn-danger"><i class="fa fa-times"></i> Batal</button>
            </div>
						</form>
<?php 
}
?>	
	
<?php
if($mode=='dokumen-input-triwulan1-b'){ 
$id_dok =$_GET['kode'];

$rs = mysqli_query($GLOBALS["___mysqli_ston"],"select * from tb_ikk_bidang where id_ikk='$id_dok'");
$item = mysqli_fetch_array($rs);  
$cekikk=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_outcome where id_outcome='".$item['id_data']."'"));   
$pembilang=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ouput_data where id='".$cekikk['pembilang']."'")); 
$pembagi=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ouput_data where id='".$cekikk['pembagi']."'"));  
$cek=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1 where id_ikk='".$id_dok."' and id_bidang='".$_SESSION['id_bidang']."' and triwulan=1 and tahun='".$_SESSION['tahun']."'"));
?> 
           <div class="modal-header">
					<h5 class="modal-title" id="myModalLabel3"><i class="fa fa-edit"></i> <b>Input Data</b></h5> 
					</div> 
		  <div class="modal-body"> 
			<form enctype="multipart/form-data" class="form-horizontal" method="post"  name="formDetail" id="formDetail">   
			<input type="hidden" class="form-control" id=idpembagi name=idpembagi  style="font-size:13px" value="<?php echo $item['id_ikk'] ?>">
                
		  <div class="alert alert-warning" style="font-size:13px"> 
		  <font style="font-size:16px" color="black"><?php echo $pembagi['uraian_data']."<b> (Kode ".$pembagi['kode_data'].")</b> " ?>
		  </div>
				
						<?php
						if ($cek['validasi']==0){
						?>
						<div class="form-group row">  
                          <div class="col-sm-7"> </div>  					  
                          <div class="col-sm-5">Masukan Angka
                         <input type="text" class="form-control" name="angka" id="angka" onkeypress="return numbersonly(this, event)"  autocomplete="off" style="text-align:right" value="<?php echo rupiah2($cek['angka_pembagi']) ?>"> 
						</div>  					  
                        </div>  
						<?php
						}else{
						?>
						<div class="form-group row">  
                          <div class="col-sm-7"> </div>  					  
                          <div class="col-sm-5">Masukan Angka
                         <input type="text" class="form-control" name="angka" id="angka" readonly  autocomplete="off" style="text-align:right" value="<?php echo rupiah2($cek['angka_pembagi']) ?>"> 
						</div>  					  
                        </div>
						<font style="font-size:15px;color:red"><b>Keterangan :</b> Maaf data anda sudah di Validasi.</font>
						<?php
						}
						?>
					 </font>  
					</div>	
            <div class="modal-footer">
				<?php
				if ($cek['validasi']==0){
				?>
                <button type="button" style="font-size:13px" onClick="simpan1b()"  class="btn btn-success"><i class="fa fa-save"></i> Simpan</button> 
				<?php
				}
				?>
				<button type="button" onclick=tutup() style="font-size:13px" class="btn btn-danger"><i class="fa fa-times"></i> Batal</button>
            </div>
						</form>
<?php 
}
?>		

<?php
if($mode=='dokumen-upload1-data'){ 
$id_dok =$_GET['kode'];

$rs = mysqli_query($GLOBALS["___mysqli_ston"],"select * from tb_datadukung_bidang where id_dukung='$id_dok'");
$item = mysqli_fetch_array($rs);   
$cek=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ouput_data where id='".$item['id_data']."'"));   
?> 
           <div class="modal-header">
					<h5 class="modal-title" id="myModalLabel3"><i class="fa fa-upload"></i> <b>Upload Data</b></h5> 
					</div> 
		  <div class="modal-body"> 
			<form enctype="multipart/form-data" class="form-horizontal" method="post"  name="formDetail" id="formDetail">   
			<input type="hidden" class="form-control" id=iddukung name=iddukung  style="font-size:13px" value="<?php echo $item['id_dukung'] ?>">
                
		  <div class="alert alert-warning" style="font-size:13px"> 
		  <font style="font-size:15px" color="black"><?php echo $cek['uraian_data']."<b> (Kode ".$cek['kode_data'].")</b> " ?>
		  </div>
		  <font style="font-size:13px;color:red"><b>Keterangan :</b> File yang diupload hasil scan berformat PDF maksimal 5 MB.</font> 
						<div class="form-group row">  
                          <div class="col-sm-12"> 
						    <div class="alert alert-light" style="font-size:13px">  
						  <div class="custom-file">
                        <input type="file" class="custom-file-input" id="file1">
                        <label class="custom-file-label" for="exampleInputFile" id=label1x>Pilih File</label>
                      </div>
					</div> 					  
						  </div>  					  
                        </div>  
					 </font>  
					</div>	
            <div class="modal-footer">
                <button type="button" style="font-size:13px" onClick="submitupload1()"  class="btn btn-success"><i class="fa fa-upload"></i> Upload</button> 
				 <button type="button" style="font-size:13px" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
            </div>
						</form>
<?php 
}
?>	

	
<?php
if($mode=='dokumen-input-triwulan2-a'){ 
$id_dok =$_GET['kode'];

$rs = mysqli_query($GLOBALS["___mysqli_ston"],"select * from tb_ikk_bidang where id_ikk='$id_dok'");
$item = mysqli_fetch_array($rs);  
$cekikk=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_outcome where id_outcome='".$item['id_data']."'"));   
$pembilang=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ouput_data where id='".$cekikk['pembilang']."'")); 
$pembagi=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ouput_data where id='".$cekikk['pembagi']."'"));  
$cek=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1 where id_ikk='".$id_dok."' and id_bidang='".$_SESSION['id_bidang']."' and triwulan=2 and tahun='".$_SESSION['tahun']."'"));
?> 
           <div class="modal-header">
					<h5 class="modal-title" id="myModalLabel3"><i class="fa fa-edit"></i> <b>Input Data</b></h5> 
					</div> 
		  <div class="modal-body"> 
			<form enctype="multipart/form-data" class="form-horizontal" method="post"  name="formDetail" id="formDetail">   
			<input type="hidden" class="form-control" id=idpembilang name=idpembilang  style="font-size:13px" value="<?php echo $item['id_ikk'] ?>">   
		<?php
		if ($cekikk['datapersen']==1){
		?>
		  <div class="alert alert-warning" style="font-size:13px"> 
		  <font style="font-size:16px" color="black"><?php echo $pembilang['uraian_data']."<b> (Kode ".$pembilang['kode_data'].")</b> " ?>
		  </div>
		<?php
		}else{
		?> 
		  <div class="alert alert-warning" style="font-size:13px"> 
		  <font style="font-size:16px" color="black"><?php echo $cekikk['uraian_outcome']?>
		  </div>
		<?php
		}
		?> 
			
						<?php
						if ($cek['validasi']==0){
						?>
						<div class="form-group row">  
                          <div class="col-sm-7"> </div>  					  
                          <div class="col-sm-5">Masukan Angka
                         <input type="text" class="form-control" name="angka" id="angka" onkeypress="return numbersonly(this, event)"  autocomplete="off" style="text-align:right" value="<?php echo rupiah2($cek['angka_pembilang']) ?>"> 
						</div>  					  
                        </div>  
						<?php
						}else{
						?>
						<div class="form-group row">  
                          <div class="col-sm-7"> </div>  					  
                          <div class="col-sm-5">Masukan Angka
                         <input type="text" class="form-control" name="angka" id="angka" readonly  autocomplete="off" style="text-align:right" value="<?php echo rupiah2($cek['angka_pembilang']) ?>"> 
						</div>  					  
                        </div>
						<font style="font-size:15px;color:red"><b>Keterangan :</b> Maaf data anda sudah di Validasi.</font>
						<?php
						}
						?>
					 </font>  
					</div>	
            <div class="modal-footer">
				<?php
				if ($cek['validasi']==0){
				?>
                <button type="button" style="font-size:13px" onClick="simpan2a()"  class="btn btn-success"><i class="fa fa-save"></i> Simpan</button> 
				<?php
				}
				?>
				<button type="button" onclick=tutup() style="font-size:13px" class="btn btn-danger"><i class="fa fa-times"></i> Batal</button>
            </div>
						</form>
<?php 
}
?>	
	
<?php
if($mode=='dokumen-input-triwulan2-b'){ 
$id_dok =$_GET['kode'];

$rs = mysqli_query($GLOBALS["___mysqli_ston"],"select * from tb_ikk_bidang where id_ikk='$id_dok'");
$item = mysqli_fetch_array($rs);  
$cekikk=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_outcome where id_outcome='".$item['id_data']."'"));   
$pembilang=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ouput_data where id='".$cekikk['pembilang']."'")); 
$pembagi=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ouput_data where id='".$cekikk['pembagi']."'"));  
$cek=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1 where id_ikk='".$id_dok."' and id_bidang='".$_SESSION['id_bidang']."'  and triwulan=2 and tahun='".$_SESSION['tahun']."'"));
?> 
           <div class="modal-header">
					<h5 class="modal-title" id="myModalLabel3"><i class="fa fa-edit"></i> <b>Input Data</b></h5> 
					</div> 
		  <div class="modal-body"> 
			<form enctype="multipart/form-data" class="form-horizontal" method="post"  name="formDetail" id="formDetail">   
			<input type="hidden" class="form-control" id=idpembagi name=idpembagi  style="font-size:13px" value="<?php echo $item['id_ikk'] ?>">
                
		  <div class="alert alert-warning" style="font-size:13px"> 
		  <font style="font-size:16px" color="black"><?php echo $pembagi['uraian_data']."<b> (Kode ".$pembagi['kode_data'].")</b> " ?>
		  </div>
					
						<?php
						if ($cek['validasi']==0){
						?>
						<div class="form-group row">  
                          <div class="col-sm-7"> </div>  					  
                          <div class="col-sm-5">Masukan Angka
                         <input type="text" class="form-control" name="angka" id="angka" onkeypress="return numbersonly(this, event)"  autocomplete="off" style="text-align:right" value="<?php echo rupiah2($cek['angka_pembagi']) ?>"> 
						</div>  					  
                        </div>  
						<?php
						}else{
						?>
						<div class="form-group row">  
                          <div class="col-sm-7"> </div>  					  
                          <div class="col-sm-5">Masukan Angka
                         <input type="text" class="form-control" name="angka" id="angka" readonly  autocomplete="off" style="text-align:right" value="<?php echo rupiah2($cek['angka_pembagi']) ?>"> 
						</div>  					  
                        </div>
						<font style="font-size:15px;color:red"><b>Keterangan :</b> Maaf data anda sudah di Validasi.</font>
						<?php
						}
						?>
					 </font>  
					</div>	
            <div class="modal-footer">
				<?php
				if ($cek['validasi']==0){
				?>
                <button type="button" style="font-size:13px" onClick="simpan2b()"  class="btn btn-success"><i class="fa fa-save"></i> Simpan</button> 
				<?php
				}
				?>
				<button type="button" onclick=tutup() style="font-size:13px" class="btn btn-danger"><i class="fa fa-times"></i> Batal</button>
            </div>
						</form>
<?php 
}
?>	
 

<?php
if($mode=='dokumen-input-triwulan3-a'){ 
$id_dok =$_GET['kode'];

$rs = mysqli_query($GLOBALS["___mysqli_ston"],"select * from tb_ikk_bidang where id_ikk='$id_dok'");
$item = mysqli_fetch_array($rs);  
$cekikk=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_outcome where id_outcome='".$item['id_data']."'"));   
$pembilang=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ouput_data where id='".$cekikk['pembilang']."'")); 
$pembagi=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ouput_data where id='".$cekikk['pembagi']."'"));  
$cek=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1 where id_ikk='".$id_dok."' and id_bidang='".$_SESSION['id_bidang']."' and triwulan=3 and tahun='".$_SESSION['tahun']."'"));
?> 
           <div class="modal-header">
					<h5 class="modal-title" id="myModalLabel3"><i class="fa fa-edit"></i> <b>Input Data</b></h5> 
					</div> 
		  <div class="modal-body"> 
			<form enctype="multipart/form-data" class="form-horizontal" method="post"  name="formDetail" id="formDetail">   
			<input type="hidden" class="form-control" id=idpembilang name=idpembilang  style="font-size:13px" value="<?php echo $item['id_ikk'] ?>">   
		<?php
		if ($cekikk['datapersen']==1){
		?>
		  <div class="alert alert-warning" style="font-size:13px"> 
		  <font style="font-size:16px" color="black"><?php echo $pembilang['uraian_data']."<b> (Kode ".$pembilang['kode_data'].")</b> " ?>
		  </div>
		<?php
		}else{
		?> 
		  <div class="alert alert-warning" style="font-size:13px"> 
		  <font style="font-size:16px" color="black"><?php echo $cekikk['uraian_outcome']?>
		  </div>
		<?php
		}
		?> 
						<?php
						if ($cek['validasi']==0){
						?>
						<div class="form-group row">  
                          <div class="col-sm-7"> </div>  					  
                          <div class="col-sm-5">Masukan Angka
                         <input type="text" class="form-control" name="angka" id="angka" onkeypress="return numbersonly(this, event)"  autocomplete="off" style="text-align:right" value="<?php echo rupiah2($cek['angka_pembilang']) ?>"> 
						</div>  					  
                        </div>  
						<?php
						}else{
						?>
						<div class="form-group row">  
                          <div class="col-sm-7"> </div>  					  
                          <div class="col-sm-5">Masukan Angka
                         <input type="text" class="form-control" name="angka" id="angka" readonly  autocomplete="off" style="text-align:right" value="<?php echo rupiah2($cek['angka_pembilang']) ?>"> 
						</div>  					  
                        </div>
						<font style="font-size:15px;color:red"><b>Keterangan :</b> Maaf data anda sudah di Validasi.</font>
						<?php
						}
						?>
					 </font>  
					</div>	
            <div class="modal-footer">
				<?php
				if ($cek['validasi']==0){
				?>
                <button type="button" style="font-size:13px" onClick="simpan3a()"  class="btn btn-success"><i class="fa fa-save"></i> Simpan</button> 
				<?php
				}
				?>
				<button type="button" onclick=tutup() style="font-size:13px" class="btn btn-danger"><i class="fa fa-times"></i> Batal</button>
            </div>
						</form>
<?php 
}
?>	
	
<?php
if($mode=='dokumen-input-triwulan3-b'){ 
$id_dok =$_GET['kode'];

$rs = mysqli_query($GLOBALS["___mysqli_ston"],"select * from tb_ikk_bidang where id_ikk='$id_dok'");
$item = mysqli_fetch_array($rs);  
$cekikk=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_outcome where id_outcome='".$item['id_data']."'"));   
$pembilang=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ouput_data where id='".$cekikk['pembilang']."'")); 
$pembagi=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ouput_data where id='".$cekikk['pembagi']."'"));  
$cek=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1 where id_ikk='".$id_dok."' and id_bidang='".$_SESSION['id_bidang']."'  and triwulan=3 and tahun='".$_SESSION['tahun']."'"));
?> 
           <div class="modal-header">
					<h5 class="modal-title" id="myModalLabel3"><i class="fa fa-edit"></i> <b>Input Data</b></h5> 
					</div> 
		  <div class="modal-body"> 
			<form enctype="multipart/form-data" class="form-horizontal" method="post"  name="formDetail" id="formDetail">   
			<input type="hidden" class="form-control" id=idpembagi name=idpembagi  style="font-size:13px" value="<?php echo $item['id_ikk'] ?>">
                
		  <div class="alert alert-warning" style="font-size:13px"> 
		  <font style="font-size:16px" color="black"><?php echo $pembagi['uraian_data']."<b> (Kode ".$pembagi['kode_data'].")</b> " ?>
		  </div>
			
						<?php
						if ($cek['validasi']==0){
						?>
						<div class="form-group row">  
                          <div class="col-sm-7"> </div>  					  
                          <div class="col-sm-5">Masukan Angka
                         <input type="text" class="form-control" name="angka" id="angka" onkeypress="return numbersonly(this, event)"  autocomplete="off" style="text-align:right" value="<?php echo rupiah2($cek['angka_pembagi']) ?>"> 
						</div>  					  
                        </div>  
						<?php
						}else{
						?>
						<div class="form-group row">  
                          <div class="col-sm-7"> </div>  					  
                          <div class="col-sm-5">Masukan Angka
                         <input type="text" class="form-control" name="angka" id="angka" readonly  autocomplete="off" style="text-align:right" value="<?php echo rupiah2($cek['angka_pembagi']) ?>"> 
						</div>  					  
                        </div>
						<font style="font-size:15px;color:red"><b>Keterangan :</b> Maaf data anda sudah di Validasi.</font>
						<?php
						}
						?>
					 </font>  
					</div>	
            <div class="modal-footer">
				<?php
				if ($cek['validasi']==0){
				?>
                <button type="button" style="font-size:13px" onClick="simpan3b()"  class="btn btn-success"><i class="fa fa-save"></i> Simpan</button> 
				<?php
				}
				?>
				<button type="button" onclick=tutup() style="font-size:13px" class="btn btn-danger"><i class="fa fa-times"></i> Batal</button>
            </div>
						</form>
<?php 
}
?>	

<?php
if($mode=='dokumen-input-triwulan4-a'){ 
$id_dok =$_GET['kode'];

$rs = mysqli_query($GLOBALS["___mysqli_ston"],"select * from tb_ikk_bidang where id_ikk='$id_dok'");
$item = mysqli_fetch_array($rs);  
$cekikk=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_outcome where id_outcome='".$item['id_data']."'"));   
$pembilang=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ouput_data where id='".$cekikk['pembilang']."'")); 
$pembagi=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ouput_data where id='".$cekikk['pembagi']."'"));  
$cek=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1 where id_ikk='".$id_dok."' and id_bidang='".$_SESSION['id_bidang']."' and triwulan=4 and tahun='".$_SESSION['tahun']."'"));
?> 
           <div class="modal-header">
					<h5 class="modal-title" id="myModalLabel3"><i class="fa fa-edit"></i> <b>Input Data</b></h5> 
					</div> 
		  <div class="modal-body"> 
			<form enctype="multipart/form-data" class="form-horizontal" method="post"  name="formDetail" id="formDetail">   
			<input type="hidden" class="form-control" id=idpembilang name=idpembilang  style="font-size:13px" value="<?php echo $item['id_ikk'] ?>">   
		<?php
		if ($cekikk['datapersen']==1){
		?>
		  <div class="alert alert-warning" style="font-size:13px"> 
		  <font style="font-size:16px" color="black"><?php echo $pembilang['uraian_data']."<b> (Kode ".$pembilang['kode_data'].")</b> " ?>
		  </div>
		<?php
		}else{
		?> 
		  <div class="alert alert-warning" style="font-size:13px"> 
		  <font style="font-size:16px" color="black"><?php echo $cekikk['uraian_outcome']?>
		  </div>
		<?php
		}
		?> 
			
						<?php
						if ($cek['validasi']==0){
						?>
						<div class="form-group row">  
                          <div class="col-sm-7"> </div>  					  
                          <div class="col-sm-5">Masukan Angka
                         <input type="text" class="form-control" name="angka" id="angka" onkeypress="return numbersonly(this, event)"  autocomplete="off" style="text-align:right" value="<?php echo rupiah2($cek['angka_pembilang']) ?>"> 
						</div>  					  
                        </div>  
						<?php
						}else{
						?>
						<div class="form-group row">  
                          <div class="col-sm-7"> </div>  					  
                          <div class="col-sm-5">Masukan Angka
                         <input type="text" class="form-control" name="angka" id="angka" readonly  autocomplete="off" style="text-align:right" value="<?php echo rupiah2($cek['angka_pembilang']) ?>"> 
						</div>  					  
                        </div>
						<font style="font-size:15px;color:red"><b>Keterangan :</b> Maaf data anda sudah di Validasi.</font>
						<?php
						}
						?>
					 </font>  
					</div>	
            <div class="modal-footer">
				<?php
				if ($cek['validasi']==0){
				?>
                <button type="button" style="font-size:13px" onClick="simpan4a()"  class="btn btn-success"><i class="fa fa-save"></i> Simpan</button> 
				<?php
				}
				?>
				<button type="button" onclick=tutup() style="font-size:13px" class="btn btn-danger"><i class="fa fa-times"></i> Batal</button>
            </div>
						</form>
<?php 
}
?>	
	
<?php
if($mode=='dokumen-input-triwulan4-b'){ 
$id_dok =$_GET['kode'];

$rs = mysqli_query($GLOBALS["___mysqli_ston"],"select * from tb_ikk_bidang where id_ikk='$id_dok'");
$item = mysqli_fetch_array($rs);  
$cekikk=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_outcome where id_outcome='".$item['id_data']."'"));   
$pembilang=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ouput_data where id='".$cekikk['pembilang']."'")); 
$pembagi=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ouput_data where id='".$cekikk['pembagi']."'"));  
$cek=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1 where id_ikk='".$id_dok."' and id_bidang='".$_SESSION['id_bidang']."'  and triwulan=4 and tahun='".$_SESSION['tahun']."'"));
?> 
           <div class="modal-header">
					<h5 class="modal-title" id="myModalLabel3"><i class="fa fa-edit"></i> <b>Input Data</b></h5> 
					</div> 
		  <div class="modal-body"> 
			<form enctype="multipart/form-data" class="form-horizontal" method="post"  name="formDetail" id="formDetail">   
			<input type="hidden" class="form-control" id=idpembagi name=idpembagi  style="font-size:13px" value="<?php echo $item['id_ikk'] ?>">
                
		  <div class="alert alert-warning" style="font-size:13px"> 
		  <font style="font-size:16px" color="black"><?php echo $pembagi['uraian_data']."<b> (Kode ".$pembagi['kode_data'].")</b> " ?>
		  </div>
				
						<?php
						if ($cek['validasi']==0){
						?>
						<div class="form-group row">  
                          <div class="col-sm-7"> </div>  					  
                          <div class="col-sm-5">Masukan Angka
                         <input type="text" class="form-control" name="angka" id="angka" onkeypress="return numbersonly(this, event)"  autocomplete="off" style="text-align:right" value="<?php echo rupiah2($cek['angka_pembagi']) ?>"> 
						</div>  					  
                        </div>  
						<?php
						}else{
						?>
						<div class="form-group row">  
                          <div class="col-sm-7"> </div>  					  
                          <div class="col-sm-5">Masukan Angka
                         <input type="text" class="form-control" name="angka" id="angka" readonly  autocomplete="off" style="text-align:right" value="<?php echo rupiah2($cek['angka_pembagi']) ?>"> 
						</div>  					  
                        </div>
						<font style="font-size:15px;color:red"><b>Keterangan :</b> Maaf data anda sudah di Validasi.</font>
						<?php
						}
						?>
					 </font>  
					</div>	
            <div class="modal-footer">
				<?php
				if ($cek['validasi']==0){
				?>
                <button type="button" style="font-size:13px" onClick="simpan4b()"  class="btn btn-success"><i class="fa fa-save"></i> Simpan</button> 
				<?php
				}
				?>
				<button type="button" onclick=tutup() style="font-size:13px" class="btn btn-danger"><i class="fa fa-times"></i> Batal</button>
            </div>
						</form>
<?php 
}
?>	

	
<?php
if($mode=='dokumen-cetakcapaian1'){  

$cek=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1 where id_bidang='".$_SESSION['id_bidang']."' and triwulan=1 and tahun='".$_SESSION['tahun']."'"));

$hitung1=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1 where id_bidang='".$_SESSION['id_bidang']."' and triwulan=1 and tahun='".$_SESSION['tahun']."'");
$jumlah_record1=mysqli_num_rows($hitung1);
$hitung2=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ikk_bidang where id_bidang='".$_SESSION['id_bidang']."' and tri1=1 and tahun='".$_SESSION['tahun']."'");
$jumlah_record2=mysqli_num_rows($hitung2); 
$hitung3=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1 where id_bidang='".$_SESSION['id_bidang']."' and triwulan=1 and tahun='".$_SESSION['tahun']."' and validasi=1");
$jumlah_record3=mysqli_num_rows($hitung3);

$jumlah_record=$jumlah_record2-$jumlah_record3;
?> 
           <div class="modal-header">
					<h5 class="modal-title" id="myModalLabel3"><i class="fa fa-print"></i> <b>Cetak Capaian Tahun <?php echo $_SESSION['tahun'] ?> (Triwulan 1)</b></h5> 
					</div> 
		  <div class="modal-body">  
			<input type="hidden" class="form-control" id=idpembagi name=idpembagi  style="font-size:13px" value="<?php echo $item['id_ikk'] ?>">
			<?php 
			if ($jumlah_record2!=$jumlah_record3){
			?>
			  <div class="alert alert-warning" style="font-size:15px"> 
			 <h5><i class="icon fas fa-exclamation-triangle"></i> Peringatan!</h5>
			  Maaf ada indikator yang belum divalidasi Admin, Hasil cetakan baru berupa <b>Draft</b>.
			 </div>
					 </font>  
					</div>	
           <div class="modal-footer"> 
			<form  class="form-horizontal" name="postform" id="modal" method="post" action="cetak-capaian-kinerja-bidang.php" target="_blank">   
			<input type="hidden" class="form-control" id="tri" name="tri" value="1"> 	
			<input type="hidden" class="form-control" id="id_bidang" name="id_bidang" value="<?php echo $_SESSION['id_bidang'] ?>">   	    	  			
               <button type="submit" class="btn btn-primary" style="font-size:13px"><i class="fa fa-print"></i> Cetak Draft</button>&nbsp;
			</form> 
				 <button type="button" style="font-size:13px" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
            </div> 
			<?php
			}else{
			?>  
			<div class="alert alert-warning" style="font-size:15px"> 
			 <h5><i class="icon fas fa-info-circle"></i>Informasi</h5>
			 Data Capaian Kinerja sudah divalidasi semua, Silahkan cetak data capaian kinerja final anda.
			 </div>
					 </font>  
					</div>	
           <div class="modal-footer"> 
			<form  class="form-horizontal" name="postform" id="modal" method="post" action="cetak-capaian-kinerja-bidang.php" target="_blank">   
			<input type="hidden" class="form-control" id="tri" name="tri" value="1"> 	
			<input type="hidden" class="form-control" id="id_bidang" name="id_bidang" value="<?php echo $_SESSION['id_bidang'] ?>">  
			<input type="hidden" class="form-control" id="tipe" name="tipe" value="final">   	 	    	  			
               <button type="submit" class="btn btn-primary" style="font-size:13px"><i class="fa fa-print"></i> Cetak Final</button>&nbsp;
			</form> 
				 <button type="button" style="font-size:13px" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
            </div> 
			<?php
			}
			?>
<?php 
}
?>	

	
<?php
if($mode=='dokumen-cetakcapaian2'){  

$cek=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1 where id_bidang='".$_SESSION['id_bidang']."' and triwulan=2 and tahun='".$_SESSION['tahun']."'"));

$hitung1=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1 where id_bidang='".$_SESSION['id_bidang']."' and triwulan=2 and tahun='".$_SESSION['tahun']."'");
$jumlah_record1=mysqli_num_rows($hitung1);
$hitung2=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ikk_bidang where id_bidang='".$_SESSION['id_bidang']."' and tri2=1 and tahun='".$_SESSION['tahun']."'");
$jumlah_record2=mysqli_num_rows($hitung2); 
$hitung3=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1 where id_bidang='".$_SESSION['id_bidang']."' and triwulan=2 and tahun='".$_SESSION['tahun']."' and validasi=1");
$jumlah_record3=mysqli_num_rows($hitung3);

$jumlah_record=$jumlah_record2-$jumlah_record3;
?> 
           <div class="modal-header">
					<h5 class="modal-title" id="myModalLabel3"><i class="fa fa-print"></i> <b>Cetak Capaian Tahun <?php echo $_SESSION['tahun'] ?> (Triwulan 2)</b></h5> 
					</div> 
		  <div class="modal-body">  
			<input type="hidden" class="form-control" id=idpembagi name=idpembagi  style="font-size:13px" value="<?php echo $item['id_ikk'] ?>">
			<?php 
			if ($jumlah_record2!=$jumlah_record3){
			?>
			  <div class="alert alert-warning" style="font-size:15px"> 
			 <h5><i class="icon fas fa-exclamation-triangle"></i> Peringatan!</h5>
			  Maaf ada indikator yang belum divalidasi Admin, Hasil cetakan baru berupa <b>Draft</b>.
			 </div>
					 </font>  
					</div>	
           <div class="modal-footer"> 
			<form  class="form-horizontal" name="postform" id="modal" method="post" action="cetak-capaian-kinerja-bidang.php" target="_blank">   
			<input type="hidden" class="form-control" id="tri" name="tri" value="2"> 	
			<input type="hidden" class="form-control" id="id_bidang" name="id_bidang" value="<?php echo $_SESSION['id_bidang'] ?>">   	    	  			
               <button type="submit" class="btn btn-primary" style="font-size:13px"><i class="fa fa-print"></i> Cetak Draft</button>&nbsp;
			</form> 
				 <button type="button" style="font-size:13px" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
            </div> 
			<?php
			}else{
			?>  
			<div class="alert alert-warning" style="font-size:15px"> 
			 <h5><i class="icon fas fa-info-circle"></i>Informasi</h5>
			 Data Capaian Kinerja sudah divalidasi semua, Silahkan cetak data capaian kinerja final anda.
			 </div>
					 </font>  
					</div>	
           <div class="modal-footer"> 
			<form  class="form-horizontal" name="postform" id="modal" method="post" action="cetak-capaian-kinerja-bidang.php" target="_blank">   
			<input type="hidden" class="form-control" id="tri" name="tri" value="2"> 	
			<input type="hidden" class="form-control" id="id_bidang" name="id_bidang" value="<?php echo $_SESSION['id_bidang'] ?>">  
			<input type="hidden" class="form-control" id="tipe" name="tipe" value="final">   	 	    	  			
               <button type="submit" class="btn btn-primary" style="font-size:13px"><i class="fa fa-print"></i> Cetak Final</button>&nbsp;
			</form> 
				 <button type="button" style="font-size:13px" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
            </div> 
			<?php
			}
			?>
<?php 
}
?>

	
<?php
if($mode=='dokumen-cetakcapaian3'){  

$cek=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1 where id_bidang='".$_SESSION['id_bidang']."' and triwulan=3 and tahun='".$_SESSION['tahun']."'"));

$hitung1=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1 where id_bidang='".$_SESSION['id_bidang']."' and triwulan=3 and tahun='".$_SESSION['tahun']."'");
$jumlah_record1=mysqli_num_rows($hitung1);
$hitung2=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ikk_bidang where id_bidang='".$_SESSION['id_bidang']."' and tri3=1 and tahun='".$_SESSION['tahun']."'");
$jumlah_record2=mysqli_num_rows($hitung2); 
$hitung3=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1 where id_bidang='".$_SESSION['id_bidang']."' and triwulan=3 and tahun='".$_SESSION['tahun']."' and validasi=1");
$jumlah_record3=mysqli_num_rows($hitung3);

$jumlah_record=$jumlah_record2-$jumlah_record3;
?> 
           <div class="modal-header">
					<h5 class="modal-title" id="myModalLabel3"><i class="fa fa-print"></i> <b>Cetak Capaian Tahun <?php echo $_SESSION['tahun'] ?> (Triwulan 3)</b></h5> 
					</div> 
		  <div class="modal-body">  
			<input type="hidden" class="form-control" id=idpembagi name=idpembagi  style="font-size:13px" value="<?php echo $item['id_ikk'] ?>">
			<?php 
			if ($jumlah_record2!=$jumlah_record3){
			?>
			  <div class="alert alert-warning" style="font-size:15px"> 
			 <h5><i class="icon fas fa-exclamation-triangle"></i> Peringatan!</h5>
			  Maaf ada indikator yang belum divalidasi Admin, Hasil cetakan baru berupa <b>Draft</b>.
			 </div>
					 </font>  
					</div>	
           <div class="modal-footer"> 
			<form  class="form-horizontal" name="postform" id="modal" method="post" action="cetak-capaian-kinerja-bidang.php" target="_blank">   
			<input type="hidden" class="form-control" id="tri" name="tri" value="3"> 	
			<input type="hidden" class="form-control" id="id_bidang" name="id_bidang" value="<?php echo $_SESSION['id_bidang'] ?>">   	    	  			
               <button type="submit" class="btn btn-primary" style="font-size:13px"><i class="fa fa-print"></i> Cetak Draft</button>&nbsp;
			</form> 
				 <button type="button" style="font-size:13px" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
            </div> 
			<?php
			}else{
			?>  
			<div class="alert alert-warning" style="font-size:15px"> 
			 <h5><i class="icon fas fa-info-circle"></i>Informasi</h5>
			 Data Capaian Kinerja sudah divalidasi semua, Silahkan cetak data capaian kinerja final anda.
			 </div>
					 </font>  
					</div>	
           <div class="modal-footer"> 
			<form  class="form-horizontal" name="postform" id="modal" method="post" action="cetak-capaian-kinerja-bidang.php" target="_blank">   
			<input type="hidden" class="form-control" id="tri" name="tri" value="3"> 	
			<input type="hidden" class="form-control" id="id_bidang" name="id_bidang" value="<?php echo $_SESSION['id_bidang'] ?>">  
			<input type="hidden" class="form-control" id="tipe" name="tipe" value="final">   	 	    	  			
               <button type="submit" class="btn btn-primary" style="font-size:13px"><i class="fa fa-print"></i> Cetak Final</button>&nbsp;
			</form> 
				 <button type="button" style="font-size:13px" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
            </div> 
			<?php
			}
			?>
<?php 
}
?>

	
<?php
if($mode=='dokumen-cetakcapaian4'){  

$cek=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1 where id_bidang='".$_SESSION['id_bidang']."' and triwulan=4 and tahun='".$_SESSION['tahun']."'"));

$hitung1=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1 where id_bidang='".$_SESSION['id_bidang']."' and triwulan=4 and tahun='".$_SESSION['tahun']."'");
$jumlah_record1=mysqli_num_rows($hitung1);
$hitung2=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ikk_bidang where id_bidang='".$_SESSION['id_bidang']."' and tri4=1 and tahun='".$_SESSION['tahun']."'");
$jumlah_record2=mysqli_num_rows($hitung2); 
$hitung3=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1 where id_bidang='".$_SESSION['id_bidang']."' and triwulan=4 and tahun='".$_SESSION['tahun']."' and validasi=1");
$jumlah_record3=mysqli_num_rows($hitung3);

$jumlah_record=$jumlah_record2-$jumlah_record3;
?> 
           <div class="modal-header">
					<h5 class="modal-title" id="myModalLabel3"><i class="fa fa-print"></i> <b>Cetak Capaian Tahun <?php echo $_SESSION['tahun'] ?> (Triwulan 4)</b></h5> 
					</div> 
		  <div class="modal-body">  
			<input type="hidden" class="form-control" id=idpembagi name=idpembagi  style="font-size:13px" value="<?php echo $item['id_ikk'] ?>">
			<?php 
			if ($jumlah_record2!=$jumlah_record3){
			?>
			  <div class="alert alert-warning" style="font-size:15px"> 
			 <h5><i class="icon fas fa-exclamation-triangle"></i> Peringatan!</h5>
			  Maaf ada indikator yang belum divalidasi Admin, Hasil cetakan baru berupa <b>Draft</b>.
			 </div>
					 </font>  
					</div>	
           <div class="modal-footer"> 
			<form  class="form-horizontal" name="postform" id="modal" method="post" action="cetak-capaian-kinerja-bidang.php" target="_blank">   
			<input type="hidden" class="form-control" id="tri" name="tri" value="4"> 	
			<input type="hidden" class="form-control" id="id_bidang" name="id_bidang" value="<?php echo $_SESSION['id_bidang'] ?>">   	    	  			
               <button type="submit" class="btn btn-primary" style="font-size:13px"><i class="fa fa-print"></i> Cetak Draft</button>&nbsp;
			</form> 
				 <button type="button" style="font-size:13px" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
            </div> 
			<?php
			}else{
			?>  
			<div class="alert alert-warning" style="font-size:15px"> 
			 <h5><i class="icon fas fa-info-circle"></i>Informasi</h5>
			 Data Capaian Kinerja sudah divalidasi semua, Silahkan cetak data capaian kinerja final anda.
			 </div>
					 </font>  
					</div>	
           <div class="modal-footer"> 
			<form  class="form-horizontal" name="postform" id="modal" method="post" action="cetak-capaian-kinerja-bidang.php" target="_blank">   
			<input type="hidden" class="form-control" id="tri" name="tri" value="4"> 	
			<input type="hidden" class="form-control" id="id_bidang" name="id_bidang" value="<?php echo $_SESSION['id_bidang'] ?>">  
			<input type="hidden" class="form-control" id="tipe" name="tipe" value="final">   	 	    	  			
               <button type="submit" class="btn btn-primary" style="font-size:13px"><i class="fa fa-print"></i> Cetak Final</button>&nbsp;
			</form> 
				 <button type="button" style="font-size:13px" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
            </div> 
			<?php
			}
			?>
<?php 
}
?>
  
<script>
	var angka = document.getElementById('angka');
    angka.addEventListener('keyup', function(e)
    {
        angka.value = formatRupiah(this.value);
    }); 
	
    /* Fungsi */
    function formatRupiah(angka, prefix)
    {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split    = number_string.split(','),
            sisa     = split[0].length % 3,
            rupiah     = split[0].substr(0, sisa),
            ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
            
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }	
</script>