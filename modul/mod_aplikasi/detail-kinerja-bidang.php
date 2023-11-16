<html lang="en">
<script src="./modul/js/jquery-1.11.1.min.js"></script> 
<script type="text/javascript"></script>
<script src="modul/js/sinanda-detailikk.js"></script> 
<script src="js/chart.umd.min.js"></script>  
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
	<div class="modal fade" id="myModalsprint" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static">
	<div class="modal-dialog modal-lg">
	<div class="modal-content"> 
	<input type="hidden" class="form-control" id="modeprint" name="modeprint">
	<input type="hidden" class="form-control" id="kodeprint" name="kodeprint"  value='<?php echo $_GET['id'] ?>'>  
	<div id=viewprint></div>	 
	</div>
	</div>
	</div>  
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
?>   
	<div class="alert alert-danger"> 
	<div class="row">
    <div class="col-md-9">
	<font style="font-size:16px;color:brown;" class="box-title"></a><i class="fa fa-university"></i> <b><?php echo $caribidang['nama_bidang'] ?></b></font>
	</div>
	<div class="col-md-3" align=right>
	<a href="data-realisasi-kinerja"><button class="btn btn-danger" style="font-size:13px"><i class="fa fa-backward"></i> Kembali</button></a>
	 </div>  
	</div>  
	</div> 
	 <div class="row">
    <div class="col-md-7">
	<div class="card card-default"> 
	<div class="box box-solid box-light"> 
	<div class="box-header">  
	<font style="font-size:14px" class="box-title"></a><i class="fa fa-database"></i><b> Daftar IKK Bidang Tahun <?php echo $_SESSION['tahun'] ?></b></font> 
 
	<div class="box-tools pull-right">
	<button onClick="cetakdata()"  class="btn btn-warning" style="font-size:12px"><i class="fa fa-print"></i> Cetak Capaian</button></a> 
	</div> 
	</div>
	<div class="card-body">
	<form enctype="multipart/form-data" class="form-horizontal" method="post"/>
	<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
	<thead> 
	<tr style="font-size:13px"> 
	<th style="width:3%;font-size:13px"><center>No</center></th> 
	<th style="width:42%;font-size:13px"><center>Uraian Data IKK</center></th>
	<th style="width:12%;font-size:13px"><center>Triwulan 1</center></th>        
	<th style="width:12%;font-size:13px"><center>Triwulan 2</center></th>        
	<th style="width:12%;font-size:13px"><center>Triwulan 3</center></th>        
	<th style="width:12%;font-size:13px"><center>Triwulan 4</center></th>  
	</tr> 
	</thead>  
	<tbody>
	<?php
	$hitung=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ikk_bidang where tahun='$_SESSION[tahun]' and id_bidang='$_GET[id]'");
	$jumlah_record=mysqli_num_rows($hitung); 	
	if ($jumlah_record==0){
	?>
	<tr> 
	<td colspan=7><center>Data tidak ditemukan</td> 
	</tr> 
	<?php
	}else{
	$no==0;
	$data=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM  tb_ikk_bidang where tahun='$_SESSION[tahun]' and id_bidang='$_GET[id]' order by id_data asc");
	while($caridata=mysqli_fetch_array($data)){
	$cekdata=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_outcome where id_outcome='".$caridata['id_data']."'")); 
		 
		$rs1 = mysqli_query($GLOBALS["___mysqli_ston"],"select * from tb_outcome where id_outcome='$aRow[id_data]'");
		$cari1 = mysqli_fetch_array($rs1);  
		
		
	 
		if ($cekdata['datapersen']==1){
		$nilai1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1,tb_ikk_bidang where tb_nilai_ikk_tri1.id_ikk=tb_ikk_bidang.id_ikk and tb_ikk_bidang.tri1=1 and tb_nilai_ikk_tri1.id_ikk='".$caridata['id_ikk']."' and tb_nilai_ikk_tri1.id_bidang='".$caridata['id_bidang']."' and tb_nilai_ikk_tri1.triwulan=1  and tb_nilai_ikk_tri1.tahun='".$_SESSION['tahun']."'"));  
		$totnilai1=($nilai1['angka_pembilang']/$nilai1['angka_pembagi'])*100;
		if($nilai1['angka_pembilang']==0 and $nilai1['angka_pembagi']==0){
		$persennilai1=0;	
		}elseif($nilai1['angka_pembilang']>0 and $nilai1['angka_pembagi']==0){
		$persennilai1=0;	
		}else{
		$persennilai1=round($totnilai1,2);	
		} 
		 
		$nilai2=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1,tb_ikk_bidang where tb_nilai_ikk_tri1.id_ikk=tb_ikk_bidang.id_ikk and tb_ikk_bidang.tri2=1 and tb_nilai_ikk_tri1.id_ikk='".$caridata['id_ikk']."' and tb_nilai_ikk_tri1.id_bidang='".$caridata['id_bidang']."' and tb_nilai_ikk_tri1.triwulan=2  and tb_nilai_ikk_tri1.tahun='".$_SESSION['tahun']."'"));  
		$totnilai2=($nilai2['angka_pembilang']/$nilai2['angka_pembagi'])*100;
		if($nilai2['angka_pembilang']==0 and $nilai2['angka_pembagi']==0){
		$persennilai2=0;	
		}elseif($nilai2['angka_pembilang']>0 and $nilai2['angka_pembagi']==0){
		$persennilai2=0;	
		}else{
		$persennilai2=round($totnilai2,2);	
		} 
		
		$nilai3=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1,tb_ikk_bidang where tb_nilai_ikk_tri1.id_ikk=tb_ikk_bidang.id_ikk and tb_ikk_bidang.tri3=1 and tb_nilai_ikk_tri1.id_ikk='".$caridata['id_ikk']."' and tb_nilai_ikk_tri1.id_bidang='".$caridata['id_bidang']."' and tb_nilai_ikk_tri1.triwulan=3  and tb_nilai_ikk_tri1.tahun='".$_SESSION['tahun']."'"));  
		$totnilai3=($nilai3['angka_pembilang']/$nilai3['angka_pembagi'])*100;
		if($nilai3['angka_pembilang']==0 and $nilai3['angka_pembagi']==0){
		$persennilai3=0;	
		}elseif($nilai3['angka_pembilang']>0 and $nilai3['angka_pembagi']==0){
		$persennilai3=0;	
		}else{
		$persennilai3=round($totnilai3,2);	
		}
		
		$nilai4=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1,tb_ikk_bidang where tb_nilai_ikk_tri1.id_ikk=tb_ikk_bidang.id_ikk and tb_ikk_bidang.tri4=1 and tb_nilai_ikk_tri1.id_ikk='".$caridata['id_ikk']."' and tb_nilai_ikk_tri1.id_bidang='".$caridata['id_bidang']."' and tb_nilai_ikk_tri1.triwulan=4  and tb_nilai_ikk_tri1.tahun='".$_SESSION['tahun']."'"));  
		$totnilai4=($nilai4['angka_pembilang']/$nilai4['angka_pembagi'])*100;
		if($nilai4['angka_pembilang']==0 and $nilai4['angka_pembagi']==0){
		$persennilai4=0;	
		}elseif($nilai4['angka_pembilang']>0 and $nilai4['angka_pembagi']==0){
		$persennilai4=0;	
		}else{
		$persennilai4=round($totnilai4,2);	
		}
		
		if ($caridata['tri1']==1){
		if ($nilai1['validasi']==0){
		$btnvali1=' <br><button type="button"  onClick="validasi1(\''.$caridata['id_ikk'].'\',\''.$caridata['id_bidang'].'\')" title="Klik untuk Validasi" class="btn btn-default btn-xs"><font style="color:green"><i class="fa fa-check-circle"></i></font></button>';	
		$centang1='';
		}else{
		$btnvali1=' <br><button type="button"  onClick="view1(\''.$caridata['id_ikk'].'\',\''.$caridata['id_bidang'].'\')" title="Klik untuk melihat detail Capaian" class="btn btn-default btn-xs"><font style="color:green"><i class="fa fa-eye"></i></font></button>';	
		$centang1=' &nbsp;<i class="fa fa-thumbs-up"></i>';
		}
		}else{
		$btnvali1='-';
		}
		if ($caridata['tri2']==1){
		if ($nilai2['validasi']==0){
		$btnvali2=' <br><button type="button"  onClick="validasi2(\''.$caridata['id_ikk'].'\',\''.$caridata['id_bidang'].'\')" title="Klik untuk Validasi" class="btn btn-default btn-xs"><font style="color:green"><i class="fa fa-check-circle"></i></font></button>';	
		$centang2='';
		}else{
		$btnvali2=' <br><button type="button"  onClick="view2(\''.$caridata['id_ikk'].'\',\''.$caridata['id_bidang'].'\')" title="Klik untuk melihat detail Capaian" class="btn btn-default btn-xs"><font style="color:green"><i class="fa fa-eye"></i></font></button>';	
		$centang2=' &nbsp;<i class="fa fa-thumbs-up"></i>';
		}
		}else{
		$btnvali2='-';
		}
		if ($caridata['tri3']==1){
		if ($nilai3['validasi']==0){
		$btnvali3=' <br><button type="button"  onClick="validasi3(\''.$caridata['id_ikk'].'\',\''.$caridata['id_bidang'].'\')" title="Klik untuk Validasi" class="btn btn-default btn-xs"><font style="color:green"><i class="fa fa-check-circle"></i></font></button>';	
		$centang3='';
		}else{
		$btnvali3=' <br><button type="button"  onClick="view3(\''.$caridata['id_ikk'].'\',\''.$caridata['id_bidang'].'\')" title="Klik untuk melihat detail Capaian" class="btn btn-default btn-xs"><font style="color:green"><i class="fa fa-eye"></i></font></button>';	
		$centang3=' &nbsp;<i class="fa fa-thumbs-up"></i>';
		}
		}else{
		$btnvali3='-';
		}
		if ($caridata['tri4']==1){
		if ($nilai4['validasi']==0){
		$btnvali4=' <br><button type="button"  onClick="validasi4(\''.$caridata['id_ikk'].'\',\''.$caridata['id_bidang'].'\')" title="Klik untuk Validasi" class="btn btn-default btn-xs"><font style="color:green"><i class="fa fa-check-circle"></i></font></button>';	
		$centang4='';
		}else{
		$btnvali4=' <br><button type="button"  onClick="view4(\''.$caridata['id_ikk'].'\',\''.$caridata['id_bidang'].'\')" title="Klik untuk melihat detail Capaian" class="btn btn-default btn-xs"><font style="color:green"><i class="fa fa-eye"></i></font></button>';	
		$centang4=' &nbsp;<i class="fa fa-thumbs-up"></i>';
		} 
		}else{
		$btnvali4='-';
		}
		if ($caridata['tri1']==1){
		if ($persennilai1 >=60){
		$datatri1='<span class="badge bg-success" style="font-size:10px">'.$persennilai1.'%'.$centang1.'</span>';
		}else{
		$datatri1='<span class="badge bg-danger" style="font-size:10px">'.$persennilai1.'%'.$centang1.'</span>';
		}
		}else{
		$datatri1='-';
		}
		if ($caridata['tri2']==1){
		if ($persennilai2 >=60){
		$datatri2='<span class="badge bg-success" style="font-size:10px">'.$persennilai2.'%'.$centang2.'</span>';
		}else{
		$datatri2='<span class="badge bg-danger" style="font-size:10px">'.$persennilai2.'%'.$centang2.'</span>';
		}
		}else{
		$datatri2='-';
		}
		if ($caridata['tri3']==1){
		if ($persennilai3 >=60){
		$datatri3='<span class="badge bg-success" style="font-size:10px">'.$persennilai3.'%'.$centang3.'</span>';
		}else{
		$datatri3='<span class="badge bg-danger" style="font-size:10px">'.$persennilai3.'%'.$centang3.'</span>';
		}
		}else{
		$datatri3='-';
		}
		if ($caridata['tri4']==1){
		if ($persennilai4 >=60){
		$datatri4='<span class="badge bg-success" style="font-size:10px">'.$persennilai4.'%'.$centang4.'</span>';
		}else{
		$datatri4='<span class="badge bg-danger" style="font-size:10px">'.$persennilai4.'%'.$centang4.'</span>';
		}
		}else{
		$datatri4='-';
		}
		}else{
		$nilai1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1,tb_ikk_bidang where tb_nilai_ikk_tri1.id_ikk=tb_ikk_bidang.id_ikk and tb_ikk_bidang.tri1=1 and tb_nilai_ikk_tri1.id_ikk='".$caridata['id_ikk']."' and tb_nilai_ikk_tri1.id_bidang='".$caridata['id_bidang']."' and tb_nilai_ikk_tri1.triwulan=1  and tb_nilai_ikk_tri1.tahun='".$_SESSION['tahun']."'"));  
		$nilai2=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1,tb_ikk_bidang where tb_nilai_ikk_tri1.id_ikk=tb_ikk_bidang.id_ikk and tb_ikk_bidang.tri2=1 and tb_nilai_ikk_tri1.id_ikk='".$caridata['id_ikk']."' and tb_nilai_ikk_tri1.id_bidang='".$caridata['id_bidang']."' and tb_nilai_ikk_tri1.triwulan=2  and tb_nilai_ikk_tri1.tahun='".$_SESSION['tahun']."'"));  
		$nilai3=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1,tb_ikk_bidang where tb_nilai_ikk_tri1.id_ikk=tb_ikk_bidang.id_ikk and tb_ikk_bidang.tri3=1 and tb_nilai_ikk_tri1.id_ikk='".$caridata['id_ikk']."' and tb_nilai_ikk_tri1.id_bidang='".$caridata['id_bidang']."' and tb_nilai_ikk_tri1.triwulan=3  and tb_nilai_ikk_tri1.tahun='".$_SESSION['tahun']."'"));  
		$nilai4=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1,tb_ikk_bidang where tb_nilai_ikk_tri1.id_ikk=tb_ikk_bidang.id_ikk and tb_ikk_bidang.tri4=1 and tb_nilai_ikk_tri1.id_ikk='".$caridata['id_ikk']."' and tb_nilai_ikk_tri1.id_bidang='".$caridata['id_bidang']."' and tb_nilai_ikk_tri1.triwulan=4  and tb_nilai_ikk_tri1.tahun='".$_SESSION['tahun']."'"));  
		
		if ($caridata['tri1']==1){
		if ($nilai1['validasi']==0){
		$btnvali1=' <br><button type="button"  onClick="validasi1(\''.$caridata['id_ikk'].'\',\''.$caridata['id_bidang'].'\')" title="Klik untuk Validasi" class="btn btn-default btn-xs"><font style="color:green"><i class="fa fa-check-circle"></i></font></button>';	
		$centang1='';
		}else{
		$btnvali1=' <br><button type="button"  onClick="view1(\''.$caridata['id_ikk'].'\',\''.$caridata['id_bidang'].'\')" title="Klik untuk melihat detail Capaian" class="btn btn-default btn-xs"><font style="color:green"><i class="fa fa-eye"></i></font></button>';	
		$centang1=' &nbsp;<i class="fa fa-thumbs-up"></i>';
		}
		}else{
		$btnvali1='-';
		}
		if ($caridata['tri2']==1){
		if ($nilai2['validasi']==0){
		$btnvali2=' <br><button type="button"  onClick="validasi2(\''.$caridata['id_ikk'].'\',\''.$caridata['id_bidang'].'\')" title="Klik untuk Validasi" class="btn btn-default btn-xs"><font style="color:green"><i class="fa fa-check-circle"></i></font></button>';	
		$centang2='';
		}else{
		$btnvali2=' <br><button type="button"  onClick="view2(\''.$caridata['id_ikk'].'\',\''.$caridata['id_bidang'].'\')" title="Klik untuk melihat detail Capaian" class="btn btn-default btn-xs"><font style="color:green"><i class="fa fa-eye"></i></font></button>';	
		$centang2=' &nbsp;<i class="fa fa-thumbs-up"></i>';
		}
		}else{
		$btnvali2='-';
		}
		if ($caridata['tri3']==1){
		if ($nilai3['validasi']==0){
		$btnvali3=' <br><button type="button"  onClick="validasi3(\''.$caridata['id_ikk'].'\',\''.$caridata['id_bidang'].'\')" title="Klik untuk Validasi" class="btn btn-default btn-xs"><font style="color:green"><i class="fa fa-check-circle"></i></font></button>';	
		$centang3='';
		}else{
		$btnvali3=' <br><button type="button"  onClick="view3(\''.$caridata['id_ikk'].'\',\''.$caridata['id_bidang'].'\')" title="Klik untuk melihat detail Capaian" class="btn btn-default btn-xs"><font style="color:green"><i class="fa fa-eye"></i></font></button>';	
		$centang3=' &nbsp;<i class="fa fa-thumbs-up"></i>';
		}
		}else{
		$btnvali3='-';
		}
		if ($caridata['tri4']==1){
		if ($nilai4['validasi']==0){
		$btnvali4=' <br><button type="button"  onClick="validasi4(\''.$caridata['id_ikk'].'\',\''.$caridata['id_bidang'].'\')" title="Klik untuk Validasi" class="btn btn-default btn-xs"><font style="color:green"><i class="fa fa-check-circle"></i></font></button>';	
		$centang4='';
		}else{
		$btnvali4=' <br><button type="button"  onClick="view4(\''.$caridata['id_ikk'].'\',\''.$caridata['id_bidang'].'\')" title="Klik untuk melihat detail Capaian" class="btn btn-default btn-xs"><font style="color:green"><i class="fa fa-eye"></i></font></button>';	
		$centang4=' &nbsp;<i class="fa fa-thumbs-up"></i>';
		}
		}else{
		$btnvali4='-';
		}
		
		if ($caridata['tri1']==1){
		if ($nilai1['angka_pembilang']==0){
		$datatri1='<span class="badge bg-danger" style="font-size:10px">'.rupiah2($nilai1['angka_pembilang']).$centang1.'</span>';  
		}else{
		$datatri1='<span class="badge bg-info" style="font-size:10px">'.rupiah2($nilai1['angka_pembilang']).$centang1.'</span>'; 	
		}
		}else{
		$datatri1='-';
		}
		if ($caridata['tri2']==1){
		if ($nilai2['angka_pembilang']==0){
		$datatri2='<span class="badge bg-danger" style="font-size:10px">'.rupiah2($nilai2['angka_pembilang']).$centang2.'</span>';  
		}else{
		$datatri2='<span class="badge bg-info" style="font-size:10px">'.rupiah2($nilai2['angka_pembilang']).$centang2.'</span>'; 	
		}
		}else{
		$datatri2='-';
		}
		if ($caridata['tri3']==1){
		if ($nilai3['angka_pembilang']==0){
		$datatri3='<span class="badge bg-danger" style="font-size:10px">'.rupiah2($nilai3['angka_pembilang']).$centang3.'</span>';  
		}else{
		$datatri3='<span class="badge bg-info" style="font-size:10px">'.rupiah2($nilai3['angka_pembilang']).$centang3.'</span>'; 	
		}
		}else{
		$datatri3='-';
		}
		if ($caridata['tri4']==1){
		if ($nilai4['angka_pembilang']==0){
		$datatri4='<span class="badge bg-danger" style="font-size:10px">'.rupiah2($nilai4['angka_pembilang']).$centang4.'</span>';  
		}else{
		$datatri4='<span class="badge bg-info" style="font-size:10px">'.rupiah2($nilai4['angka_pembilang']).$centang4.'</span>'; 	
		}
		}else{
		$datatri4='-';
		}		
		 
		}
		
		$btnaprove= '<a href="#" onClick="hapus(\''.$caridata['id_ikk'].'\')"><button type="button" title="Hapus Data" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button></a>';
 
	$no++;
	?>
	<tr>
	<td style="font-size:12px" align=center><?php echo $no ?></td>
	<td style="font-size:12px"><?php echo "<b>IKK ".$cekdata['kode_ikk']." - </b>".$cekdata['uraian_outcome'] ?></td>
	<td><center><?php echo $datatri1.$btnvali1;?></td>
	<td><center><?php echo $datatri2.$btnvali2;?></td>
	<td><center><?php echo $datatri3.$btnvali3;?></td>
	<td><center><?php echo $datatri4.$btnvali4;?></td>
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
	<div class="row">
    <div class="col-md-12">
	<div class="card card-default"> 
	<div class="box box-solid box-light"> 
	<div class="box-header">  
	<font style="font-size:14px" class="box-title"></a><i class="fa fa-folder-open"></i><b> Daftar Data Dukung IKK Bidang Tahun <?php echo $_SESSION['tahun'] ?></b></font> 
	</div>
	<div class="card-body"> 
	<form enctype="multipart/form-data" class="form-horizontal" method="post"/>
	<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
	<thead> 
	<tr style="font-size:13px"> 
	<th style="width:3%;"><center>No</center></th> 
	<th><center>Uraian Data Dukung</center></th>
	<th style="width:15%;"><center>File Data</center></th>  
	</tr> 
	</thead>  
	<tbody> 
	<?php
	$hitung=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_datadukung_bidang where tahun='$_SESSION[tahun]' and id_bidang='$_GET[id]'");
	$jumlah_record=mysqli_num_rows($hitung); 	
	if ($jumlah_record==0){
	?>
	<tr> 
	<td colspan=7><center>Data tidak ditemukan</td> 
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
		$posting="<center><a href='#' onClick='aktifdukung(".$caridata['id_dukung'].")'><button type='button' title='Klik untuk Aktifkan' class='btn btn-default btn-xs'><font style=color:red><i class='fa fa-times-circle'></i></button></font>";	
		}else{
		$posting="<center><a href='#' onClick='nonaktifdukung(".$caridata['id_dukung'].")'><button type='button' title='Klik untuk Non Aktifkan' class='btn btn-default btn-xs'><font style=color:green><i class='fa fa-check-circle'></i></button></font>";		
		}
		
		$btnaprove= '<a href="#" onClick="aktifdata(\''.$caridata['id_dukung'].'\')"><button type="button" title="Aktifkan Triwulan" class="btn btn-primary btn-xs"><i class="fa fa-check-square"></i> Triwulan</button></a> 
		<a href="#" onClick="hapusdata(\''.$caridata['id_dukung'].'\')"><button type="button" title="Hapus Data" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button></a>';
		
	$no2++;
	
		$cekdatax=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_upload_data_tri1 where id_data='".$caridata['id_dukung']."'"));
		
		$pecah = explode(".", $cekdatax['nama_file']); 
		$ext_file = end($pecah);
		
		if ($cekdatax){
		if ($ext_file=="xls" or $ext_file=="xlsx"){
		$view= '<a href="modul/file-data-dukung/'.$cekdatax['nama_file'].'" title="Download Data" target=blank><button type="button" class="btn btn-info btn-sm"><i class="fa fa-file-excel"></i> </button></a> ';
	 	}else if ($ext_file=="doc" or $ext_file=="docx"){
		$view= '<a href="modul/file-data-dukung/'.$cekdatax['nama_file'].'" title="Download Data" target=blank><button type="button" class="btn btn-info btn-sm"><i class="fa fa-file-word"></i> </button></a> ';
	 	}else if ($ext_file=="pdf" or $ext_file=="PDF"){
		$view= '<a href="modul/file-data-dukung/'.$cekdatax['nama_file'].'" title="Download Data" target=blank><button type="button" class="btn btn-info btn-sm"><i class="fa fa-file-pdf"></i> </button></a> ';
	 	}else if ($ext_file=="jpg" or $ext_file=="jpeg" or $ext_file=="JPG" or $ext_file=="JPEG" or $ext_file=="png" or $ext_file=="PNG"){
		$view= '<a href="modul/file-data-dukung/'.$cekdatax['nama_file'].'" title="Download Data" target=blank><button type="button" class="btn btn-info btn-sm"><i class="fa fa-file-image"></i> </button></a> ';
	 	}else if ($ext_file=="mpeg" or $ext_file=="mpv" or $ext_file=="3gp"){
		$view= '<a href="modul/file-data-dukung/'.$cekdatax['nama_file'].'" title="Download Data" target=blank><button type="button" class="btn btn-info btn-sm"><i class="fa fa-file-video"></i> </button></a> ';
	 	}else{
		$view= '<a href="modul/file-data-dukung/'.$cekdatax['nama_file'].'" title="Download Data" target=blank><button type="button" class="btn btn-info btn-sm"><i class="fa fa-file"></i> </button></a> ';
	 	}			
		}else{
		$view='<font style="color:red;font-size:13px"></font>';
		}
		
	?>
	<tr>
	<td  style="font-size:12px" align=center><?php echo $no2 ?></td>
	<td style="font-size:12px"><?php echo "<b>(Kode ".$cekdata['kode_data'].")</b> - ".$cekdata['uraian_data']?></td>
	<td><center><?php echo  $view ?></td>   
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
	</div>
    </div>
	</div> 
    <div class="col-md-5"> 
	<div class="card bg-gradient-default" style="position: relative; left: 0px; top: 0px;">
              
			  <div class="card-header border-0 ui-sortable-handle" >  
			   <h3 class="card-title">
                <i class="fas fa-chart-line mr-1"></i> 
                 <font style="font-size:14px"><b> Grafik Realisasi IKK Per Triwulan </b></font>
                </h3>
				<h3 class="card-title"> 
                 <font style="font-size:44px">&nbsp;</font>
                </h3>
		   <canvas id="horizontal-stacker-bar-chart" ></canvas>
              </div>
			  
	</div>
	<div class="card bg-gradient-default" style="position: relative; left: 0px; top: 0px;">
	
	 <div class="card-header border-0 ui-sortable-handle" >  
			   <h3 class="card-title">
                <i class="fas fa-chart-line mr-1"></i> 
                 <font style="font-size:14px"><b> Grafik Realisasi Triwulan Per IKK </b></font>
                </h3> 
			<canvas id="canvas"></canvas> 
              </div>
	</div>		  
	</div>
	</div>
	<hr>
	
	
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
		var ctx = document.getElementById("horizontal-stacker-bar-chart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: [<?php
				$no1==0;
				$data1=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM  tb_ikk_bidang,tb_outcome where  tb_ikk_bidang.id_data=tb_outcome.id_outcome and tb_ikk_bidang.tahun='$_SESSION[tahun]' and tb_ikk_bidang.id_bidang='$_GET[id]' and tb_outcome.datapersen=1 order by tb_ikk_bidang.id_data asc");
				while($cekdata1=mysqli_fetch_array($data1)){ 
				$no1++;	
				$list="IKK ".$cekdata1['kode_ikk'];
				echo "'".$list."',";
				}
				?>
				],
				datasets: [{
					label: 'Triwulan 1',
					backgroundColor: "#F08080",
					data: [ <?php
				$no1==0;
				$dataw1=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM  tb_ikk_bidang,tb_outcome where  tb_ikk_bidang.id_data=tb_outcome.id_outcome and tb_ikk_bidang.tahun='$_SESSION[tahun]' and tb_ikk_bidang.id_bidang='$_GET[id]' and tb_outcome.datapersen=1 order by tb_ikk_bidang.id_data asc");
				while($cekdataw1=mysqli_fetch_array($dataw1)){
				$rstw1=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1,tb_ikk_bidang where tb_nilai_ikk_tri1.id_ikk=tb_ikk_bidang.id_ikk and tb_ikk_bidang.tri1=1 and tb_nilai_ikk_tri1.id_ikk='".$cekdataw1['id_ikk']."' and tb_nilai_ikk_tri1.triwulan=1");  
				$cektw1 = mysqli_fetch_array($rstw1); 
				$persentw1x=($cektw1['angka_pembilang']/$cektw1['angka_pembagi'])*100; 
				$persentw1=round($persentw1x,2);	
				$no1++;	 
				echo "'".$persentw1."',";
				}
				?>
					],
				}, {
					label: 'Triwulan 2',
					backgroundColor: "#FCDDB0",
					data: [<?php
				$no1==0;
				$dataw2=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM  tb_ikk_bidang,tb_outcome where  tb_ikk_bidang.id_data=tb_outcome.id_outcome and tb_ikk_bidang.tahun='$_SESSION[tahun]' and tb_ikk_bidang.id_bidang='$_GET[id]' and tb_outcome.datapersen=1 order by tb_ikk_bidang.id_data asc");
				while($cekdataw2=mysqli_fetch_array($dataw2)){
				$rstw2=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1,tb_ikk_bidang where tb_nilai_ikk_tri1.id_ikk=tb_ikk_bidang.id_ikk and tb_ikk_bidang.tri2=1 and tb_nilai_ikk_tri1.id_ikk='".$cekdataw2['id_ikk']."' and tb_nilai_ikk_tri1.triwulan=2");  
				$cektw2 = mysqli_fetch_array($rstw2); 
				$persentw2x=($cektw2['angka_pembilang']/$cektw2['angka_pembagi'])*100; 
				$persentw2=round($persentw2x,2);	
				$no1++;	 
				echo "'".$persentw2."',";
				}
				?>],
				}, {
					label: 'Triwulan 3',
					backgroundColor: "#51EAEA",
					data: [<?php
				$no1==0;
				$dataw3=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM  tb_ikk_bidang,tb_outcome where  tb_ikk_bidang.id_data=tb_outcome.id_outcome and tb_ikk_bidang.tahun='$_SESSION[tahun]' and tb_ikk_bidang.id_bidang='$_GET[id]' and tb_outcome.datapersen=1 order by tb_ikk_bidang.id_data asc");
				while($cekdataw3=mysqli_fetch_array($dataw3)){
				$rstw3=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1,tb_ikk_bidang where tb_nilai_ikk_tri1.id_ikk=tb_ikk_bidang.id_ikk and tb_ikk_bidang.tri3=1 and tb_nilai_ikk_tri1.id_ikk='".$cekdataw3['id_ikk']."' and tb_nilai_ikk_tri1.triwulan=3");  
				$cektw3 = mysqli_fetch_array($rstw3); 
				$persentw3x=($cektw3['angka_pembilang']/$cektw3['angka_pembagi'])*100; 
				$persentw3=round($persentw3x,2);	
				$no1++;	 
				echo "'".$persentw3."',";
				}
				?>],
				}, {
					label: 'Triwulan 4',
					backgroundColor: "#FF9D76",
					data: [<?php
				$no1==0;
				$dataw4=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM  tb_ikk_bidang,tb_outcome where  tb_ikk_bidang.id_data=tb_outcome.id_outcome and tb_ikk_bidang.tahun='$_SESSION[tahun]' and tb_ikk_bidang.id_bidang='$_GET[id]' and tb_outcome.datapersen=1 order by tb_ikk_bidang.id_data asc");
				while($cekdataw4=mysqli_fetch_array($dataw4)){
				$rstw4=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1,tb_ikk_bidang where tb_nilai_ikk_tri1.id_ikk=tb_ikk_bidang.id_ikk and tb_ikk_bidang.tri4=1 and tb_nilai_ikk_tri1.id_ikk='".$cekdataw1['id_ikk']."' and tb_nilai_ikk_tri1.triwulan=4");  
				$cektw4 = mysqli_fetch_array($rstw4); 
				$persentw4x=($cektw4['angka_pembilang']/$cektw4['angka_pembagi'])*100; 
				$persentw4=round($persentw4x,2);	
				$no1++; 
				echo "'".$persentw4."',";
				}
				?>],
				}],
			},
			options: {
				tooltips: {
					displayColors: true,
					callbacks: {
						mode: 'x',
					},
				},
				scales: {
					x: {
						stacked: true,
					},
					y: {
						stacked: true
					}
				}, 
				responsive: true
			}
		});
	</script> 
