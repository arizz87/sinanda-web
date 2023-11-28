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

$(function(){
		$("#kategori1").click(function(){ 
			if(!this.form.kategori1.checked){  
				$("#iddata1").val("0"); 
			}else{  
				$("#iddata1").val("1"); 
			} 
		});
	}); 

$(function(){
		$("#kategori2").click(function(){ 
			if(!this.form.kategori2.checked){  
				$("#iddata2").val("0"); 
			}else{  
				$("#iddata2").val("1"); 
			} 
		});
	}); 

$(function(){
		$("#kategori3").click(function(){ 
			if(!this.form.kategori3.checked){  
				$("#iddata3").val("0"); 
			}else{  
				$("#iddata3").val("1"); 
			} 
		});
	}); 

$(function(){
		$("#kategori4").click(function(){ 
			if(!this.form.kategori4.checked){  
				$("#iddata4").val("0"); 
			}else{  
				$("#iddata4").val("1"); 
			} 
		});
	}); 	

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
			<input type="hidden" class="form-control" id="iddata" name="iddata" value="<?php echo $id_dok ?>"> 			 
			<input type="hidden" class="form-control" id="idtahun" name="idtahun" value="<?php echo $_SESSION['tahun'] ?>">   			  			   
		  <table id="example" class="table table-bordered" cellspacing="0" width="100%">
	<thead> 
	<tr style="font-size:13px" bgcolor=#F0FFF0> 
	<th style="width:85%;"><center>Uraian Data IKK</center></th>        
	<th style="width:15%;"><center>Action</center></th>
	</tr> 
	</thead>   
	<center> 
						<div class="form-group row alert alert-light"> 
						<div class="col-sm-12"><font style=color:red><b>Catatan:  Hilangkan centang untuk menon-aktifkan triwulan.</b></font>
						</div>  		
                        </div> 
						<div class="form-group row alert alert-danger alert-dismissible"> 
						<div class="col-sm-3"> 
						<input type="checkbox" id="kategori1" name="kategori1" checked value=1 autocomplete="off" style="font-size:13px" /> &nbsp;Triwulan 1
                        <input type="hidden" class="form-control" id="iddata1" name="iddata1" value="1"> 
						</div>   
						<div class="col-sm-3"> 
						<input type="checkbox" id="kategori2" name="kategori2" value=1 autocomplete="off" style="font-size:13px" /> &nbsp;Triwulan 2
                        <input type="hidden" class="form-control" id="iddata2" name="iddata2" value="0"> 
						</div>  
						<div class="col-sm-3"> 
						<input type="checkbox" id="kategori3" name="kategori3" value=1 autocomplete="off" style="font-size:13px" /> &nbsp;Triwulan 3
                        <input type="hidden" class="form-control" id="iddata3" name="iddata3" value="0"> 
						</div>  
						<div class="col-sm-3"> 
						<input type="checkbox" id="kategori4" name="kategori4" value=1 autocomplete="off" style="font-size:13px" /> &nbsp;Triwulan 4
                        <input type="hidden" class="form-control" id="iddata4" name="iddata4" value="0"> 
						</div>  		
                        </div>
	
	<tbody>
	<?php
	$no==0;
	$data=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM  tb_outcome  where tahun='$_SESSION[tahun]' order by id_outcome asc");
	while($caridata=mysqli_fetch_array($data)){
	$cekdata=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ikk_bidang where id_data='".$caridata['id_outcome']."' and id_bidang='".$id_dok."' and tahun='".$_SESSION['tahun']."'"));
	if($cekdata){
	$ceklist='<center><input type=checkbox checked disabled value="'.$caridata['id_outcome'].'">';	
	}else{
	$ceklist='<center><input type=checkbox name="kodeikk[]" id="kodeikk" value="'.$caridata['id_outcome'].'">';		
	}
	$no++; 
	?>
	<?php
	if(!$cekdata){ 
	?>
	<tr>
	<td><?php echo $caridata['uraian_outcome'] ?></td>
	<td><?php echo $ceklist;?></td>
	</tr> 
	<?php 
	}}
	?>
	
	</tbody>
	</table> 
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
if($mode=='dokumen-aktifdata'){  
$id_dok =$_GET['kode']; 
$rs = mysqli_query($GLOBALS["___mysqli_ston"],"select * from tb_ikk_bidang,tb_outcome where tb_outcome.id_outcome=tb_ikk_bidang.id_data and tb_ikk_bidang.id_ikk='$id_dok'");
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
                          <div class="col-sm-12">Uraian Data IKK
                           <textarea class="form-control" disabled rows=2 placeholder="Masukan Uraian Data Dukung" style="font-size:14px"><?php echo $item['uraian_outcome'] ?></textarea>
                          </div>  					  
                        </div>
						 <div class="alert alert-danger"> 
						<div class="form-group row"> 
						<?php
						if ($item['tri1']==0){
						?>
                        <div class="col-sm-3"> 
						<input type="checkbox" id="kategori1" name="kategori1" value=1 autocomplete="off" style="font-size:13px" /> &nbsp;Triwulan 1
                        <input type="hidden" class="form-control" id="iddata1" name="iddata1" value="0"> 
						</div>  
						<?php
						}else{
						?>
						 <div class="col-sm-3"> 
						<input type="checkbox" id="kategori1" name="kategori1" checked value=1 autocomplete="off" style="font-size:13px" /> &nbsp;Triwulan 1
                        <input type="hidden" class="form-control" id="iddata1" name="iddata1" value="1"> 
						</div>  
						<?php
						}
						?>
						<?php
						if ($item['tri2']==0){
						?>
						<div class="col-sm-3"> 
						<input type="checkbox" id="kategori2" name="kategori2" value=1 autocomplete="off" style="font-size:13px" /> &nbsp;Triwulan 2
                        <input type="hidden" class="form-control" id="iddata2" name="iddata2" value="0"> 
						</div> 
						<?php
						}else{
						?>
						 <div class="col-sm-3"> 
						<input type="checkbox" id="kategori2" name="kategori2" checked value=1 autocomplete="off" style="font-size:13px" /> &nbsp;Triwulan 2
                        <input type="hidden" class="form-control" id="iddata2" name="iddata2" value="1"> 
						</div>  
						<?php
						}
						?>
						<?php
						if ($item['tri3']==0){
						?>
						<div class="col-sm-3"> 
						<input type="checkbox" id="kategori3" name="kategori3" value=1 autocomplete="off" style="font-size:13px" /> &nbsp;Triwulan 3
                        <input type="hidden" class="form-control" id="iddata3" name="iddata3" value="0"> 
						</div> 
						<?php
						}else{
						?>
						 <div class="col-sm-3"> 
						<input type="checkbox" id="kategori3" name="kategori3" checked value=1 autocomplete="off" style="font-size:13px" /> &nbsp;Triwulan 3
                        <input type="hidden" class="form-control" id="iddata3" name="iddata3" value="1"> 
						</div>  
						<?php
						}
						?>
						<?php
						if ($item['tri4']==0){
						?>
						<div class="col-sm-3"> 
						<input type="checkbox" id="kategori4" name="kategori4" value=1 autocomplete="off" style="font-size:13px" /> &nbsp;Triwulan 4
                        <input type="hidden" class="form-control" id="iddata4" name="iddata4" value="0"> 
						</div>  
						<?php
						}else{
						?>
						 <div class="col-sm-3"> 
						<input type="checkbox" id="kategori4" name="kategori4" checked value=1 autocomplete="off" style="font-size:13px" /> &nbsp;Triwulan 4
                        <input type="hidden" class="form-control" id="iddata4" name="iddata4" value="1"> 
						</div>  
						<?php
						}
						?>						
                        </div>    					  
                        </div>  
					 </font>
            <!-- /.row -->
          </div> 
        </div>
		</div> </div> 	
					</div>	
            <div class="modal-footer">
                <button type="button" style="font-size:13px" onClick="simpanaktif()"  class="btn btn-success"><i class="fa fa-save"></i> Simpan</button> 
				 <button type="button" style="font-size:13px" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
            </div>
						</form>
<?php 
}
?>	

<?php
if($mode=='dokumen-hapusdata'){ 
$id_dok =$_GET['kode']; 
$rs = mysqli_query($GLOBALS["___mysqli_ston"],"select * from tb_ikk_bidang,tb_outcome where tb_outcome.id_outcome=tb_ikk_bidang.id_data and tb_ikk_bidang.id_ikk='$id_dok'");
$item = mysqli_fetch_array($rs); 
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
                          <div class="col-sm-12">Uraian Data IKK
                           <textarea class="form-control" disabled rows=3 placeholder="Masukan Uraian Data Dukung" style="font-size:14px"><?php echo $item['uraian_outcome'] ?></textarea>
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
				  Anda yakin ingin menghapus Data ini ? Semua data capaian yang telah di isi akan hilang. Pastikan data sudah di cek.
                </div> 
					</div>	
            <div class="modal-footer">
                <button type="button" style="font-size:13px" onClick="submitHapus()"  class="btn btn-info"><i class="fa fa-trash"></i> Hapus</button>
				 <button type="button" style="font-size:13px" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
            </div>
						</form>
<?php 
}
?>	 

