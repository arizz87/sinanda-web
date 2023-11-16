<html lang="en">
<script src="./modul/js/jquery-1.11.1.min.js"></script> 
<script type="text/javascript"></script> 
<script src="modul/js/anggaran.js"></script>
<script src="js/chart/Chart.js"></script>  
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
?>
<div class="modal fade" id="myModals" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header">
						<h5 class="modal-title" id="myModalLabel"></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
			 <div class="modal-body">  
			 <form class="form-horizontal" id="formInput">
							
							<input type="hidden" class="form-control" id="nourut" name="nourut">
							<input type="hidden" class="form-control" id="type" name="type">
							
							<div class="form-group">
								<label for="perihal" class="col-sm-3 control-label">Belanja</label>
								<div class="col-sm-12">
									<textarea type="text" class="form-control" id="belanja" name="belanja" rows="5"></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="perihal" class="col-sm-3 control-label">Triwulan 1</label>
								<div class="col-sm-12">
									<input type="text" class="form-control" id="tri1" name="tri1" style="text-align:right" autocomplete="off">
								</div>
							</div>
							<div class="form-group">
								<label for="perihal" class="col-sm-3 control-label">Triwulan 2</label>
								<div class="col-sm-12">
									<input type="text" class="form-control" id="tri2" name="tri2" style="text-align:right" autocomplete="off">
								</div>
							</div>
							<div class="form-group">
								<label for="perihal" class="col-sm-3 control-label">Triwulan 3</label>
								<div class="col-sm-12">
									<input type="text" class="form-control" id="tri3" name="tri3" style="text-align:right" autocomplete="off">
								</div>
							</div>
							<div class="form-group">
								<label for="perihal" class="col-sm-3 control-label">Triwulan 4</label>
								<div class="col-sm-12">
									<input type="text" class="form-control" id="tri4" name="tri4" style="text-align:right" autocomplete="off">
								</div>
							</div>
						</form>
            </div>
            <div class="modal-footer">
                <button type="button" onClick="submitData()" style="font-size:13px" class="btn btn-success" ><i class="fa fa-save"></i> Simpan</button>
				 <button type="button" style="font-size:13px" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModalsHapus" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="myModalLabel3"><i class="fa fa-eraser"></i> <b>Hapus Data</b></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body"> 
						 <form class="form-horizontal" id="formHapus">
							
							<input type="hidden" class="form-control" id="nourutx" name="nourutx">
							<input type="hidden" class="form-control" id="type" name="type" value="delete">
							
							<div class="form-group">
								<label for="perihal" class="col-sm-3 control-label">Belanja</label>
								<div class="col-sm-12">
									<textarea type="text" class="form-control" id="belanjax" name="belanjax rows="5"></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="perihal" class="col-sm-3 control-label">Triwulan 1</label>
								<div class="col-sm-12">
									<input type="text" class="form-control" id="tri1x" name="tri1x" style="text-align:right" autocomplete="off">
								</div>
							</div>
							<div class="form-group">
								<label for="perihal" class="col-sm-3 control-label">Triwulan 2</label>
								<div class="col-sm-12">
									<input type="text" class="form-control" id="tri2x" name="tri2x" style="text-align:right" autocomplete="off">
								</div>
							</div>
							<div class="form-group">
								<label for="perihal" class="col-sm-3 control-label">Triwulan 3</label>
								<div class="col-sm-12">
									<input type="text" class="form-control" id="tri3x" name="tri3x" style="text-align:right" autocomplete="off">
								</div>
							</div>
							<div class="form-group">
								<label for="perihal" class="col-sm-3 control-label">Triwulan 4</label>
								<div class="col-sm-12">
									<input type="text" class="form-control" id="tri4x" name="tri4x" style="text-align:right" autocomplete="off">
								</div>
							</div>
						</form>
						<div class="alert alert-danger alert-dismissible"> 
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Peringatan!</h5>
				  Anda yakin ingin menghapus Data ini ? Pastikan data sudah di cek terlebih dahulu.
                </div> 
					</div>
					<div class="modal-footer">
						<button type="button" style="font-size:13px" onClick="submitDelete()" class="btn btn-success" data-dismiss="modal"><i class="fa fa-trash"></i> Hapus</button>
						<button type="button" style="font-size:13px" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
					</div>
				</div>
			</div>
		</div>
