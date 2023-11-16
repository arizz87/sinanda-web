<html lang="en">
<script src="./modul/js/jquery-1.11.1.min.js"></script> 
<script type="text/javascript"></script> 
<script src="modul/js/anggaran.js"></script>
<script src="js/chart.umd.min.js"></script>  
<head> 
</HEAD>
<BODY>
<?PHP
//print_r($_SESSION);
$date=date("Y");
?>
<?php
$kdkegiatan=$_GET['kdkegiatan'];
$kdsubkegiatan=$_GET['kdsubkegiatan'];
$carisubkegiatan=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM tb_subkegiatan where kdsubkegiatan='".$_GET['kdsubkegiatan']."'"));
 
$tglusul=date('d-m-Y');	
?> 
 
<div class="card card-default"> 	
 <div class="row">
<div class="col-lg-6">
              <div class="card-body bg-default">  
			   <div class="card bg-gradient-default" style="position: relative; left: 0px; top: 0px;">
              
			  <div class="card-header border-0 ui-sortable-handle" >  
			   <h3 class="card-title">
                <i class="fas fa-chart-line mr-1"></i> 
                  Grafik Realisasi IKK Per Triwulan Tahun <?php echo $_SESSION['tahun'] ?>
                </h3>
				
				<h3 class="card-title"> 
                 <font style="font-size:44px">&nbsp;</font>
                </h3>
			 <canvas id="horizontal-stacker-bar-chart" ></canvas>
              </div>
            </div></div> 
			 <div class="row">
			<div class="col-lg-12">
			 <div class="card-body bg-default">  
			   <div class="card bg-gradient-default" style="position: relative; left: 0px; top: 0px;">
              
			  <div class="card-header border-0 ui-sortable-handle" > 
			  <h3 class="card-title">
               
                <i class="fas fa-chart-line mr-1"></i>
                  Grafik Realisasi Triwulan Per IKK Tahun <?php echo $_SESSION['tahun'] ?>
                </h3><br><br>
			<canvas id="canvas"></canvas> 
              </div>
            </div></div></div> 
			 
			
			</div>
			</div>
			<div class="col-lg-6">
              <div class="card-body bg-default">  
			  <div class="card bg-gradient-default" style="position: relative; left: 0px; top: 0px;">
              
			  <div class="card-header border-0 ui-sortable-handle" > 
			  
			   <div class="row">
			   
				<div class="col-lg-12">
			   <h3 class="card-title">
                <i class="fas fa-th mr-1"></i>
				
                     Progress Keterisian Realisasi Tahun <?php echo $_SESSION['tahun'] ?>
				 </div> </div>
                </h3> 
				<br> 
			 <table id="examplex" class="table table-striped table-bordered" cellspacing="0" width="100%">
									<thead>
									  <tr style="font-size:12px"> 
										<th style="width:38%;"><center>Nama Bidang</center></th>
										<th style="width:12%;"><center>Keterisian<br>Triwulan 1</center></th> 
										<th style="width:12%;"><center>Keterisian<br>Triwulan 2</center></th> 
										<th style="width:12%;"><center>Keterisian<br>Triwulan 3</center></th> 
										<th style="width:12%;"><center>Keterisian<br>Triwulan 4</center></th>  										  
									  </tr>
									</thead>
												<?php
												$no==0;
												$data=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_bidang order by id_bidang");
												while($cekdata=mysqli_fetch_array($data)){
												 $no++; 
												  $hitung1=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ikk_bidang where id_bidang='$cekdata[id_bidang]' and tahun='$_SESSION[tahun]' and tri1=1");
												 $jumlah_record1x=mysqli_num_rows($hitung1);

												 $phitung1=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1 where id_bidang='$cekdata[id_bidang]' and tahun='$_SESSION[tahun]' and triwulan=1");
												 $pjumlah_record1x=mysqli_num_rows($phitung1); 

												 $persentotaltri1x=($pjumlah_record1x/$jumlah_record1x)*100;
												 $persentotaltri1=round($persentotaltri1x,2);
											
												if ($jumlah_record1x==0){
												$datatri1='<span style="font-size:11px;color:white"><b>0%</span>';	
												$bgcolor1='bgcolor=#F08080';	
												}else{
												if ($persentotaltri1 >=60){
												$datatri1='<span style="font-size:11px;">'.$persentotaltri1.'%</span>';
												$bgcolor1='bgcolor=#40E0D0';
												}else{
												$datatri1='<span style="font-size:11px;color:white"><b>'.$persentotaltri1.'%</span>';
												$bgcolor1='bgcolor=#F08080';
												}
												}
												 
												 $hitung2=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ikk_bidang where id_bidang='$cekdata[id_bidang]' and tahun='$_SESSION[tahun]' and tri2=1");
												 $jumlah_record2x=mysqli_num_rows($hitung2);
												 $phitung2=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1 where id_bidang='$cekdata[id_bidang]' and tahun='$_SESSION[tahun]' and triwulan=2");
												 $pjumlah_record2x=mysqli_num_rows($phitung2); 

												 $persentotaltri2x=($pjumlah_record2x/$jumlah_record2x)*100;
												 $persentotaltri2=round($persentotaltri2x,2);
											
												if ($jumlah_record2x==0){
												$datatri2='<span style="font-size:11px;color:white"><b>0%</span>';	
												$bgcolor2='bgcolor=#F08080';	
												}else{
												if ($persentotaltri2 >=60){
												$datatri2='<span style="font-size:11px;">'.$persentotaltri2.'%</span>';
												$bgcolor2='bgcolor=#40E0D0';
												}else{
												$datatri2='<span style="font-size:11px;color:white"><b>'.$persentotaltri2.'%</span>';
												$bgcolor2='bgcolor=#F08080';
												}
												}
												 $hitung3=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ikk_bidang where id_bidang='$cekdata[id_bidang]' and tahun='$_SESSION[tahun]' and tri3=1");
												 $jumlah_record3x=mysqli_num_rows($hitung3);
												 $phitung3=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1 where id_bidang='$cekdata[id_bidang]' and tahun='$_SESSION[tahun]' and triwulan=3");
												 $pjumlah_record3x=mysqli_num_rows($phitung3); 

												 $persentotaltri3x=($pjumlah_record3x/$jumlah_record3x)*100;
												 $persentotaltri3=round($persentotaltri3x,2);
											
												if ($jumlah_record3x==0){
												$datatri3='<span style="font-size:11px;color:white"><b>0%</span>';	
												$bgcolor3='bgcolor=#F08080';	
												}else{
												if ($persentotaltri3 >=60){
												$datatri3='<span style="font-size:11px;">'.$persentotaltri3.'%</span>';
												$bgcolor3='bgcolor=#40E0D0';
												}else{
												$datatri3='<span style="font-size:11px;color:white"><b>'.$persentotaltri3.'%</span>';
												$bgcolor3='bgcolor=#F08080';
												}
												}
												 $hitung4=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ikk_bidang where id_bidang='$cekdata[id_bidang]' and tahun='$_SESSION[tahun]' and tri4=1");
												 $jumlah_record4x=mysqli_num_rows($hitung4);
												 $phitung4=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1 where id_bidang='$cekdata[id_bidang]' and tahun='$_SESSION[tahun]' and triwulan=4");
												 $pjumlah_record4x=mysqli_num_rows($phitung4); 

												 $persentotaltri4x=($pjumlah_record4x/$jumlah_record4x)*100;
												 $persentotaltri4=round($persentotaltri4x,2);
											
												if ($jumlah_record4x==0){
												$datatri4='<span style="font-size:11px;color:white"><b>0%</span>';	
												$bgcolor4='bgcolor=#F08080';	
												}else{
												if ($persentotaltri1 >=60){
												$datatri4='<span style="font-size:11px;">'.$persentotaltri4.'%</span>';
												$bgcolor4='bgcolor=#40E0D0';
												}else{
												$datatri4='<span style="font-size:11px;color:white"><b>'.$persentotaltri4.'%</span>';
												$bgcolor4='bgcolor=#F08080';
												}
												}
												?> 			
												<tr style="font-size:12px"> 
												<td><?php echo $cekdata['nama_bidang'] ?></td>
												<td align=right <?php echo $bgcolor1 ?>><?php echo $datatri1 ?></td> 
												<td align=right <?php echo $bgcolor2 ?>><?php echo  $datatri2 ?></td>
												<td align=right <?php echo $bgcolor3 ?>><?php echo  $datatri3 ?></td>
												<td align=right <?php echo $bgcolor4 ?>><?php echo  $datatri4 ?></td>
												</tr> 
									<?php } ?>
								  </table>
              </div> </div></div>
			  <div class="card-body bg-default">  
			  <div class="card bg-gradient-default" style="position: relative; left: 0px; top: 0px;">
              
			  <div class="card-header border-0 ui-sortable-handle" > 
			  
			   <div class="row">
			   
				<div class="col-lg-12">
			   <h3 class="card-title">
                <i class="fas fa-th mr-1"></i> 
                     Progress Realisai IKK Triwulan Tahun <?php echo $_SESSION['tahun'] ?>
				 </div> </div>
                </h3> 
				<br> 
			 <table id="examplex" class="table table-striped table-bordered" cellspacing="0" width="100%">
									<thead>
									  <tr style="font-size:12px"> 
										<th style="width:38%;"><center>Uraian Data IKK</center></th>
										<th style="width:12%;"><center>Triwulan <br> 1</center></th> 
										<th style="width:12%;"><center>Triwulan <br> 2</center></th> 
										<th style="width:12%;"><center>Triwulan <br> 3</center></th> 
										<th style="width:12%;"><center>Triwulan <br> 4</center></th>  										  
									  </tr>
									</thead>
									<?php
									$hitung=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ikk_bidang where tahun='$_SESSION[tahun]'");
									$jumlah_record=mysqli_num_rows($hitung); 	
									if ($jumlah_record==0){
									?>
									<tr> 
									<td colspan=5 style=font-size:13px><center>Data tidak ditemukan</td> 
									</tr> 
									<?php
									}else{
									 
												$no==0;
												$data2=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_outcome,tb_ikk_bidang where tb_outcome.id_outcome=tb_ikk_bidang.id_data and tb_ikk_bidang.tahun='$_SESSION[tahun]' order by tb_outcome.id_outcome");
												while($caridata=mysqli_fetch_array($data2)){
												 $no++; 
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
												
												if ($persennilai1 >=60){
												$datatri1='<span style="font-size:11px;">'.$persennilai1.'%</span>';
												$bgcolors1='bgcolor=#40E0D0';	
												}else{
												$datatri1='<span style="font-size:11px;color:white"><b>'.$persennilai1.'%</span>';
												$bgcolors1='bgcolor=#F08080';	
												}
												if ($persennilai2 >=60){
												$datatri2='<span style="font-size:11px;">'.$persennilai2.'%</span>';
												$bgcolors2='bgcolor=#40E0D0';	
												}else{
												$datatri2='<span style="font-size:11px;color:white"><b>'.$persennilai2.'%</span>';
												$bgcolors2='bgcolor=#F08080';	
												}
												if ($persennilai3 >=60){
												$datatri3='<span style="font-size:11px;">'.$persennilai3.'%</span>';
												$bgcolors3='bgcolor=#40E0D0';	
												}else{
												$datatri3='<span style="font-size:11px;color:white"><b>'.$persennilai3.'%</span>';
												$bgcolors3='bgcolor=#F08080';	
												}
												if ($persennilai4 >=60){
												$datatri4='<span style="font-size:11px;">'.$persennilai4.'%</span>';
												$bgcolors4='bgcolor=#40E0D0';	
												}else{
												$datatri4='<span style="font-size:11px;color:white"><b>'.$persennilai4.'%</span>';
												$bgcolors4='bgcolor=#F08080';	
												}
												}else{
												$nilai1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1,tb_ikk_bidang where tb_nilai_ikk_tri1.id_ikk=tb_ikk_bidang.id_ikk and tb_ikk_bidang.tri1=1 and tb_nilai_ikk_tri1.id_ikk='".$caridata['id_ikk']."' and tb_nilai_ikk_tri1.id_bidang='".$caridata['id_bidang']."' and tb_nilai_ikk_tri1.triwulan=1  and tb_nilai_ikk_tri1.tahun='".$_SESSION['tahun']."'"));  
												$nilai2=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1,tb_ikk_bidang where tb_nilai_ikk_tri1.id_ikk=tb_ikk_bidang.id_ikk and tb_ikk_bidang.tri2=1 and tb_nilai_ikk_tri1.id_ikk='".$caridata['id_ikk']."' and tb_nilai_ikk_tri1.id_bidang='".$caridata['id_bidang']."' and tb_nilai_ikk_tri1.triwulan=2  and tb_nilai_ikk_tri1.tahun='".$_SESSION['tahun']."'"));  
												$nilai3=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1,tb_ikk_bidang where tb_nilai_ikk_tri1.id_ikk=tb_ikk_bidang.id_ikk and tb_ikk_bidang.tri3=1 and tb_nilai_ikk_tri1.id_ikk='".$caridata['id_ikk']."' and tb_nilai_ikk_tri1.id_bidang='".$caridata['id_bidang']."' and tb_nilai_ikk_tri1.triwulan=3  and tb_nilai_ikk_tri1.tahun='".$_SESSION['tahun']."'"));  
												$nilai4=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1,tb_ikk_bidang where tb_nilai_ikk_tri1.id_ikk=tb_ikk_bidang.id_ikk and tb_ikk_bidang.tri4=1 and tb_nilai_ikk_tri1.id_ikk='".$caridata['id_ikk']."' and tb_nilai_ikk_tri1.id_bidang='".$caridata['id_bidang']."' and tb_nilai_ikk_tri1.triwulan=4  and tb_nilai_ikk_tri1.tahun='".$_SESSION['tahun']."'"));  
												if ($nilai1['angka_pembilang']==0){
												$datatri1='<span style="font-size:11px;color:white"><b>'.rupiah2($nilai1['angka_pembilang']).'</span>';  
												$bgcolors1='bgcolor=#F08080';	
												}else{
												$datatri1='<span style="font-size:11px;">'.rupiah2($nilai1['angka_pembilang']).'</span>'; 
												$bgcolors1='bgcolor=#40E0D0';											
												}
												if ($nilai2['angka_pembilang']==0){
												$datatri2='<span style="font-size:11px;color:white"><b>'.rupiah2($nilai2['angka_pembilang']).'</span>';  
												$bgcolors2='bgcolor=#F08080';	
												}else{
												$datatri2='<span style="font-size:11px;">'.rupiah2($nilai2['angka_pembilang']).'</span>'; 
												$bgcolors2='bgcolor=#40E0D0';												
												}
												if ($nilai3['angka_pembilang']==0){
												$datatri3='<span style="font-size:11px;color:white"><b>'.rupiah2($nilai3['angka_pembilang']).'</span>';  
												$bgcolors3='bgcolor=#F08080';	
												}else{
												$datatri3='<span style="font-size:11px;">'.rupiah2($nilai3['angka_pembilang']).'</span>'; 
												$bgcolors3='bgcolor=#40E0D0';												
												}
												if ($nilai4['angka_pembilang']==0){
												$datatri4='<span style="font-size:11px;color:white"><b>'.rupiah2($nilai4['angka_pembilang']).'</span>';  
												$bgcolors4='bgcolor=#F08080';	
												}else{
												$datatri4='<span style="font-size:11px;">'.rupiah2($nilai4['angka_pembilang']).'</span>'; 
												$bgcolors4='bgcolor=#40E0D0';												
												}
												}
		
												?> 			
												<tr style="font-size:12px"> 
												<td><?php echo "<b>IKK ".$cekdata['kode_ikk']." - </b>".$cekdata['uraian_outcome'] ?></td>
												<td align=right <?php echo $bgcolors1 ?>><?php echo $datatri1 ?></td> 
												<td align=right <?php echo $bgcolors2 ?>><?php echo  $datatri2 ?></td>
												<td align=right <?php echo $bgcolors3 ?>><?php echo  $datatri3 ?></td>
												<td align=right <?php echo $bgcolors4 ?>><?php echo  $datatri4 ?></td>
												</tr> 
									<?php }} ?>
								  </table>
              </div> </div></div>
            </div>
			</div>	