<?php
if($mode=='dokumen-aktif-triall'){ 
$id_dok =$_GET['kode']; 
$rs = mysqli_query($GLOBALS["___mysqli_ston"],"select * from tb_ikk_bidang,tb_outcome where tb_outcome.id_outcome=tb_ikk_bidang.id_data and tb_ikk_bidang.id_ikk='$id_dok'");
$item = mysqli_fetch_array($rs); 
?> 
           <div class="modal-header">
					<h5 class="modal-title" id="myModalLabel3"><i class="fa fa-check-circle"></i> <b>Posting Data Pendukung</b></h5> 
					</div> 
		<div class="modal-body"> 
					<form enctype="multipart/form-data" class="form-horizontal" method="post">
						<div class="alert alert-warning">  
						<input type="checkbox" id="kategori1" name="kategori1" checked value=1 autocomplete="off" style="font-size:13px" /> &nbsp;<b>Posting Data Pendukung (Hilangkan centang untuk non aktif)</b>
                        <input type="hidden" class="form-control" id="iddata1" name="iddata1" value="1"> 
						 </div> 							
			 <div class="alert alert-danger alert-dismissible"> 
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Peringatan!</h5>
				  Anda yakin ingin memposting Data Pendukung ini ? Pastikan anda sudah mencetang data yang mau diposting.
                </div> 
				</form>
					</div>	
            <div class="modal-footer">
                <button type="button" style="font-size:13px" onClick="submitaktifall()"  class="btn btn-info"><i class="fa fa-check-circle"></i> Posting</button>
				 <button type="button" style="font-size:13px" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
            </div> 
<?php 
}
?>	 


<?php
if($mode=='dokumen-hapus-triall'){ 
$id_dok =$_GET['kode']; 
$rs = mysqli_query($GLOBALS["___mysqli_ston"],"select * from tb_ikk_bidang,tb_outcome where tb_outcome.id_outcome=tb_ikk_bidang.id_data and tb_ikk_bidang.id_ikk='$id_dok'");
$item = mysqli_fetch_array($rs); 
?> 
           <div class="modal-header">
					<h5 class="modal-title" id="myModalLabel3"><i class="fa fa-eraser"></i> <b>Hapus Data Dukung Kolektif</b></h5> 
					</div> 
		<div class="modal-body"> 
					<form enctype="multipart/form-data" class="form-horizontal" method="post"> 
			 <div class="alert alert-danger alert-dismissible"> 
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Peringatan!</h5>
				  Anda yakin ingin menghapus data dukung kolektif ? Semua file yang telah diupload akan hilang. Pastikan anda sudah mencetang data yang mau dihapus.
                </div> 
				</form>
					</div>	
            <div class="modal-footer">
                <button type="button" style="font-size:13px" onClick="submithapusall()"  class="btn btn-primary"><i class="fa fa-trash"></i> Hapus</button>
				 <button type="button" style="font-size:13px" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
            </div> 
<?php 
}
?>	 


<?php
if($mode=='dokumen-cetakdata'){ 
$id_dok =$_GET['kode']; 
$rs = mysqli_query($GLOBALS["___mysqli_ston"],"select * from tb_ikk_bidang,tb_outcome where tb_outcome.id_outcome=tb_ikk_bidang.id_data and tb_ikk_bidang.id_ikk='$id_dok'");
$item = mysqli_fetch_array($rs); 

$cekbidang=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_bidang where id_bidang='".$_GET['kode']."'"));

?> 
           <div class="modal-header">
					<h5 class="modal-title" id="myModalLabel3"><i class="fa fa-print"></i> <b>Cetak Realisasi IKK Bidang</b></h5> 
					</div> 
		<div class="modal-body">  
			<form  class="form-horizontal" name="postform" id="modal" method="post" action="cetak-realisasi-ikk.php" target="_blank">    
			<input type="hidden" class="form-control" id="id_bidang" name="id_bidang" value="<?php echo $_GET['kode'] ?>">  
			<div class="alert alert-light">
				<div class="form-group row"> 
                          <div class="col-sm-12">Nama Bidang
                          <input type="text" style=font-size:13px class="form-control" disabled value="<?php echo $cekbidang['nama_bidang'] ?>"> 
                          </div>  		   					  
                        </div>
						<div class="form-group row"> 
                          <div class="col-sm-9">Uraian Data IKK
                           <select class="form-control" name="iddata" id="iddata" style="font-size:13px">
							  <option value=""> </option>
                                  <?php 
									$data=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM  tb_ikk_bidang where tahun='$_SESSION[tahun]' and id_bidang='$_GET[kode]' order by id_data asc");
									while($caridata=mysqli_fetch_array($data)){
										$cekdata=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_outcome where id_outcome='".$caridata['id_data']."'")); 
										echo "
										<option value=\"$caridata[id_data]\">IKK $cekdata[kode_ikk] - $cekdata[uraian_outcome]</option>\n";
                                      } 
										echo "<option value='all'>Semua Indikator IKK</option>\n";
                                  ?>
								
                              </select>
                          </div> 
                          <div class="col-sm-3">Triwulan
                           <select class="form-control" name="tri" id="tri" style="font-size:13px">
							  <option value=""> </option>
                              <option value="1">Triwulan 1</option>
                              <option value="2">Triwulan 2</option>
                              <option value="3">Triwulan 3</option>
                              <option value="4">Triwulan 4</option>
                              <option value="5">Rekap Semua Triwulan</option>
                              </select>
                          </div></div>  					   					  
                        </div> 
						<div class="alert alert-warning" style="font-size:16px"> 
					 <h5><i class="icon fas fa-exclamation-triangle"></i> Peringatan!</h5>
					  Cek kembali apakah data capaian kinerja bidang sudah di validasi semua ?
					 </div><hr> 
				<div align=right>
				<button type="submit" class="btn btn-primary" style="font-size:13px"><i class="fa fa-print"></i> Cetak Capaian</button>&nbsp;
				 <button type="button" style="font-size:13px" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
				 </div>
			</form> 
            </div> 
<?php 
}
?>	 



<?php
if($mode=='dokumen-validasitri1'){ 
$id_dok =$_GET['kode']; 
$rs = mysqli_query($GLOBALS["___mysqli_ston"],"select * from tb_nilai_ikk_tri1,tb_ikk_bidang where tb_nilai_ikk_tri1.id_ikk=tb_ikk_bidang.id_ikk and tb_ikk_bidang.tri1=1 and tb_nilai_ikk_tri1.id_ikk='".$id_dok."' and tb_nilai_ikk_tri1.id_bidang='".$_GET['id_bidang']."' and tb_nilai_ikk_tri1.triwulan=1  and tb_nilai_ikk_tri1.tahun='".$_SESSION['tahun']."'");
$item = mysqli_fetch_array($rs); 
$rs2 = mysqli_query($GLOBALS["___mysqli_ston"],"select * from tb_ikk_bidang,tb_outcome where tb_outcome.id_outcome=tb_ikk_bidang.id_data and tb_ikk_bidang.id_ikk='$id_dok'");
$item2 = mysqli_fetch_array($rs2); 
$pembilang=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ouput_data where id='".$item2['pembilang']."' and tahun='$_SESSION[tahun]'")); 
$pembagi=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ouput_data where id='".$item2['pembagi']."' and tahun='$_SESSION[tahun]'"));  
$nilai=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1 where id_ikk='".$id_dok."' and id_bidang='".$_GET['id_bidang']."' and triwulan=1 and tahun='".$_SESSION['tahun']."'"));  
						
						$nilai=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1 where id_ikk='".$id_dok."' and id_bidang='".$_GET['id_bidang']."' and triwulan=1  and tahun='".$_SESSION['tahun']."'"));  
						$totnilai=($nilai['angka_pembilang']/$nilai['angka_pembagi'])*100;
						if($nilai['angka_pembilang']==0 and $nilai['angka_pembagi']==0){
						$persennilai=0;	
						}elseif($nilai['angka_pembilang']>0 and $nilai['angka_pembagi']==0){
						$persennilai=0;	
						}else{
						$persennilai=round($totnilai,2);	
						}

		if ($persennilai >=60){
		$colorbm="bg-success";
		}else{
		$colorbm="bg-danger";
		}							
?> 
           <div class="modal-header">
					<h5 class="modal-title" id="myModalLabel3"><i class="fa fa-check-circle"></i> <b>Validasi Capaian Triwulan <?php echo $item['triwulan'] ?></b></h5> 
					</div> 
		<div class="modal-body"> 
					<form class="form-horizontal" id="formValidasi">
					<input type="hidden" class="form-control" id="idvalidasi" name="idvalidasi" value="<?php echo $item['id_nilai'] ?>"> 
					 <div class="alert alert-light"> 
					<?php
					if ($item2['datapersen']==1){
					?>	
						  <div class="form-group row"> 
						    <div class="col-sm-9"><b>Uraian Data IKK</b><br>
                           <font style="font-size:14px">IKK <?php echo $item2['kode_ikk']." - ".$item2['uraian_outcome'] ?></font>
                          </div>
                          <div class="col-sm-3" align=right><br> 
                          <span class="badge <?php echo $colorbm ?>" style="font-size:12px"><?php echo $persennilai ?> %</span>
						  </div> 
						  </div> 
						<div class="form-group row"> 
                          <div class="col-sm-9"><b>Capaian Data IKK</b><br>
                           <font style="font-size:14px"><?php echo $pembilang['uraian_data']." <b>(Kode ".$pembilang['kode_data'].")" ?></b></font>
                          </div>
                          <div class="col-sm-3" align=right><br>
                           <span class="badge bg-info" style="font-size:12px"><?php echo rupiah2($nilai['angka_pembilang']) ?></span>
                          </div> 
						  </div>
						<div class="form-group row"> 
                          <div class="col-sm-9"> 
                           <font style="font-size:14px"><?php echo $pembagi['uraian_data']." <b>(Kode ".$pembagi['kode_data'].")" ?></b></font>
                          </div>
                          <div class="col-sm-3" align=right> 
                            <span class="badge bg-info" style="font-size:12px;"><?php echo rupiah2($nilai['angka_pembagi']) ?></span>
                          </div> 
						  </div> 
						<?php
						}else{
						?>
						<div class="form-group row"> 
						    <div class="col-sm-9"><b>Uraian Data IKK</b><br>
                           <font style="font-size:14px">IKK <?php echo $item2['kode_ikk']." - ".$item2['uraian_outcome'] ?></font>
                          </div>
                          <div class="col-sm-3" align=right> <br>
						  <span class="badge bg-info" style="font-size:12px"><?php echo rupiah2($nilai['angka_pembilang']) ?></span>
                          </div> 
						  </div>  
						<div class="form-group row"> 
                          <div class="col-sm-9"><b>Capaian Data IKK</b><br>
                           <font style="font-size:14px"><?php echo $item2['uraian_outcome'] ?></b></font>
                          </div>
                          <div class="col-sm-3" align=right><br>
                           <span class="badge bg-info" style="font-size:12px"><?php echo rupiah2($nilai['angka_pembilang']) ?></span>
                          </div> 
						  </div> 
						<?php
						}
						?>
						  
				</form>
					</div><hr> 					  					
			 <div class="alert alert-danger alert-dismissible"> 
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Peringatan!</h5>
				  Pastikan data capaian sudah di cek, validasi akan mengunci data.
                </div> 
					</div>		
            <div class="modal-footer"> 
				 <button type="button" onclick=validasidata() style="font-size:13px" class="btn btn-success"><i class="fa fa-check-circle"></i> Validasi</button>
				 <button type="button" style="font-size:13px" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
            </div> 
<?php 
}
?>	 


