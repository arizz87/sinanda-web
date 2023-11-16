<html lang="en">
<script src="./modul/js/jquery-1.11.1.min.js"></script> 
<script type="text/javascript"></script>  
<head> 
</HEAD>
<BODY>
<?PHP 
$date=date("Y"); 

$rs = mysqli_query($GLOBALS["___mysqli_ston"],"select * from tb_bidang where id_bidang='$_SESSION[id_bidang]'");
$data = mysqli_fetch_array($rs);  

$hitung1=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ikk_bidang where id_bidang='$_SESSION[id_bidang]' and tahun='$_SESSION[tahun]' and tri1=1");
$jumlah_record1x=mysqli_num_rows($hitung1);

if ($jumlah_record1x==0){
$jumlah_record1="Belum dibuka";	
$bgcolor1="bg-danger";
}else{
$jumlah_record1=$jumlah_record1x." Data IKK";	
$bgcolor1="bg-success";
} 

$phitung1=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1 where id_bidang='$_SESSION[id_bidang]' and tahun='$_SESSION[tahun]' and triwulan=1");
$pjumlah_record1x=mysqli_num_rows($phitung1); 

$persentotaltri1x=($pjumlah_record1x/$jumlah_record1x)*100;
$persentotaltri1=round($persentotaltri1x,2);

if ($persentotaltri1 >=60){
$colorbmikk1="bg-success";
}else{
$colorbmikk1="bg-danger";
} 

$hitungdukung1=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_datadukung_bidang where id_bidang='$_SESSION[id_bidang]' and tahun='$_SESSION[tahun]' and posting=1");
$jumlah_recorddukung1x=mysqli_num_rows($hitungdukung1);

$pdhitung1=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_upload_data_tri1 where id_bidang='$_SESSION[id_bidang]' and tahun='$_SESSION[tahun]'");
$pdjumlah_record1x=mysqli_num_rows($pdhitung1);
 
$persentotaldukungtri1x=($pdjumlah_record1x/$jumlah_recorddukung1x)*100;
$persentotaldukungtri1=round($persentotaldukungtri1x,2); 
 
if ($persentotaldukungtri1 >=60){
$colorbmdukung1="bg-success";
}else{
$colorbmdukung1="bg-danger";
}

$hitung2=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ikk_bidang where id_bidang='$_SESSION[id_bidang]' and tahun='$_SESSION[tahun]' and tri2=1");
$jumlah_record2x=mysqli_num_rows($hitung2); 

if ($jumlah_record2x==0){
$jumlah_record2="Belum dibuka";	
$bgcolor2="bg-danger";
}else{
$jumlah_record2=$jumlah_record2x." Data IKK";	
$bgcolor2="bg-success";
} 

$phitung2=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1 where id_bidang='$_SESSION[id_bidang]' and tahun='$_SESSION[tahun]' and triwulan=2");
$pjumlah_record2x=mysqli_num_rows($phitung2); 

$persentotaltri2x=($pjumlah_record2x/$jumlah_record2x)*100;
$persentotaltri2=round($persentotaltri2x,2);

if ($persentotaltri2 >=60){
$colorbmikk2="bg-success";
}else{
$colorbmikk2="bg-danger";
} 

$hitungdukung2=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_datadukung_bidang where id_bidang='$_SESSION[id_bidang]' and tahun='$_SESSION[tahun]' and posting=1");
$jumlah_recorddukung2x=mysqli_num_rows($hitungdukung2);

$pdhitung2=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_upload_data_tri1 where id_bidang='$_SESSION[id_bidang]' and tahun='$_SESSION[tahun]'");
$pdjumlah_record2x=mysqli_num_rows($pdhitung2);
 
$persentotaldukungtri2x=($pdjumlah_record2x/$jumlah_recorddukung2x)*100;
$persentotaldukungtri2=round($persentotaldukungtri2x,2); 
 
if ($persentotaldukungtri2 >=60){
$colorbmdukung2="bg-success";
}else{
$colorbmdukung2="bg-danger";
}

$hitung3=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ikk_bidang where id_bidang='$_SESSION[id_bidang]' and tahun='$_SESSION[tahun]' and tri3=1");
$jumlah_record3x=mysqli_num_rows($hitung3); 

if ($jumlah_record3x==0){
$jumlah_record3="Belum dibuka";	
$bgcolor3="bg-danger";
}else{
$jumlah_record3=$jumlah_record3x." Data IKK";	
$bgcolor3="bg-success";
} 

$phitung3=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1 where id_bidang='$_SESSION[id_bidang]' and tahun='$_SESSION[tahun]' and triwulan=3");
$pjumlah_record3x=mysqli_num_rows($phitung3); 

$persentotaltri3x=($pjumlah_record3x/$jumlah_record3x)*100;
$persentotaltri3=round($persentotaltri3x,2);

if ($persentotaltri3 >=60){
$colorbmikk3="bg-success";
}else{
$colorbmikk3="bg-danger";
} 

$hitungdukung3=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_datadukung_bidang where id_bidang='$_SESSION[id_bidang]' and tahun='$_SESSION[tahun]' and posting=1");
$jumlah_recorddukung3x=mysqli_num_rows($hitungdukung3);

