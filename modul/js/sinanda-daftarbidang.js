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
			url: "modul/mod_aplikasi/prosesdaftarbidang.php",
			data: "mode="+mode,
			cache: false,
			success: function(msg){
			$("#viewdata").html(msg);
			}
			});  
		} 
		
function edit( id_bidang )
{ 
check_session()
	$.ajax({
	type: "POST",
	url: "modul/mod_aplikasi/cruddaftarbidang.php",
	dataType: 'json',
	data: {id_bidang:id_bidang,type:"get"},
	success: function(data) {  
	$("#myModalsdok").modal("show");
	$("#modedok").val("dokumen-editdata")
	var mode = $("#modedok").val() 
	$("#kodedok").val(data.id_bidang)
	var kode = $("#kodedok").val() 
	$.ajax({
	url: "modul/mod_aplikasi/prosesdaftarbidang.php",
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
	var nama = $("#nama").val(); 
	var namakabid = $("#namakabid").val();   
	var nip = $("#nip").val();   
				if(nama==''){
				  toastr.error('Maaf Anda belum mengisi Nama Bidang .. !');
				}else if(namakabid==''){
				  toastr.error('Maaf Anda belum mengisi Nama Kepala Bidang .. !');
				}else if(nip==''){
				  toastr.error('Maaf Anda belum mengisi NIP Kepala Bidang .. !');
				}else{ 	
				var idupdate = $("#idupdate").val();  		
				
				  let formData = new FormData();
			        formData.append('nama', nama);
			        formData.append('namakabid', namakabid);
			        formData.append('nip', nip);        
					$.ajax({
			            type: 'POST',
			            url: "modul/mod_aplikasi/simpan_bidang.php",
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
	var nama = $("#nama").val(); 
	var namakabid = $("#namakabid").val();   
	var nip = $("#nip").val();   
				if(nama==''){
				  toastr.error('Maaf Anda belum mengisi Nama Bidang .. !');
				}else if(namakabid==''){
				  toastr.error('Maaf Anda belum mengisi Nama Kepala Bidang .. !');
				}else if(nip==''){
				  toastr.error('Maaf Anda belum mengisi NIP Kepala Bidang .. !');
				}else{ 	
				var idupdate = $("#idupdate").val();  		
				
				  let formData = new FormData();
			        formData.append('nama', nama);
			        formData.append('namakabid', namakabid);
			        formData.append('nip', nip);
			        formData.append('idupdate', idupdate);            
					$.ajax({
			            type: 'POST',
			            url: "modul/mod_aplikasi/simpan_bidang2.php",
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

function hapus( id_bidang )
{ 
check_session()
	$.ajax({
	type: "POST",
	url: "modul/mod_aplikasi/cruddaftarbidang.php",
	dataType: 'json',
	data: {id_bidang:id_bidang,type:"get"},
	success: function(data) {  
	$("#myModalsdok").modal("show");
	$("#modedok").val("dokumen-hapusdata")
	var mode = $("#modedok").val() 
	$("#kodedok").val(data.id_bidang)
	var kode = $("#kodedok").val() 
	$.ajax({
	url: "modul/mod_aplikasi/prosesdaftarbidang.php",
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
							url: "modul/mod_aplikasi/hapus_databidang.php",
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
			
function cetak( id_bidang )
{ 
check_session()
	$.ajax({
	type: "POST",
	url: "modul/mod_aplikasi/cruddaftarbidang.php",
	dataType: 'json',
	data: {id_bidang:id_bidang,type:"get"},
	success: function(data) {  
	$("#myModalsdok").modal("show");
	$("#modedok").val("dokumen-cetakdata")
	var mode = $("#modedok").val() 
	$("#kodedok").val(data.id_bidang)
	var kode = $("#kodedok").val() 
	$.ajax({
	url: "modul/mod_aplikasi/prosesdaftarbidang.php",
	data: "mode="+mode+"&kode="+kode,
	cache: false,
	success: function(msg){
	$("#viewdok").html(msg); 
	}
	});  
	}
	});
}