<?php
if($mode=='dokumen-validasitri2'){ 
$id_dok =$_GET['kode']; 
$rs = mysqli_query($GLOBALS["___mysqli_ston"],"select * from tb_nilai_ikk_tri1,tb_ikk_bidang where tb_nilai_ikk_tri1.id_ikk=tb_ikk_bidang.id_ikk and tb_ikk_bidang.tri2=1 and tb_nilai_ikk_tri1.id_ikk='".$id_dok."' and tb_nilai_ikk_tri1.id_bidang='".$_GET['id_bidang']."' and tb_nilai_ikk_tri1.triwulan=2  and tb_nilai_ikk_tri1.tahun='".$_SESSION['tahun']."'");
$item = mysqli_fetch_array($rs); 
$rs2 = mysqli_query($GLOBALS["___mysqli_ston"],"select * from tb_ikk_bidang,tb_outcome where tb_outcome.id_outcome=tb_ikk_bidang.id_data and tb_ikk_bidang.id_ikk='$id_dok'");
$item2 = mysqli_fetch_array($rs2); 
$pembilang=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ouput_data where id='".$item2['pembilang']."' and tahun='$_SESSION[tahun]'")); 
$pembagi=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ouput_data where id='".$item2['pembagi']."' and tahun='$_SESSION[tahun]'"));  
$nilai=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1 where id_ikk='".$id_dok."' and id_bidang='".$_GET['id_bidang']."' and triwulan=2 and tahun='".$_SESSION['tahun']."'"));  
						
						$nilai=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1 where id_ikk='".$id_dok."' and id_bidang='".$_GET['id_bidang']."' and triwulan=2  and tahun='".$_SESSION['tahun']."'"));  
						$totnilai=($nilai['angka_pembilang']/$nilai['angka_pembagi'])*100;
						if($nilai['angka_pembilang']==0 and $nilai['angka_pembagi']==0){
						$persennilai=0;	
						}elseif($nilai['angka_pembilang']>0 and $nilai['angka_pembagi']==0){
						$persennilai=0;	
						}else{
						$persennilai=round($totnilai,2);	
						}

		if ($persennilai >=60){
		$colorbm="bg-success";
		}else{
		$colorbm="bg-danger";
		}							
?> 
           <div class="modal-header">
					<h5 class="modal-title" id="myModalLabel3"><i class="fa fa-check-circle"></i> <b>Validasi Capaian Triwulan <?php echo $item['triwulan'] ?></b></h5> 
					</div> 
		<div class="modal-body"> 
					<form class="form-horizontal" id="formValidasi">
					<input type="hidden" class="form-control" id="idvalidasi" name="idvalidasi" value="<?php echo $item['id_nilai'] ?>"> 
					 <div class="alert alert-light"> 
					<?php
					if ($item2['datapersen']==1){
					?>	
						  <div class="form-group row"> 
						    <div class="col-sm-9"><b>Uraian Data IKK</b><br>
                           <font style="font-size:14px">IKK <?php echo $item2['kode_ikk']." - ".$item2['uraian_outcome'] ?></font>
                          </div>
                          <div class="col-sm-3" align=right><br> 
                          <span class="badge <?php echo $colorbm ?>" style="font-size:12px"><?php echo $persennilai ?> %</span>
						  </div> 
						  </div> 
						<div class="form-group row"> 
                          <div class="col-sm-9"><b>Capaian Data IKK</b><br>
                           <font style="font-size:14px"><?php echo $pembilang['uraian_data']." <b>(Kode ".$pembilang['kode_data'].")" ?></b></font>
                          </div>
                          <div class="col-sm-3" align=right><br>
                           <span class="badge bg-info" style="font-size:12px"><?php echo rupiah2($nilai['angka_pembilang']) ?></span>
                          </div> 
						  </div>
						<div class="form-group row"> 
                          <div class="col-sm-9"> 
                           <font style="font-size:14px"><?php echo $pembagi['uraian_data']." <b>(Kode ".$pembagi['kode_data'].")" ?></b></font>
                          </div>
                          <div class="col-sm-3" align=right> 
                            <span class="badge bg-info" style="font-size:12px;"><?php echo rupiah2($nilai['angka_pembagi']) ?></span>
                          </div> 
						  </div> 
						<?php
						}else{
						?>
						<div class="form-group row"> 
						    <div class="col-sm-9"><b>Uraian Data IKK</b><br>
                           <font style="font-size:14px">IKK <?php echo $item2['kode_ikk']." - ".$item2['uraian_outcome'] ?></font>
                          </div>
                          <div class="col-sm-3" align=right> <br>
						  <span class="badge bg-info" style="font-size:12px"><?php echo rupiah2($nilai['angka_pembilang']) ?></span>
                          </div> 
						  </div>  
						<div class="form-group row"> 
                          <div class="col-sm-9"><b>Capaian Data IKK</b><br>
                           <font style="font-size:14px"><?php echo $item2['uraian_outcome'] ?></b></font>
                          </div>
                          <div class="col-sm-3" align=right><br>
                           <span class="badge bg-info" style="font-size:12px"><?php echo rupiah2($nilai['angka_pembilang']) ?></span>
                          </div> 
						  </div> 
						<?php
						}
						?>
						  
				</form>
					</div><hr> 					  					
			 <div class="alert alert-danger alert-dismissible"> 
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Peringatan!</h5>
				  Pastikan data capaian sudah di cek, validasi akan mengunci data.
                </div> 
					</div>		
            <div class="modal-footer"> 
				 <button type="button" onclick=validasidata() style="font-size:13px" class="btn btn-success"><i class="fa fa-check-circle"></i> Validasi</button>
				 <button type="button" style="font-size:13px" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
            </div> 
<?php 
}
?>


