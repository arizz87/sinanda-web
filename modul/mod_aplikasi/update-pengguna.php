<!DOCTYPE html>
<html>
    <head> 
		<script src="./modul/js/jquery-1.11.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/typeahead.min.js"></script>
		<script src="modul/js/sinanda-daftarpengguna.js"></script>
        <script type="text/javascript" src="modul/js/jquery-3.2.1.min.js"></script>  
<script>
$(document).ready(function(){
  	$('[data-toggle="tooltip"]').tooltip();
});
</script>
</head>
<body> 
 

<?php
$namasekolah=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * FROM tb_user where kode_user='".$_SESSION['kode_user']."'"));
$jenjang=substr($namasekolah['nama_sekolah'],0,2);

$cek=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * FROM tb_user,tb_bidang where tb_user.id_bidang=tb_bidang.id_bidang and tb_user.kode_user='".$_SESSION['kode_user']."'"));
 
?>
    <div class="card-body bg-white">  
			 <div class="modal-body"> 
			<form enctype="multipart/form-data" class="form-horizontal" method="post"  name="formDetail" id="formDetail"> 
			<input type="hidden" class="form-control" id=kode_user name=kode_user value="<?php echo $cek['kode_user'] ?>">			
		<div class="row">
          <!-- left column -->
          <div class="col-md-9">
		  <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title"><div id=text1><b><font style="font-size:13px" class="box-title"><i class="fa fa-user-circle"></i> UPDATE DATA PENGGUNA</font></b></div></h3>
			<div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button> 
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
		  <font style="font-size:13px" color="black">
						<div class="form-group row">  
							<div class="col-sm-6">Nama Pengguna
                            <input type="text" class="form-control" autocomplete="off" id=nama name=nama style="font-size:13px" value="<?php echo $cek['nama_pengguna'] ?>">
                          </div> 	
                          <div class="col-sm-6">Nama Bidang
                            <input type="text" class="form-control" autocomplete="off" disabled style="text-transform:uppercase;font-size:13px" value="<?php echo $cek['nama_bidang'] ?>">
                          </div> 					  
                        </div>
						<div class="form-group row">  	
							<div class="col-sm-6">Nama Kepala Bidang 
                            <input type="text" class="form-control" autocomplete="off" id=nama_kabid name=nama_kabid style="font-size:13px" value="<?php echo $cek['nama_kabid'] ?>">
                          </div>  
                          <div class="col-sm-6">NIP Kepala Bidang
                            <input type="text" class="form-control" autocomplete="off" id=nip name=nip style="text-transform:uppercase;font-size:13px" value="<?php echo $cek['nip_kabid'] ?>">
                          </div>					  
                        </div>
						<div class="form-group row"> 
                          <div class="col-sm-6">Username
                            <input type="text" class="form-control" disabled autocomplete="off" style="font-size:13px" value="<?php echo $cek['username'] ?>">
                          </div> 
							<div class="col-sm-6">Password
                            <input type="text" name="password" class="form-control" placeholder="* Kosongkan jika tidak merubah Password" id="password"  style="font-size:13px"/>
                          </div> 						  
                        </div>  
					 </font>
            <!-- /.row -->
          </div>  
            <div class="modal-footer"> 
				 <button type="button" style="font-size:13px" id="simpanakun" name="simpanakun" class="btn btn-success"/><i class="fa fa-save"></i> Simpan</button> 
				 <a href="dashboard"><button type="button" style="font-size:13px" class="btn btn-danger"><i class="fa fa-times"></i> Tutup</button></a>
            </div> 
        </div>
		</div> </div> 	
					</div>	 
            </div>
    </div>
 
 
</body>
</html>