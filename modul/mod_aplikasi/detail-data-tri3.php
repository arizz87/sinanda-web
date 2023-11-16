<html lang="en">
<script src="./modul/js/jquery-1.11.1.min.js"></script> 
<script type="text/javascript"></script>
<script src="modul/js/sinanda-inputtriwulan.js"></script>
<head> 
</HEAD>
<BODY>
<script>
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
<?PHP 
$date=date("Y");
?>
<?php
$kdkegiatan=$_GET['kdkegiatan'];
$kdsubkegiatan=$_GET['kdsubkegiatan'];
$caribidang=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM tb_bidang where id_bidang='".$_SESSION['id_bidang']."'")); 
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
$rs = mysqli_query($GLOBALS["___mysqli_ston"],"select * from tb_bidang where id_bidang='$_SESSION[id_bidang]'");
$data = mysqli_fetch_array($rs);  

$hitung=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ikk_bidang where id_bidang='".$_SESSION['id_bidang']."' and tri3=1 and tahun='$_SESSION[tahun]'");
$jumlah_record=mysqli_num_rows($hitung); 	
		
?>  
 <section class="header">
          <ol class="breadcrumb" style="background-color:#5e5d5d">
            <li><a href="#"><div style="color:#FFF;text-transform:uppercase"><?php echo $data['nama_bidang'] ?></div></a></li>
          </ol>
        </section>
	<div class="card card-default"> 
	<div class="box box-solid box-light"> 
	<div class="box-header">  
	<font style="font-size:14px" class="box-title"></a><i class="fa fa-database"></i><b> Daftar IKK Bidang Tahun <?php echo $_SESSION['tahun'] ?> (Triwulan 3)</b></font>  
	<?php
	if ($jumlah_record!=0){
	?>
	<div class="box-tools pull-right">
	<button onClick="cetakcapaian3()"  class="btn btn-primary" style="font-size:12px"><i class="fa fa-print"></i> Cetak Capaian</button></a> 
	</div> 
	<?PHP
	}
	?>
	</div>
	<div class="card-body"> 
	<form enctype="multipart/form-data" class="form-horizontal" method="post"/> 
	<table cellspacing="0"  cellpadding="2" border="1" width="100%"> 
								<thead>
							<tr  style="font-size:12px" height=45 bgcolor=#7FFFD4> 
								<th width="4%" style=padding:8px 10px;><center><b>No</th> 
								<th width="36%" style=padding:8px 10px;><center><b>Uraian Data IKK</th> 
								<th width="50%" style=padding:8px 10px;><center><b>Rumus IKK</th>  
								<th width="10%" style=padding:8px 10px;><center><b>Hasil (%)</th>  
                            </tr> 
								</thead>
		<?php
		if ($jumlah_record==0){
		?>
		<tr style="font-size:12px"> 
		<td align=center style=padding:8px 10px; colspan=4>Tidak ada permintaan data</td> 
		</tr>
		<?php 
		}else{
		$no==0;
		$data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ikk_bidang where id_bidang='".$_SESSION['id_bidang']."' and tri3=1 and tahun='$_SESSION[tahun]' order by id_data asc");
		while($cekdata=mysqli_fetch_array($data)){
		$cekikk=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_outcome where id_outcome='".$cekdata['id_data']."' and tahun='$_SESSION[tahun]'"));  
		$no++; 
		?>
		<tr style="font-size:12px"> 
		<td align=center style=padding:8px 10px;><?php echo $no ?></td> 
		<td style=padding:8px 10px;><?php echo "<b>IKK ".$cekikk['kode_ikk']."</b> - ".$cekikk['uraian_outcome'] ?></td> 
		<td align=center style=padding:8px 10px;>
		<?php
		if ($cekikk['datapersen']==1){
		?>
		<table cellspacing="0"  cellpadding="2" border="1" width="100%"> 
		<?php 
		$no==0;
		$data2=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_outcome where id_outcome='".$cekdata['id_data']."' and tahun='$_SESSION[tahun]'");
		$cekdata2=mysqli_fetch_array($data2);
		$pembilang=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ouput_data where id='".$cekdata2['pembilang']."' and tahun='$_SESSION[tahun]'")); 
		$pembagi=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ouput_data where id='".$cekdata2['pembagi']."' and tahun='$_SESSION[tahun]'"));  
		$nilai=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1 where id_ikk='".$cekdata['id_ikk']."' and id_bidang='".$_SESSION['id_bidang']."' and triwulan=3 and tahun='".$_SESSION['tahun']."'"));  
		?>
		<tr style="font-size:12px">  
		<td  width="70%" style=padding:8px 10px;><?php echo $pembilang['uraian_data']."<b> (Kode ".$pembilang['kode_data'].")</b> " ?></td> 
		<td align=center style=padding:8px 10px;>
		<input type="text" class="form-control" disabled maxlength=10 onkeypress="return numbersonly(this, event)"  autocomplete="off" style="text-transform:uppercase;font-size:12px;text-align:right;height:30px" value="<?php echo rupiah2($nilai['angka_pembilang']) ?>"> 
		 </td> 
		<?PHP
		if ($nilai['validasi']==0){
		?> 
		 <td align=center style=padding:8px 10px;> 
		 <button type="button" onClick="inputpembilang3(<?php echo $cekdata['id_ikk'] ?>)"  title="Input Angka" class="btn btn-info  btn-xs"><i class="fa fa-edit"></i></button>
		 </td> 
		 <?PHP
		}else{
		?>
		<td align=center style=padding:8px 10px;> 
		 <button type="button" disabled title="Sudah di Validasi"  class="btn btn-danger  btn-xs"><i class="fa fa-lock"></i></button>
		 </td> 
		 <?PHP
		}
		?> 
        </tr> 
		<tr style="font-size:12px">  
		<td  width="70%" style=padding:8px 10px;><?php echo $pembagi['uraian_data']."<b> (Kode ".$pembagi['kode_data'].")</b> " ?></td> 
		<td align=center style=padding:8px 10px;>
		<input type="text" class="form-control" disabled  maxlength=10 onkeypress="return numbersonly(this, event)"  autocomplete="off" style="text-transform:uppercase;font-size:12px;text-align:right;height:30px" value="<?php echo rupiah2($nilai['angka_pembagi']) ?>"> 
		</td>
		<?PHP
		if ($nilai['validasi']==0){
		?>    
		 <td align=center style=padding:8px 10px;> 
		 <button type="button" onClick="inputpembagi3(<?php echo $cekdata['id_ikk'] ?>)"  title="Input Angka"  class="btn btn-info  btn-xs"><i class="fa fa-edit"></i></button>
		 </td> 
		 <?PHP
		}else{
		?>
		<td align=center style=padding:8px 10px;> 
		 <button type="button" disabled title="Sudah di Validasi"  class="btn btn-danger  btn-xs"><i class="fa fa-lock"></i></button>
		 </td> 
		 <?PHP
		}
		?>
		</tr>  
		</table>
		<?php
		}else{
		?>
		<table cellspacing="0"  cellpadding="2" border="1" width="100%"> 
		<?php 
		$no==0;
		$data2=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_outcome where id_outcome='".$cekdata['id_data']."' and tahun='$_SESSION[tahun]'");
		$cekdata2=mysqli_fetch_array($data2); 
		$pembilang=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ouput_data where id='".$cekdata2['pembilang']."' and tahun='$_SESSION[tahun]'")); 
		$pembagi=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ouput_data where id='".$cekdata2['pembagi']."' and tahun='$_SESSION[tahun]'"));  
		$nilai=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1 where id_ikk='".$cekdata['id_ikk']."' and id_bidang='".$_SESSION['id_bidang']."' and triwulan=3  and tahun='".$_SESSION['tahun']."'"));  
		?>
		<tr style="font-size:12px">  
		<td  width="70%" style=padding:8px 10px;><?php echo $cekdata2['uraian_outcome']  ?></td> 
		<td align=center style=padding:8px 10px;>
		<input type="text" class="form-control" disabled maxlength=10 onkeypress="return numbersonly(this, event)"  autocomplete="off" style="text-transform:uppercase;font-size:12px;text-align:right;height:30px" value="<?php echo rupiah2($nilai['angka_pembilang']) ?>"> 
		</td>
		<?PHP
		if ($nilai['validasi']==0){
		?> 
		<td align=center style=padding:8px 10px;> 
		<button type="button" onClick="inputpembilang3(<?php echo $cekdata['id_ikk'] ?>)"  title="Input Angka"  class="btn btn-info  btn-xs"><i class="fa fa-edit"></i></button>
		 </td>  
		 <?PHP
		}else{
		?>
		<td align=center style=padding:8px 10px;> 
		 <button type="button" disabled title="Sudah di Validasi"  class="btn btn-danger  btn-xs"><i class="fa fa-lock"></i></button>
		 </td> 
		 <?PHP
		}
		?>
		 </tr>    
		</table>
		<?php
		}
		?>
		 </td>  
		<td style=padding:8px 10px;>
		<?php
		if ($cekikk['datapersen']==1){
		$nilai=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1 where id_ikk='".$cekdata['id_ikk']."' and id_bidang='".$_SESSION['id_bidang']."' and triwulan=3  and tahun='".$_SESSION['tahun']."'"));  
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
		<center><span class="badge <?php echo $colorbm ?>" style="font-size:11px"><?php echo $persennilai ?> %</span>
		<?php
		}
		?>
		</td> 		 
        </tr> 
		<?php
		}}
		?>
		</table>
	</form>
	</div>
	</div>
	</div>
 <div class="card card-default"> 
	<div class="box box-solid box-light"> 
	<div class="box-header">  
	<font style="font-size:14px" class="box-title"></a><i class="fa fa-folder-open"></i><b> Daftar Data Dukung Tahun <?php echo $_SESSION['tahun'] ?> (Triwulan 3)</b></font>  
	</div>
	<div class="card-body"> 
	<form enctype="multipart/form-data" class="form-horizontal" method="post"/>  
	</table>
	<table cellspacing="0"  cellpadding="2" border="1" width="90%"> 
								<thead>
							<tr  style="font-size:12px" height=45 bgcolor=#7FFFD4> 
								<th width="5%" style=padding:8px 10px;><center><b>No</th> 
								<th width="60%" style=padding:8px 10px;><center><b>Uraian Data Dukung</th> 
								<th width="10%" style=padding:8px 10px;><center><b>File Data</th>   
								<th width="15%" style=padding:8px 10px;><center><b>Upload Data</th>  
                            </tr> 
								</thead>
		<?php
		if ($jumlah_record==0){
		?>
		<tr style="font-size:12px"> 
		<td align=center style=padding:8px 10px; colspan=4>Tidak ada permintaan data</td> 
		</tr>
		<?php 
		}else{
		$hitung2=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_datadukung_bidang where id_bidang='".$_SESSION['id_bidang']."' and posting=1 and tahun='$_SESSION[tahun]'");
		$jumlah_record2=mysqli_num_rows($hitung2); 	
		if ($jumlah_record2==0){
		?>
		<tr style="font-size:12px"> 
		<td align=center style=padding:8px 10px; colspan=4>Tidak ada permintaan data</td> 
		</tr>
		<?php 
		}else{
		$no3==0;
		$data3=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_datadukung_bidang where id_bidang='".$_SESSION['id_bidang']."' and posting=1 and tahun='$_SESSION[tahun]' order by id_data ASC");
		while($cekdata3=mysqli_fetch_array($data3)){
		$cekikk=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ouput_data where id='".$cekdata3['id_data']."' and tahun='$_SESSION[tahun]'")); 
		$no3++; 
		$cekdata=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_upload_data_tri1 where id_data='".$cekdata3['id_dukung']."' and id_bidang='".$_SESSION['id_bidang']."' and tahun='".$_SESSION['tahun']."'"));
		
		$pecah = explode(".", $cekdata['nama_file']); 
		$ext_file = end($pecah);
		
		if ($cekdata){
		if ($ext_file=="xls" or $ext_file=="xlsx"){
		$view= '<a href="modul/file-data-dukung/'.$cekdata['nama_file'].'" title="Download Data" target=blank><button type="button" class="btn btn-primary btn-xs"><i class="fa fa-file-excel"></i> </button></a> ';
	 	}else if ($ext_file=="doc" or $ext_file=="docx"){
		$view= '<a href="modul/file-data-dukung/'.$cekdata['nama_file'].'" title="Download Data" target=blank><button type="button" class="btn btn-primary btn-xs"><i class="fa fa-file-word"></i> </button></a> ';
	 	}else if ($ext_file=="pdf" or $ext_file=="PDF"){
		$view= '<a href="modul/file-data-dukung/'.$cekdata['nama_file'].'" title="Download Data" target=blank><button type="button" class="btn btn-primary btn-xs"><i class="fa fa-file-pdf"></i> </button></a> ';
	 	}else if ($ext_file=="jpg" or $ext_file=="jpeg" or $ext_file=="JPG" or $ext_file=="JPEG" or $ext_file=="png" or $ext_file=="PNG"){
		$view= '<a href="modul/file-data-dukung/'.$cekdata['nama_file'].'" title="Download Data" target=blank><button type="button" class="btn btn-primary btn-xs"><i class="fa fa-file-image"></i> </button></a> ';
	 	}else if ($ext_file=="mpeg" or $ext_file=="mpv" or $ext_file=="3gp"){
		$view= '<a href="modul/file-data-dukung/'.$cekdata['nama_file'].'" title="Download Data" target=blank><button type="button" class="btn btn-primary btn-xs"><i class="fa fa-file-video"></i> </button></a> ';
	 	}else{
		$view= '<a href="modul/file-data-dukung/'.$cekdata['nama_file'].'" title="Download Data" target=blank><button type="button" class="btn btn-primary btn-xs"><i class="fa fa-file"></i> </button></a> ';
	 	}			
		}else{
		$view='<font style="color:red;font-size:13px"><i class="fa fa-times" title="Belum Upload"></i></font>';
		}
		?>
		<tr style="font-size:12px"> 
		<td align=center style=padding:8px 10px;><?php echo $no3 ?></td> 
		<td style=padding:8px 10px;><?php echo $cekikk['uraian_data']."<b> (Kode ".$cekikk['kode_data'].")</b> " ?></td>  
		<td align=center style=padding:8px 10px;><?php echo $view ?></td>  
		<td align=center style=padding:8px 10px;> 
		<?php
		if ($cekdata){
		?>
		<button type="button" onClick="upload(<?php echo $cekdata3['id_dukung'] ?>)"  class="btn btn-info btn-xs"><i class="fa fa-reply-all"></i> Upload Ulang</button>
		<?php
		}else{
		?>
		<button type="button" onClick="upload(<?php echo $cekdata3['id_dukung'] ?>)"  class="btn btn-success btn-xs"><i class="fa fa-upload"></i> Upload File</button>
		<?php
		}
		?>
		</td>  
        </tr> 
		<?php
		}}}
		?>
		</table>
	</form>
	</div>
	</div>
	</div>  
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
</BODY>
</HTML>  
<?PHP