<!-- Modal Penyimpanan Data -->
 
 
<?php  
$tglusul=date('d-m-Y');	
?> 

 <div class="card card-primary">
              <div class="card-header">
               <font style="font-size:14px" class="box-title"></a><i class="fa fa-book"></i> <b><?php echo $_SESSION['jenisbelanja'];?> DATA REALIASI ANGGARAN TAHUN <?php echo $_SESSION['tahun'];?></b></font>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                   
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
               <?php
									 $anggarantri1=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(tri1) as sumanggarantri1 FROM tb_dokumenpertahun  where  tahun='".$_SESSION['tahun']."'");
										$sumanggarantri1=mysqli_fetch_array($anggarantri1);
											$totalanggarantri1=$sumanggarantri1['sumanggarantri1'];
									
									 $anggarantri2=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(tri2) as sumanggarantri2 FROM tb_dokumenpertahun  where  tahun='".$_SESSION['tahun']."'");
										$sumanggarantri2=mysqli_fetch_array($anggarantri2);
											$totalanggarantri2=$sumanggarantri2['sumanggarantri2'];
									
									 $anggarantri3=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(tri3) as sumanggarantri3 FROM tb_dokumenpertahun  where  tahun='".$_SESSION['tahun']."'");
										$sumanggarantri3=mysqli_fetch_array($anggarantri3);
											$totalanggarantri3=$sumanggarantri3['sumanggarantri3'];

									 $anggarantri4=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(tri4) as sumanggarantri4 FROM tb_dokumenpertahun  where  tahun='".$_SESSION['tahun']."'");
										$sumanggarantri4=mysqli_fetch_array($anggarantri4);
											$totalanggarantri4=$sumanggarantri4['sumanggarantri4'];
											
									$totalanggarantri=$totalanggarantri1+$totalanggarantri2+$totalanggarantri3+$totalanggarantri4;	




									 $belanjamodal1=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(tri1) as sumbelanjamodal1 FROM tb_dokumenpertahun  where  tahun='".$_SESSION['tahun']."' and kdbelanja like '5.2.0%'");
										$sumbelanjamodal1=mysqli_fetch_array($belanjamodal1);
											$totalbelanjamodal1=$sumbelanjamodal1['sumbelanjamodal1'];
									
									 $belanjamodal2=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(tri2) as sumbelanjamodal2 FROM tb_dokumenpertahun  where  tahun='".$_SESSION['tahun']."' and kdbelanja like '5.2.0%'");
										$sumbelanjamodal2=mysqli_fetch_array($belanjamodal2);
											$totalbelanjamodal2=$sumbelanjamodal2['sumbelanjamodal2'];
									
									$belanjamodal3=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(tri3) as sumbelanjamodal3 FROM tb_dokumenpertahun  where  tahun='".$_SESSION['tahun']."' and kdbelanja like '5.2.0%'");
										$sumbelanjamodal3=mysqli_fetch_array($belanjamodal3);
											$totalbelanjamodal3=$sumbelanjamodal3['sumbelanjamodal3'];

									 $belanjamodal4=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(tri4) as sumbelanjamodal4 FROM tb_dokumenpertahun  where  tahun='".$_SESSION['tahun']."' and kdbelanja like '5.2.0%'");
										$sumbelanjamodal4=mysqli_fetch_array($belanjamodal4);
											$totalbelanjamodal4=$sumbelanjamodal4['sumbelanjamodal4'];
											
									$totalbelanjamodal=$totalbelanjamodal1+$totalbelanjamodal2+$totalbelanjamodal3+$totalbelanjamodal4;		
									$persenbelanjamodalx=($totalbelanjamodal/$totalanggarantri)*100;
									$persenbelanjamodal=round($persenbelanjamodalx,2);
									
									
									$belanjapegawai1=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(tri1) as sumbelanjapegawai1 FROM tb_dokumenpertahun  where  tahun='".$_SESSION['tahun']."' and kdbelanja like '5.1.01%'");
										$sumbelanjapegawai1=mysqli_fetch_array($belanjapegawai1);
											$totalbelanjapegawai1=$sumbelanjapegawai1['sumbelanjapegawai1'];
									
									 $belanjapegawai2=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(tri2) as sumbelanjapegawai2 FROM tb_dokumenpertahun  where  tahun='".$_SESSION['tahun']."' and kdbelanja like '5.1.01%'");
										$sumbelanjapegawai2=mysqli_fetch_array($belanjapegawai2);
											$totalbelanjapegawai2=$sumbelanjapegawai2['sumbelanjapegawai2'];
									
									$belanjapegawai3=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(tri3) as sumbelanjapegawai3 FROM tb_dokumenpertahun  where  tahun='".$_SESSION['tahun']."' and kdbelanja like '5.1.01%'");
										$sumbelanjapegawai3=mysqli_fetch_array($belanjapegawai3);
											$totalbelanjapegawai3=$sumbelanjapegawai3['sumbelanjapegawai3'];

									 $belanjapegawai4=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(tri4) as sumbelanjapegawai4 FROM tb_dokumenpertahun  where  tahun='".$_SESSION['tahun']."' and kdbelanja like '5.1.01%'");
										$sumbelanjapegawai4=mysqli_fetch_array($belanjapegawai4);
											$totalbelanjapegawai4=$sumbelanjapegawai4['sumbelanjapegawai4'];
											
									$totalbelanjapegawai=$totalbelanjapegawai1+$totalbelanjapegawai2+$totalbelanjapegawai3+$totalbelanjapegawai4;	
									$persenbelanjapegawaix=($totalbelanjapegawai/$totalanggarantri)*100;
									$persenbelanjapegawai=round($persenbelanjapegawaix,2);
									
									
									
									$belanjabbj1=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(tri1) as sumbelanjabbj1 FROM tb_dokumenpertahun  where  tahun='".$_SESSION['tahun']."' and kdbelanja like '5.1.02%'");
										$sumbelanjabbj1=mysqli_fetch_array($belanjabbj1);
											$totalbelanjabbj1=$sumbelanjabbj1['sumbelanjabbj1'];
									
									 $belanjabbj2=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(tri2) as sumbelanjabbj2 FROM tb_dokumenpertahun  where  tahun='".$_SESSION['tahun']."' and kdbelanja like '5.1.02%'");
										$sumbelanjabbj2=mysqli_fetch_array($belanjabbj2);
											$totalbelanjabbj2=$sumbelanjabbj2['sumbelanjabbj2'];
									
									$belanjabbj3=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(tri3) as sumbelanjabbj3 FROM tb_dokumenpertahun  where  tahun='".$_SESSION['tahun']."' and kdbelanja like '5.1.02%'");
										$sumbelanjabbj3=mysqli_fetch_array($belanjabbj3);
											$totalbelanjabbj3=$sumbelanjabbj3['sumbelanjabbj3'];

									 $belanjabbj4=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(tri4) as sumbelanjabbj4 FROM tb_dokumenpertahun  where  tahun='".$_SESSION['tahun']."' and kdbelanja like '5.1.02%'");
										$sumbelanjabbj4=mysqli_fetch_array($belanjabbj4);
											$totalbelanjabbj4=$sumbelanjabbj4['sumbelanjabbj4'];
											
									$totalbelanjabbj=$totalbelanjabbj1+$totalbelanjabbj2+$totalbelanjabbj3+$totalbelanjabbj4;	
									$persenbelanjabbjx=($totalbelanjabbj/$totalanggarantri)*100;
									$persenbelanjabbj=round($persenbelanjabbjx,2);									
									 
									$totalhibah=$totalanggarantri-($totalbelanjamodal+$totalbelanjapegawai+$totalbelanjabbj);
									
									$persenbelanjahibahx=($totalhibah/$totalanggarantri)*100;
									$persenbelanjahibah=round($persenbelanjahibahx,2);		
									
									$realisasi1=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as realisasi1 FROM tb_rinciana2  where  tahun='".$_SESSION['tahun']."'");
									$sumrealisasi1=mysqli_fetch_array($realisasi1);
									$totalrealisasi1=$sumrealisasi1['realisasi1'];
									$persenrealisasi1x=($totalrealisasi1/$totalanggarantri)*100;
									$persenrealisasi1=round($persenrealisasi1x,2);									
									
									$realisasi2=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as realisasi2 FROM tb_rinciana2  where  tahun='".$_SESSION['tahun']."'  and kdbelanja like '5.1.01%'");
									$sumrealisasi2=mysqli_fetch_array($realisasi2);
									$totalrealisasi2=$sumrealisasi2['realisasi2'];
									$persenrealisasi2x=($totalrealisasi2/$totalbelanjapegawai)*100;
									$persenrealisasi2=round($persenrealisasi2x,2);		
									
									$realisasi3=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as realisasi3 FROM tb_rinciana2  where  tahun='".$_SESSION['tahun']."'  and kdbelanja like '5.1.02%'");
									$sumrealisasi3=mysqli_fetch_array($realisasi3);
									$totalrealisasi3=$sumrealisasi3['realisasi3'];
									$persenrealisasi3x=($totalrealisasi3/$totalbelanjabbj)*100;
									$persenrealisasi3=round($persenrealisasi3x,2);

									$realisasi4=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as realisasi4 FROM tb_rinciana2  where  tahun='".$_SESSION['tahun']."'  and kdbelanja like '5.2.0%'");
									$sumrealisasi4=mysqli_fetch_array($realisasi4);
									$totalrealisasi4=$sumrealisasi4['realisasi4'];
									$persenrealisasi4x=($totalrealisasi4/$totalbelanjamodal)*100;
									$persenrealisasi4=round($persenrealisasi4x,2);									
									
									$totalrealisasi5=$totalrealisasi1-($totalrealisasi2+$totalrealisasi3+$totalrealisasi4); 
									$persenrealisasi5x=($totalrealisasi5/$totalhibah)*100;
									$persenrealisasi5=round($persenrealisasi5x,2);		
									
									if ($persenbelanjamodalx >=60){
										$colorbm="bg-success";
									}else{
										$colorbm="bg-danger";
									}
									
									if ($persenbelanjapegawaix >=60){
										$colorpg="bg-success";
									}else{
										$colorpg="bg-danger";
									}
									
									if ($persenbelanjabbjx >=60){
										$colorbbj="bg-success";
									}else{
										$colorbbj="bg-danger";
									}
									
									if ($persenbelanjahibahx >=60){
										$colorhb="bg-success";
									}else{
										$colorhb="bg-danger";
									}
									
									if ($persenrealisasi1x >=60){
										$color1="bg-success";
									}else{
										$color1="bg-danger";
									}
									
									if ($persenrealisasi2x >=60){
										$color2="bg-success";
									}else{
										$color2="bg-danger";
									}
									
									if ($persenrealisasi3x >=60){
										$color3="bg-success";
									}else{
										$color3="bg-danger";
									}
									
									if ($persenrealisasi4x >=60){
										$color4="bg-success";
									}else{
										$color4="bg-danger";
									}
									
									if ($persenrealisasi5x >=60){
										$color5="bg-success";
									}else{
										$color5="bg-danger";
									}
									 ?>
              <!-- ./card-body -->
              <div class="card-footer">
                <div class="row">
				<div class="col-sm-1 col-6">
                  </div>
                  <div class="col-sm-2 col-6">
                    <div class="description-block border-right">
                     <p>
                      <font style="font-size:18px"><h5 class="description-header"><?php echo rupiah($totalrealisasi1) ?></h5></font>
                      <span class="description-text">TOTAL REALISASI</span><p> 
						<span class="badge <?php echo $color1 ?>"><?php echo $persenrealisasi1 ?> %</span> 
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
				   <div class="col-sm-2 col-6">
                    <div class="description-block border-right">
                       <p>
                     <font style="font-size:18px"> <h5 class="description-header"><?php echo rupiah($totalrealisasi2) ?></h5></font>
                      <span class="description-text">BELANJA PEGAWAI</span>  <p> 
					  <span class="badge <?php echo $color2 ?>"><?php echo $persenrealisasi2 ?> %</span> 
                    </div>
                    <!-- /.description-block -->
                  </div> 
				   <div class="col-sm-2 col-6">
                    <div class="description-block border-right">
                      <p>
                      <font style="font-size:18px"><h5 class="description-header"><?php echo rupiah($totalrealisasi3) ?></h5></font>
                      <span class="description-text">BELANJA BARANG & JASA</span> 
                      <p> 
					  <span class="badge <?php echo $color3 ?>"><?php echo $persenrealisasi3 ?> %</span> 
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <div class="col-sm-2 col-6">
                    <div class="description-block border-right">
                       <p>
                     <font style="font-size:18px"> <h5 class="description-header"><?php echo rupiah($totalrealisasi4) ?></h5></font>
                      <span class="description-text">BELANJA MODAL</span>  <p> 
					  <span class="badge <?php echo $color4 ?>"><?php echo $persenrealisasi4 ?> %</span> 
                    </div>
					
                    <!-- /.description-block -->
                  </div> 
                  <!-- /.col -->
                 <div class="col-sm-2 col-6">
                    <div class="description-block">
                       <p>
                     <font style="font-size:18px"> <h5 class="description-header"><?php echo rupiah($totalrealisasi5) ?></h5></font>
                      <span class="description-text">BELANJA HIBAH BANSOS</span> <p> 
					  <span class="badge <?php echo $color5 ?>"><?php echo $persenrealisasi5 ?> %</span> 
                    </div>
					
                    <!-- /.description-block -->
                  </div> 
				  <div class="col-sm-1 col-6">
                  </div>
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-footer -->
            </div> 
