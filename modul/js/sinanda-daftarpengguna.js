 function check_session(){
	$.ajax({
		url: "modul/mod_aplikasi/check_session.php",
		method: "POST",
		success: function(data){
			if(data == "1"){
				alert("Maaf anda sudah logout, Silahkan login kembali.");
				window.location.href = "logout.php";
			}
		}
	})		
	}
	
function tambahdata()
		{ 
		check_session()
			$("#myModalsdata").modal("show");
			$("#myModalLabel").html("<b>Tambah Data");
			$("#modedata").val("dokumen-tambahdata")
			var mode = $("#modedata").val() 
			$.ajax({
			url: "modul/mod_aplikasi/prosesdaftarpengguna.php",
			data: "mode="+mode,
			cache: false,
			success: function(msg){
			$("#viewdata").html(msg);
			}
			});  
		} 
		
function edit( kode_user )
{ 
check_session()
	$.ajax({
	type: "POST",
	url: "modul/mod_aplikasi/cruddaftarpengguna.php",
	dataType: 'json',
	data: {kode_user:kode_user,type:"get"},
	success: function(data) {  
	$("#myModalsdok").modal("show");
	$("#modedok").val("dokumen-editdata")
	var mode = $("#modedok").val() 
	$("#kodedok").val(data.kode_user)
	var kode = $("#kodedok").val() 
	$.ajax({
	url: "modul/mod_aplikasi/prosesdaftarpengguna.php",
	data: "mode="+mode+"&kode="+kode,
	cache: false,
	success: function(msg){
	$("#viewdok").html(msg);  
	}
	});  
	}
	});
} 

function simpan()
{
check_session(); 
	var username = $("#username").val(); 
	var passw = $("#passw").val();   
	var nama = $("#nama").val();   
	var bidang = $("#bidang").val();    
	var level = $("#level").val();      
				if(username==''){
				  toastr.error('Maaf Anda belum mengisi Username .. !');
				}else if(passw==''){
				  toastr.error('Maaf Anda belum mengisi Password .. !');
				}else if(nama==''){
				  toastr.error('Maaf Anda belum mengisi Nama Pengguna .. !');
				}else if(bidang==''){
				  toastr.error('Maaf Anda belum mengisi Nama Bidang .. !');
				}else if(level==''){
				  toastr.error('Maaf Anda belum mengisi Level User .. !');
				}else{ 	 
				
				  let formData = new FormData();
			        formData.append('username', username);
			        formData.append('passw', passw);
			        formData.append('nama', nama);  
			        formData.append('bidang', bidang);
			        formData.append('level', level);          
					$.ajax({
			            type: 'POST',
			            url: "modul/mod_aplikasi/simpan_pengguna.php",
			            data: formData,
			            cache: false,
			            processData: false,
			            contentType: false,
			            success: function (msg) {
						toastr.success('Data berhasil disimpan.') 
						$("#myModalsdata").modal("hide");  
						setTimeout(function() {
						location.reload();
						}, 500);
			            },
			            error: function () {
			                alert("Berkas gagal diupload !");
			            }
			        });
				}					
} 


function simpanedit()
{
check_session(); 
	var username = $("#username").val(); 
	var passw = $("#passw").val();   
	var nama = $("#nama").val();   
	var bidang = $("#bidang").val();    
	var level = $("#level").val();      
				if(username==''){
				  toastr.error('Maaf Anda belum mengisi Username .. !');
				}else if(nama==''){
				  toastr.error('Maaf Anda belum mengisi Nama Pengguna .. !');
				}else if(bidang==''){
				  toastr.error('Maaf Anda belum mengisi Nama Bidang .. !');
				}else if(level==''){
				  toastr.error('Maaf Anda belum mengisi Level User .. !');
				}else{ 	 
				var idupdate = $("#idupdate").val();  		
				
				  let formData = new FormData();
			        formData.append('username', username);
			        formData.append('passw', passw);
			        formData.append('nama', nama);  
			        formData.append('bidang', bidang);
			        formData.append('level', level);     
			        formData.append('idupdate', idupdate);            
					$.ajax({
			            type: 'POST',
			            url: "modul/mod_aplikasi/simpan_pengguna2.php",
			            data: formData,
			            cache: false,
			            processData: false,
			            contentType: false,
			            success: function (msg) {
						toastr.success('Data berhasil disimpan.') 
						$("#myModalsdata").modal("hide");  
						setTimeout(function() {
						location.reload();
						}, 500);
			            },
			            error: function () {
			                alert("Berkas gagal diupload !");
			            }
			        });
				}					
} 

function hapus( kode_user )
{ 
check_session()
	$.ajax({
	type: "POST",
	url: "modul/mod_aplikasi/cruddaftarpengguna.php",
	dataType: 'json',
	data: {kode_user:kode_user,type:"get"},
	success: function(data) {  
	$("#myModalsdok").modal("show");
	$("#modedok").val("dokumen-hapusdata")
	var mode = $("#modedok").val() 
	$("#kodedok").val(data.kode_user)
	var kode = $("#kodedok").val() 
	$.ajax({
	url: "modul/mod_aplikasi/prosesdaftarpengguna.php",
	data: "mode="+mode+"&kode="+kode,
	cache: false,
	success: function(msg){
	$("#viewdok").html(msg); 
	}
	});  
	}
	});
}


function submitHapus()
			{
				  var idhapus = $("#idhapus").val(); 			
						$.ajax({
							url: "modul/mod_aplikasi/hapus_datapengguna.php",
							data : "idhapus="+idhapus,
							cache: false,
							success: function(msg){ 
								toastr.success('Data berhasil dihapus.') 
								$("#myModalsdok").modal("hide");
								setTimeout(function() {
								  location.reload(); 
								}, 500);
							} 
								});
			}
			
	
	$(function(){
		$("#simpanakun").click(function(){  
		  var nama_kabid = $("#nama_kabid").val();
		  var kode_user = $("#kode_user").val();		  
		  var nip = $("#nip").val();
		  var nama = $("#nama").val(); 
		  var password = $("#password").val();
		  
			if(nama==""){
				toastr.error('Maaf Anda belum mengisi Nama Pengguna .. !'); 
			}else if(nama_kabid==""){
				toastr.error('Maaf Anda belum mengisi Nama Kepala Bidang .. !');  
			}else if(nip==""){
				toastr.error('Maaf Anda belum mengisi NIP Kepala Bidang .. !');  
			}else{
			$.ajax({
					url: "modul/mod_aplikasi/simpan_pengguna3.php",
					data : "nama="+nama+"&nama_kabid="+nama_kabid+"&nip="+nip+"&password="+password+"&kode_user="+kode_user,
					cache: false,
					success: function(msg){ 
					toastr.success('Data berhasil disimpan.')  
				  setTimeout(function() {
						  location.reload();
						}, 500);
					}
				});
			}
		
		});
	});