<?php
if($mode=='dokumen-validasitri3'){ 
$id_dok =$_GET['kode']; 
$rs = mysqli_query($GLOBALS["___mysqli_ston"],"select * from tb_nilai_ikk_tri1,tb_ikk_bidang where tb_nilai_ikk_tri1.id_ikk=tb_ikk_bidang.id_ikk and tb_ikk_bidang.tri3=1 and tb_nilai_ikk_tri1.id_ikk='".$id_dok."' and tb_nilai_ikk_tri1.id_bidang='".$_GET['id_bidang']."' and tb_nilai_ikk_tri1.triwulan=3  and tb_nilai_ikk_tri1.tahun='".$_SESSION['tahun']."'");
$item = mysqli_fetch_array($rs); 
$rs2 = mysqli_query($GLOBALS["___mysqli_ston"],"select * from tb_ikk_bidang,tb_outcome where tb_outcome.id_outcome=tb_ikk_bidang.id_data and tb_ikk_bidang.id_ikk='$id_dok'");
$item2 = mysqli_fetch_array($rs2); 
$pembilang=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ouput_data where id='".$item2['pembilang']."' and tahun='$_SESSION[tahun]'")); 
$pembagi=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ouput_data where id='".$item2['pembagi']."' and tahun='$_SESSION[tahun]'"));  
$nilai=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1 where id_ikk='".$id_dok."' and id_bidang='".$_GET['id_bidang']."' and triwulan=3 and tahun='".$_SESSION['tahun']."'"));  
						
						$nilai=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1 where id_ikk='".$id_dok."' and id_bidang='".$_GET['id_bidang']."' and triwulan=3  and tahun='".$_SESSION['tahun']."'"));  
						$totnilai=($nilai['angka_pembilang']/$nilai['angka_pembagi'])*100;
						if($nilai['angka_pembilang']==0 and $nilai['angka_pembagi']==0){
						$persennilai=0;	
						}elseif($nilai['angka_pembilang']>0 and $nilai['angka_pembagi']==0){
						$persennilai=0;	
						}else{
						$persennilai=round($totnilai,2);	
						}

		if ($persennilai >=60){
		$colorbm="bg-success";
		}else{
		$colorbm="bg-danger";
		}							
?> 
           <div class="modal-header">
					<h5 class="modal-title" id="myModalLabel3"><i class="fa fa-check-circle"></i> <b>Validasi Capaian Triwulan <?php echo $item['triwulan'] ?></b></h5> 
					</div> 
		<div class="modal-body"> 
					<form class="form-horizontal" id="formValidasi">
					<input type="hidden" class="form-control" id="idvalidasi" name="idvalidasi" value="<?php echo $item['id_nilai'] ?>"> 
					 <div class="alert alert-light"> 
					<?php
					if ($item2['datapersen']==1){
					?>	
						  <div class="form-group row"> 
						    <div class="col-sm-9"><b>Uraian Data IKK</b><br>
                           <font style="font-size:14px">IKK <?php echo $item2['kode_ikk']." - ".$item2['uraian_outcome'] ?></font>
                          </div>
                          <div class="col-sm-3" align=right><br> 
                          <span class="badge <?php echo $colorbm ?>" style="font-size:12px"><?php echo $persennilai ?> %</span>
						  </div> 
						  </div> 
						<div class="form-group row"> 
                          <div class="col-sm-9"><b>Capaian Data IKK</b><br>
                           <font style="font-size:14px"><?php echo $pembilang['uraian_data']." <b>(Kode ".$pembilang['kode_data'].")" ?></b></font>
                          </div>
                          <div class="col-sm-3" align=right><br>
                           <span class="badge bg-info" style="font-size:12px"><?php echo rupiah2($nilai['angka_pembilang']) ?></span>
                          </div> 
						  </div>
						<div class="form-group row"> 
                          <div class="col-sm-9"> 
                           <font style="font-size:14px"><?php echo $pembagi['uraian_data']." <b>(Kode ".$pembagi['kode_data'].")" ?></b></font>
                          </div>
                          <div class="col-sm-3" align=right> 
                            <span class="badge bg-info" style="font-size:12px;"><?php echo rupiah2($nilai['angka_pembagi']) ?></span>
                          </div> 
						  </div> 
						<?php
						}else{
						?>
						<div class="form-group row"> 
						    <div class="col-sm-9"><b>Uraian Data IKK</b><br>
                           <font style="font-size:14px">IKK <?php echo $item2['kode_ikk']." - ".$item2['uraian_outcome'] ?></font>
                          </div>
                          <div class="col-sm-3" align=right> <br>
						  <span class="badge bg-info" style="font-size:12px"><?php echo rupiah2($nilai['angka_pembilang']) ?></span>
                          </div> 
						  </div>  
						<div class="form-group row"> 
                          <div class="col-sm-9"><b>Capaian Data IKK</b><br>
                           <font style="font-size:14px"><?php echo $item2['uraian_outcome'] ?></b></font>
                          </div>
                          <div class="col-sm-3" align=right><br>
                           <span class="badge bg-info" style="font-size:12px"><?php echo rupiah2($nilai['angka_pembilang']) ?></span>
                          </div> 
						  </div> 
						<?php
						}
						?>
						  
				</form>
					</div><hr> 					  					
			 <div class="alert alert-danger alert-dismissible"> 
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Peringatan!</h5>
				  Pastikan data capaian sudah di cek, validasi akan mengunci data.
                </div> 
					</div>		
            <div class="modal-footer"> 
				 <button type="button" onclick=validasidata() style="font-size:13px" class="btn btn-success"><i class="fa fa-check-circle"></i> Validasi</button>
				 <button type="button" style="font-size:13px" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
            </div> 
<?php 
}
?>



<?php
if($mode=='dokumen-validasitri4'){ 
$id_dok =$_GET['kode']; 
$rs = mysqli_query($GLOBALS["___mysqli_ston"],"select * from tb_nilai_ikk_tri1,tb_ikk_bidang where tb_nilai_ikk_tri1.id_ikk=tb_ikk_bidang.id_ikk and tb_ikk_bidang.tri4=1 and tb_nilai_ikk_tri1.id_ikk='".$id_dok."' and tb_nilai_ikk_tri1.id_bidang='".$_GET['id_bidang']."' and tb_nilai_ikk_tri1.triwulan=4  and tb_nilai_ikk_tri1.tahun='".$_SESSION['tahun']."'");
$item = mysqli_fetch_array($rs); 
$rs2 = mysqli_query($GLOBALS["___mysqli_ston"],"select * from tb_ikk_bidang,tb_outcome where tb_outcome.id_outcome=tb_ikk_bidang.id_data and tb_ikk_bidang.id_ikk='$id_dok'");
$item2 = mysqli_fetch_array($rs2); 
$pembilang=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ouput_data where id='".$item2['pembilang']."' and tahun='$_SESSION[tahun]'")); 
$pembagi=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ouput_data where id='".$item2['pembagi']."' and tahun='$_SESSION[tahun]'"));  
$nilai=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1 where id_ikk='".$id_dok."' and id_bidang='".$_GET['id_bidang']."' and triwulan=4 and tahun='".$_SESSION['tahun']."'"));  
						
						$nilai=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1 where id_ikk='".$id_dok."' and id_bidang='".$_GET['id_bidang']."' and triwulan=4  and tahun='".$_SESSION['tahun']."'"));  
						$totnilai=($nilai['angka_pembilang']/$nilai['angka_pembagi'])*100;
						if($nilai['angka_pembilang']==0 and $nilai['angka_pembagi']==0){
						$persennilai=0;	
						}elseif($nilai['angka_pembilang']>0 and $nilai['angka_pembagi']==0){
						$persennilai=0;	
						}else{
						$persennilai=round($totnilai,2);	
						}

		if ($persennilai >=60){
		$colorbm="bg-success";
		}else{
		$colorbm="bg-danger";
		}							
?> 
           <div class="modal-header">
					<h5 class="modal-title" id="myModalLabel3"><i class="fa fa-check-circle"></i> <b>Validasi Capaian Triwulan <?php echo $item['triwulan'] ?></b></h5> 
					</div> 
		<div class="modal-body"> 
					<form class="form-horizontal" id="formValidasi">
					<input type="hidden" class="form-control" id="idvalidasi" name="idvalidasi" value="<?php echo $item['id_nilai'] ?>"> 
					 <div class="alert alert-light"> 
					<?php
					if ($item2['datapersen']==1){
					?>	
						  <div class="form-group row"> 
						    <div class="col-sm-9"><b>Uraian Data IKK</b><br>
                           <font style="font-size:14px">IKK <?php echo $item2['kode_ikk']." - ".$item2['uraian_outcome'] ?></font>
                          </div>
                          <div class="col-sm-3" align=right><br> 
                          <span class="badge <?php echo $colorbm ?>" style="font-size:12px"><?php echo $persennilai ?> %</span>
						  </div> 
						  </div> 
						<div class="form-group row"> 
                          <div class="col-sm-9"><b>Capaian Data IKK</b><br>
                           <font style="font-size:14px"><?php echo $pembilang['uraian_data']." <b>(Kode ".$pembilang['kode_data'].")" ?></b></font>
                          </div>
                          <div class="col-sm-3" align=right><br>
                           <span class="badge bg-info" style="font-size:12px"><?php echo rupiah2($nilai['angka_pembilang']) ?></span>
                          </div> 
						  </div>
						<div class="form-group row"> 
                          <div class="col-sm-9"> 
                           <font style="font-size:14px"><?php echo $pembagi['uraian_data']." <b>(Kode ".$pembagi['kode_data'].")" ?></b></font>
                          </div>
                          <div class="col-sm-3" align=right> 
                            <span class="badge bg-info" style="font-size:12px;"><?php echo rupiah2($nilai['angka_pembagi']) ?></span>
                          </div> 
						  </div> 
						<?php
						}else{
						?>
						<div class="form-group row"> 
						    <div class="col-sm-9"><b>Uraian Data IKK</b><br>
                           <font style="font-size:14px">IKK <?php echo $item2['kode_ikk']." - ".$item2['uraian_outcome'] ?></font>
                          </div>
                          <div class="col-sm-3" align=right> <br>
						  <span class="badge bg-info" style="font-size:12px"><?php echo rupiah2($nilai['angka_pembilang']) ?></span>
                          </div> 
						  </div>  
						<div class="form-group row"> 
                          <div class="col-sm-9"><b>Capaian Data IKK</b><br>
                           <font style="font-size:14px"><?php echo $item2['uraian_outcome'] ?></b></font>
                          </div>
                          <div class="col-sm-3" align=right><br>
                           <span class="badge bg-info" style="font-size:12px"><?php echo rupiah2($nilai['angka_pembilang']) ?></span>
                          </div> 
						  </div> 
						<?php
						}
						?>
						  
				</form>
					</div><hr> 					  					
			 <div class="alert alert-danger alert-dismissible"> 
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Peringatan!</h5>
				  Pastikan data capaian sudah di cek, validasi akan mengunci data.
                </div> 
					</div>		
            <div class="modal-footer"> 
				 <button type="button" onclick=validasidata() style="font-size:13px" class="btn btn-success"><i class="fa fa-check-circle"></i> Validasi</button>
				 <button type="button" style="font-size:13px" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
            </div> 
<?php 
}
?>