<script type="text/javascript">
	var MONTHS = ['','Triwulan 1', 'Triwulan 2', 'Triwulan 3', 'Triwulan 4'];
  var color = Chart.helpers.color;
  var barChartData = {
   labels: MONTHS,
    datasets: [
			<?php
				$nox==0;
				$datax=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM  tb_ikk_bidang,tb_outcome where  tb_ikk_bidang.id_data=tb_outcome.id_outcome and tb_ikk_bidang.tahun='$_SESSION[tahun]' and tb_ikk_bidang.id_bidang='$_GET[id]' and tb_outcome.datapersen=1 order by tb_ikk_bidang.id_data asc");
				while($cekdatax=mysqli_fetch_array($datax)){ 
				$nilaix1=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1,tb_ikk_bidang where tb_nilai_ikk_tri1.id_ikk=tb_ikk_bidang.id_ikk and tb_ikk_bidang.tri1=1 and tb_nilai_ikk_tri1.id_ikk='".$cekdatax['id_ikk']."' and tb_nilai_ikk_tri1.triwulan=1");  
				$ceknilaix1 = mysqli_fetch_array($nilaix1); 
				$persennilaix1=($ceknilaix1['angka_pembilang']/$ceknilaix1['angka_pembagi'])*100; 
				$persennilai1=round($persennilaix1,2);	
				
				$nilaix2=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1,tb_ikk_bidang where tb_nilai_ikk_tri1.id_ikk=tb_ikk_bidang.id_ikk and tb_ikk_bidang.tri2=1 and tb_nilai_ikk_tri1.id_ikk='".$cekdatax['id_ikk']."' and tb_nilai_ikk_tri1.triwulan=2");  
				$ceknilaix2 = mysqli_fetch_array($nilaix2); 
				$persennilaix2=($ceknilaix2['angka_pembilang']/$ceknilaix2['angka_pembagi'])*100; 
				$persennilai2=round($persennilaix2,2);	
				
				$nilaix3=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1,tb_ikk_bidang where tb_nilai_ikk_tri1.id_ikk=tb_ikk_bidang.id_ikk and tb_ikk_bidang.tri3=1 and tb_nilai_ikk_tri1.id_ikk='".$cekdatax['id_ikk']."' and tb_nilai_ikk_tri1.triwulan=3");  
				$ceknilaix3 = mysqli_fetch_array($nilaix3); 
				$persennilaix3=($ceknilaix3['angka_pembilang']/$ceknilaix3['angka_pembagi'])*100; 
				$persennilai3=round($persennilaix3,2);	
				
				$nilaix4=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1,tb_ikk_bidang where tb_nilai_ikk_tri1.id_ikk=tb_ikk_bidang.id_ikk and tb_ikk_bidang.tri4=1 and tb_nilai_ikk_tri1.id_ikk='".$cekdatax['id_ikk']."' and tb_nilai_ikk_tri1.triwulan=4");  
				$ceknilaix4 = mysqli_fetch_array($nilaix4); 
				$persennilaix4=($ceknilaix4['angka_pembilang']/$ceknilaix4['angka_pembagi'])*100; 
				$persennilai4=round($persennilaix4,2);	
				
				$nox++;	
				$listx="IKK ".$cekdatax['kode_ikk'];
			   ?>
				{ 
				 label: <?php echo "'".$listx."',"; ?> 
					backgroundColor: '#FFEFD5',
				 borderColor: '<?php  
				 if ($nox%5==0) echo "#d5d788";
				 else if ($nox%5==1) echo "#73d179";
				 else if ($nox%5==2) echo "#74d1f5";
				 else if ($nox%5==3) echo "#f99696";
				 else if ($nox%5==4) echo "#e67c0c";
				 ?>',
				 borderWidth: 2.5,
				 data: ['0',<?php echo "'".$persennilai1."','".$persennilai2."','".$persennilai3."','".$persennilai4."',"; ?>]
				} ,
				<?php
				}
				?>
  
  
   ]

    

  };

  window.onload = function() {
   var ctx = document.getElementById('canvas').getContext('2d');
   window.myBar = new Chart(ctx, {
    type: 'line',
    data: barChartData,
	options : {
						title : {
							display : true, 
						},
						scales : {
							x : {
								grid : {
									display : true,
									color: "#0046ff",
									lineWidth: 2
								}
							},
							y : {
								grid : {
									display : true,
									color: "#0046ff"
								}
							}
						}
					} 
   });

  };

 

</script>
</BODY>
</HTML>  
<?PHP
