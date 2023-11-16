<html lang="en">
<script src="./modul/js/jquery-1.11.1.min.js"></script> 
<script type="text/javascript"></script>
<script src="modul/js/sinanda-detaildukung.js"></script>
<head> 
</HEAD>
<BODY>
<?PHP 
$date=date("Y");
?>
<?php
$kdkegiatan=$_GET['kdkegiatan'];
$kdsubkegiatan=$_GET['kdsubkegiatan'];
$caribidang=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM tb_bidang where id_bidang='".$_GET['id']."'")); 
$departemen=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM departement where id_departemen='".$carifsms['departemen']."'"));
?>
	<div class="modal fade" id="myModalsdok" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static">
	<div class="modal-dialog modal-lg">
	<div class="modal-content"> 
	<input type="hidden" class="form-control" id="modedok" name="modedok" >
	<input type="hidden" class="form-control" id="kodedok" name="kodedok" value='<?php echo $_GET['id'] ?>' > 
	<input type="hidden" class="form-control" id="kodedok2" name="kodedok2"> 
	<div id=viewdok></div>	 
	</div>
	</div>
	</div> 
	<div class="modal fade" id="myModalsdata" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static">
	<div class="modal-dialog modal-xl">
	<div class="modal-content"> 
	<input type="hidden" class="form-control" id="modedata" name="modedata" >
	<input type="hidden" class="form-control" id="kodedata" name="kodedata" value='<?php echo $_GET['id'] ?>' >  
	<div id=viewdata></div>	 
	</div>
	</div>
	</div>  
<?php  
$tglusul=date('d-m-Y');	
?>  
	<div class="card card-default"> 
	<div class="box box-solid box-light"> 
	<div class="box-header">  
	<font style="font-size:14px" class="box-title"></a><i class="fa fa-book"></i><b> Daftar Data Dukung Bidang Tahun <?php echo $_SESSION['tahun'];?></b></font> 
	<?php
	if ($_SESSION['level']=="admin"){
	?>
	<div class="box-tools pull-right">
	<a href="set-ikk-bidang"><button class="btn btn-danger" style="font-size:13px"><i class="fa fa-backward"></i> Kembali</button></a> 
	<button onClick="tambahdata()"  class="btn btn-primary" style="font-size:13px"><i class="fa fa-plus"></i> Tambah Data Dukung</button></a>
	</div> 
	<?php
	} 
	?>
	</div>
	<div class="card-body">
	<div class="row alert alert-danger"> 
	<font style="font-size:16	px" class="box-title"></a><b><?php echo $caribidang['nama_bidang'] ?></b></font>
	 </div> 
	<form enctype="multipart/form-data" class="form-horizontal" method="post"/>
	<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
	<thead> 
	<tr style="font-size:13px"> 
	<th style="width:3%;"><center>No</center></th> 
	<th style="width:42%;"><center>Uraian Data Dukung</center></th>
	<th style="width:10%;"><center>Triwulan 1</center></th>        
	<th style="width:10%;"><center>Triwulan 2</center></th>        
	<th style="width:10%;"><center>Triwulan 3</center></th>        
	<th style="width:10%;"><center>Triwulan 4</center></th>                  
	<th style="width:15%;"><center>Action</center></th>
	</tr> 
	</thead>   
	<hr>		
	<tbody>
	</tbody>
	</table>
	</form>
	</div>
	</div>
	</div>
 
			
<script type="text/javascript" language="javascript" >
var dTable;
			// #Example adalah id pada table
			$(document).ready(function() {
				dTable = $('#example').DataTable( {
					"bProcessing": true,
					"oLanguage": {
						"sProcessing": "<img src='img/loading.gif'>"
					},
					"bServerSide": true,
					"bJQueryUI": false,
					"responsive": true,
					"paging": false,  
					"sAjaxSource": "modul/mod_aplikasi/serverSidedetaildukung.php", // Load Data 
					"sServerMethod": "POST",
					"fnServerData": function ( sSource, aoData, fnCallback ) {
							aoData.push(
                                { "name": "id", "value": "<?php echo $_GET['id'];?>" } ,
								{name: "bulan", value:$('#bulan').val()},
								{name: "tahun", value:$('#tahun').val()},
								{name: "depart", value:$('#depart').val()},
								{name: "jeniskel", value:$('#jeniskel').val()}
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
					{ "orderable": false, "targets": 6, "searchable": false }
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
					$('#bulan').change(function(){
					dTable.draw();
                    } );	
					$('#tahun').change(function(){
					dTable.draw();
                    } );	
					$('#depart').change(function(){
					dTable.draw();
                    } );	
					$('#jeniskel').change(function(){
					dTable.draw();
                    } );				
			} );
			
</script>
<style>
.loading-circle {
display:    none;
position:   fixed;
z-index:    10000;
top:        0;
left:       0;
height:     100%;
width:      100%;
background: rgba( 255, 255, 255, .4 ) 
url('img/loading.gif') 
50% 50% 
no-repeat;
}
</style>
</BODY>
</HTML>  
<?PHP
