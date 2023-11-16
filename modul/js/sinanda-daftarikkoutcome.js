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
			$("#myModalsdok").modal("show");
			$("#myModalLabel").html("<b>Tambah Data");
			$("#modedok").val("dokumen-tambahdata")
			var mode = $("#modedok").val() 
			$.ajax({
			url: "modul/mod_aplikasi/prosesdaftaroutcome.php",
			data: "mode="+mode,
			cache: false,
			success: function(msg){
			$("#viewdok").html(msg);
			}
			});  
		} 


function salindata()
{ 
		check_session()
			$("#myModalsdata").modal("show");
			$("#myModalLabel").html("<b>Tambah Data");
			$("#modedata").val("dokumen-salindata")
			var mode = $("#modedata").val() 
			$.ajax({
			url: "modul/mod_aplikasi/prosesdaftaroutcome.php",
			data: "mode="+mode,
			cache: false,
			success: function(msg){
			$("#viewdata").html(msg);
			}
			});  
} 

		
function ceksalindata()
{ 		
var tahun = $("#tahun").val();	 
		$.ajax({
		url: "modul/mod_aplikasi/ambiltabeldataikk.php",
		data: "tahun="+tahun,
		cache: false,
		success: function(msg){
		$("#listdata").html(msg);  
		}
		});	 
}

function submitSalindata()
{
			var data = $('.form-horizontal').serialize();
			$.ajax({
			type: 'POST',
			url: "modul/mod_aplikasi/simpansalindataikk.php",
			data:data,
			success: function(msg){
			toastr.success('Salin data tahun lalu berhasil disimpan.')  
			$("#myModalsdok").modal("hide");  
			setTimeout(function() {
			location.reload();
			}, 500);
			}
			});
}
		
function edit( id_outcome )
{ 
check_session()
	$.ajax({
	type: "POST",
	url: "modul/mod_aplikasi/cruddaftaroutcome.php",
	dataType: 'json',
	data: {id_outcome:id_outcome,type:"get"},
	success: function(data) {  
	$("#myModalsdok").modal("show");
	$("#modedok").val("dokumen-editdata")
	var mode = $("#modedok").val() 
	$("#kodedok").val(data.id_outcome)
	var kode = $("#kodedok").val() 
	$.ajax({
	url: "modul/mod_aplikasi/prosesdaftaroutcome.php",
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
	var iddata = $("#iddata").val();  
	var uraian = $("#uraian").val(); 
	var pembilang = $("#pembilang").val();   
	var pembagi = $("#pembagi").val();   
				if(uraian==''){
				  toastr.error('Maaf Anda belum mengisi Uraian Indikator IKK .. !');
				}else if(iddata==1 && pembilang==''){
				  toastr.error('Maaf Anda belum mengisi Rumus Pembilang .. !');
				}else if(iddata==1 && pembagi==''){
				  toastr.error('Maaf Anda belum mengisi Rumus Pembagi .. !');
				}else{ 	
				var idupdate = $("#idupdate").val();  		
				
				  let formData = new FormData();
			        formData.append('uraian', uraian);
			        formData.append('pembilang', pembilang);
			        formData.append('pembagi', pembagi); 
			        formData.append('iddata', iddata);              
					$.ajax({
			            type: 'POST',
			            url: "modul/mod_aplikasi/simpan_ikkoutcome.php",
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
	var iddata = $("#iddata").val();  
	var uraian = $("#uraian").val(); 
	var pembilang = $("#pembilang").val();   
	var pembagi = $("#pembagi").val();   
				if(uraian==''){
				  toastr.error('Maaf Anda belum mengisi Uraian Indikator IKK .. !');
				}else if(iddata==1 && pembilang==''){
				  toastr.error('Maaf Anda belum mengisi Rumus Pembilang .. !');
				}else if(iddata==1 && pembagi==''){
				  toastr.error('Maaf Anda belum mengisi Rumus Pembagi .. !');
				}else{ 	
				var idupdate = $("#idupdate").val();  		
				
				  let formData = new FormData();
			        formData.append('uraian', uraian);
			        formData.append('pembilang', pembilang);
			        formData.append('pembagi', pembagi); 
			        formData.append('iddata', iddata);          
			        formData.append('idupdate', idupdate);             
					$.ajax({
			            type: 'POST',
			            url: "modul/mod_aplikasi/simpan_ikkoutcome2.php",
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
	url: "modul/mod_aplikasi/cruddaftaroutcome.php",
	dataType: 'json',
	data: {id_outcome:id_outcome,type:"get"},
	success: function(data) {  
	$("#myModalsdok").modal("show");
	$("#modedok").val("dokumen-hapusdata")
	var mode = $("#modedok").val() 
	$("#kodedok").val(data.id_outcome)
	var kode = $("#kodedok").val() 
	$.ajax({
	url: "modul/mod_aplikasi/prosesdaftaroutcome.php",
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
							url: "modul/mod_aplikasi/hapus_dataoutcome.php",
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


function checkAll(box) 
		  {
		   let checkboxes = document.getElementsByTagName('input');

		   if (box.checked) { // jika checkbox teratar dipilih maka semua tag input juga dipilih
			for (let i = 0; i < checkboxes.length; i++) {
			 if (checkboxes[i].type == 'checkbox') {
			  checkboxes[i].checked = true;
			 }
			}
		   } else { // jika checkbox teratas tidak dipilih maka semua tag input juga tidak dipilih
			for (let i = 0; i < checkboxes.length; i++) {
			 if (checkboxes[i].type == 'checkbox') {
			  checkboxes[i].checked = false;
			 }
			}
		   }
		  }	