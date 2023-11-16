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
			url: "modul/mod_aplikasi/prosesdaftaroutput.php",
			data: "mode="+mode,
			cache: false,
			success: function(msg){
			$("#viewdata").html(msg);
			}
			});  
		} 
		
function edit( id_outcome )
{ 
check_session()
	$.ajax({
	type: "POST",
	url: "modul/mod_aplikasi/cruddaftaroutput.php",
	dataType: 'json',
	data: {id_outcome:id_outcome,type:"get"},
	success: function(data) {  
	$("#myModalsdok").modal("show");
	$("#modedok").val("dokumen-editdata")
	var mode = $("#modedok").val() 
	$("#kodedok").val(data.id_outcome)
	var kode = $("#kodedok").val() 
	$.ajax({
	url: "modul/mod_aplikasi/prosesdaftaroutput.php",
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
	var uraian = $("#uraian").val(); 
	var pembilang = $("#pembilang").val();   
	var pembagi = $("#pembagi").val();   
				if(uraian==''){
				  toastr.error('Maaf Anda belum mengisi Uraian IKK Output .. !');
				}else if(pembilang==''){
				  toastr.error('Maaf Anda belum mengisi Rumus Pembilang .. !');
				}else if(pembagi==''){
				  toastr.error('Maaf Anda belum mengisi Rumus Pembagi .. !');
				}else{ 	
				var idupdate = $("#idupdate").val();  		
				
				  let formData = new FormData();
			        formData.append('uraian', uraian);
			        formData.append('pembilang', pembilang);
			        formData.append('pembagi', pembagi);        
					$.ajax({
			            type: 'POST',
			            url: "modul/mod_aplikasi/simpan_ikkoutput.php",
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
	var uraian = $("#uraian").val(); 
	var pembilang = $("#pembilang").val();   
	var pembagi = $("#pembagi").val();   
				if(uraian==''){
				  toastr.error('Maaf Anda belum mengisi Uraian IKK Output .. !');
				}else if(pembilang==''){
				  toastr.error('Maaf Anda belum mengisi Rumus Pembilang .. !');
				}else if(pembagi==''){
				  toastr.error('Maaf Anda belum mengisi Rumus Pembagi .. !');
				}else{ 	
				var idupdate = $("#idupdate").val();  		
				
				  let formData = new FormData();
			        formData.append('uraian', uraian);
			        formData.append('pembilang', pembilang);
			        formData.append('pembagi', pembagi); 
			        formData.append('idupdate', idupdate);             
					$.ajax({
			            type: 'POST',
			            url: "modul/mod_aplikasi/simpan_ikkoutput2.php",
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

function hapus( id_outcome )
{ 
check_session()
	$.ajax({
	type: "POST",
	url: "modul/mod_aplikasi/cruddaftaroutput.php",
	dataType: 'json',
	data: {id_outcome:id_outcome,type:"get"},
	success: function(data) {  
	$("#myModalsdok").modal("show");
	$("#modedok").val("dokumen-hapusdata")
	var mode = $("#modedok").val() 
	$("#kodedok").val(data.id_outcome)
	var kode = $("#kodedok").val() 
	$.ajax({
	url: "modul/mod_aplikasi/prosesdaftaroutput.php",
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
							url: "modul/mod_aplikasi/hapus_dataoutput.php",
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