$pdhitung3=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_upload_data_tri1 where id_bidang='$_SESSION[id_bidang]' and tahun='$_SESSION[tahun]'");
$pdjumlah_record3x=mysqli_num_rows($pdhitung3);
 
$persentotaldukungtri3x=($pdjumlah_record3x/$jumlah_recorddukung3x)*100;
$persentotaldukungtri3=round($persentotaldukungtri3x,2); 
 
if ($persentotaldukungtri3 >=60){
$colorbmdukung3="bg-success";
}else{
$colorbmdukung3="bg-danger";
}

$hitung4=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ikk_bidang where id_bidang='$_SESSION[id_bidang]' and tahun='$_SESSION[tahun]' and tri4=1");
$jumlah_record4x=mysqli_num_rows($hitung4); 

if ($jumlah_record4x==0){
$jumlah_record4="Belum dibuka";	
$bgcolor4="bg-danger";
}else{
$jumlah_record4=$jumlah_record4x." Data IKK";	
$bgcolor4="bg-success";
} 

$phitung4=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1 where id_bidang='$_SESSION[id_bidang]' and tahun='$_SESSION[tahun]' and triwulan=4");
$pjumlah_record4x=mysqli_num_rows($phitung4); 

$persentotaltri4x=($pjumlah_record4x/$jumlah_record4x)*100;
$persentotaltri4=round($persentotaltri4x,2);

if ($persentotaltri4 >=60){
$colorbmikk4="bg-success";
}else{
$colorbmikk4="bg-danger";
} 

$hitungdukung4=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_datadukung_bidang where id_bidang='$_SESSION[id_bidang]' and tahun='$_SESSION[tahun]' and posting=1");
$jumlah_recorddukung4x=mysqli_num_rows($hitungdukung4);

$pdhitung4=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_upload_data_tri1 where id_bidang='$_SESSION[id_bidang]' and tahun='$_SESSION[tahun]'");
$pdjumlah_record4x=mysqli_num_rows($pdhitung4);
 
$persentotaldukungtri4x=($pdjumlah_record4x/$jumlah_recorddukung4x)*100;
$persentotaldukungtri4=round($persentotaldukungtri4x,2); 
 