<?php
if($mode=='dokumen-view1'){ 
$id_dok =$_GET['kode']; 
$rs = mysqli_query($GLOBALS["___mysqli_ston"],"select * from tb_nilai_ikk_tri1,tb_ikk_bidang where tb_nilai_ikk_tri1.id_ikk=tb_ikk_bidang.id_ikk and tb_ikk_bidang.tri1=1 and tb_nilai_ikk_tri1.id_ikk='".$id_dok."' and tb_nilai_ikk_tri1.id_bidang='".$_GET['id_bidang']."' and tb_nilai_ikk_tri1.triwulan=1  and tb_nilai_ikk_tri1.tahun='".$_SESSION['tahun']."'");
$item = mysqli_fetch_array($rs); 
$rs2 = mysqli_query($GLOBALS["___mysqli_ston"],"select * from tb_ikk_bidang,tb_outcome where tb_outcome.id_outcome=tb_ikk_bidang.id_data and tb_ikk_bidang.id_ikk='$id_dok'");
$item2 = mysqli_fetch_array($rs2); 
$pembilang=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ouput_data where id='".$item2['pembilang']."' and tahun='$_SESSION[tahun]'")); 
$pembagi=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ouput_data where id='".$item2['pembagi']."' and tahun='$_SESSION[tahun]'"));  
$nilai=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1 where id_ikk='".$id_dok."' and id_bidang='".$_GET['id_bidang']."' and triwulan=1 and tahun='".$_SESSION['tahun']."'"));  
						
						$nilai=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1 where id_ikk='".$id_dok."' and id_bidang='".$_GET['id_bidang']."' and triwulan=1  and tahun='".$_SESSION['tahun']."'"));  
						$totnilai=($nilai['angka_pembilang']/$nilai['angka_pembagi'])*100;
						if($nilai['angka_pembilang']==0 and $nilai['angka_pembagi']==0){
						$persennilai=0;	
						}elseif($nilai['angka_pembilang']>0 and $nilai['angka_pembagi']==0){
						$persennilai=0;	
						}else{
						$persennilai=round($totnilai,2);	
						}

		if ($persennilai >=60){
		$colorbm="bg-success";
		}else{
		$colorbm="bg-danger";
		}							
?> 
           <div class="modal-header">
					<h5 class="modal-title" id="myModalLabel3"><i class="fa fa-eye"></i> <b>View Capaian Triwulan <?php echo $item['triwulan'] ?></b></h5> 
					</div> 
		<div class="modal-body"> 
					<form class="form-horizontal" id="formValidasi">
					<input type="hidden" class="form-control" id="idvalidasi" name="idvalidasi" value="<?php echo $item['id_nilai'] ?>"> 
					 <div class="alert alert-light"> 
					<?php
					if ($item2['datapersen']==1){
					?>	
						  <div class="form-group row"> 
						    <div class="col-sm-9"><b>Uraian Data IKK</b><br>
                           <font style="font-size:14px">IKK <?php echo $item2['kode_ikk']." - ".$item2['uraian_outcome'] ?></font>
                          </div>
                          <div class="col-sm-3" align=right><br> 
                          <span class="badge <?php echo $colorbm ?>" style="font-size:12px"><?php echo $persennilai ?> %</span>
						  </div> 
						  </div> 
						<div class="form-group row"> 
                          <div class="col-sm-9"><b>Capaian Data IKK</b><br>
                           <font style="font-size:14px"><?php echo $pembilang['uraian_data']." <b>(Kode ".$pembilang['kode_data'].")" ?></b></font>
                          </div>
                          <div class="col-sm-3" align=right><br>
                           <span class="badge bg-info" style="font-size:12px"><?php echo rupiah2($nilai['angka_pembilang']) ?></span>
                          </div> 
						  </div>
						<div class="form-group row"> 
                          <div class="col-sm-9"> 
                           <font style="font-size:14px"><?php echo $pembagi['uraian_data']." <b>(Kode ".$pembagi['kode_data'].")" ?></b></font>
                          </div>
                          <div class="col-sm-3" align=right> 
                            <span class="badge bg-info" style="font-size:12px;"><?php echo rupiah2($nilai['angka_pembagi']) ?></span>
                          </div> 
						  </div> 
						<?php
						}else{
						?>
						<div class="form-group row"> 
						    <div class="col-sm-9"><b>Uraian Data IKK</b><br>
                           <font style="font-size:14px">IKK <?php echo $item2['kode_ikk']." - ".$item2['uraian_outcome'] ?></font>
                          </div>
                          <div class="col-sm-3" align=right> <br>
						  <span class="badge bg-info" style="font-size:12px"><?php echo rupiah2($nilai['angka_pembilang']) ?></span>
                          </div> 
						  </div>  
						<div class="form-group row"> 
                          <div class="col-sm-9"><b>Capaian Data IKK</b><br>
                           <font style="font-size:14px"><?php echo $item2['uraian_outcome'] ?></b></font>
                          </div>
                          <div class="col-sm-3" align=right><br>
                           <span class="badge bg-info" style="font-size:12px"><?php echo rupiah2($nilai['angka_pembilang']) ?></span>
                          </div> 
						  </div> 
						<?php
						}
						?>
						  
				</form>
					</div> 
					</div>		
            <div class="modal-footer"> 
			<button type="button" onClick="unvalidasi1(<?php echo $item['id_ikk'].','.$item['id_bidang'] ?>)" style="font-size:13px" class="btn btn-success"><i class="fa fa-reply"></i> Batalkan Validasi</button>
			<button type="button" style="font-size:13px" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
            </div> 
<?php 
}
?>	


<?php
if($mode=='dokumen-view2'){ 
$id_dok =$_GET['kode']; 
$rs = mysqli_query($GLOBALS["___mysqli_ston"],"select * from tb_nilai_ikk_tri1,tb_ikk_bidang where tb_nilai_ikk_tri1.id_ikk=tb_ikk_bidang.id_ikk and tb_ikk_bidang.tri2=1 and tb_nilai_ikk_tri1.id_ikk='".$id_dok."' and tb_nilai_ikk_tri1.id_bidang='".$_GET['id_bidang']."' and tb_nilai_ikk_tri1.triwulan=2  and tb_nilai_ikk_tri1.tahun='".$_SESSION['tahun']."'");
$item = mysqli_fetch_array($rs); 
$rs2 = mysqli_query($GLOBALS["___mysqli_ston"],"select * from tb_ikk_bidang,tb_outcome where tb_outcome.id_outcome=tb_ikk_bidang.id_data and tb_ikk_bidang.id_ikk='$id_dok'");
$item2 = mysqli_fetch_array($rs2); 
$pembilang=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ouput_data where id='".$item2['pembilang']."' and tahun='$_SESSION[tahun]'")); 
$pembagi=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ouput_data where id='".$item2['pembagi']."' and tahun='$_SESSION[tahun]'"));  
$nilai=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1 where id_ikk='".$id_dok."' and id_bidang='".$_GET['id_bidang']."' and triwulan=2 and tahun='".$_SESSION['tahun']."'"));  
						
						$nilai=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1 where id_ikk='".$id_dok."' and id_bidang='".$_GET['id_bidang']."' and triwulan=2  and tahun='".$_SESSION['tahun']."'"));  
						$totnilai=($nilai['angka_pembilang']/$nilai['angka_pembagi'])*100;
						if($nilai['angka_pembilang']==0 and $nilai['angka_pembagi']==0){
						$persennilai=0;	
						}elseif($nilai['angka_pembilang']>0 and $nilai['angka_pembagi']==0){
						$persennilai=0;	
						}else{
						$persennilai=round($totnilai,2);	
						}

		if ($persennilai >=60){
		$colorbm="bg-success";
		}else{
		$colorbm="bg-danger";
		}							
?> 
           <div class="modal-header">
					<h5 class="modal-title" id="myModalLabel3"><i class="fa fa-eye"></i> <b>View Capaian Triwulan <?php echo $item['triwulan'] ?></b></h5> 
					</div> 
		<div class="modal-body"> 
					<form class="form-horizontal" id="formValidasi">
					<input type="hidden" class="form-control" id="idvalidasi" name="idvalidasi" value="<?php echo $item['id_nilai'] ?>"> 
					 <div class="alert alert-light"> 
					<?php
					if ($item2['datapersen']==1){
					?>	
						  <div class="form-group row"> 
						    <div class="col-sm-9"><b>Uraian Data IKK</b><br>
                           <font style="font-size:14px">IKK <?php echo $item2['kode_ikk']." - ".$item2['uraian_outcome'] ?></font>
                          </div>
                          <div class="col-sm-3" align=right><br> 
                          <span class="badge <?php echo $colorbm ?>" style="font-size:12px"><?php echo $persennilai ?> %</span>
						  </div> 
						  </div> 
						<div class="form-group row"> 
                          <div class="col-sm-9"><b>Capaian Data IKK</b><br>
                           <font style="font-size:14px"><?php echo $pembilang['uraian_data']." <b>(Kode ".$pembilang['kode_data'].")" ?></b></font>
                          </div>
                          <div class="col-sm-3" align=right><br>
                           <span class="badge bg-info" style="font-size:12px"><?php echo rupiah2($nilai['angka_pembilang']) ?></span>
                          </div> 
						  </div>
						<div class="form-group row"> 
                          <div class="col-sm-9"> 
                           <font style="font-size:14px"><?php echo $pembagi['uraian_data']." <b>(Kode ".$pembagi['kode_data'].")" ?></b></font>
                          </div>
                          <div class="col-sm-3" align=right> 
                            <span class="badge bg-info" style="font-size:12px;"><?php echo rupiah2($nilai['angka_pembagi']) ?></span>
                          </div> 
						  </div> 
						<?php
						}else{
						?>
						<div class="form-group row"> 
						    <div class="col-sm-9"><b>Uraian Data IKK</b><br>
                           <font style="font-size:14px">IKK <?php echo $item2['kode_ikk']." - ".$item2['uraian_outcome'] ?></font>
                          </div>
                          <div class="col-sm-3" align=right> <br>
						  <span class="badge bg-info" style="font-size:12px"><?php echo rupiah2($nilai['angka_pembilang']) ?></span>
                          </div> 
						  </div>  
						<div class="form-group row"> 
                          <div class="col-sm-9"><b>Capaian Data IKK</b><br>
                           <font style="font-size:14px"><?php echo $item2['uraian_outcome'] ?></b></font>
                          </div>
                          <div class="col-sm-3" align=right><br>
                           <span class="badge bg-info" style="font-size:12px"><?php echo rupiah2($nilai['angka_pembilang']) ?></span>
                          </div> 
						  </div> 
						<?php
						}
						?>
						  
				</form>
					</div> 
					</div>		
            <div class="modal-footer"> 
			<button type="button" onClick="unvalidasi2(<?php echo $item['id_ikk'].','.$item['id_bidang'] ?>)" style="font-size:13px" class="btn btn-success"><i class="fa fa-reply"></i> Batalkan Validasi</button>
			<button type="button" style="font-size:13px" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
            </div> 
<?php 
}
?>


