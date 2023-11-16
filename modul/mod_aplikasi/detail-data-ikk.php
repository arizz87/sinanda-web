<html lang="en">
<script src="./modul/js/jquery-1.11.1.min.js"></script> 
<script type="text/javascript"></script>
<script src="modul/js/sinanda-detailikk.js"></script>
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
	<div class="modal-dialog modal-xs">
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
$btncekall1= '<button type="button" title="Posting/ Unposting All" onClick="cekall1(\''.$caribidang['id_bidang'].'\')" class="btn btn-default btn-xs">Post/ Unpost All</button></a>';
$btncekall2= '<button type="button" title="Posting/ Unposting All" onClick="cekall2(\''.$caribidang['id_bidang'].'\')" class="btn btn-default btn-xs">Post/ Unpost All</button></a>';
$btncekall3= '<button type="button" title="Posting/ Unposting All" onClick="cekall3(\''.$caribidang['id_bidang'].'\')" class="btn btn-default btn-xs">Post/ Unpost All</button></a>';
$btncekall4= '<button type="button" title="Posting/ Unposting All" onClick="cekall4(\''.$caribidang['id_bidang'].'\')" class="btn btn-default btn-xs">Post/ Unpost All</button></a>';
 		
?>  
	<div class="row alert alert-danger"> 
	<font style="font-size:16	px" class="box-title"></a><i class="fa fa-university"></i><b> <?php echo $caribidang['nama_bidang'] ?></b></font>
	 </div>  
	<div class="card card-default"> 
	<div class="box box-solid box-light"> 
	<div class="box-header">  
	<font style="font-size:14px" class="box-title"></a><i class="fa fa-database"></i><b> Daftar IKK Bidang Tahun <?php echo $_SESSION['tahun'] ?></b></font> 
	<?php
	if ($_SESSION['level']=="admin"){
	?>
	<div class="box-tools pull-right">
	<button onClick="tambahdata()"  class="btn btn-primary" style="font-size:13px"><i class="fa fa-plus"></i> Tambah Data IKK</button></a>
	<a href="set-ikk-bidang"><button class="btn btn-danger" style="font-size:13px"><i class="fa fa-backward"></i> Kembali</button></a>
	</div> 
	<?php
	} 
	?>
	</div>
	<div class="card-body">
	<form enctype="multipart/form-data" class="form-horizontal" method="post"/>
	<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
	<thead> 
	<tr style="font-size:13px"> 
	<th style="width:3%;"><center>No</center></th> 
	<th style="width:42%;"><center>Uraian Data IKK</center></th>
	<th style="width:12%;"><center>Triwulan 1<br><?php echo $btncekall1;?></center></th>        
	<th style="width:12%;"><center>Triwulan 2<br><?php echo $btncekall2;?></center></th>        
	<th style="width:12%;"><center>Triwulan 3<br><?php echo $btncekall3;?></center></th>        
	<th style="width:12%;"><center>Triwulan 4<br><?php echo $btncekall4;?></center></th>                  
	<th style="width:12%;"><center>Action</center></th>   
	</tr> 
	</thead>  
	<tbody>
	<?php
	$hitung=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ikk_bidang where tahun='$_SESSION[tahun]' and id_bidang='$_GET[id]'");
	$jumlah_record=mysqli_num_rows($hitung); 	
	if ($jumlah_record==0){
	?>
	<tr> 
	<td colspan=7><center>Tidak ada data IKK</td> 
	</tr> 
	<?php
	}else{
	$no==0;
	$data=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM  tb_ikk_bidang where tahun='$_SESSION[tahun]' and id_bidang='$_GET[id]' order by id_data asc");
	while($caridata=mysqli_fetch_array($data)){
	$cekdata=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_outcome where id_outcome='".$caridata['id_data']."' and  tahun='$_SESSION[tahun]'")); 
		 
		$rs1 = mysqli_query($GLOBALS["___mysqli_ston"],"select * from tb_outcome where id_outcome='$aRow[id_data]' and  tahun='$_SESSION[tahun]'");
		$cari1 = mysqli_fetch_array($rs1);  
		
		if ($caridata['tri1']==0){
		$tri1="<center><button type='button' title='Klik untuk Aktifkan'  onClick='aktifikk(".$caridata['id_ikk'].")' class='btn btn-default btn-xs'><font style=color:red><i class='fa fa-times-circle'></i></button></font>";	
		}else{
		$tri1="<center><button type='button' title='Klik untuk Non Aktifkan' onClick='nonaktifikk(".$caridata['id_ikk'].")' class='btn btn-default btn-xs'><font style=color:green><i class='fa fa-check-circle'></i></button></font>";		
		}
		if ($caridata['tri2']==0){
		$tri2="<center><button type='button' title='Klik untuk Aktifkan' onClick='aktifikk2(".$caridata['id_ikk'].")' class='btn btn-default btn-xs'><font style=color:red><i class='fa fa-times-circle'></i></button></font>";	
		}else{
		$tri2="<center><button type='button' title='Klik untuk Non Aktifkan' onClick='nonaktifikk2(".$caridata['id_ikk'].")' class='btn btn-default btn-xs'><font style=color:green><i class='fa fa-check-circle'></i></button></font>";		
		}
		if ($caridata['tri3']==0){
		$tri3="<center><button type='button' title='Klik untuk Aktifkan' onClick='aktifikk3(".$caridata['id_ikk'].")' class='btn btn-default btn-xs'><font style=color:red><i class='fa fa-times-circle'></i></button></font>";	
		}else{
		$tri3="<center><button type='button' title='Klik untuk Non Aktifkan' onClick='nonaktifikk3(".$caridata['id_ikk'].")' class='btn btn-default btn-xs'><font style=color:green><i class='fa fa-check-circle'></i></button></font>";		
		}
		if ($caridata['tri4']==0){
		$tri4="<center><button type='button' title='Klik untuk Aktifkan' onClick='aktifikk4(".$caridata['id_ikk'].")' class='btn btn-default btn-xs'><font style=color:red><i class='fa fa-times-circle'></i></button></font>";	
		}else{
		$tri4="<center><button type='button' title='Klik untuk Non Aktifkan' onClick='nonaktifikk4(".$caridata['id_ikk'].")' class='btn btn-default btn-xs'><font style=color:green><i class='fa fa-check-circle'></i></button></font>";		
		}
		
		$btnaprove= '<button type="button" title="Hapus Data" onClick="hapus(\''.$caridata['id_ikk'].'\')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button></a>';
		
	$no++;
	?>
	<tr>
	<td align=center><?php echo $no ?></td>
	<td><b>IKK <?php echo $cekdata['kode_ikk']." - </b>".$cekdata['uraian_outcome'] ?></td>
	<td><?php echo $tri1;?></td>
	<td><?php echo $tri2;?></td>
	<td><?php echo $tri3;?></td>
	<td><?php echo $tri4;?></td>
	<td><center><?php echo $btnaprove;?></td> 
	</tr> 
	<?php 
	}}
	?>
	</tbody>
	</table>
	</form>
	</div>
	</div>
	</div><hr>
	<div class="row">
    <div class="col-md-9">
	<div class="card card-default"> 
	<div class="box box-solid box-light"> 
	<div class="box-header">  
	<font style="font-size:14px" class="box-title"></a><i class="fa fa-folder-open"></i><b> Daftar Data Dukung IKK Bidang Tahun <?php echo $_SESSION['tahun'] ?></b></font> 
	<?php
	if ($_SESSION['level']=="admin"){
	?>
	<div class="box-tools pull-right"> 
	<button onClick="tambahdatadukung()"  class="btn btn-primary" style="font-size:13px"><i class="fa fa-plus"></i> Tambah Data Dukung</button></a> 
	<button onClick="aktifdukungall()"  class="btn btn-success" style="font-size:13px"><i class="fa fa-check-circle"></i> Posting</button></a>
	<button onClick="hapusdukungall()"  class="btn btn-danger" style="font-size:13px"><i class="fa fa-trash"></i> Hapus</button></a>
	</div> 
	<?php
	} 
	?>
	</div>
	<div class="card-body"> 
	<form enctype="multipart/form-data" class="form-horizontal" method="post"/>
	<table id="examplex" class="table table-striped table-bordered" cellspacing="0" width="100%">
	<thead> 
	<tr style="font-size:13px"> 
	<th style="width:3%;"><center>No</center></th> 
	<th><center>Uraian Data Dukung</center></th>
	<th style="width:15%;"><center>Posting</center></th>              
	<th style="width:6%;"><center><input type="checkbox"  onchange="checkAll(this)" style="font-size:13px" /></center></th>
	</tr> 
	</thead>  
	<tbody> 
	<?php
	$hitung=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_datadukung_bidang where tahun='$_SESSION[tahun]' and id_bidang='$_GET[id]'");
	$jumlah_record=mysqli_num_rows($hitung); 	
	if ($jumlah_record==0){
	?>
	<tr> 
	<td colspan=7><center>Tidak ada data dukung</td> 
	</tr> 
	<?php
	}else{
	$no2==0;
	$data=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM  tb_datadukung_bidang where tahun='$_SESSION[tahun]' and id_bidang='$_GET[id]' order by id_data asc");
	while($caridata=mysqli_fetch_array($data)){
	$cekdata=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ouput_data where id='".$caridata['id_data']."'")); 
		 
		$rs1 = mysqli_query($GLOBALS["___mysqli_ston"],"select * from tb_ouput_data where id='$aRow[id_data]'");
		$cari1 = mysqli_fetch_array($rs1);  
		 
		if ($caridata['posting']==0){
		$posting="<center><button type='button' title='Klik untuk Aktifkan' onClick='aktifdukung(".$caridata['id_dukung'].")' class='btn btn-default btn-xs'><font style=color:red><i class='fa fa-times-circle'></i></button></font>";	
		}else{
		$posting="<center><button type='button' title='Klik untuk Non Aktifkan' onClick='nonaktifdukung(".$caridata['id_dukung'].")' class='btn btn-default btn-xs'><font style=color:green><i class='fa fa-check-circle'></i></button></font>";		
		}
		
		$btnaprove= '<button type="button" title="Aktifkan Triwulan" onClick="aktifdata(\''.$caridata['id_dukung'].'\')" class="btn btn-primary btn-xs"><i class="fa fa-check-square"></i> Triwulan</button></a> 
		<button type="button" onClick="hapusdata(\''.$caridata['id_dukung'].'\')" title="Hapus Data" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button></a>';
		
	$no2++;
	
		$cekdatax=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_upload_data_tri1 where id_data='".$caridata['id_dukung']."'"));
		
		$pecah = explode(".", $cekdatax['nama_file']); 
		$ext_file = end($pecah);
		
		if ($cekdatax){
		if ($ext_file=="xls" or $ext_file=="xlsx"){
		$view= '<a href="modul/file-data-dukung/'.$cekdatax['nama_file'].'" title="Download Data" target=blank><button type="button" class="btn btn-sm"><i class="fa fa-file-excel"></i> </button></a> ';
	 	}else if ($ext_file=="doc" or $ext_file=="docx"){
		$view= '<a href="modul/file-data-dukung/'.$cekdatax['nama_file'].'" title="Download Data" target=blank><button type="button" class="btn btn-sm"><i class="fa fa-file-word"></i> </button></a> ';
	 	}else if ($ext_file=="pdf" or $ext_file=="PDF"){
		$view= '<a href="modul/file-data-dukung/'.$cekdatax['nama_file'].'" title="Download Data" target=blank><button type="button" class="btn btn-sm"><i class="fa fa-file-pdf"></i> </button></a> ';
	 	}else if ($ext_file=="jpg" or $ext_file=="jpeg" or $ext_file=="JPG" or $ext_file=="JPEG" or $ext_file=="png" or $ext_file=="PNG"){
		$view= '<a href="modul/file-data-dukung/'.$cekdatax['nama_file'].'" title="Download Data" target=blank><button type="button" class="btn btn-sm"><i class="fa fa-file-image"></i> </button></a> ';
	 	}else if ($ext_file=="mpeg" or $ext_file=="mpv" or $ext_file=="3gp"){
		$view= '<a href="modul/file-data-dukung/'.$cekdatax['nama_file'].'" title="Download Data" target=blank><button type="button" class="btn btn-sm"><i class="fa fa-file-video"></i> </button></a> ';
	 	}else{
		$view= '<a href="modul/file-data-dukung/'.$cekdatax['nama_file'].'" title="Download Data" target=blank><button type="button" class="btn btn-sm"><i class="fa fa-file"></i> </button></a> ';
	 	}			
		}else{
		$view='<font style="color:red;font-size:13px"></font>';
		}
		
	?>
	<tr>
	<td align=center><?php echo $no2 ?></td>
	<td><?php echo "(".$cekdata['kode_data'].") ".$cekdata['uraian_data']." ".$view ?></td>
	<td><?php echo $posting?></td>  
	<td><center><input type="checkbox" id="idcekdukung" name="idcekdukung[]" value='<?php echo $caridata['id_dukung'];?>' style="font-size:13px" /></td>
	</tr> 
	<?php 
	}}
	?>
	</tbody>
	</table>
	</form>
	</div>
	</div>
	</div>
	<div>
    <div> 
<script>
  $(function () {
    $("#examplex").DataTable({
      "responsive": true,
      "autoWidth": false, 
    }); 
	
	 $("#example").DataTable({
      "responsive": true,
      "autoWidth": false, 
    }); 
  });
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
