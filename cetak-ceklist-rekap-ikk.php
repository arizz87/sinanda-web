<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">   
<style> 
@page {
    size: 33cm 21.50cm;
    margin: 2cm 2cm 2cm 2cm; /* change the margins as you want them to be. */
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

$idcetak=$_POST['idcetak'];	
$variabel=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_bidang where id_bidang='".$idcetak."'")); 
$variabel2=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_auditor,tb_bulan where tb_auditor.bulan=tb_bulan.kd_bulan and auditor='".$auditor."'")); 
									
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
		<table cellspacing="0"  cellpadding="2" border="0"  width="100%">
		    <tr style="font-size:14px">
            	<td width="100%" align="center"><b>CEKLIST REKAP DATA IKK BIDANG</b> </td>
            </tr>    
        </table><br>
		<table cellspacing="0"  cellpadding="0" border="0" width="100%">
							<tr  style="font-size:12px"> 
								<td width="10%" style=padding:4px 10px;>Nama Bidang</td> 
								<td width="90%" style=padding:4px 10px;>: <?php echo $variabel['nama_bidang'] ?></td>
                            </tr> 
							<tr  style="font-size:12px"> 
								<td width="10%" style=padding:4px 10px;>Kepala Bidang</td> 
								<td width="90%" style=padding:4px 10px;>: <?php echo $variabel['nama_kabid'] ?></td>
                            </tr>  
							<tr  style="font-size:12px"> 
								<td width="10%" style=padding:4px 10px;>N I P</td> 
								<td width="90%" style=padding:4px 10px;>: <?php echo $variabel['nip_kabid'] ?></td>
                            </tr> 
		</table> <p>
		<table cellspacing="0"  cellpadding="2" border="1" width="100%"> 
								<thead>
							<tr  style="font-size:12px" height=45> 
								<th width="3%" align=center style=padding:8px 10px;><b>No</th> 
								<th width="32%" align=center  style=padding:8px 10px;><b>Uraian Data IKK</th> 
								<th width="55%" align=center  style=padding:8px 10px;><b>Rumus IKK</th>  
                            </tr> 
								</thead>
		<?php 
		$no==0;
		$data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ikk_bidang where id_bidang='".$variabel['id_bidang']."' and tahun='$_SESSION[tahun]' order by id_data asc");
		while($cekdata=mysqli_fetch_array($data)){
		$cekikk=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_outcome where id_outcome='".$cekdata['id_data']."' and tahun='$_SESSION[tahun]'")); 
		$pembilang=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ouput_data where id='".$cekikk['pembilang']."' and tahun='$_SESSION[tahun]'")); 
		$pembagi=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ouput_data where id='".$cekikk['pembagi']."' and tahun='$_SESSION[tahun]'")); 
		if ($cekikk['datapersen']==1){
		$rumus='$  "'.$pembilang['uraian_data'].'" / "'.$pembagi['uraian_data'].'" &nbsp;x &nbsp;100% $';
		}else{
		$rumus=	'$ "Sudah Cukup Jelas" $';	
		}
		$no++; 
		?>
		<tr style="font-size:12px"> 
		<td align=center style=padding:8px 10px;><?php echo $no ?></td> 
		<td style=padding:8px 10px;><?php echo "IKK ".$cekikk['kode_ikk']." - ".$cekikk['uraian_outcome'] ?></td> 
		<td align=center style=padding:8px 10px;><?php echo $rumus ?></td>  
        </tr> 
		<?php
		}
		?>
		</table><br><p>
		<font style=font-size:12px><b>&raquo; Data Dukung IKK Bidang</b></font><p>
		<table cellspacing="0"  cellpadding="2" border="1" width="80%"> 
								<thead>
							<tr  style="font-size:12px" height=45> 
								<th width="3%" align=center style=padding:8px 10px;><b>No</th> 
								<th width="72%" align=center  style=padding:8px 10px;><b>Uraian Data Dukung</th>  
								<th width="25%" align=center  style=padding:8px 10px;><b>Kode Data</th>  
                            </tr> 
								</thead>
		<?php
		$hitung=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_datadukung_bidang where tahun='$_SESSION[tahun]' and id_bidang='$_POST[idcetak]' and posting=1");
		$jumlah_record=mysqli_num_rows($hitung); 	
		if ($jumlah_record==0){
		?>
		<tr height=35> 
		<td colspan=7><center>Tidak ada data dukung</td> 
		</tr> 
		<?php
		}else{ 
		$nox==0;
		$data2=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_datadukung_bidang where id_bidang='".$variabel['id_bidang']."' and tahun='$_SESSION[tahun]' and posting=1");
		while($cekdata2=mysqli_fetch_array($data2)){
		$cekdukung=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ouput_data where id='".$cekdata2['id_data']."' and tahun='$_SESSION[tahun]'"));  
		 
		$nox++; 
		?>
		<tr style="font-size:12px"> 
		<td align=center style=padding:8px 10px;><?php echo $nox ?></td> 
		<td style=padding:8px 10px;><?php echo $cekdukung['uraian_data'] ?></td>   
		<td style=padding:8px 10px;><center><?php echo $cekdukung['kode_data'] ?></td>  
        </tr> 
		<?php
		}}
		?>
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
 