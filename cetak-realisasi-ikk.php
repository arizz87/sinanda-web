<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">   
<style> 
@page {
    size: 21.50cm 33cm;
    margin: 1cm 1cm 1cm 1cm; /* change the margins as you want them to be. */
}
table{
    border-collapse:collapse;
    font:normal normal 12px Arial,Sans-Serif;
    color:#333333;
}  
</style>
</head>
<?php
//print_r($_POST);
include('koneksi.php');
include('fungsi.php'); 
 
$variabel=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ikk_bidang where tahun='$_SESSION[tahun]' and id_data='$_POST[iddata]' and id_bidang='$_POST[id_bidang]'")); 
$variabel2=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_bidang where id_bidang='$_POST[id_bidang]'")); 
$variabel3=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_outcome where id_outcome='".$variabel['id_data']."'")); 
$variabel4=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_tahun where tahun_anggaran='".$_SESSION['tahun']."'")); 
 									
$tgl_rencana = tgl_indonesia($variabel['tgl_rencana']);									
$tgl_setelah = tgl_indonesia($variabel['tgl_setelah']);

$dayb = date('D', strtotime($tgl_berangkat));
$dayListb = array(
    'Sun' => 'Minggu',
    'Mon' => 'Senin',
    'Tue' => 'Selasa',
    'Wed' => 'Rabu',
    'Thu' => 'Kamis',
    'Fri' => 'Jumat',
    'Sat' => 'Sabtu'
);

$tgl_kembali = $variabel['tgl_kembali'];
$dayk = date('D', strtotime($tgl_kembali));
$dayListk = array(
    'Sun' => 'Minggu',
    'Mon' => 'Senin',
    'Tue' => 'Selasa',
    'Wed' => 'Rabu',
    'Thu' => 'Kamis',
    'Fri' => 'Jumat',
    'Sat' => 'Sabtu'
);

?>		
<font face="Arial, Helvetica, sans-serif"> 
<table cellspacing="0"  cellpadding="0" border="0" width="100%">
							<tr>
							<td rowspan="4" align="center" width="5%"></td>
								<td rowspan="4" width="10%"><img src="logobbs.jpg" width=85 height=75></td>
                            </tr>
							<tr style="font-size:16px">
							  <td align="center" height="20"><b>PEMERINTAH DAERAH KABUPATEN BREBES</td>
							  <td align="center" width="15%"></td>
                            </tr>  
							<tr style="font-size:18px">
                              <td align="center" height="20"><b>DINAS PERINDUSTRIAN DAN TENAGA KERJA<br></td>
							  <td align="center" ></td>
                            </tr>  
							<tr style="font-size:12px">
                              <td align="center" height="20">Jl. MT. Haryono No.68 Telp. (0283) 673023 Brebes - 52212</td>
							  <td align="center" ></td>
                            </tr> 
		</table><b><hr size="3px" color="#000000"></b><br/>  
