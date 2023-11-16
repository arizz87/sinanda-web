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
			var kode = $("#kodedata").val() 
			$.ajax({
			url: "modul/mod_aplikasi/prosesdetaildukung.php",
			data: "mode="+mode+"&kode="+kode,
			cache: false,
			success: function(msg){
			$("#viewdata").html(msg);
			}
			});  
		} 
		
function aktif( id_dukung )
{ 
check_session()
	$.ajax({
	type: "POST",
	url: "modul/mod_aplikasi/cruddetaildukung.php",
	dataType: 'json',
	data: {id_dukung:id_dukung,type:"get"},
	success: function(data) {  
	$("#myModalsdok").modal("show");
	$("#modedok").val("dokumen-aktifdata")
	var mode = $("#modedok").val() 
	$("#kodedok").val(data.id_dukung)
	var kode = $("#kodedok").val() 
	$.ajax({
	url: "modul/mod_aplikasi/prosesdetaildukung.php",
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
				var data = $('.form-horizontal').serialize();
				$.ajax({
				type: 'POST',
				url: "modul/mod_aplikasi/simpan_detaildukung.php",
				data:data,
				success: function(msg){ 
						toastr.success('Data berhasil disimpan.') 
						$("#myModalsdata").modal("hide");  
						setTimeout(function() {
						location.reload();
						}, 500);
				}
				}); 
} 


function simpanaktif()
{
check_session(); 
			var aktif1 = $("#iddata1").val();
			var aktif2 = $("#iddata2").val(); 
			var aktif3 = $("#iddata3").val();  
			var aktif4 = $("#iddata4").val();  			
	
				var idupdate = $("#idupdate").val();  		
				
				  let formData = new FormData();
			        formData.append('aktif1', aktif1);
			        formData.append('aktif2', aktif2);
			        formData.append('aktif3', aktif3);  
			        formData.append('aktif4', aktif4);        
			        formData.append('idupdate', idupdate);             
					$.ajax({
			            type: 'POST',
			            url: "modul/mod_aplikasi/simpan_detaildukung2.php",
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

function hapus( id_dukung )
{ 
check_session()
	$.ajax({
	type: "POST",
	url: "modul/mod_aplikasi/cruddetaildukung.php",
	dataType: 'json',
	data: {id_dukung:id_dukung,type:"get"},
	success: function(data) {  
	$("#myModalsdok").modal("show");
	$("#modedok").val("dokumen-hapusdata")
	var mode = $("#modedok").val() 
	$("#kodedok").val(data.id_dukung)
	var kode = $("#kodedok").val() 
	$.ajax({
	url: "modul/mod_aplikasi/prosesdetaildukung.php",
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
							url: "modul/mod_aplikasi/hapus_detaildukung.php",
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
