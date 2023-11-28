<html lang="en">
<head>
<script src="./modul/js/jquery-1.11.1.min.js"></script> 
<script src="js/bootstrap.min.js"></script>
<script src="js/typeahead.min.js"></script>
<script type="text/javascript"></script>
<script src="modul/js/sinanda-daftarikkoutcome.js"></script>
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
	<div class="modal-dialog modal-lg">
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
                                     <font style="font-size:14px" class="box-title"></a><i class="fa fa-list"></i><b> DAFTAR INDIKATOR IKK TAHUN <?php echo $_SESSION['tahun'];?></b></font>
                                    <div class="box-tools pull-right">
									 	<button onClick="tambahdata()"  class="btn btn-danger" style="font-size:13px"><i class="fa fa-plus"></i> Tambah Data</button></a>  
										<button onClick="salindata()"  class="btn btn-primary" style="font-size:13px"><i class="fa fa-copy"></i> Salin Data Tahun Lalu</button></a>  
									</div>  
									</div><!-- /.box-header -->
                <div class="box-body">
				    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th style="width:3%;"><center>No</center></th>
								<th style="width:38%;"><center>Uraian Indikator IKK</center></th>
								<th style="width:45%;"><center>Rumus</center></th> 
						        <th style="width:14%;"><center>Action</center></th>
							</tr>
						</thead>
						<tbody>
						<?php
						$no==0;
						$data=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM  tb_outcome where tahun='$_SESSION[tahun]' order by id_outcome ASC");
						while($caridata=mysqli_fetch_array($data)){
						$cek = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"select * from  tb_ikk_bidang where id_data='$caridata[id_outcome]'")); 
						if ($cek) {
						$btnaprove= '<button type="button" title="Data Sedang Digunakan" class="btn btn-secondary btn-xs" disabled style=width:60px><i class="fa fa-lock"></i> Edit</button></a> 
						<button type="button" title="Data Sedang Digunakan" class="btn btn-secondary btn-xs" disabled style=width:60px><i class="fa fa-lock"></i> Hapus</button></a>';
						}else{
						$btnaprove= '<button type="button" onClick="edit(\''.$caridata['id_outcome'].'\')" title="Edit Data" class="btn btn-info btn-xs" style=width:60px><i class="fa fa-edit"></i> Edit</button></a> 
						<button type="button" onClick="hapus(\''.$caridata['id_outcome'].'\')" title="Hapus Data" class="btn btn-danger btn-xs" style=width:60px><i class="fa fa-trash"></i> Hapus</button></a>';
						}
						$no++;
						$pembilang=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ouput_data where id='".$caridata['pembilang']."' and tahun='$_SESSION[tahun]'")); 
						$pembagi=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ouput_data where id='".$caridata['pembagi']."' and tahun='$_SESSION[tahun]'")); 
						if ($caridata['datapersen']==1){
						$rumus='$  "'.$pembilang['uraian_data'].'" / "'.$pembagi['uraian_data'].'" &nbsp;x &nbsp;100% $';
						}else{
						$rumus=	'$ "Sudah Cukup Jelas" $';	
						}
						?>		<tr>
								<td style="width:3%;"><center><?php echo $no ?></center></th>
								<td style="width:38%;"><?php echo "<b>IKK ".$caridata['kode_ikk']."</b> - ".$caridata['uraian_outcome'] ?></th>
								<td style="width:45%;"><center><table cellspacing="0"  cellpadding="0" border="1" ><tr><td  style="border-top-style:groove" bgcolor=white><?php echo $rumus ?></td></tr></table></center></th> 
						        <td style="width:14%;"><center><?php echo $btnaprove ?></center></th>
								</tr>
						<?php
						}
						?>
						</tbody>  
					</table>
				</div>
			</div></div>   
			
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
                                                
<script>
  $(function () {
    $("#example").DataTable({
      "responsive": true,
      "autoWidth": false,
      "paging": false,
    });
    $('#examplex').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "sort": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</BODY>
</HTML> 
<script>
  MathJax = {
  loader: {load: ['input/asciimath', 'output/chtml', 'ui/menu']},
  asciimath: {	
    delimiters: [['$','$'], ['`','`']]
  }
  };
</script>
<script type="text/javascript" id="MathJax-script" async
    src="js/es5/startup.js">
</script>

<?PHP
//	}else{
	//	echo"<h1>404 Error Page</h1>";
	//}