</div>	
<script>
		var ctx = document.getElementById("horizontal-stacker-bar-chart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: [<?php
				$no1==0;
				$data1=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM  tb_ikk_bidang,tb_outcome where  tb_ikk_bidang.id_data=tb_outcome.id_outcome and tb_ikk_bidang.tahun='$_SESSION[tahun]' and tb_outcome.datapersen=1 order by tb_ikk_bidang.id_data asc");
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
				$dataw1=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM  tb_ikk_bidang,tb_outcome where  tb_ikk_bidang.id_data=tb_outcome.id_outcome and tb_ikk_bidang.tahun='$_SESSION[tahun]' and tb_outcome.datapersen=1 order by tb_ikk_bidang.id_data asc");
				while($cekdataw1=mysqli_fetch_array($dataw1)){
				$rstw1=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1,tb_ikk_bidang where tb_nilai_ikk_tri1.id_ikk=tb_ikk_bidang.id_ikk and tb_ikk_bidang.tri1=1 and tb_nilai_ikk_tri1.id_ikk='".$cekdataw1['id_ikk']."' and tb_nilai_ikk_tri1.triwulan=1");  
				$cektw1 = mysqli_fetch_array($rstw1); 
				$persentw1x=($cektw1['angka_pembilang']/$cektw1['angka_pembagi'])*100; 
				$persentw1=round($persentw1x,2);	
				$no1++;	
				$list="IKK ".$no1;
				echo "'".$persentw1."',";
				}
				?>
					],
				}, {
					label: 'Triwulan 2',
					backgroundColor: "#FCDDB0",
					data: [<?php
				$no1==0;
				$dataw2=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM  tb_ikk_bidang,tb_outcome where  tb_ikk_bidang.id_data=tb_outcome.id_outcome and tb_ikk_bidang.tahun='$_SESSION[tahun]' and tb_outcome.datapersen=1 order by tb_ikk_bidang.id_data asc");
				while($cekdataw2=mysqli_fetch_array($dataw2)){
				$rstw2=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1,tb_ikk_bidang where tb_nilai_ikk_tri1.id_ikk=tb_ikk_bidang.id_ikk and tb_ikk_bidang.tri2=1 and tb_nilai_ikk_tri1.id_ikk='".$cekdataw2['id_ikk']."' and tb_nilai_ikk_tri1.triwulan=2");  
				$cektw2 = mysqli_fetch_array($rstw2); 
				$persentw2x=($cektw2['angka_pembilang']/$cektw2['angka_pembagi'])*100; 
				$persentw2=round($persentw2x,2);	
				$no1++;	
				$list="IKK ".$no1;
				echo "'".$persentw2."',";
				}
				?>],
				}, {
					label: 'Triwulan 3',
					backgroundColor: "#51EAEA",
					data: [<?php
				$no1==0;
				$dataw3=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM  tb_ikk_bidang,tb_outcome where  tb_ikk_bidang.id_data=tb_outcome.id_outcome and tb_ikk_bidang.tahun='$_SESSION[tahun]' and tb_outcome.datapersen=1 order by tb_ikk_bidang.id_data asc");
				while($cekdataw3=mysqli_fetch_array($dataw3)){
				$rstw3=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1,tb_ikk_bidang where tb_nilai_ikk_tri1.id_ikk=tb_ikk_bidang.id_ikk and tb_ikk_bidang.tri3=1 and tb_nilai_ikk_tri1.id_ikk='".$cekdataw3['id_ikk']."' and tb_nilai_ikk_tri1.triwulan=3");  
				$cektw3 = mysqli_fetch_array($rstw3); 
				$persentw3x=($cektw3['angka_pembilang']/$cektw3['angka_pembagi'])*100; 
				$persentw3=round($persentw3x,2);	
				$no1++;	
				$list="IKK ".$no1;
				echo "'".$persentw3."',";
				}
				?>],
				}, {
					label: 'Triwulan 4',
					backgroundColor: "#FF9D76",
					data: [<?php
				$no1==0;
				$dataw4=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM  tb_ikk_bidang,tb_outcome where  tb_ikk_bidang.id_data=tb_outcome.id_outcome and tb_ikk_bidang.tahun='$_SESSION[tahun]'  and tb_outcome.datapersen=1 order by tb_ikk_bidang.id_data asc");
				while($cekdataw4=mysqli_fetch_array($dataw4)){
				$rstw4=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1,tb_ikk_bidang where tb_nilai_ikk_tri1.id_ikk=tb_ikk_bidang.id_ikk and tb_ikk_bidang.tri4=1 and tb_nilai_ikk_tri1.id_ikk='".$cekdataw1['id_ikk']."' and tb_nilai_ikk_tri1.triwulan=4");  
				$cektw4 = mysqli_fetch_array($rstw4); 
				$persentw4x=($cektw4['angka_pembilang']/$cektw4['angka_pembagi'])*100; 
				$persentw4=round($persentw4x,2);	
				$no1++;	
				$list="IKK ".$no1;
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
				$datax=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM  tb_ikk_bidang,tb_outcome where  tb_ikk_bidang.id_data=tb_outcome.id_outcome and tb_ikk_bidang.tahun='$_SESSION[tahun]' and tb_outcome.datapersen=1 order by tb_ikk_bidang.id_data asc");
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
				 if ($nox%5==0) echo "orange";
				 else if ($nox%5==1) echo "#00CED1";
				 else if ($nox%5==2) echo "#BA55D3";
				 else if ($nox%5==3) echo "#FF6347";
				 else if ($nox%5==4) echo "#1E90FF";
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