if ($persentotaldukungtri4 >=60){
$colorbmdukung4="bg-success";
}else{
$colorbmdukung4="bg-danger";
}
?>   
	<div class="card"> 
              <div class="card-body bg-secondary">  
						<div class="col-sm-9">  <font style="font-size:18px;color:white"><b><?php echo $data['nama_bidang'] ?> </font>
						<font style="font-size:12px;color:white"><br><i>Tanggal Login : <?php
						date_default_timezone_set('Asia/Jakarta');	
						echo tgl_indonesia(date("Y-m-d")) ?> - <?php echo date("H:i:s") ?> WIB  </i></b></font>
							</div> 
            </div>
			</div> 
	 <div class="card">
              <div class="card-body bg-default"> 
               <div class="row">  
		   <div class="col-lg-6 col-6">
            <!-- small box -->
             <div class="small-box bg-primary">
            <?php 
			 if ($jumlah_record1x==0){
			?>
              <div class="inner" align=right> 
                <font style=font-size:14px>&nbsp;<p>
			   </font> <font style=font-size:14px>&nbsp;<p>	
			  </font> 
            </div> 
			<?PHP
			 }else{
			?>
			  <div class="inner" align=right> 
              <font style=font-size:12px><b>Keterisian Data IKK:</b> <span class="badge <?php echo $colorbmikk1 ?>" style="font-size:11px"><?php echo $persentotaltri1 ?>%</span><p>
			   </font> <font style=font-size:12px><b>Keterisian Data Dukung:</b> <span class="badge <?php echo $colorbmdukung1 ?>" style="font-size:11px"><?php echo $persentotaldukungtri1 ?>%</span><p>	
			  </font> 
            </div> 
			<?PHP
			 }
			 ?>
			<div class="inner">  
            </div>   
             <div class="small-box bg-success">
              <!-- Loading (remove the following to stop the loading)-->
              <div class="overlay">
			  <p class="text-light text-x1 animate__animated animate__rubberBand"> 
			  <i class="fas fa-3x fa-database"></i>
			  </p>&nbsp;&nbsp; 
			<span class="pull-right badge <?php echo $bgcolor1 ?>"><?php echo $jumlah_record1 ?></span>
              </div>
              <!-- end loading -->
               
            </div> 
			<div class="inner" align=center>
            <p><b>Data Triwulan 1 <br> </b></p> 
            </div>  
            <a href="data-triwulan1" class="small-box-footer">Masuk <i class="fa fa-arrow-circle-right"></i></a>
          </div>	
          </div>   
		   <div class="col-lg-6 col-6">
            <!-- small box -->
             <div class="small-box bg-purple">
            <?php 
			 if ($jumlah_record2x==0){
			?>
               <div class="inner" align=right> 
                <font style=font-size:14px>&nbsp;<p>
			   </font> <font style=font-size:14px>&nbsp;<p>	
			  </font> 
            </div> 
			<?PHP
			 }else{
			?>
			  <div class="inner" align=right> 
              <font style=font-size:12px><b>Keterisian Data IKK:</b> <span class="badge <?php echo $colorbmikk2 ?>" style="font-size:11px"><?php echo $persentotaltri2 ?>%</span><p>
			   </font> <font style=font-size:12px><b>Keterisian Data Dukung:</b> <span class="badge <?php echo $colorbmdukung2 ?>" style="font-size:11px"><?php echo $persentotaldukungtri2 ?>%</span><p>	
			  </font> 
            </div> 
			<?PHP
			 }
			 ?>
			<div class="inner">  
            </div>   
             <div class="small-box bg-success">
              <!-- Loading (remove the following to stop the loading)-->
              <div class="overlay">
			  <p class="text-light text-x1 animate__animated animate__rubberBand"> 
			  <i class="fas fa-3x fa-database"></i>
			  </p>&nbsp;&nbsp; 
			<span class="pull-right badge <?php echo $bgcolor2 ?>"><?php echo $jumlah_record2 ?></span>
              </div>
              <!-- end loading -->
               
            </div> 
			<div class="inner" align=center>
            <p><b>Data Triwulan 2 <br> </b></p> 
            </div>  
            <a href="data-triwulan2" class="small-box-footer">Masuk <i class="fa fa-arrow-circle-right"></i></a>
          </div>	
          </div>   
		   <div class="col-lg-6 col-6">
            <!-- small box -->
             <div class="small-box bg-pink">
              <?php 
			 if ($jumlah_record3x==0){
			?>
            <div class="inner" align=right> 
                  <font style=font-size:14px>&nbsp;<p>
			   </font> <font style=font-size:14px>&nbsp;<p>	
			  </font>  
            </div> 
			<?PHP
			 }else{
			?>
			  <div class="inner" align=right> 
              <font style=font-size:12px><b>Keterisian Data IKK:</b> <span class="badge <?php echo $colorbmikk3 ?>" style="font-size:11px"><?php echo $persentotaltri3 ?>%</span><p>
			   </font> <font style=font-size:12px><b>Keterisian Data Dukung:</b> <span class="badge <?php echo $colorbmdukung3 ?>" style="font-size:11px"><?php echo $persentotaldukungtri3 ?>%</span><p>	
			  </font> 
            </div> 
			<?PHP
			 }
			 ?>
			<div class="inner">  
            </div>   
             <div class="small-box bg-success">
              <!-- Loading (remove the following to stop the loading)-->
              <div class="overlay">
			  <p class="text-light text-x1 animate__animated animate__rubberBand"> 
			  <i class="fas fa-3x fa-database"></i>
			  </p>&nbsp;&nbsp; 
			<span class="pull-right badge <?php echo $bgcolor3 ?>"><?php echo $jumlah_record3 ?></span>
              </div>
              <!-- end loading -->
               
            </div> 
			<div class="inner" align=center>
            <p><b>Data Triwulan 3 <br> </b></p> 
            </div>  
           <a href="data-triwulan3" class="small-box-footer">Masuk <i class="fa fa-arrow-circle-right"></i></a>
          </div>	
          </div>
		   <div class="col-lg-6 col-6">
            <!-- small box -->
             <div class="small-box bg-orange">
			 <?php 
			 if ($jumlah_record4x==0){
			?>
              <div class="inner" align=right> 
              <font style=font-size:14px>&nbsp;<p>
			   </font> <font style=font-size:14px>&nbsp;<p>	
			  </font> 
            </div> 
			<?PHP
			 }else{
			?>
			  <div class="inner" align=right> 
              <font style=font-size:12px><b>Keterisian Data IKK:</b> <span class="badge <?php echo $colorbmikk4 ?>" style="font-size:11px"><?php echo $persentotaltri4 ?>%</span><p>
			   </font> <font style=font-size:12px><b>Keterisian Data Dukung:</b> <span class="badge <?php echo $colorbmdukung4 ?>" style="font-size:11px"><?php echo $persentotaldukungtri4 ?>%</span><p>	
			  </font> 
            </div> 
			<?PHP
			 }
			 ?>
			<div class="inner">  
            </div>  
             <div class="small-box bg-success">
              <!-- Loading (remove the following to stop the loading)-->
              <div class="overlay">
			  <p class="text-light text-x1 animate__animated animate__rubberBand"> 
			  <i class="fas fa-3x fa-database"></i>
			  </p>&nbsp;&nbsp;
			<span class="pull-right badge <?php echo $bgcolor4 ?>"><?php echo $jumlah_record4 ?></span>
              </div>
              <!-- end loading -->
               
            </div> 
			<div class="inner" align=center>
            <p><b>Data Triwulan 4</b></p> 
            </div>  
           <a href="data-triwulan4" class="small-box-footer">Masuk <i class="fa fa-arrow-circle-right"></i></a>
          </div>		
          </div>  
            <!-- /.card -->
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
</BODY>
</HTML>  
<?PHP