<?php
if($mode=='dokumen-view3'){ 
$id_dok =$_GET['kode']; 
$rs = mysqli_query($GLOBALS["___mysqli_ston"],"select * from tb_nilai_ikk_tri1,tb_ikk_bidang where tb_nilai_ikk_tri1.id_ikk=tb_ikk_bidang.id_ikk and tb_ikk_bidang.tri3=1 and tb_nilai_ikk_tri1.id_ikk='".$id_dok."' and tb_nilai_ikk_tri1.id_bidang='".$_GET['id_bidang']."' and tb_nilai_ikk_tri1.triwulan=3  and tb_nilai_ikk_tri1.tahun='".$_SESSION['tahun']."'");
$item = mysqli_fetch_array($rs); 
$rs2 = mysqli_query($GLOBALS["___mysqli_ston"],"select * from tb_ikk_bidang,tb_outcome where tb_outcome.id_outcome=tb_ikk_bidang.id_data and tb_ikk_bidang.id_ikk='$id_dok'");
$item2 = mysqli_fetch_array($rs2); 
$pembilang=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ouput_data where id='".$item2['pembilang']."' and tahun='$_SESSION[tahun]'")); 
$pembagi=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ouput_data where id='".$item2['pembagi']."' and tahun='$_SESSION[tahun]'"));  
$nilai=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1 where id_ikk='".$id_dok."' and id_bidang='".$_GET['id_bidang']."' and triwulan=3 and tahun='".$_SESSION['tahun']."'"));  
						
						$nilai=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1 where id_ikk='".$id_dok."' and id_bidang='".$_GET['id_bidang']."' and triwulan=3  and tahun='".$_SESSION['tahun']."'"));  
						$totnilai=($nilai['angka_pembilang']/$nilai['angka_pembagi'])*100;
						if($nilai['angka_pembilang']==0 and $nilai['angka_pembagi']==0){
						$persennilai=0;	
						}elseif($nilai['angka_pembilang']>0 and $nilai['angka_pembagi']==0){
						$persennilai=0;	
						}else{
						$persennilai=round($totnilai,2);	
						}

		if ($persennilai >=60){
		$colorbm="bg-success";
		}else{
		$colorbm="bg-danger";
		}							
?> 
           <div class="modal-header">
					<h5 class="modal-title" id="myModalLabel3"><i class="fa fa-eye"></i> <b>View Capaian Triwulan <?php echo $item['triwulan'] ?></b></h5> 
					</div> 
		<div class="modal-body"> 
					<form class="form-horizontal" id="formValidasi">
					<input type="hidden" class="form-control" id="idvalidasi" name="idvalidasi" value="<?php echo $item['id_nilai'] ?>"> 
					 <div class="alert alert-light"> 
					<?php
					if ($item2['datapersen']==1){
					?>	
						  <div class="form-group row"> 
						    <div class="col-sm-9"><b>Uraian Data IKK</b><br>
                           <font style="font-size:14px">IKK <?php echo $item2['kode_ikk']." - ".$item2['uraian_outcome'] ?></font>
                          </div>
                          <div class="col-sm-3" align=right><br> 
                          <span class="badge <?php echo $colorbm ?>" style="font-size:12px"><?php echo $persennilai ?> %</span>
						  </div> 
						  </div> 
						<div class="form-group row"> 
                          <div class="col-sm-9"><b>Capaian Data IKK</b><br>
                           <font style="font-size:14px"><?php echo $pembilang['uraian_data']." <b>(Kode ".$pembilang['kode_data'].")" ?></b></font>
                          </div>
                          <div class="col-sm-3" align=right><br>
                           <span class="badge bg-info" style="font-size:12px"><?php echo rupiah2($nilai['angka_pembilang']) ?></span>
                          </div> 
						  </div>
						<div class="form-group row"> 
                          <div class="col-sm-9"> 
                           <font style="font-size:14px"><?php echo $pembagi['uraian_data']." <b>(Kode ".$pembagi['kode_data'].")" ?></b></font>
                          </div>
                          <div class="col-sm-3" align=right> 
                            <span class="badge bg-info" style="font-size:12px;"><?php echo rupiah2($nilai['angka_pembagi']) ?></span>
                          </div> 
						  </div> 
						<?php
						}else{
						?>
						<div class="form-group row"> 
						    <div class="col-sm-9"><b>Uraian Data IKK</b><br>
                           <font style="font-size:14px">IKK <?php echo $item2['kode_ikk']." - ".$item2['uraian_outcome'] ?></font>
                          </div>
                          <div class="col-sm-3" align=right> <br>
						  <span class="badge bg-info" style="font-size:12px"><?php echo rupiah2($nilai['angka_pembilang']) ?></span>
                          </div> 
						  </div>  
						<div class="form-group row"> 
                          <div class="col-sm-9"><b>Capaian Data IKK</b><br>
                           <font style="font-size:14px"><?php echo $item2['uraian_outcome'] ?></b></font>
                          </div>
                          <div class="col-sm-3" align=right><br>
                           <span class="badge bg-info" style="font-size:12px"><?php echo rupiah2($nilai['angka_pembilang']) ?></span>
                          </div> 
						  </div> 
						<?php
						}
						?>
						  
				</form>
					</div> 
					</div>		
            <div class="modal-footer"> 
			<button type="button" onClick="unvalidasi3(<?php echo $item['id_ikk'].','.$item['id_bidang'] ?>)" style="font-size:13px" class="btn btn-success"><i class="fa fa-reply"></i> Batalkan Validasi</button>
			<button type="button" style="font-size:13px" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
            </div> 
<?php 
}
?>