<?php
if ($_POST['tri']==5){
?>
	<table cellspacing="0"  cellpadding="2" border="0"  width="100%">
			<?php
			if ($_POST['iddata']=="all"){
			?>
			 <tr style="font-size:14px">
            	<td width="100%" align="center" style="text-transform: uppercase;"><b>URUSAN <?php echo $variabel2['nama_bidang'] ?> <br>
				DOKUMEN PENDUKUNG IKK OUTCOME SEMUA TRIWULAN <br> SEMUA INDIKATOR
				</td>
            </tr>   
			<?php
			}else{
			?>
		    <tr style="font-size:14px">
            	<td width="100%" align="center" style="text-transform: uppercase;"><b>URUSAN <?php echo $variabel2['nama_bidang'] ?> <br>
				DOKUMEN PENDUKUNG IKK OUTCOME SEMUA TRIWULAN <br> IKK
				<?php echo $variabel3['kode_ikk'] ?> 
				</td>
            </tr>   
			<tr style="font-size:14px">
            	<td width="100%" align="center" style="text-transform: uppercase;"><br><b><?php echo $variabel3['uraian_outcome'] ?> 
				</td>
            </tr> 
			<?php
			}
			?>
        </table> <p>
		<table cellspacing="0"  cellpadding="2" border="1" width="100%"> 
								<thead>
							<tr  style="font-size:12px" height=45> 
								<th width="4%" align=center style=padding:8px 10px;><b>NO</th> 
								<th width="36%" align=center  style=padding:8px 10px;><b>IKK</th> 
								<th width="10%" align=center  style=padding:8px 10px;><b>TW 1</th> 
								<th width="10%" align=center  style=padding:8px 10px;><b>TW 2</th> 
								<th width="10%" align=center  style=padding:8px 10px;><b>TW 3</th> 
								<th width="10%" align=center  style=padding:8px 10px;><b>TW 4</th>  
								<th width="20%" align=center  style=padding:8px 10px;><b>SUMBER <br>DATA</th>   
                            </tr> 
								</thead>
		<?php
		if ($_POST['iddata']=="all"){
		?>
		<?php 
		$no==0;
		if ($_POST['tri']==1){
		$tri="tri1";
		}else if ($_POST['tri']==2){
		$tri="tri2";
		}else if ($_POST['tri']==3){
		$tri="tri3";
		}else if ($_POST['tri']==4){
		$tri="tri4";
		}
		
		$data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ikk_bidang where id_bidang='".$_POST['id_bidang']."' and tahun='$_SESSION[tahun]' order by id_data asc");
		while($cekdata=mysqli_fetch_array($data)){
		$cekikk=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_outcome where id_outcome='".$cekdata['id_data']."' and tahun='$_SESSION[tahun]'")); 
		$pembilang=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ouput_data where id='".$cekikk['pembilang']."' and tahun='$_SESSION[tahun]'")); 
		$pembagi=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ouput_data where id='".$cekikk['pembagi']."' and tahun='$_SESSION[tahun]'")); 
		
		$nilai1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1 where id_ikk='".$cekdata['id_ikk']."' and id_bidang='".$cekdata['id_bidang']."' and triwulan=1 and tahun='".$cekdata['tahun']."'"));
		$nilai2=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1 where id_ikk='".$cekdata['id_ikk']."' and id_bidang='".$cekdata['id_bidang']."' and triwulan=2 and tahun='".$cekdata['tahun']."'"));
		$nilai3=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1 where id_ikk='".$cekdata['id_ikk']."' and id_bidang='".$cekdata['id_bidang']."' and triwulan=3 and tahun='".$cekdata['tahun']."'"));
		$nilai4=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1 where id_ikk='".$cekdata['id_ikk']."' and id_bidang='".$cekdata['id_bidang']."' and triwulan=4 and tahun='".$cekdata['tahun']."'"));
		 
		
		if ($cekikk['datapersen']==1){
		
		if ($cekdata['tri1']==0){
		$persennilai1='<font style=font-size:12px><b> 0%</font>';	
		}else{
		$totnilai1=($nilai1['angka_pembilang']/$nilai1['angka_pembagi'])*100;
		if($nilai1['angka_pembilang']==0 and $nilai1['angka_pembagi']==0){
		$persennilai1='<font style=font-size:12px><b> 0%</font>';	
		}elseif($nilai1['angka_pembilang']>0 and $nilai1['angka_pembagi']==0){
		$persennilai1='<font style=font-size:12px><b> 0%</font>';	
		}else{
		$persennilai1='<font style=font-size:12px><b>'.round($totnilai1,2).'%</font>';	
		}
		}
		
		if ($cekdata['tri2']==0){
		$persennilai2='<font style=font-size:12px><b> 0%</font>';	
		}else{
		$totnilai2=($nilai2['angka_pembilang']/$nilai2['angka_pembagi'])*100;
		if($nilai2['angka_pembilang']==0 and $nilai2['angka_pembagi']==0){
		$persennilai2='<font style=font-size:12px><b> 0%</font>';	
		}elseif($nilai2['angka_pembilang']>0 and $nilai2['angka_pembagi']==0){
		$persennilai2='<font style=font-size:12px><b> 0%</font>';	
		}else{
		$persennilai2='<font style=font-size:12px><b>'.round($totnilai2,2).'%</font>';	
		}
		}
		
		if ($cekdata['tri3']==0){
		$persennilai3='<font style=font-size:12px><b> 0%</font>';	
		}else{
		$totnilai3=($nilai3['angka_pembilang']/$nilai3['angka_pembagi'])*100;
		if($nilai3['angka_pembilang']==0 and $nilai3['angka_pembagi']==0){
		$persennilai3='<font style=font-size:12px><b> 0%</font>';	
		}elseif($nilai3['angka_pembilang']>0 and $nilai3['angka_pembagi']==0){
		$persennilai3='<font style=font-size:12px><b> 0%</font>';	
		}else{
		$persennilai3='<font style=font-size:12px><b>'.round($totnilai3,2).'%</font>';	
		}
		}
		
		if ($cekdata['tri4']==0){
		$persennilai4='<font style=font-size:12px><b> 0%</font>';	
		}else{
		$totnilai4=($nilai4['angka_pembilang']/$nilai4['angka_pembagi'])*100;
		if($nilai4['angka_pembilang']==0 and $nilai4['angka_pembagi']==0){
		$persennilai4='<font style=font-size:12px><b> 0%</font>';	
		}elseif($nilai4['angka_pembilang']>0 and $nilai4['angka_pembagi']==0){
		$persennilai4='<font style=font-size:12px><b> 0%</font>';	
		}else{
		$persennilai4='<font style=font-size:12px><b>'.round($totnilai4,2).'%</font>';	
		}
		}
		}else{
		if ($cekdata['tri1']==0){
		$persennilai1='<font style=font-size:12px><b> 0</font>';	
		}else{		
		$persennilai1='<font style=font-size:12px><b>'.rupiah2($nilai1['angka_pembilang']).'</font>';
		}
		if ($cekdata['tri2']==0){
		$persennilai2='<font style=font-size:12px><b> 0</font>';	
		}else{	
		$persennilai2='<font style=font-size:12px><b>'.rupiah2($nilai2['angka_pembilang']).'</font>';	
		}
		if ($cekdata['tri3']==0){
		$persennilai3='<font style=font-size:12px><b> 0</font>';	
		}else{	
		$persennilai3='<font style=font-size:12px><b>'.rupiah2($nilai3['angka_pembilang']).'</font>';	
		}
		if ($cekdata['tri4']==0){
		$persennilai4='<font style=font-size:12px><b> 0</font>';	
		}else{	
		$persennilai4='<font style=font-size:12px><b>'.rupiah2($nilai4['angka_pembilang']).'</font>';		
		}
		}
		 
		$no++; 
		?>
		<tr style="font-size:12px"> 
		<td align=center style=padding:8px 10px; valign=top ><?php echo $no ?></td> 
		<td style=padding:8px 10px; valign=top ><?php echo "IKK ".$cekikk['kode_ikk']." - ".$cekikk['uraian_outcome'] ?></td>  
		<td align=right style="padding:8px 10px;" valign=top ><?php echo $persennilai1 ?></td>  
		<td align=right style="padding:8px 10px;" valign=top ><?php echo $persennilai2 ?></td>   
		<td align=right style="padding:8px 10px;" valign=top ><?php echo $persennilai3 ?></td>   
		<td align=right style="padding:8px 10px;" valign=top ><?php echo $persennilai4 ?></td>   
		<td align=left style=padding:8px 10px; valign=top >Dinas Perindustrian dan Tenaga Kerja Kab. Brebes</td>   
        </tr> 
		<?php
		}
		?> 	
		
		<?php
		}else{
		?> 
		<?php 
		$no==0; 
		
		$cekikk=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_outcome where id_outcome='".$variabel['id_data']."' and tahun='$variabel[tahun]'")); 
		$pembilang=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ouput_data where id='".$cekikk['pembilang']."' and tahun='$_SESSION[tahun]'")); 
		$pembagi=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ouput_data where id='".$cekikk['pembagi']."' and tahun='$_SESSION[tahun]'")); 
		
		$nilai1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1 where id_ikk='".$variabel['id_ikk']."' and id_bidang='".$variabel['id_bidang']."' and triwulan=1 and tahun='".$variabel['tahun']."'"));
		$nilai2=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1 where id_ikk='".$variabel['id_ikk']."' and id_bidang='".$variabel['id_bidang']."' and triwulan=2 and tahun='".$variabel['tahun']."'"));
		$nilai3=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1 where id_ikk='".$variabel['id_ikk']."' and id_bidang='".$variabel['id_bidang']."' and triwulan=3 and tahun='".$variabel['tahun']."'"));
		$nilai4=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1 where id_ikk='".$variabel['id_ikk']."' and id_bidang='".$variabel['id_bidang']."' and triwulan=4 and tahun='".$variabel['tahun']."'"));
		 
		
		if ($cekikk['datapersen']==1){
		
		if ($variabel['tri1']==0){
		$persennilai1='<font style=font-size:12px><b> 0%</font>';	
		}else{
		$totnilai1=($nilai1['angka_pembilang']/$nilai1['angka_pembagi'])*100;
		if($nilai1['angka_pembilang']==0 and $nilai1['angka_pembagi']==0){
		$persennilai1='<font style=font-size:12px><b> 0%</font>';	
		}elseif($nilai1['angka_pembilang']>0 and $nilai1['angka_pembagi']==0){
		$persennilai1='<font style=font-size:12px><b> 0%</font>';	
		}else{
		$persennilai1='<font style=font-size:12px><b>'.round($totnilai1,2).'%</font>';	
		}
		}
		
		if ($variabel['tri2']==0){
		$persennilai2='<font style=font-size:12px><b> 0%</font>';	
		}else{
		$totnilai2=($nilai2['angka_pembilang']/$nilai2['angka_pembagi'])*100;
		if($nilai2['angka_pembilang']==0 and $nilai2['angka_pembagi']==0){
		$persennilai2='<font style=font-size:12px><b> 0%</font>';	
		}elseif($nilai2['angka_pembilang']>0 and $nilai2['angka_pembagi']==0){
		$persennilai2='<font style=font-size:12px><b> 0%</font>';	
		}else{
		$persennilai2='<font style=font-size:12px><b>'.round($totnilai2,2).'%</font>';	
		}
		}
		
		if ($variabel['tri3']==0){
		$persennilai3='<font style=font-size:12px><b> 0%</font>';	
		}else{
		$totnilai3=($nilai3['angka_pembilang']/$nilai3['angka_pembagi'])*100;
		if($nilai3['angka_pembilang']==0 and $nilai3['angka_pembagi']==0){
		$persennilai3='<font style=font-size:12px><b> 0%</font>';	
		}elseif($nilai3['angka_pembilang']>0 and $nilai3['angka_pembagi']==0){
		$persennilai3='<font style=font-size:12px><b> 0%</font>';	
		}else{
		$persennilai3='<font style=font-size:12px><b>'.round($totnilai3,2).'%</font>';	
		}
		}
		
		if ($variabel['tri4']==0){
		$persennilai4='<font style=font-size:12px><b> 0%</font>';	
		}else{
		$totnilai4=($nilai4['angka_pembilang']/$nilai4['angka_pembagi'])*100;
		if($nilai4['angka_pembilang']==0 and $nilai4['angka_pembagi']==0){
		$persennilai4='<font style=font-size:12px><b> 0%</font>';	
		}elseif($nilai4['angka_pembilang']>0 and $nilai4['angka_pembagi']==0){
		$persennilai4='<font style=font-size:12px><b> 0%</font>';	
		}else{
		$persennilai4='<font style=font-size:12px><b>'.round($totnilai4,2).'%</font>';	
		}
		}
		}else{
		if ($variabel['tri1']==0){
		$persennilai1='<font style=font-size:12px><b> 0</font>';	
		}else{		
		$persennilai1='<font style=font-size:12px><b>'.rupiah2($nilai1['angka_pembilang']).'</font>';
		}
		if ($variabel['tri2']==0){
		$persennilai2='<font style=font-size:12px><b> 0</font>';	
		}else{	
		$persennilai2='<font style=font-size:12px><b>'.rupiah2($nilai2['angka_pembilang']).'</font>';	
		}
		if ($variabel['tri3']==0){
		$persennilai3='<font style=font-size:12px><b> 0</font>';	
		}else{	
		$persennilai3='<font style=font-size:12px><b>'.rupiah2($nilai3['angka_pembilang']).'</font>';	
		}
		if ($variabel['tri4']==0){
		$persennilai4='<font style=font-size:12px><b> 0</font>';	
		}else{	
		$persennilai4='<font style=font-size:12px><b>'.rupiah2($nilai4['angka_pembilang']).'</font>';		
		}
		}
		 
		$no++; 
		?> 
		<tr style="font-size:12px"> 
		<td align=center style=padding:8px 10px; valign=top ><?php echo $no ?></td> 
		<td style=padding:8px 10px; valign=top ><?php echo "IKK ".$cekikk['kode_ikk']." - ".$cekikk['uraian_outcome'] ?></td>  
		<td align=right style="padding:8px 10px;" valign=top ><?php echo $persennilai1 ?></td>  
		<td align=right style="padding:8px 10px;" valign=top ><?php echo $persennilai2 ?></td>   
		<td align=right style="padding:8px 10px;" valign=top ><?php echo $persennilai3 ?></td>   
		<td align=right style="padding:8px 10px;" valign=top ><?php echo $persennilai4 ?></td>   
		<td align=left style=padding:8px 10px; valign=top >Dinas Perindustrian dan Tenaga Kerja Kab. Brebes</td>   
        </tr>  
		<?php
		}
		?> 
		</table> 
<?php
}else{
?>	
		<table cellspacing="0"  cellpadding="2" border="0"  width="100%">
			<?php
			if ($_POST['iddata']=="all"){
			?>
			 <tr style="font-size:14px">
            	<td width="100%" align="center" style="text-transform: uppercase;"><b>URUSAN <?php echo $variabel2['nama_bidang'] ?> <br>
				DOKUMEN PENDUKUNG IKK OUTCOME TRIWULAN <?php echo $_POST['tri'] ?> <br> SEMUA INDIKATOR
				</td>
            </tr>   
			<?php
			}else{
			?>
		    <tr style="font-size:14px">
            	<td width="100%" align="center" style="text-transform: uppercase;"><b>URUSAN <?php echo $variabel2['nama_bidang'] ?> <br>
				DOKUMEN PENDUKUNG IKK OUTCOME TRIWULAN <?php echo $_POST['tri'] ?> <br> IKK
				<?php echo $variabel3['kode_ikk'] ?> 
				</td>
            </tr>   
			<tr style="font-size:14px">
            	<td width="100%" align="center" style="text-transform: uppercase;"><br><b><?php echo $variabel3['uraian_outcome'] ?> 
				</td>
            </tr> 
			<?php
			}
			?>
        </table> <p>
		<table cellspacing="0"  cellpadding="2" border="1" width="100%"> 
								<thead>
							<tr  style="font-size:12px" height=45> 
								<th width="3%" align=center style=padding:8px 10px;><b>NO</th> 
								<th width="28%" align=center  style=padding:8px 10px;><b>IKK</th> 
								<th width="35%" align=center  style=padding:8px 10px;><b>RUMUS</th> 
								<th width="15%" align=center  style=padding:8px 10px;><b>CAPAIAN <br>KINERJA</th> 
								<th width="20%" align=center  style=padding:8px 10px;><b>SUMBER <br>DATA</th>   
                            </tr> 
								</thead>
		<?php
		if ($_POST['iddata']=="all"){
		?>
		<?php 
		$no==0;
		if ($_POST['tri']==1){
		$tri="tri1";
		}else if ($_POST['tri']==2){
		$tri="tri2";
		}else if ($_POST['tri']==3){
		$tri="tri3";
		}else if ($_POST['tri']==4){
		$tri="tri4";
		}
		
		$data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ikk_bidang where id_bidang='".$_POST['id_bidang']."' and $tri=1 and tahun='$_SESSION[tahun]' order by id_data asc");
		while($cekdata=mysqli_fetch_array($data)){
		$cekikk=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_outcome where id_outcome='".$cekdata['id_data']."' and tahun='$_SESSION[tahun]'")); 
		$pembilang=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ouput_data where id='".$cekikk['pembilang']."' and tahun='$_SESSION[tahun]'")); 
		$pembagi=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ouput_data where id='".$cekikk['pembagi']."' and tahun='$_SESSION[tahun]'")); 
		
		$nilai=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1 where id_ikk='".$cekdata['id_ikk']."' and id_bidang='".$cekdata['id_bidang']."' and triwulan='".$_POST['tri']."' and tahun='".$cekdata['tahun']."'"));
		
		if ($cekikk['datapersen']==1){
		$rumus2='<font style=font-size:11px>'.'$  "'.rupiah2($nilai['angka_pembilang']).'" / "'.rupiah2($nilai['angka_pembagi']).'" &nbsp;x &nbsp;100% $'.'</font>';
		}else{
		$rumus2= 'Sudah Cukup Jelas';
		}
		
		if ($cekikk['datapersen']==1){
		$rumus1='('.$pembilang['uraian_data'].' <b>dibagi</b> <br>'.$pembagi['uraian_data'].')  <b>dikali</b> 100%';
		$totnilai=($nilai['angka_pembilang']/$nilai['angka_pembagi'])*100;
		if($nilai['angka_pembilang']==0 and $nilai['angka_pembagi']==0){
		$persennilai='<font style=font-size:12px><b> 0%</font>';	
		}elseif($nilai['angka_pembilang']>0 and $nilai['angka_pembagi']==0){
		$persennilai='<font style=font-size:12px><b> 0%</font>';	
		}else{
		$persennilai='<font style=font-size:12px><b>'.round($totnilai,2).'%</font>';	
		}
		}else{
		$rumus1= 'Sudah Cukup Jelas';	
		$persennilai='<font style=font-size:12px><b>'.rupiah2($nilai['angka_pembilang']).'</font>';	
		}
		 
		$no++; 
		?>
		<tr style="font-size:12px"> 
		<td align=center style=padding:8px 10px; valign=top ><?php echo $no ?></td> 
		<td style=padding:8px 10px; valign=top ><?php echo "IKK ".$cekikk['kode_ikk']." - ".$cekikk['uraian_outcome'] ?></td> 
		<td align=center style=padding:8px 10px; valign=top ><?php echo $rumus1 ?></td> 
		<td align=center style="padding:8px 10px;" valign=top ><?php echo $rumus2."<br><br>= ".$persennilai ?></td>  
		<td align=left style=padding:8px 10px; valign=top >Dinas Perindustrian dan Tenaga Kerja Kab. Brebes</td>   
        </tr> 
		<?php
		}
		?> 	
		
		<?php
		}else{
		?> 
		<?php 
		$no==0; 
		
		$cekikk=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_outcome where id_outcome='".$variabel['id_data']."' and tahun='$variabel[tahun]'")); 
		$pembilang=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ouput_data where id='".$cekikk['pembilang']."' and tahun='$_SESSION[tahun]'")); 
		$pembagi=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ouput_data where id='".$cekikk['pembagi']."' and tahun='$_SESSION[tahun]'")); 
		
		$nilai=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1 where id_ikk='".$variabel['id_ikk']."' and id_bidang='".$variabel['id_bidang']."' and triwulan='".$_POST['tri']."' and tahun='".$variabel['tahun']."'"));
		
		if ($cekikk['datapersen']==1){
		$rumus2='<font style=font-size:11px>'.'$  "'.rupiah2($nilai['angka_pembilang']).'" / "'.rupiah2($nilai['angka_pembagi']).'" &nbsp;x &nbsp;100% $'.'</font>';
		}else{
		$rumus2= 'Sudah Cukup Jelas';
		}
		
		if ($cekikk['datapersen']==1){
		$rumus1='('.$pembilang['uraian_data'].' <b>dibagi</b> <br>'.$pembagi['uraian_data'].')  <b>dikali</b> 100%';
		$totnilai=($nilai['angka_pembilang']/$nilai['angka_pembagi'])*100;
		if($nilai['angka_pembilang']==0 and $nilai['angka_pembagi']==0){
		$persennilai='<font style=font-size:12px><b> 0%</font>';	
		}elseif($nilai['angka_pembilang']>0 and $nilai['angka_pembagi']==0){
		$persennilai='<font style=font-size:12px><b> 0%</font>';	
		}else{
		$persennilai='<font style=font-size:12px><b>'.round($totnilai,2).'%</font>';	
		}
		}else{ 
		$rumus1= 'Sudah Cukup Jelas';
		$persennilai='<font style=font-size:12px><b>'.rupiah2($nilai['angka_pembilang']).'</font>';	 
		} 
		$no++; 
		?>
		<?php
		if ($_POST['tri']==1){
		if ($variabel['tri1']==1){
		?>
		<tr style="font-size:13px"> 
		<td align=center style=padding:8px 10px; valign=top ><?php echo $no ?></td> 
		<td style=padding:8px 10px; valign=top ><?php echo $cekikk['uraian_outcome'] ?></td> 
		<td align=center style=padding:8px 10px; valign=top ><?php echo $rumus1 ?></td> 
		<td align=center style="padding:8px 10px;" valign=top ><?php echo $rumus2."<br><br>= ".$persennilai ?></td>  
		<td align=left style=padding:8px 10px; valign=top >Dinas Perindustrian dan Tenaga Kerja Kab. Brebes</td>   
        </tr> 
		<?php
		}else{
		?>
		<tr style="font-size:13px"> 
		<td align=center style=padding:8px 10px; colspan=5 >Data tidak ditemukan.</td>  
        </tr> 
		<?php
		}}
		?>
		<?php
		if ($_POST['tri']==2){
		if ($variabel['tri2']==1){
		?>
		<tr style="font-size:13px"> 
		<td align=center style=padding:8px 10px; valign=top ><?php echo $no ?></td> 
		<td style=padding:8px 10px; valign=top ><?php echo $cekikk['uraian_outcome'] ?></td> 
		<td align=center style=padding:8px 10px; valign=top ><?php echo $rumus1 ?></td> 
		<td align=center style="padding:8px 10px;" valign=top ><?php echo $rumus2."<br><br>= ".$persennilai ?></td>  
		<td align=left style=padding:8px 10px; valign=top >Dinas Perindustrian dan Tenaga Kerja Kab. Brebes</td>   
        </tr> 
		<?php
		}else{
		?>
		<tr style="font-size:13px"> 
		<td align=center style=padding:8px 10px; colspan=5 >Data tidak ditemukan.</td>  
        </tr> 
		<?php
		}}
		?>
		
		<?php
		if ($_POST['tri']==3){
		if ($variabel['tri3']==1){
		?>
		<tr style="font-size:13px"> 
		<td align=center style=padding:8px 10px; valign=top ><?php echo $no ?></td> 
		<td style=padding:8px 10px; valign=top ><?php echo $cekikk['uraian_outcome'] ?></td> 
		<td align=center style=padding:8px 10px; valign=top ><?php echo $rumus1 ?></td> 
		<td align=center style="padding:8px 10px;" valign=top ><?php echo $rumus2."<br><br>= ".$persennilai ?></td>  
		<td align=left style=padding:8px 10px; valign=top >Dinas Perindustrian dan Tenaga Kerja Kab. Brebes</td>   
        </tr> 
		<?php
		}else{
		?>
		<tr style="font-size:13px"> 
		<td align=center style=padding:8px 10px; colspan=5 >Data tidak ditemukan.</td>  
        </tr> 
		<?php
		}}
		?>
		
		<?php
		if ($_POST['tri']==4){
		if ($variabel['tri4']==1){
		?>
		<tr style="font-size:13px"> 
		<td align=center style=padding:8px 10px; valign=top ><?php echo $no ?></td> 
		<td style=padding:8px 10px; valign=top ><?php echo $cekikk['uraian_outcome'] ?></td> 
		<td align=center style=padding:8px 10px; valign=top ><?php echo $rumus1 ?></td> 
		<td align=center style="padding:8px 10px;" valign=top ><?php echo $rumus2."<br><br>= ".$persennilai ?></td>  
		<td align=left style=padding:8px 10px; valign=top >Dinas Perindustrian dan Tenaga Kerja Kab. Brebes</td>   
        </tr> 
		<?php
		}else{
		?>
		<tr style="font-size:13px"> 
		<td align=center style=padding:8px 10px; colspan=5 >Data tidak ditemukan.</td>  
        </tr> 
		<?php
		}}
		?>
		<?php
		}
		?> 
		</table> 
	<?php
	}
	?>
 <br><br>
<table cellspacing="0"  cellpadding="1" border="0"  width="100%">
    <tr style="font-size:12px">
        <td width="50%"></td>
        <td width="50%" align="center" valign="top"> KEPALA DINAS PERINDUSTRIAN DAN <br>TENAGA KERJA KABUPATEN BREBES </td>
	</tr> 
	 
	<tr style="font-size:12px">
        <td width="50%"></td>
        <td width="50%" align="center"><br><br><br><br><br><b><?php echo $variabel4['nama_kepala'];?></td>
	</tr>        
    <tr style="font-size:12px">
        <td width="50%"></td>
        <td width="50%" align="center"><b>NIP. <?php echo $variabel4['nip'];?></td>
	</tr>  
</table> 
<script>
setTimeout(function() {
window.print() 
}, 250);
</script>
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
 