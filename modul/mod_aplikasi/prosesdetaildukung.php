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
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
					</div> 
		  <div class="modal-body">  
			<form enctype="multipart/form-data" class="form-horizontal" method="post"  name="formDetail" id="formDetail">  			 
			<input type="hidden" class="form-control" id="iddata" name="iddata" value="<?php echo $id_dok ?>">   		 
			<input type="hidden" class="form-control" id="idtahun" name="idtahun" value="<?php echo $_SESSION['tahun'] ?>">		   
		  <table id="example" class="table table-bordered" cellspacing="0" width="100%">
	<thead> 
	<tr style="font-size:13px" bgcolor=#F0FFF0> 
	<th style="width:3%;"><center>No</center></th>
	<th style="width:12%;"><center>Kode Data</center></th>       
	<th style="width:72%;"><center>Uraian Data Dukung</center></th>        
	<th style="width:15%;"><center>Action</center></th>
	</tr> 
	</thead> 
	<tbody>
	<?php
	$no==0;
	$data=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM  tb_ouput_data where tahun='$_SESSION[tahun]'  order by id asc");
	while($caridata=mysqli_fetch_array($data)){
	$cekdata=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_datadukung_bidang where id_data='".$caridata['id']."'")); 
	$ceklist='<center><input type=checkbox name="kodedata[]" id="kodedata" value="'.$caridata['id'].'">'; 
	$no++;
	?>
	<tr>
	<td align=center><?php echo $no ?></td>
	<td><center><?php echo $caridata['kode_data'] ?></td>
	<td><?php echo $caridata['uraian_data'] ?></td>
	<td><?php echo $ceklist;?></td>
	</tr> 
	<?php
	} 
	?>
	
	</tbody>
	</table> 
		</div> 
            <div class="modal-footer">
                <button type="button" style="font-size:13px" onClick="simpandukung()"  class="btn btn-success"><i class="fa fa-save"></i> Simpan</button> 
				 <button type="button" style="font-size:13px" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
            </div>
						</form>
<?php 
}
?>		
<?php
if($mode=='dokumen-aktifdata'){  
$id_dok =$_GET['kode']; 
$rs = mysqli_query($GLOBALS["___mysqli_ston"],"select * from tb_datadukung_bidang,tb_ouput_data where tb_ouput_data.id=tb_datadukung_bidang.id_data and tb_datadukung_bidang.id_dukung='$id_dok'");
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
                           <textarea class="form-control" disabled rows=2 placeholder="Masukan Uraian Data Dukung" style="font-size:14px"><?php echo $item['uraian_data'] ?></textarea>
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
                <button type="button" style="font-size:13px" onClick="simpanaktifdukung()"  class="btn btn-success"><i class="fa fa-save"></i> Simpan</button> 
				 <button type="button" style="font-size:13px" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
            </div>
						</form>
<?php 
}
?>	

<?php
if($mode=='dokumen-hapusdata'){ 
$id_dok =$_GET['kode']; 
$rs = mysqli_query($GLOBALS["___mysqli_ston"],"select * from tb_datadukung_bidang,tb_ouput_data where tb_ouput_data.id=tb_datadukung_bidang.id_data and tb_datadukung_bidang.id_dukung='$id_dok'");
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
                          <div class="col-sm-12">Uraian Data Dukung
                           <textarea class="form-control" disabled rows=2 placeholder="Masukan Uraian Data Dukung" style="font-size:14px"><?php echo $item['uraian_data'] ?></textarea>
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
                <button type="button" style="font-size:13px" onClick="submitHapusdukung()"  class="btn btn-info"><i class="fa fa-trash"></i> Hapus</button>
				 <button type="button" style="font-size:13px" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
            </div>
						</form>
<?php 
}
?>	 

<?php
if($mode=='dokumen-login'){ 
$id_dok =$_GET['kode'];  
$cari=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT *FROM user WHERE id_user='".$_GET['kode']."'")); 
?>
   <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel2"><b>Peringatan</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
            </div>    
                <form  class="form-horizontal" name="f1" method="post" action="cek-logintukar.php"> 
				<input type="hidden" class="form-control" id="usernametukarx" name="usernametukarx" value='<?php echo $_GET['kode'] ?>' />
				<input type="hidden" class="form-control" id="passtukarx" name="passtukarx" value='<?php echo $_GET['kode2'] ?>' />
                    <div class="modal-body with-padding">
                        	  
						<div class="alert alert-danger alert-dismissible"> 
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Peringatan!</h5>
				  Login berhasil silahkan manfaatkan akses data dengan bijak.
                </div>   
                    </div>            
                    <div class="modal-footer">
                    	<button type="submit" style="font-size:13px" class="btn btn-success"><i class="fa fa-check"></i> OK</button>
                    </div>
                </form>
<?php 
}
?>

<script>
var dTable;
			// #Example adalah id pada table
			$(document).ready(function() {
				dTable = $('#example').DataTable( {
					
					"bServerSide": true,
					"bJQueryUI": false,
					"responsive": true,
					"paging": false, 
					"searching": false,   
					"sServerMethod": "POST",
					"fnServerData": function ( sSource, aoData, fnCallback ) {
							aoData.push(
								{ "name": "table", "value": "<?php echo $_SESSION['tahun'] ;?>" }
								);
					
								$.ajax( {"dataType": 'json',
									 "type": "POST",
									 "url": sSource,
									 "data": aoData,
									 "success": fnCallback} );
						},
					"columnDefs": [
					{ "orderable": true, "targets": 0, "searchable": true },
					{ "orderable": true, "targets": 1, "searchable": true },
					{ "orderable": true, "targets": 2, "searchable": true },
					{ "orderable": true, "targets": 3, "searchable": true },
					{ "orderable": true, "targets": 4, "searchable": true },
					{ "orderable": true, "targets": 5, "searchable": true },
					{ "orderable": true, "targets": 6, "searchable": true },  
					]
				} );
				
				$('#example').removeClass( 'display' ).addClass('table table-striped table-bordered');
				$('#example tfoot th').each( function () {
					
					//Agar kolom Action Tidak Ada Tombol Pencarian
					if( $(this).text() != "Action" ){
						var title = $('#example thead th').eq( $(this).index() ).text();
						$(this).html( '<input type="text" placeholder="Search '+title+'" class="form-control" />' );
					}
				} );
				
				// Untuk Pencarian, di kolom paling bawah
				/*dTable.columns().every( function () {
					var that = this;
					
					$( 'input', this.footer() ).on( 'keyup change', function () {
						that
						.search( this.value )
						.draw();
					} );
				} );*/
			} );
</script>