<?php
if($mode=='dokumen-view4'){ 
$id_dok =$_GET['kode']; 
$rs = mysqli_query($GLOBALS["___mysqli_ston"],"select * from tb_nilai_ikk_tri1,tb_ikk_bidang where tb_nilai_ikk_tri1.id_ikk=tb_ikk_bidang.id_ikk and tb_ikk_bidang.tri4=1 and tb_nilai_ikk_tri1.id_ikk='".$id_dok."' and tb_nilai_ikk_tri1.id_bidang='".$_GET['id_bidang']."' and tb_nilai_ikk_tri1.triwulan=4  and tb_nilai_ikk_tri1.tahun='".$_SESSION['tahun']."'");
$item = mysqli_fetch_array($rs); 
$rs2 = mysqli_query($GLOBALS["___mysqli_ston"],"select * from tb_ikk_bidang,tb_outcome where tb_outcome.id_outcome=tb_ikk_bidang.id_data and tb_ikk_bidang.id_ikk='$id_dok'");
$item2 = mysqli_fetch_array($rs2); 
$pembilang=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ouput_data where id='".$item2['pembilang']."' and tahun='$_SESSION[tahun]'")); 
$pembagi=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ouput_data where id='".$item2['pembagi']."' and tahun='$_SESSION[tahun]'"));  
$nilai=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1 where id_ikk='".$id_dok."' and id_bidang='".$_GET['id_bidang']."' and triwulan=4 and tahun='".$_SESSION['tahun']."'"));  
						
						$nilai=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1 where id_ikk='".$id_dok."' and id_bidang='".$_GET['id_bidang']."' and triwulan=4  and tahun='".$_SESSION['tahun']."'"));  
						$totnilai=($nilai['angka_pembilang']/$nilai['angka_pembagi'])*100;
						if($nilai['angka_pembilang']==0 and $nilai['angka_pembagi']==0){
						$persennilai=0;	
						}elseif($nilai['angka_pembilang']>0 and $nilai['angka_pembagi']==0){
						$persennilai=0;	
						}else{
						$persennilai=round($totnilai,2);	
						}

		if ($persennilai >=60){
		$colorbm="bg-success";
		}else{
		$colorbm="bg-danger";
		}							
?> 
           <div class="modal-header">
					<h5 class="modal-title" id="myModalLabel3"><i class="fa fa-eye"></i> <b>View Capaian Triwulan <?php echo $item['triwulan'] ?></b></h5> 
					</div> 
		<div class="modal-body"> 
					<form class="form-horizontal" id="formValidasi">
					<input type="hidden" class="form-control" id="idvalidasi" name="idvalidasi" value="<?php echo $item['id_nilai'] ?>"> 
					 <div class="alert alert-light"> 
					<?php
					if ($item2['datapersen']==1){
					?>	
						  <div class="form-group row"> 
						    <div class="col-sm-9"><b>Uraian Data IKK</b><br>
                           <font style="font-size:14px">IKK <?php echo $item2['kode_ikk']." - ".$item2['uraian_outcome'] ?></font>
                          </div>
                          <div class="col-sm-3" align=right><br> 
                          <span class="badge <?php echo $colorbm ?>" style="font-size:12px"><?php echo $persennilai ?> %</span>
						  </div> 
						  </div> 
						<div class="form-group row"> 
                          <div class="col-sm-9"><b>Capaian Data IKK</b><br>
                           <font style="font-size:14px"><?php echo $pembilang['uraian_data']." <b>(Kode ".$pembilang['kode_data'].")" ?></b></font>
                          </div>
                          <div class="col-sm-3" align=right><br>
                           <span class="badge bg-info" style="font-size:12px"><?php echo rupiah2($nilai['angka_pembilang']) ?></span>
                          </div> 
						  </div>
						<div class="form-group row"> 
                          <div class="col-sm-9"> 
                           <font style="font-size:14px"><?php echo $pembagi['uraian_data']." <b>(Kode ".$pembagi['kode_data'].")" ?></b></font>
                          </div>
                          <div class="col-sm-3" align=right> 
                            <span class="badge bg-info" style="font-size:12px;"><?php echo rupiah2($nilai['angka_pembagi']) ?></span>
                          </div> 
						  </div> 
						<?php
						}else{
						?>
						<div class="form-group row"> 
						    <div class="col-sm-9"><b>Uraian Data IKK</b><br>
                           <font style="font-size:14px">IKK <?php echo $item2['kode_ikk']." - ".$item2['uraian_outcome'] ?></font>
                          </div>
                          <div class="col-sm-3" align=right> <br>
						  <span class="badge bg-info" style="font-size:12px"><?php echo rupiah2($nilai['angka_pembilang']) ?></span>
                          </div> 
						  </div>  
						<div class="form-group row"> 
                          <div class="col-sm-9"><b>Capaian Data IKK</b><br>
                           <font style="font-size:14px"><?php echo $item2['uraian_outcome'] ?></b></font>
                          </div>
                          <div class="col-sm-3" align=right><br>
                           <span class="badge bg-info" style="font-size:12px"><?php echo rupiah2($nilai['angka_pembilang']) ?></span>
                          </div> 
						  </div> 
						<?php
						}
						?>
						  
				</form>
					</div> 
					</div>		
            <div class="modal-footer"> 
			<button type="button" onClick="unvalidasi4(<?php echo $item['id_ikk'].','.$item['id_bidang'] ?>)" style="font-size:13px" class="btn btn-success"><i class="fa fa-reply"></i> Batalkan Validasi</button>
			<button type="button" style="font-size:13px" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
            </div> 
<?php 
}
?>

<?php
if($mode=='dokumen-cetaktri1'){ 
$id_dok =$_GET['kode']; 
$rs = mysqli_query($GLOBALS["___mysqli_ston"],"select * from tb_ikk_bidang,tb_outcome where tb_outcome.id_outcome=tb_ikk_bidang.id_data and tb_ikk_bidang.id_data='$id_dok'");
$item = mysqli_fetch_array($rs); 
?> 
           <div class="modal-header">
					<h5 class="modal-title" id="myModalLabel3"><i class="fa fa-print"></i> <b>Cetak Data Triwulan 1 - IKK <?php echo $item['kode_ikk'] ?></b></h5> 
					</div> 
		<div class="modal-body"> 
					<form enctype="multipart/form-data" class="form-horizontal" method="post"> 
			 <div class="alert alert-danger alert-dismissible"> 
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Peringatan!</h5>
				  Pastikan data realisasi sudah final diisi.
                </div> 
				</form>
					</div>	
            <div class="modal-footer"> 
			<form  class="form-horizontal" name="postform" id="modal" method="post" action="cetak-realisasi-ikk.php" target="_blank">  
			<input type="hidden" class="form-control" id="idcetak" name="idcetak" value="<?php echo $id_dok ?>">  
			<input type="hidden" class="form-control" id="tri" name="tri" value="<?php echo $_GET['tri'] ?>">   	
			<input type="hidden" class="form-control" id="id_bidang" name="id_bidang" value="<?php echo $_GET['id_bidang'] ?>">   	  			  			
               <button type="submit" class="btn btn-success" style="font-size:13px"><i class="fa fa-print"></i> Cetak</button>&nbsp;
			</form> 
				 <button type="button" style="font-size:13px" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
            </div> 
<?php 
}
?>	 


<?php
if($mode=='dokumen-cetaktri1a'){ 
$id_dok =$_GET['kode']; 
$rs = mysqli_query($GLOBALS["___mysqli_ston"],"select * from tb_ikk_bidang,tb_outcome where tb_outcome.id_outcome=tb_ikk_bidang.id_data and tb_ikk_bidang.id_data='$id_dok'");
$item = mysqli_fetch_array($rs); 
?> 
           <div class="modal-header">
					<h5 class="modal-title" id="myModalLabel3"><i class="fa fa-print"></i> <b>Cetak ALL Data Triwulan 1 - Semua IKK</b></h5> 
					</div> 
		<div class="modal-body"> 
					<form enctype="multipart/form-data" class="form-horizontal" method="post"> 
			 <div class="alert alert-danger alert-dismissible"> 
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Peringatan!</h5>
				  Pastikan data realisasi sudah final diisi.
                </div> 
				</form>
					</div>	
            <div class="modal-footer"> 
			<form  class="form-horizontal" name="postform" id="modal" method="post" action="cetak-realisasi-ikk-all.php" target="_blank">  
			<input type="hidden" class="form-control" id="idcetak" name="idcetak" value="<?php echo $id_dok ?>">  
			<input type="hidden" class="form-control" id="tri" name="tri" value="<?php echo $_GET['tri'] ?>">  	
			<input type="hidden" class="form-control" id="id_bidang" name="id_bidang" value="<?php echo $_GET['id_bidang'] ?>">   	   	  			
               <button type="submit" class="btn btn-success" style="font-size:13px"><i class="fa fa-print"></i> Cetak</button>&nbsp;
			</form> 
				 <button type="button" style="font-size:13px" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
            </div> 
<?php 
}
?>	 


<?php
if($mode=='dokumen-cetaktri2'){ 
$id_dok =$_GET['kode']; 
$rs = mysqli_query($GLOBALS["___mysqli_ston"],"select * from tb_ikk_bidang,tb_outcome where tb_outcome.id_outcome=tb_ikk_bidang.id_data and tb_ikk_bidang.id_data='$id_dok'");
$item = mysqli_fetch_array($rs); 
?> 
           <div class="modal-header">
					<h5 class="modal-title" id="myModalLabel3"><i class="fa fa-print"></i> <b>Cetak Data Triwulan 2 - IKK <?php echo $item['kode_ikk'] ?></b></h5> 
					</div> 
		<div class="modal-body"> 
					<form enctype="multipart/form-data" class="form-horizontal" method="post"> 
			 <div class="alert alert-danger alert-dismissible"> 
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Peringatan!</h5>
				  Pastikan data realisasi sudah final diisi.
                </div> 
				</form>
					</div>	
            <div class="modal-footer"> 
			<form  class="form-horizontal" name="postform" id="modal" method="post" action="cetak-realisasi-ikk.php" target="_blank">  
			<input type="hidden" class="form-control" id="idcetak" name="idcetak" value="<?php echo $id_dok ?>">  
			<input type="hidden" class="form-control" id="tri" name="tri" value="<?php echo $_GET['tri'] ?>">   	
			<input type="hidden" class="form-control" id="id_bidang" name="id_bidang" value="<?php echo $_GET['id_bidang'] ?>">   	  			  			
               <button type="submit" class="btn btn-success" style="font-size:13px"><i class="fa fa-print"></i> Cetak</button>&nbsp;
			</form> 
				 <button type="button" style="font-size:13px" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
            </div> 
<?php 
}
?>	 