<div class="card card-default"> 	
 <div class="row">
<div class="col-lg-7">
              <div class="card-body bg-default">  
			   <div class="card bg-gradient-default" style="position: relative; left: 0px; top: 0px;">
              
			  <div class="card-header border-0 ui-sortable-handle" >  
			   <h3 class="card-title">
                <i class="fas fa-chart-line mr-1"></i> 
                  Grafik Pengajuan Per Bulan
                </h3>
			<canvas id="canvas"></canvas> 
              </div>
            </div></div>
			 <div class="row">
			<div class="col-lg-8">
			 <div class="card-body bg-default">  
			   <div class="card bg-gradient-default" style="position: relative; left: 0px; top: 0px;">
              
			  <div class="card-header border-0 ui-sortable-handle" > 
			  <h3 class="card-title">
              <?php
			  $cari=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM  tb_aktifgu,tb_peruntukan where tb_aktifgu.id_peruntukan=tb_peruntukan.nourut and tb_aktifgu.tahun='".$_SESSION['tahun']."' order by tb_aktifgu.id_peruntukan DESC"));
			  ?>
                <i class="fas fa-chart-pie mr-1"></i>
                  Grafik Pengajuan <?php echo $cari['peruntukan'] ?>
                </h3><br><br>
			 <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div></div></div>
			<div class="col-lg-4">
			 <div class="card-body bg-default">  
			   <div class="card bg-gradient-default" style="position: relative; left: 0px; top: 0px;">
              
			  <div class="card-header border-0 ui-sortable-handle" > 
			  <h3 class="card-title">
              
                <i class="fas fa-th mr-1"></i>
                 Pengajuan <?php echo $cari['peruntukan'] ?>
                </h3><br><br>
			<table id="examplex" class="table table-striped table-bordered" cellspacing="0" width="100%">
									 
									<?php
									 $kegiatan1=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(tb_rinciana2.jmlharga) as sumjmlharga1 FROM tb_rinciana2,tb_a2  where tb_rinciana2.kodegabungana2=tb_a2.kodegabungana2 and tb_a2.peruntukan='".$cari['nourut']."' and tb_a2.tahun='".$_SESSION['tahun']."'");
										$sumkegiatan1=mysqli_fetch_array($kegiatan1);
											$jmlharga1=$sumkegiatan1['sumjmlharga1'];
									
									$ppn1=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(tb_rinciana2.ppn) as sumjmlppn1 FROM tb_rinciana2,tb_a2  where tb_rinciana2.kodegabungana2=tb_a2.kodegabungana2 and tb_a2.peruntukan='".$cari['nourut']."' and tb_a2.tahun='".$_SESSION['tahun']."'");
										$sumppn1=mysqli_fetch_array($ppn1);
											$jmlppn1=$sumppn1['sumjmlppn1'];		
									
									$pph1=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(tb_rinciana2.pph) as sumjmlpph1 FROM tb_rinciana2,tb_a2  where tb_rinciana2.kodegabungana2=tb_a2.kodegabungana2 and tb_a2.peruntukan='".$cari['nourut']."' and tb_a2.tahun='".$_SESSION['tahun']."'");
										$sumpph1=mysqli_fetch_array($pph1);
											$jmlpph1=$sumpph1['sumjmlpph1'];	

									$daerah1=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(tb_rinciana2.daerah) as sumjmldaerah1 FROM tb_rinciana2,tb_a2  where tb_rinciana2.kodegabungana2=tb_a2.kodegabungana2 and tb_a2.peruntukan='".$cari['nourut']."' and tb_a2.tahun='".$_SESSION['tahun']."'");
										$sumdaerah1=mysqli_fetch_array($daerah1);
											$jmldaerah1=$sumdaerah1['sumjmldaerah1'];
											
									$jumlahpajak1=$jmlppn1+$jmlpph1+$jmldaerah1;		
									
									$jmlharga1x=$jmlharga1-$jumlahpajak1;
									$totalharga1=$jmlharga1x+$jumlahpajak1;
									 
											
									$total=$jmlharga1x;
									$totalpajak=$jumlahpajak1;
									$totalhargaall=$totalharga1;
									if ($totalhargaall>0){
									$sisa= 500000000-$totalhargaall;
									}else{
									$sisa="0";	
									} 
									 ?>
									 <tr style="font-size:12px">
									<td align=right><font style="font-size:12px"><div style="text-align:left;"><b>Belanja <?php echo $cari['peruntukan'] ?></b></font><?php echo  '<div style="text-align:right;color:blue"><i><b>'.rupiah2($total);?>
									</td>
									</tr> 
									 <tr style="font-size:12px">
									<td align=right><font style="font-size:12px"><div style="text-align:left;"><b>Pajak <?php echo $cari['peruntukan'] ?></b></font><?php echo  '<div style="text-align:right;color:green"><i><b>'.rupiah2($totalpajak);?>
									</td>
									</tr>
									<tr style="font-size:12px">
									<td align=right><font style="font-size:12px"><div style="text-align:left;"><b>Total <?php echo $cari['peruntukan'] ?></b></font><?php echo  '<div style="text-align:right;color:brown"><i><b>'.rupiah2($totalhargaall);?>
									</td>
									</tr>	
									 <tr style="font-size:12px">
									<td align=right><font style="font-size:12px"><div style="text-align:left;"><b>Sisa <?php echo $cari['peruntukan'] ?></b></font><?php echo  '<div style="text-align:right;color:red"><i><b>'.rupiah2($sisa);?>
									</td>
									</tr>								
									 
			</table>
              </div>
            </div></div></div>
			</div>
			 <div class="row">
			<div class="col-lg-8">
			 <div class="card-body bg-default">  
			   <div class="card bg-gradient-default" style="position: relative; left: 0px; top: 0px;">
              
			  <div class="card-header border-0 ui-sortable-handle" > 
			  <h3 class="card-title">
               
                <i class="fas fa-chart-pie mr-1"></i>
                  Grafik Pengajuan LS
                </h3><br><br>
			 <canvas id="donutChart2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div></div></div> 
			<div class="col-lg-4">
			 <div class="card-body bg-default">  
			   <div class="card bg-gradient-default" style="position: relative; left: 0px; top: 0px;">
              
			  <div class="card-header border-0 ui-sortable-handle" > 
			  <h3 class="card-title">
               
                <i class="fas fa-th mr-1"></i>
                 Pengajuan LS
                </h3><br><br>
			<table id="examplex" class="table table-striped table-bordered" cellspacing="0" width="100%">
									 
									<?php
									$kegiatan1xx=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(tb_rinciana2.jmlharga) as sumjmlharga1xx FROM tb_rinciana2,tb_a2  where tb_rinciana2.kodegabungana2=tb_a2.kodegabungana2 and tb_a2.jenisbelanja='1' and tb_a2.tahun='".$_SESSION['tahun']."'");
										$sumkegiatan1xx=mysqli_fetch_array($kegiatan1xx);
											$jmlharga1xx=$sumkegiatan1xx['sumjmlharga1xx'];
									
									$ppn1xx=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(tb_rinciana2.ppn) as sumjmlppn1xx FROM tb_rinciana2,tb_a2  where tb_rinciana2.kodegabungana2=tb_a2.kodegabungana2 and tb_a2.jenisbelanja='1' and tb_a2.tahun='".$_SESSION['tahun']."'");
										$sumppn1xx=mysqli_fetch_array($ppn1xx);
											$jmlppn1xx=$sumppn1xx['sumjmlppn1xx'];		
									
									$pph1xx=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(tb_rinciana2.pph) as sumjmlpph1xx FROM tb_rinciana2,tb_a2  where tb_rinciana2.kodegabungana2=tb_a2.kodegabungana2 and tb_a2.jenisbelanja='1' and tb_a2.tahun='".$_SESSION['tahun']."'");
										$sumpph1xx=mysqli_fetch_array($pph1xx);
											$jmlpph1xx=$sumpph1xx['sumjmlpph1xx'];	

									$daerah1xx=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(tb_rinciana2.daerah) as sumjmldaerah1xx FROM tb_rinciana2,tb_a2  where tb_rinciana2.kodegabungana2=tb_a2.kodegabungana2 and tb_a2.jenisbelanja='1' and tb_a2.tahun='".$_SESSION['tahun']."'");
										$sumdaerah1xx=mysqli_fetch_array($daerah1xx);
											$jmldaerah1xx=$sumdaerah1xx['sumjmldaerah1xx'];
											
									$jumlahpajak1xx=$jmlppn1xx+$jmlpph1xx+$jmldaerah1xx;		
									
									$jmlharga1xxx=$jmlharga1xx-$jumlahpajak1xx;
									$totalharga1xx=$jmlharga1xxx+$jumlahpajak1xx;
									 
											
									$totalxx=$jmlharga1xxx;
									$totalpajakxx=$jumlahpajak1xx;
									$totalhargaallxx=$totalharga1xx;
									 
									 ?>
									 <tr style="font-size:12px">
									<td align=right><font style="font-size:12px"><div style="text-align:left;"><b>Belanja LS</b></font><?php echo  '<div style="text-align:right;color:blue"><i><b>'.rupiah2($totalxx);?>
									</td>
									</tr> 
									 <tr style="font-size:12px">
									<td align=right><font style="font-size:12px"><div style="text-align:left;"><b>Pajak LS</b></font><?php echo  '<div style="text-align:right;color:green"><i><b>'.rupiah2($totalpajakxx);?>
									</td>
									</tr>
									 <tr style="font-size:12px">
									<td align=right><font style="font-size:12px"><div style="text-align:left;"><b>Total LS</b></font><?php echo  '<div style="text-align:right;color:brown"><i><b>'.rupiah2($totalhargaallxx);?>
									</td>
									</tr>	
									 
			</table>
              </div>
            </div></div></div>
			
			</div>
			</div>
			<div class="col-lg-5">
              <div class="card-body bg-default">  
			  <div class="card bg-gradient-default" style="position: relative; left: 0px; top: 0px;">
              
			  <div class="card-header border-0 ui-sortable-handle" > 
			  
			   <div class="row">
			   
				<div class="col-lg-12">
			   <h3 class="card-title">
                <i class="fas fa-th mr-1"></i>
				
                     Pengajuan Per Bulan
				 </div> </div>
                </h3> 
				<br> 
			 <table id="examplex" class="table table-striped table-bordered" cellspacing="0" width="100%">
									<thead>
									  <tr style="font-size:12px">
										  <th style="width:25%;"><center>Bulan</center></th>
										  <th style="width:25%;"><center>GU</center></th> 	
										  <th style="width:25%;"><center>LS</center></th> 	
										  <th style="width:25%;"><center>TU</center></th>  											  
									  </tr>
									</thead>  
									<?php 
									 
									 $sumgu1=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as sumgu1 FROM rekapbulan where MONTH(tgla2)='01' and jenisbelanja='3' and tahun='$_SESSION[tahun]'");
									 $sum_gu1=mysqli_fetch_array($sumgu1);
									 $hasilgu1=$sum_gu1['sumgu1'];
									 
									  $sumgu2=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as sumgu2 FROM rekapbulan where MONTH(tgla2)='02' and jenisbelanja='3' and tahun='$_SESSION[tahun]'");
									 $sum_gu2=mysqli_fetch_array($sumgu2);
									 $hasilgu2=$sum_gu2['sumgu2'];
									 
									  $sumgu3=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as sumgu3 FROM rekapbulan where MONTH(tgla2)='03' and jenisbelanja='3' and tahun='$_SESSION[tahun]'");
									 $sum_gu3=mysqli_fetch_array($sumgu3);
									 $hasilgu3=$sum_gu3['sumgu3'];
									 
									  $sumgu4=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as sumgu4 FROM rekapbulan where MONTH(tgla2)='04' and jenisbelanja='3' and tahun='$_SESSION[tahun]'");
									 $sum_gu4=mysqli_fetch_array($sumgu4);
									 $hasilgu4=$sum_gu4['sumgu4'];
									 
									  $sumgu5=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as sumgu5 FROM rekapbulan where MONTH(tgla2)='05' and jenisbelanja='3' and tahun='$_SESSION[tahun]'");
									 $sum_gu5=mysqli_fetch_array($sumgu5);
									 $hasilgu5=$sum_gu5['sumgu5'];
									 
									  $sumgu6=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as sumgu6 FROM rekapbulan where MONTH(tgla2)='06' and jenisbelanja='3' and tahun='$_SESSION[tahun]'");
									 $sum_gu6=mysqli_fetch_array($sumgu6);
									 $hasilgu6=$sum_gu6['sumgu6'];
									 
									  $sumgu7=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as sumgu7 FROM rekapbulan where MONTH(tgla2)='07' and jenisbelanja='3' and tahun='$_SESSION[tahun]'");
									 $sum_gu7=mysqli_fetch_array($sumgu7);
									 $hasilgu7=$sum_gu7['sumgu7'];
									 
									  $sumgu8=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as sumgu8 FROM rekapbulan where MONTH(tgla2)='08' and jenisbelanja='3' and tahun='$_SESSION[tahun]'");
									 $sum_gu8=mysqli_fetch_array($sumgu8);
									 $hasilgu8=$sum_gu8['sumgu8'];
									 
									  $sumgu9=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as sumgu9 FROM rekapbulan where MONTH(tgla2)='09' and jenisbelanja='3' and tahun='$_SESSION[tahun]'");
									 $sum_gu9=mysqli_fetch_array($sumgu9);
									 $hasilgu9=$sum_gu9['sumgu9'];
									 
									  $sumgu10=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as sumgu10 FROM rekapbulan where MONTH(tgla2)='10' and jenisbelanja='3' and tahun='$_SESSION[tahun]'");
									 $sum_gu10=mysqli_fetch_array($sumgu10);
									 $hasilgu10=$sum_gu10['sumgu10'];
									 
									  $sumgu11=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as sumgu11 FROM rekapbulan where MONTH(tgla2)='11' and jenisbelanja='3' and tahun='$_SESSION[tahun]'");
									 $sum_gu11=mysqli_fetch_array($sumgu11);
									 $hasilgu11=$sum_gu11['sumgu11'];
									 
									  $sumgu12=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as sumgu12 FROM rekapbulan where MONTH(tgla2)='12' and jenisbelanja='3' and tahun='$_SESSION[tahun]'");
									 $sum_gu12=mysqli_fetch_array($sumgu12);
									 $hasilgu12=$sum_gu12['sumgu12'];
									 
									 $sumls1=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as sumls1 FROM rekapbulan where MONTH(tgla2)='01' and jenisbelanja='1' and tahun='$_SESSION[tahun]'");
									 $sum_ls1=mysqli_fetch_array($sumls1);
									 $hasills1=$sum_ls1['sumls1'];
									 
									  $sumls2=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as sumls2 FROM rekapbulan where MONTH(tgla2)='02' and jenisbelanja='1' and tahun='$_SESSION[tahun]'");
									 $sum_ls2=mysqli_fetch_array($sumls2);
									 $hasills2=$sum_ls2['sumls2'];
									 
									  $sumls3=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as sumls3 FROM rekapbulan where MONTH(tgla2)='03' and jenisbelanja='1' and tahun='$_SESSION[tahun]'");
									 $sum_ls3=mysqli_fetch_array($sumls3);
									 $hasills3=$sum_ls3['sumls3'];
									 
									  $sumls4=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as sumls4 FROM rekapbulan where MONTH(tgla2)='04' and jenisbelanja='1' and tahun='$_SESSION[tahun]'");
									 $sum_ls4=mysqli_fetch_array($sumls4);
									 $hasills4=$sum_ls4['sumls4'];
									 
									  $sumls5=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as sumls5 FROM rekapbulan where MONTH(tgla2)='05' and jenisbelanja='1' and tahun='$_SESSION[tahun]'");
									 $sum_ls5=mysqli_fetch_array($sumls5);
									 $hasills5=$sum_ls5['sumls5'];
									 
									  $sumls6=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as sumls6 FROM rekapbulan where MONTH(tgla2)='06' and jenisbelanja='1' and tahun='$_SESSION[tahun]'");
									 $sum_ls6=mysqli_fetch_array($sumls6);
									 $hasills6=$sum_ls6['sumls6'];
									 
									  $sumls7=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as sumls7 FROM rekapbulan where MONTH(tgla2)='07' and jenisbelanja='1' and tahun='$_SESSION[tahun]'");
									 $sum_ls7=mysqli_fetch_array($sumls7);
									 $hasills7=$sum_ls7['sumls7'];
									 
									  $sumls8=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as sumls8 FROM rekapbulan where MONTH(tgla2)='08' and jenisbelanja='1' and tahun='$_SESSION[tahun]'");
									 $sum_ls8=mysqli_fetch_array($sumls8);
									 $hasills8=$sum_ls8['sumls8'];
									 
									  $sumls9=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as sumls9 FROM rekapbulan where MONTH(tgla2)='09' and jenisbelanja='1' and tahun='$_SESSION[tahun]'");
									 $sum_ls9=mysqli_fetch_array($sumls9);
									 $hasills9=$sum_ls9['sumls9'];
									 
									  $sumls10=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as sumls10 FROM rekapbulan where MONTH(tgla2)='10' and jenisbelanja='1' and tahun='$_SESSION[tahun]'");
									 $sum_ls10=mysqli_fetch_array($sumls10);
									 $hasills10=$sum_ls10['sumls10'];
									 
									  $sumls11=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as sumls11 FROM rekapbulan where MONTH(tgla2)='11' and jenisbelanja='1' and tahun='$_SESSION[tahun]'");
									 $sum_ls11=mysqli_fetch_array($sumls11);
									 $hasills11=$sum_ls11['sumls11'];
									 
									  $sumls12=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as sumls12 FROM rekapbulan where MONTH(tgla2)='12' and jenisbelanja='1' and tahun='$_SESSION[tahun]'");
									 $sum_ls12=mysqli_fetch_array($sumls12);
									 $hasills12=$sum_ls12['sumls12'];
									 
									 $sumtu1=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as sumtu1 FROM rekapbulan where MONTH(tgla2)='01' and jenisbelanja='5' and tahun='$_SESSION[tahun]'");
									 $sum_tu1=mysqli_fetch_array($sumtu1);
									 $hasiltu1=$sum_tu1['sumtu1'];
									 
									  $sumtu2=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as sumtu2 FROM rekapbulan where MONTH(tgla2)='02' and jenisbelanja='5' and tahun='$_SESSION[tahun]'");
									 $sum_tu2=mysqli_fetch_array($sumtu2);
									 $hasiltu2=$sum_tu2['sumtu2'];
									 
									  $sumtu3=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as sumtu3 FROM rekapbulan where MONTH(tgla2)='03' and jenisbelanja='5' and tahun='$_SESSION[tahun]'");
									 $sum_tu3=mysqli_fetch_array($sumtu3);
									 $hasiltu3=$sum_tu3['sumtu3'];
									 
									  $sumtu4=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as sumtu4 FROM rekapbulan where MONTH(tgla2)='04' and jenisbelanja='5' and tahun='$_SESSION[tahun]'");
									 $sum_tu4=mysqli_fetch_array($sumtu4);
									 $hasiltu4=$sum_tu4['sumtu4'];
									 
									  $sumtu5=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as sumtu5 FROM rekapbulan where MONTH(tgla2)='05' and jenisbelanja='5' and tahun='$_SESSION[tahun]'");
									 $sum_tu5=mysqli_fetch_array($sumtu5);
									 $hasiltu5=$sum_tu5['sumtu5'];
									 
									  $sumtu6=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as sumtu6 FROM rekapbulan where MONTH(tgla2)='06' and jenisbelanja='5' and tahun='$_SESSION[tahun]'");
									 $sum_tu6=mysqli_fetch_array($sumtu6);
									 $hasiltu6=$sum_tu6['sumtu6'];
									 
									  $sumtu7=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as sumtu7 FROM rekapbulan where MONTH(tgla2)='07' and jenisbelanja='5' and tahun='$_SESSION[tahun]'");
									 $sum_tu7=mysqli_fetch_array($sumtu7);
									 $hasiltu7=$sum_tu7['sumtu7'];
									 
									  $sumtu8=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as sumtu8 FROM rekapbulan where MONTH(tgla2)='08' and jenisbelanja='5' and tahun='$_SESSION[tahun]'");
									 $sum_tu8=mysqli_fetch_array($sumtu8);
									 $hasiltu8=$sum_tu8['sumtu8'];
									 
									  $sumtu9=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as sumtu9 FROM rekapbulan where MONTH(tgla2)='09' and jenisbelanja='5' and tahun='$_SESSION[tahun]'");
									 $sum_tu9=mysqli_fetch_array($sumtu9);
									 $hasiltu9=$sum_tu9['sumtu9'];
									 
									  $sumtu10=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as sumtu10 FROM rekapbulan where MONTH(tgla2)='10' and jenisbelanja='5' and tahun='$_SESSION[tahun]'");
									 $sum_tu10=mysqli_fetch_array($sumtu10);
									 $hasiltu10=$sum_tu10['sumtu10'];
									 
									  $sumtu11=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as sumtu11 FROM rekapbulan where MONTH(tgla2)='11' and jenisbelanja='5' and tahun='$_SESSION[tahun]'");
									 $sum_tu11=mysqli_fetch_array($sumtu11);
									 $hasiltu11=$sum_tu11['sumtu11'];
									 
									  $sumtu12=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as sumtu12 FROM rekapbulan where MONTH(tgla2)='12' and jenisbelanja='5' and tahun='$_SESSION[tahun]'");
									 $sum_tu12=mysqli_fetch_array($sumtu12);
									 $hasiltu12=$sum_tu12['sumtu12'];
									 
									 $totalgu=$hasilgu1+$hasilgu2+$hasilgu3+$hasilgu4+$hasilgu5+$hasilgu6+$hasilgu7+$hasilgu8+$hasilgu9+$hasilgu10+$hasilgu11+$hasilgu12;
									  $totaltu=$hasiltu1+$hasiltu2+$hasiltu3+$hasiltu4+$hasiltu5+$hasiltu6+$hasiltu7+$hasiltu8+$hasiltu9+$hasiltu10+$hasiltu11+$hasiltu12;
									 $totalls=$hasills1+$hasills2+$hasills3+$hasills4+$hasills5+$hasills6+$hasills7+$hasills8+$hasills9+$hasills10+$hasills11+$hasills12;
									  ?>
										 
												<tr style="font-size:12px">
												<td >Januari</td>
												<td align=right><?php echo  rupiah2($hasilgu1);?></td>
												<td align=right><?php echo rupiah2($hasills1);?></td> 
												<td align=right><?php echo  rupiah2($hasiltu1);?></td>
												</tr> 
												<tr style="font-size:12px">
												<td >Februari</td>
												<td align=right><?php echo  rupiah2($hasilgu2);?></td>
												<td align=right><?php echo rupiah2($hasills2);?></td>
												<td align=right><?php echo  rupiah2($hasiltu2);?></td> 
												</tr> 
												<tr style="font-size:12px">
												<td >Maret</td>
												<td align=right><?php echo  rupiah2($hasilgu3);?></td>
												<td align=right><?php echo rupiah2($hasills3);?></td>
												<td align=right><?php echo  rupiah2($hasiltu3);?></td> 
												</tr> 
												<tr style="font-size:12px">
												<td >April</td>
												<td align=right><?php echo  rupiah2($hasilgu4);?></td>
												<td align=right><?php echo rupiah2($hasills4);?></td>
												<td align=right><?php echo  rupiah2($hasiltu4);?></td> 
												</tr> 
												<tr style="font-size:12px">
												<td >Mei</td>
												<td align=right><?php echo  rupiah2($hasilgu5);?></td>
												<td align=right><?php echo rupiah2($hasills5);?></td>
												<td align=right><?php echo  rupiah2($hasiltu5);?></td> 
												</tr> 
												<tr style="font-size:12px">
												<td >Juni</td>
												<td align=right><?php echo  rupiah2($hasilgu6);?></td>
												<td align=right><?php echo rupiah2($hasills6);?></td>
												<td align=right><?php echo  rupiah2($hasiltu6);?></td> 
												</tr> 
												<tr style="font-size:12px">
												<td >Juli</td>
												<td align=right><?php echo  rupiah2($hasilgu7);?></td>
												<td align=right><?php echo rupiah2($hasills7);?></td>
												<td align=right><?php echo  rupiah2($hasiltu7);?></td> 
												</tr> 
												<tr style="font-size:12px">
												<td >Agustus</td>
												<td align=right><?php echo  rupiah2($hasilgu8);?></td>
												<td align=right><?php echo rupiah2($hasills8);?></td>
												<td align=right><?php echo  rupiah2($hasiltu8);?></td> 
												</tr> 
												<tr style="font-size:12px">
												<td >September</td>
												<td align=right><?php echo  rupiah2($hasilgu9);?></td>
												<td align=right><?php echo rupiah2($hasills9);?></td>
												<td align=right><?php echo  rupiah2($hasiltu9);?></td> 
												</tr> 
												<tr style="font-size:12px">
												<td >Oktober</td>
												<td align=right><?php echo  rupiah2($hasilgu10);?></td>
												<td align=right><?php echo rupiah2($hasills10);?></td>
												<td align=right><?php echo  rupiah2($hasiltu10);?></td> 
												</tr> 
												<tr style="font-size:12px">
												<td >November</td>
												<td align=right><?php echo  rupiah2($hasilgu11);?></td>
												<td align=right><?php echo rupiah2($hasills11);?></td>
												<td align=right><?php echo  rupiah2($hasiltu11);?></td> 
												</tr> 
												<tr style="font-size:12px">
												<td >Desember</td>
												<td align=right><?php echo  rupiah2($hasilgu12);?></td>
												<td align=right><?php echo rupiah2($hasills12);?></td>
												<td align=right><?php echo  rupiah2($hasiltu12);?></td> 
												</tr> 
												<tr style="font-size:12px">
												<td ><b>Total Belanja</td>
												<td align=right><b><?php echo  rupiah2($totalgu);?></td>
												<td align=right><b><?php echo rupiah2($totalls);?></td>
												<td align=right><b><?php echo  rupiah2($totaltu);?></td> 
												</tr> 
								  </table>
              </div> </div></div>
            </div>
			</div>	
