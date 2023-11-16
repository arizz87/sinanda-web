<html lang="en">
<head>
<script src="./modul/js/jquery-1.11.1.min.js"></script> 
<script src="js/bootstrap.min.js"></script>
<script src="js/typeahead.min.js"></script>
<script type="text/javascript"></script>
<script src="modul/js/sinanda-daftartahun.js"></script>
</HEAD>
<BODY> 
<?php  
$tglusul=date('d-m-Y');	
?>
	<div class="modal fade" id="myModalsdok" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static">
	<div class="modal-dialog modal-xs">
	<div class="modal-content"> 
	<input type="hidden" class="form-control" id="modedok" name="modedok" >
	<input type="hidden" class="form-control" id="kodedok" name="kodedok" > 
	<div id=viewdok></div>	 
	</div>
	</div>
	</div> 
	<div class="modal fade" id="myModalsdata" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static">
	<div class="modal-dialog modal-xs">
	<div class="modal-content"> 
	<input type="hidden" class="form-control" id="modedata" name="modedata" >
	<input type="hidden" class="form-control" id="kodedata" name="kodedata" > 
	<div id=viewdata></div>	 
	</div>
	</div>
	</div> 

	<div class="card card-default"> 
              <div class="box box-solid box-success"> 
				 <div class="box-header">
                                     <font style="font-size:14px" class="box-title"></a><i class="fa fa-list"></i><b> DAFTAR TAHUN ANGGARAN</b></font>
                                    <div class="box-tools pull-right">
									 	<button onClick="tambahdata()"  class="btn btn-danger" style="font-size:13px"><i class="fa fa-plus"></i> Tambah Tahun</button></a>  
									</div>  
									</div><!-- /.box-header -->
                <div class="box-body">
				    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th style="width:3%;"><center>No</center></th>
								<th style="width:25%;"><center>Tahun Anggaran</center></th>
								<th style="width:40%;"><center>Nama Kepala Instansi</center></th> 
								<th style="width:18%;"><center>Status</center></th> 
						        <th style="width:14%;"><center>Action</center></th>
							</tr>
						</thead>
						<tbody>
						</tbody>  
					</table>
				</div>
			</div></div>  
			
<script type="text/javascript" language="javascript" >
                                
                                var dTable;
                                // #example adalah id pada table
                                $(document).ready(function() {
                                    dTable = $('#example').DataTable( {
                                        "bProcessing": true,
                                        "oLanguage": {
                                            "sProcessing": "<img src='img/loading.gif'>"
                                        },
                                        "bServerSide": true,
                                        "bJQueryUI": false,
                                        "responsive": true,
                                        "sAjaxSource": "modul/mod_aplikasi/serverSidedatatahun.php", // Load Data
                                        "sServerMethod": "POST",
                                        "fnServerData": function ( sSource, aoData, fnCallback ) {
                                                aoData.push(
                                                   {name: "jenjang", value:$('#jenjang').val()}
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
                                        { "orderable": false, "targets": 4, "searchable": false }
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
									$('#jenjang').change(function(){
									dTable.draw();
								});
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
//	}else{
	//	echo"<h1>404 Error Page</h1>";
	//}