<?php
if($mode=='dokumen-cetaktri2a'){ 
$id_dok =$_GET['kode']; 
$rs = mysqli_query($GLOBALS["___mysqli_ston"],"select * from tb_ikk_bidang,tb_outcome where tb_outcome.id_outcome=tb_ikk_bidang.id_data and tb_ikk_bidang.id_data='$id_dok'");
$item = mysqli_fetch_array($rs); 
?> 
           <div class="modal-header">
					<h5 class="modal-title" id="myModalLabel3"><i class="fa fa-print"></i> <b>Cetak ALL Data Triwulan 2 - Semua IKK</b></h5> 
					</div> 
		<div class="modal-body"> 
					<form enctype="multipart/form-data" class="form-horizontal" method="post"> 
			 <div class="alert alert-danger alert-dismissible"> 
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Peringatan!</h5>
				  Pastikan data realisasi sudah final diisi.
                </div> 
				</form>
					</div>	
            <div class="modal-footer"> 
			<form  class="form-horizontal" name="postform" id="modal" method="post" action="cetak-realisasi-ikk-all.php" target="_blank">  
			<input type="hidden" class="form-control" id="idcetak" name="idcetak" value="<?php echo $id_dok ?>">  
			<input type="hidden" class="form-control" id="tri" name="tri" value="<?php echo $_GET['tri'] ?>">   	
			<input type="hidden" class="form-control" id="id_bidang" name="id_bidang" value="<?php echo $_GET['id_bidang'] ?>">   	  	  			
               <button type="submit" class="btn btn-success" style="font-size:13px"><i class="fa fa-print"></i> Cetak</button>&nbsp;
			</form> 
				 <button type="button" style="font-size:13px" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
            </div> 
<?php 
}
?>	


<?php
if($mode=='dokumen-cetaktri3'){ 
$id_dok =$_GET['kode']; 
$rs = mysqli_query($GLOBALS["___mysqli_ston"],"select * from tb_ikk_bidang,tb_outcome where tb_outcome.id_outcome=tb_ikk_bidang.id_data and tb_ikk_bidang.id_data='$id_dok'");
$item = mysqli_fetch_array($rs); 
?> 
           <div class="modal-header">
					<h5 class="modal-title" id="myModalLabel3"><i class="fa fa-print"></i> <b>Cetak Data Triwulan 3 - IKK <?php echo $item['kode_ikk'] ?></b></h5> 
					</div> 
		<div class="modal-body"> 
					<form enctype="multipart/form-data" class="form-horizontal" method="post"> 
			 <div class="alert alert-danger alert-dismissible"> 
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Peringatan!</h5>
				  Pastikan data realisasi sudah final diisi.
                </div> 
				</form>
					</div>	
            <div class="modal-footer"> 
			<form  class="form-horizontal" name="postform" id="modal" method="post" action="cetak-realisasi-ikk.php" target="_blank">  
			<input type="hidden" class="form-control" id="idcetak" name="idcetak" value="<?php echo $id_dok ?>">  
			<input type="hidden" class="form-control" id="tri" name="tri" value="<?php echo $_GET['tri'] ?>">   	
			<input type="hidden" class="form-control" id="id_bidang" name="id_bidang" value="<?php echo $_GET['id_bidang'] ?>">   	  			  			
               <button type="submit" class="btn btn-success" style="font-size:13px"><i class="fa fa-print"></i> Cetak</button>&nbsp;
			</form> 
				 <button type="button" style="font-size:13px" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
            </div> 
<?php 
}
?>	 


<?php
if($mode=='dokumen-cetaktri3a'){ 
$id_dok =$_GET['kode']; 
$rs = mysqli_query($GLOBALS["___mysqli_ston"],"select * from tb_ikk_bidang,tb_outcome where tb_outcome.id_outcome=tb_ikk_bidang.id_data and tb_ikk_bidang.id_data='$id_dok'");
$item = mysqli_fetch_array($rs); 
?> 
           <div class="modal-header">
					<h5 class="modal-title" id="myModalLabel3"><i class="fa fa-print"></i> <b>Cetak ALL Data Triwulan 3 - Semua IKK</b></h5> 
					</div> 
		<div class="modal-body"> 
					<form enctype="multipart/form-data" class="form-horizontal" method="post"> 
			 <div class="alert alert-danger alert-dismissible"> 
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Peringatan!</h5>
				  Pastikan data realisasi sudah final diisi.
                </div> 
				</form>
					</div>	
            <div class="modal-footer"> 
			<form  class="form-horizontal" name="postform" id="modal" method="post" action="cetak-realisasi-ikk-all.php" target="_blank">  
			<input type="hidden" class="form-control" id="idcetak" name="idcetak" value="<?php echo $id_dok ?>">  
			<input type="hidden" class="form-control" id="tri" name="tri" value="<?php echo $_GET['tri'] ?>">   	
			<input type="hidden" class="form-control" id="id_bidang" name="id_bidang" value="<?php echo $_GET['id_bidang'] ?>">   	  			
               <button type="submit" class="btn btn-success" style="font-size:13px"><i class="fa fa-print"></i> Cetak</button>&nbsp;
			</form> 
				 <button type="button" style="font-size:13px" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
            </div> 
<?php 
}
?>	


<?php
if($mode=='dokumen-cetaktri4'){ 
$id_dok =$_GET['kode']; 
$rs = mysqli_query($GLOBALS["___mysqli_ston"],"select * from tb_ikk_bidang,tb_outcome where tb_outcome.id_outcome=tb_ikk_bidang.id_data and tb_ikk_bidang.id_data='$id_dok'");
$item = mysqli_fetch_array($rs); 
?> 
           <div class="modal-header">
					<h5 class="modal-title" id="myModalLabel3"><i class="fa fa-print"></i> <b>Cetak Data Triwulan 4 - IKK <?php echo $item['kode_ikk'] ?></b></h5> 
					</div> 
		<div class="modal-body"> 
					<form enctype="multipart/form-data" class="form-horizontal" method="post"> 
			 <div class="alert alert-danger alert-dismissible"> 
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Peringatan!</h5>
				  Pastikan data realisasi sudah final diisi.
                </div> 
				</form>
					</div>	
            <div class="modal-footer"> 
			<form  class="form-horizontal" name="postform" id="modal" method="post" action="cetak-realisasi-ikk.php" target="_blank">  
			<input type="hidden" class="form-control" id="idcetak" name="idcetak" value="<?php echo $id_dok ?>">  
			<input type="hidden" class="form-control" id="tri" name="tri" value="<?php echo $_GET['tri'] ?>">   	
			<input type="hidden" class="form-control" id="id_bidang" name="id_bidang" value="<?php echo $_GET['id_bidang'] ?>">   	  			  			
               <button type="submit" class="btn btn-success" style="font-size:13px"><i class="fa fa-print"></i> Cetak</button>&nbsp;
			</form> 
				 <button type="button" style="font-size:13px" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
            </div> 
<?php 
}
?>	 


<?php
if($mode=='dokumen-cetaktri4a'){ 
$id_dok =$_GET['kode']; 
$rs = mysqli_query($GLOBALS["___mysqli_ston"],"select * from tb_ikk_bidang,tb_outcome where tb_outcome.id_outcome=tb_ikk_bidang.id_data and tb_ikk_bidang.id_data='$id_dok'");
$item = mysqli_fetch_array($rs); 
?> 
           <div class="modal-header">
					<h5 class="modal-title" id="myModalLabel3"><i class="fa fa-print"></i> <b>Cetak ALL Data Triwulan 4 - Semua IKK</b></h5> 
					</div> 
		<div class="modal-body"> 
					<form enctype="multipart/form-data" class="form-horizontal" method="post"> 
			 <div class="alert alert-danger alert-dismissible"> 
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Peringatan!</h5>
				  Pastikan data realisasi sudah final diisi.
                </div> 
				</form>
					</div>	
            <div class="modal-footer"> 
			<form  class="form-horizontal" name="postform" id="modal" method="post" action="cetak-realisasi-ikk-all.php" target="_blank">  
			<input type="hidden" class="form-control" id="idcetak" name="idcetak" value="<?php echo $id_dok ?>">  
			<input type="hidden" class="form-control" id="tri" name="tri" value="<?php echo $_GET['tri'] ?>"> 	
			<input type="hidden" class="form-control" id="id_bidang" name="id_bidang" value="<?php echo $_GET['id_bidang'] ?>">   	    	  			
               <button type="submit" class="btn btn-success" style="font-size:13px"><i class="fa fa-print"></i> Cetak</button>&nbsp;
			</form> 
				 <button type="button" style="font-size:13px" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
            </div> 
<?php 
}
?>	