</div>	
<script type="text/javascript">
	var MONTHS = ['Januari', 'Febuari', 'Maret', 'April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
  var color = Chart.helpers.color;
  var barChartData = {
   labels: MONTHS,
    datasets: [
  
    {
     label: 'Pengajuan GU',
     backgroundColor: '#b6f3bb',
     borderColor: 'green',
     borderWidth: 1.5,
     data: [
    <?php 
									$sumgu1=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as sumgu1 FROM rekapbulan where MONTH(tgla2)='01' and jenisbelanja='3' and tahun='".$_SESSION['tahun']."'");
									 $sum_gu1=mysqli_fetch_array($sumgu1);
									 if ($sum_gu1['sumgu1']==0){
									 $hasilgu1='0'; 
									 }else{
									 $hasilgu1=$sum_gu1['sumgu1'];	 
									 }
									 
									  $sumgu2=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as sumgu2 FROM rekapbulan where MONTH(tgla2)='02' and jenisbelanja='3' and tahun='".$_SESSION['tahun']."'");
									 $sum_gu2=mysqli_fetch_array($sumgu2);
									 if ($sum_gu2['sumgu2']==0){
									 $hasilgu2='0'; 
									 }else{
									 $hasilgu2=$sum_gu2['sumgu2'];	 
									 }
									 
									  $sumgu3=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as sumgu3 FROM rekapbulan where MONTH(tgla2)='03' and jenisbelanja='3' and tahun='".$_SESSION['tahun']."'");
									 $sum_gu3=mysqli_fetch_array($sumgu3);
									 if ($sum_gu3['sumgu3']==0){
									 $hasilgu3='0'; 
									 }else{
									 $hasilgu3=$sum_gu3['sumgu3'];	 
									 }
									 
									  $sumgu4=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as sumgu4 FROM rekapbulan where MONTH(tgla2)='04' and jenisbelanja='3' and tahun='".$_SESSION['tahun']."'");
									 $sum_gu4=mysqli_fetch_array($sumgu4);
									 if ($sum_gu4['sumgu4']==0){
									 $hasilgu4='0'; 
									 }else{
									 $hasilgu4=$sum_gu4['sumgu4'];	 
									 }
									 
									  $sumgu5=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as sumgu5 FROM rekapbulan where MONTH(tgla2)='05' and jenisbelanja='3' and tahun='".$_SESSION['tahun']."'");
									 $sum_gu5=mysqli_fetch_array($sumgu5);
									if ($sum_gu5['sumgu5']==0){
									 $hasilgu5='0'; 
									 }else{
									 $hasilgu5=$sum_gu5['sumgu5'];	 
									 }
									 
									  $sumgu6=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as sumgu6 FROM rekapbulan where MONTH(tgla2)='06' and jenisbelanja='3' and tahun='".$_SESSION['tahun']."'");
									 $sum_gu6=mysqli_fetch_array($sumgu6);
									if ($sum_gu6['sumgu6']==0){
									 $hasilgu6='0'; 
									 }else{
									 $hasilgu6=$sum_gu6['sumgu6'];	 
									 }
									 
									  $sumgu7=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as sumgu7 FROM rekapbulan where MONTH(tgla2)='07' and jenisbelanja='3' and tahun='".$_SESSION['tahun']."'");
									 $sum_gu7=mysqli_fetch_array($sumgu7);
									 if ($sum_gu7['sumgu7']==0){
									 $hasilgu7='0'; 
									 }else{
									 $hasilgu7=$sum_gu7['sumgu7'];	 
									 }
									 
									  $sumgu8=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as sumgu8 FROM rekapbulan where MONTH(tgla2)='08' and jenisbelanja='3' and tahun='".$_SESSION['tahun']."'");
									 $sum_gu8=mysqli_fetch_array($sumgu8);
									 if ($sum_gu8['sumgu8']==0){
									 $hasilgu8='0'; 
									 }else{
									 $hasilgu8=$sum_gu8['sumgu8'];	 
									 }
									 
									  $sumgu9=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as sumgu9 FROM rekapbulan where MONTH(tgla2)='09' and jenisbelanja='3' and tahun='".$_SESSION['tahun']."'");
									 $sum_gu9=mysqli_fetch_array($sumgu9);
									 if ($sum_gu9['sumgu9']==0){
									 $hasilgu9='0'; 
									 }else{
									 $hasilgu9=$sum_gu9['sumgu9'];	 
									 }
									 
									  $sumgu10=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as sumgu10 FROM rekapbulan where MONTH(tgla2)='10' and jenisbelanja='3' and tahun='".$_SESSION['tahun']."'");
									 $sum_gu10=mysqli_fetch_array($sumgu10);
									 if ($sum_gu10['sumgu10']==0){
									 $hasilgu10='0'; 
									 }else{
									 $hasilgu10=$sum_gu10['sumgu10'];	 
									 }
									 
									  $sumgu11=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as sumgu11 FROM rekapbulan where MONTH(tgla2)='11' and jenisbelanja='3' and tahun='".$_SESSION['tahun']."'");
									 $sum_gu11=mysqli_fetch_array($sumgu11);
									 if ($sum_gu11['sumgu11']==0){
									 $hasilgu11='0'; 
									 }else{
									 $hasilgu11=$sum_gu11['sumgu11'];	 
									 }
									 
									  $sumgu12=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as sumgu12 FROM rekapbulan where MONTH(tgla2)='12' and jenisbelanja='3' and tahun='".$_SESSION['tahun']."'");
									 $sum_gu12=mysqli_fetch_array($sumgu12);
									 if ($sum_gu12['sumgu12']==0){
									 $hasilgu12='0'; 
									 }else{
									 $hasilgu12=$sum_gu12['sumgu12'];	 
									 }
									 
									  
									 
	 echo  $hasilgu1.','.$hasilgu2.','.$hasilgu3.','.$hasilgu4.','.$hasilgu5.','.$hasilgu6.','.$hasilgu7.','.$hasilgu8.','.$hasilgu9.','.$hasilgu10.','.$hasilgu11.','.$hasilgu12;
	 ?>
     ,0]
    },{
     label: 'Pengajuan LS',
     backgroundColor: '#f4d3d3',
     borderColor: 'red',
     borderWidth: 1.5,
     data: [
   <?php  
									 $sumls1=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as sumls1 FROM rekapbulan where MONTH(tgla2)='01' and jenisbelanja='1' and tahun='".$_SESSION['tahun']."'");
									 $sum_ls1=mysqli_fetch_array($sumls1);
									 if ($sum_ls1['sumls1']==0){
									 $hasills1='0'; 
									 }else{
									 $hasills1=$sum_ls1['sumls1'];	 
									 }
									 
									  $sumls2=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as sumls2 FROM rekapbulan where MONTH(tgla2)='02' and jenisbelanja='1' and tahun='".$_SESSION['tahun']."'");
									 $sum_ls2=mysqli_fetch_array($sumls2);
									 if ($sum_ls2['sumls2']==0){
									 $hasills2='0'; 
									 }else{
									 $hasills2=$sum_ls2['sumls2'];	 
									 }
									 
									  $sumls3=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as sumls3 FROM rekapbulan where MONTH(tgla2)='03' and jenisbelanja='1' and tahun='".$_SESSION['tahun']."'");
									 $sum_ls3=mysqli_fetch_array($sumls3);
									 if ($sum_ls3['sumls3']==0){
									 $hasills3='0'; 
									 }else{
									 $hasills3=$sum_ls3['sumls3'];	 
									 }
									 
									  $sumls4=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as sumls4 FROM rekapbulan where MONTH(tgla2)='04' and jenisbelanja='1' and tahun='".$_SESSION['tahun']."'");
									 $sum_ls4=mysqli_fetch_array($sumls4);
									 if ($sum_ls4['sumls4']==0){
									 $hasills4='0'; 
									 }else{
									 $hasills4=$sum_ls4['sumls4'];	 
									 }
									 
									  $sumls5=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as sumls5 FROM rekapbulan where MONTH(tgla2)='05' and jenisbelanja='1' and tahun='".$_SESSION['tahun']."'");
									 $sum_ls5=mysqli_fetch_array($sumls5);
									if ($sum_ls5['sumls5']==0){
									 $hasills5='0'; 
									 }else{
									 $hasills5=$sum_ls5['sumls5'];	 
									 }
									 
									  $sumls6=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as sumls6 FROM rekapbulan where MONTH(tgla2)='06' and jenisbelanja='1' and tahun='".$_SESSION['tahun']."'");
									 $sum_ls6=mysqli_fetch_array($sumls6);
									if ($sum_ls6['sumls6']==0){
									 $hasills6='0'; 
									 }else{
									 $hasills6=$sum_ls6['sumls6'];	 
									 }
									 
									  $sumls7=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as sumls7 FROM rekapbulan where MONTH(tgla2)='07' and jenisbelanja='1' and tahun='".$_SESSION['tahun']."'");
									 $sum_ls7=mysqli_fetch_array($sumls7);
									 if ($sum_ls7['sumls7']==0){
									 $hasills7='0'; 
									 }else{
									 $hasills7=$sum_ls7['sumls7'];	 
									 }
									 
									  $sumls8=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as sumls8 FROM rekapbulan where MONTH(tgla2)='08' and jenisbelanja='1' and tahun='".$_SESSION['tahun']."'");
									 $sum_ls8=mysqli_fetch_array($sumls8);
									 if ($sum_ls8['sumls8']==0){
									 $hasills8='0'; 
									 }else{
									 $hasills8=$sum_ls8['sumls8'];	 
									 }
									 
									  $sumls9=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as sumls9 FROM rekapbulan where MONTH(tgla2)='09' and jenisbelanja='1' and tahun='".$_SESSION['tahun']."'");
									 $sum_ls9=mysqli_fetch_array($sumls9);
									 if ($sum_ls9['sumls9']==0){
									 $hasills9='0'; 
									 }else{
									 $hasills9=$sum_ls9['sumls9'];	 
									 }
									 
									  $sumls10=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as sumls10 FROM rekapbulan where MONTH(tgla2)='10' and jenisbelanja='1' and tahun='".$_SESSION['tahun']."'");
									 $sum_ls10=mysqli_fetch_array($sumls10);
									 if ($sum_ls10['sumls10']==0){
									 $hasills10='0'; 
									 }else{
									 $hasills10=$sum_ls10['sumls10'];	 
									 }
									 
									  $sumls11=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as sumls11 FROM rekapbulan where MONTH(tgla2)='11' and jenisbelanja='1' and tahun='".$_SESSION['tahun']."'");
									 $sum_ls11=mysqli_fetch_array($sumls11);
									 if ($sum_ls11['sumls11']==0){
									 $hasills11='0'; 
									 }else{
									 $hasills11=$sum_ls11['sumls11'];	 
									 }
									 
									  $sumls12=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as sumls12 FROM rekapbulan where MONTH(tgla2)='12' and jenisbelanja='1' and tahun='".$_SESSION['tahun']."'");
									 $sum_ls12=mysqli_fetch_array($sumls12);
									 if ($sum_ls12['sumls12']==0){
									 $hasills12='0'; 
									 }else{
									 $hasills12=$sum_ls12['sumls12'];	 
									 }
									 
	 echo  $hasills1.','.$hasills2.','.$hasills3.','.$hasills4.','.$hasills5.','.$hasills6.','.$hasills7.','.$hasills8.','.$hasills9.','.$hasills10.','.$hasills11.','.$hasills12;
	 ?>
     ,0]
    } 
  
   ]

    

  };

  window.onload = function() {
   var ctx = document.getElementById('canvas').getContext('2d');
   window.myBar = new Chart(ctx, {
    type: 'line',
    data: barChartData,
    options: {
     responsive: true,
     legend: {
      position: 'bottom',
     },
     title: {
      display: true,
      text: ''
     }
    }
   });

  };

var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Sekretariat', 
          'Dikdas',
          'PAUDPNF', 
          'Ketenagaan', 
          'Pora', 'Sisa GU',  
      ],
      datasets: [
        {
          data: [
		   <?php  
									 $persengu1=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as persengu1 FROM rekapbulan where kode_user=16 and peruntukan='".$cari['nourut']."' and tahun='".$_SESSION['tahun']."'");
									 $sum_persengu1=mysqli_fetch_array($persengu1); 
									 
									 $persengu1x=$sum_persengu1['persengu1'];
									 
									 $persengu2=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as persengu2 FROM rekapbulan where kode_user=18 and peruntukan='".$cari['nourut']."' and tahun='".$_SESSION['tahun']."'");
									 $sum_persengu2=mysqli_fetch_array($persengu2); 
									 
									 $persengu2x=$sum_persengu2['persengu2'];
									 
									 $persengu3=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as persengu3 FROM rekapbulan where kode_user=19 and peruntukan='".$cari['nourut']."' and tahun='".$_SESSION['tahun']."'");
									 $sum_persengu3=mysqli_fetch_array($persengu3); 
									 
									 $persengu3x=$sum_persengu3['persengu3'];
									 
									 $persengu4=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as persengu4 FROM rekapbulan where kode_user=17 and peruntukan='".$cari['nourut']."' and tahun='".$_SESSION['tahun']."'");
									 $sum_persengu4=mysqli_fetch_array($persengu4); 
									 
									 $persengu4x=$sum_persengu4['persengu4'];
									 
									 $persengu5=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as persengu5 FROM rekapbulan where kode_user=20 and peruntukan='".$cari['nourut']."' and tahun='".$_SESSION['tahun']."'");
									 $sum_persengu5=mysqli_fetch_array($persengu5); 
									 
									 $persengu5x=$sum_persengu5['persengu5'];
									 
									 $jumlahpersengu=500000000-($sum_persengu1['persengu1']+$sum_persengu2['persengu2']+$sum_persengu3['persengu3']+$sum_persengu4['persengu4']+$sum_persengu5['persengu5']);
									 $persengusisa=($jumlahpersengu/500000000)*100;
									
									
									 
	 echo  $persengu1x.','.$persengu2x.','.$persengu3x.','.$persengu4x.','.$persengu5x.','. $jumlahpersengu;
	 ?>
		  ],
          backgroundColor : ['#3c8dbc', '#f56954', '#f39c12', '#00a65a', '#c1b60f','#f999a2'],
        },
      ],
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var donutChart = new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions      
    })
	
	var donutChartCanvas2 = $('#donutChart2').get(0).getContext('2d')
    var donutData2        = {
      labels: [
          'Sekretariat', 
          'Dikdas',
          'PAUDPNF', 
          'Ketenagaan', 
		  'Pora',		  
      ],
      datasets: [
        {
          data: [
		   <?php  
									 $persenls1=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as persenls1 FROM rekapbulan where kode_user=16 and jenisbelanja='1' and tahun='".$_SESSION['tahun']."'");
									 $sum_persenls1=mysqli_fetch_array($persenls1); 
									  
									 $persenls2=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as persenls2 FROM rekapbulan where kode_user=18 and jenisbelanja='1' and tahun='".$_SESSION['tahun']."'");
									 $sum_persenls2=mysqli_fetch_array($persenls2); 
									  
									 $persenls3=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as persenls3 FROM rekapbulan where kode_user=19 and jenisbelanja='1' and tahun='".$_SESSION['tahun']."'");
									 $sum_persenls3=mysqli_fetch_array($persenls3); 
									 
									 $persenls4=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as persenls4 FROM rekapbulan where kode_user=17 and jenisbelanja='1' and tahun='".$_SESSION['tahun']."'");
									 $sum_persenls4=mysqli_fetch_array($persenls4); 
									 
									 $persenls5=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as persenls5 FROM rekapbulan where kode_user=20 and jenisbelanja='1' and tahun='".$_SESSION['tahun']."'");
									 $sum_persenls5=mysqli_fetch_array($persenls5); 
									 
									 $persenls6=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(jmlharga) as persenls6 FROM rekapbulan where jenisbelanja='1'");
									 $sum_persenls6=mysqli_fetch_array($persenls6); 
									 
									 $totalpersenls=$sum_persenls6['persenls6'];
									   
									 
									 $persenls1x=($sum_persenls1['persenls1']/$totalpersenls)*100;
									 
									 $persenls2x=($sum_persenls2['persenls2']/$totalpersenls)*100;
									  
									 $persenls3x=($sum_persenls3['persenls3']/$totalpersenls)*100;
									 
									 $persenls4x=($sum_persenls4['persenls4']/$totalpersenls)*100;
									  
									 $persenls5x=($sum_persenls5['persenls5']/$totalpersenls)*100;
									 
									 
									 
									 $jmlpersenls1x=($sum_persenls1['persenls1']);
									 
									 $jmlpersenls2x=($sum_persenls2['persenls2']);
									  
									 $jmlpersenls3x=($sum_persenls3['persenls3']);
									 
									 $jmlpersenls4x=($sum_persenls4['persenls4']);
									  
									 $jmlpersenls5x=($sum_persenls5['persenls5']);
									 
									
									 
	 echo  $jmlpersenls1x.','.$jmlpersenls2x.','.$jmlpersenls3x.','.$jmlpersenls4x.','.$jmlpersenls5x;
	 ?>
		  ],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc'],
        },
      ],
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var donutChart = new Chart(donutChartCanvas2, {
      type: 'doughnut',
      data: donutData2,
      options: donutOptions      
    })

</script>
 		
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
					"sAjaxSource": "modul/mod_aplikasi/serverSiderekap.php", // Load Data
					"sServerMethod": "POST",
					"fnServerData": function ( sSource, aoData, fnCallback ) {
							aoData.push(
								{ "name": "table", "value": "<?php echo $_SESSION['tahun'] ;?>" }
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
					{ "orderable": true, "targets": 6, "searchable": true }  
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
