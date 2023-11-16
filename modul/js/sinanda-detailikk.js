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
	
	
function cekall1( id_bidang )
{ 
check_session()
	$.ajax({
				type : "POST",
				url	 : "modul/mod_aplikasi/aktiftriwulanall1.php",
				data : "id_bidang="+id_bidang,
				success : function(data) {
				toastr.success('Data berhasil diproses.') 
				$("#myModalsdata").modal("hide");  
				setTimeout(function() {
				location.reload();
				}, 500);
				}
		}); 
} 
	
function cekall2( id_bidang )
{ 
check_session()
	$.ajax({
				type : "POST",
				url	 : "modul/mod_aplikasi/aktiftriwulanall2.php",
				data : "id_bidang="+id_bidang,
				success : function(data) {
				toastr.success('Data berhasil diproses.') 
				$("#myModalsdata").modal("hide");  
				setTimeout(function() {
				location.reload();
				}, 500);
				}
		}); 
} 

	
function cekall3( id_bidang )
{ 
check_session()
	$.ajax({
				type : "POST",
				url	 : "modul/mod_aplikasi/aktiftriwulanall3.php",
				data : "id_bidang="+id_bidang,
				success : function(data) {
				toastr.success('Data berhasil diproses.') 
				$("#myModalsdata").modal("hide");  
				setTimeout(function() {
				location.reload();
				}, 500);
				}
		}); 
} 

	
function cekall4( id_bidang )
{ 
check_session()
	$.ajax({
				type : "POST",
				url	 : "modul/mod_aplikasi/aktiftriwulanall4.php",
				data : "id_bidang="+id_bidang,
				success : function(data) {
				toastr.success('Data berhasil diproses.') 
				$("#myModalsdata").modal("hide");  
				setTimeout(function() {
				location.reload();
				}, 500);
				}
		}); 
} 

												
				
function aktifikk( id_ikk )
{ 
check_session()
	$.ajax({
				type : "POST",
				url	 : "modul/mod_aplikasi/aktiftriwulan.php",
				data : "id_ikk="+id_ikk,
				success : function(data) {
				toastr.success('Data berhasil diaktifkan.') 
				$("#myModalsdata").modal("hide");  
				setTimeout(function() {
				location.reload();
				}, 500);
				}
		}); 
} 
				
function nonaktifikk( id_ikk )
{ 
check_session()
	$.ajax({
				type : "POST",
				url	 : "modul/mod_aplikasi/aktiftriwulan.php",
				data : "id_ikk="+id_ikk,
				success : function(data) {
				toastr.success('Data berhasil dinon-aktifkan.') 
				$("#myModalsdata").modal("hide");  
				setTimeout(function() {
				location.reload();
				}, 500);
				}
		}); 
} 

				
function aktifikk2( id_ikk )
{ 
check_session()
	$.ajax({
				type : "POST",
				url	 : "modul/mod_aplikasi/aktiftriwulan2.php",
				data : "id_ikk="+id_ikk,
				success : function(data) {
				toastr.success('Data berhasil diaktifkan.') 
				$("#myModalsdata").modal("hide");  
				setTimeout(function() {
				location.reload();
				}, 500);
				}
		}); 
} 
				
function nonaktifikk2( id_ikk )
{ 
check_session()
	$.ajax({
				type : "POST",
				url	 : "modul/mod_aplikasi/aktiftriwulan2.php",
				data : "id_ikk="+id_ikk,
				success : function(data) {
				toastr.success('Data berhasil dinon-aktifkan.') 
				$("#myModalsdata").modal("hide");  
				setTimeout(function() {
				location.reload();
				}, 500);
				}
		}); 
} 
				
function aktifikk3( id_ikk )
{ 
check_session()
	$.ajax({
				type : "POST",
				url	 : "modul/mod_aplikasi/aktiftriwulan3.php",
				data : "id_ikk="+id_ikk,
				success : function(data) {
				toastr.success('Data berhasil diaktifkan3.') 
				$("#myModalsdata").modal("hide");  
				setTimeout(function() {
				location.reload();
				}, 500);
				}
		}); 
} 
				
function nonaktifikk3( id_ikk )
{ 
check_session()
	$.ajax({
				type : "POST",
				url	 : "modul/mod_aplikasi/aktiftriwulan3.php",
				data : "id_ikk="+id_ikk,
				success : function(data) {
				toastr.success('Data berhasil dinon-aktifkan3.') 
				$("#myModalsdata").modal("hide");  
				setTimeout(function() {
				location.reload();
				}, 500);
				}
		}); 
} 

				
function aktifikk4( id_ikk )
{ 
check_session()
	$.ajax({
				type : "POST",
				url	 : "modul/mod_aplikasi/aktiftriwulan4.php",
				data : "id_ikk="+id_ikk,
				success : function(data) {
				toastr.success('Data berhasil diaktifkan.') 
				$("#myModalsdata").modal("hide");  
				setTimeout(function() {
				location.reload();
				}, 500);
				}
		}); 
} 
				
function nonaktifikk4( id_ikk )
{ 
check_session()
	$.ajax({
				type : "POST",
				url	 : "modul/mod_aplikasi/aktiftriwulan4.php",
				data : "id_ikk="+id_ikk,
				success : function(data) {
				toastr.success('Data berhasil dinon-aktifkan.') 
				$("#myModalsdata").modal("hide");  
				setTimeout(function() {
				location.reload();
				}, 500);
				}
		}); 
} 

				
function aktifdukung( id_dukung )
{ 
check_session()
	$.ajax({
				type : "POST",
				url	 : "modul/mod_aplikasi/aktifdatadukung.php",
				data : "id_dukung="+id_dukung,
				success : function(data) {
				toastr.success('Data berhasil diaktifkan.') 
				$("#myModalsdata").modal("hide");  
				setTimeout(function() {
				location.reload();
				}, 500);
				}
		}); 
} 
				
function nonaktifdukung( id_dukung )
{ 
check_session()
	$.ajax({
				type : "POST",
				url	 : "modul/mod_aplikasi/aktifdatadukung.php",
				data : "id_dukung="+id_dukung,
				success : function(data) {
				toastr.success('Data berhasil dinon-aktifkan.') 
				$("#myModalsdata").modal("hide");  
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
		  
function tambahdata()
		{ 
		check_session()
			$("#myModalsdata").modal("show");
			$("#myModalLabel").html("<b>Tambah Data");
			$("#modedata").val("dokumen-tambahdata")
			var mode = $("#modedata").val() 
			var kode = $("#kodedata").val() 
			$.ajax({
			url: "modul/mod_aplikasi/prosesdetailikk.php",
			data: "mode="+mode+"&kode="+kode,
			cache: false,
			success: function(msg){
			$("#viewdata").html(msg);
			}
			});  
		} 
		
		  
function aktifdukungall()
		{ 
		check_session()
			$("#myModalsdok").modal("show");
			$("#myModalLabel").html("<b>Tambah Data");
			$("#modedok").val("dokumen-aktif-triall")
			var mode = $("#modedok").val() 
			var kode = $("#kodedok").val() 
			$.ajax({
			url: "modul/mod_aplikasi/prosesdetailikk.php",
			data: "mode="+mode+"&kode="+kode,
			cache: false,
			success: function(msg){
			$("#viewdok").html(msg);
			}
			});  
		} 

		  
function hapusdukungall()
		{ 
		check_session()
			$("#myModalsdok").modal("show");
			$("#myModalLabel").html("<b>Tambah Data");
			$("#modedok").val("dokumen-hapus-triall")
			var mode = $("#modedok").val() 
			var kode = $("#kodedok").val() 
			$.ajax({
			url: "modul/mod_aplikasi/prosesdetailikk.php",
			data: "mode="+mode+"&kode="+kode,
			cache: false,
			success: function(msg){
			$("#viewdok").html(msg);
			}
			});  
		} 
		
 function submitaktifall() {
		var data = $('.form-horizontal').serialize();
		$.ajax({
		type: 'POST',
		url: "modul/mod_aplikasi/simpan_aktiftriall.php", 
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
		
 function submithapusall() {
		var data = $('.form-horizontal').serialize();
		$.ajax({
		type: 'POST',
		url: "modul/mod_aplikasi/simpan_hapustriall.php", 
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
				
function aktif( id_ikk )
{ 
check_session()
	$.ajax({
	type: "POST",
	url: "modul/mod_aplikasi/cruddetailikk.php",
	dataType: 'json',
	data: {id_ikk:id_ikk,type:"get"},
	success: function(data) {  
	$("#myModalsdok").modal("show");
	$("#modedok").val("dokumen-aktifdata")
	var mode = $("#modedok").val() 
	$("#kodedok").val(data.id_ikk)
	var kode = $("#kodedok").val() 
	$.ajax({
	url: "modul/mod_aplikasi/prosesdetailikk.php",
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
				url: "modul/mod_aplikasi/simpan_detailikk.php",
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
			var idtahun = $("#idtahun").val();  				
	
				var idupdate = $("#idupdate").val();  		
				
				  let formData = new FormData();
			        formData.append('aktif1', aktif1);
			        formData.append('aktif2', aktif2);
			        formData.append('aktif3', aktif3);  
			        formData.append('aktif4', aktif4);        
			        formData.append('idupdate', idupdate);      
			        formData.append('idtahun', idtahun);                
					$.ajax({
			            type: 'POST',
			            url: "modul/mod_aplikasi/simpan_detailikk2.php",
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

function hapus( id_ikk )
{ 
check_session()
	$.ajax({
	type: "POST",
	url: "modul/mod_aplikasi/cruddetailikk.php",
	dataType: 'json',
	data: {id_ikk:id_ikk,type:"get"},
	success: function(data) {  
	$("#myModalsdok").modal("show");
	$("#modedok").val("dokumen-hapusdata")
	var mode = $("#modedok").val() 
	$("#kodedok").val(data.id_ikk)
	var kode = $("#kodedok").val() 
	$.ajax({
	url: "modul/mod_aplikasi/prosesdetailikk.php",
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
							url: "modul/mod_aplikasi/hapus_detailikk.php",
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

	
function tambahdatadukung()
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
		
		
function aktifdata( id_dukung )
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

function simpandukung()
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


function simpanaktifdukung()
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

function hapusdata( id_dukung )
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


function submitHapusdukung()
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

function cetakdata()
		{ 
		check_session()
			$("#myModalsprint").modal("show");
			$("#myModalLabel").html("<b>Tambah Data");
			$("#modeprint").val("dokumen-cetakdata")
			var mode = $("#modeprint").val() 
			var kode = $("#kodeprint").val() 
			$.ajax({
			url: "modul/mod_aplikasi/prosesdetailikk.php",
			data: "mode="+mode+"&kode="+kode,
			cache: false,
			success: function(msg){
			$("#viewprint").html(msg);
			}
			});  
		} 
		

function validasi1( id_ikk,id_bidang )
{ 
check_session()
	$.ajax({
	type: "POST",
	url: "modul/mod_aplikasi/cruddetailnilaiikk.php",
	dataType: 'json',
	data: {id_ikk:id_ikk,id_bidang:id_bidang,type:"get"},
	success: function(data) {  
	$("#myModalsdok").modal("show");
	$("#modedok").val("dokumen-validasitri1")
	var mode = $("#modedok").val() 
	$("#kodedok").val(data.id_ikk)
	var kode = $("#kodedok").val()  
	var id_bidang = data.id_bidang; 
	$.ajax({
	url: "modul/mod_aplikasi/prosesdetailikk.php",
	data: "mode="+mode+"&kode="+kode+"&id_bidang="+id_bidang,
	cache: false,
	success: function(msg){
	$("#viewdok").html(msg); 
	}
	});  
	}
	});
} 


function validasi2( id_ikk,id_bidang )
{ 
check_session()
	$.ajax({
	type: "POST",
	url: "modul/mod_aplikasi/cruddetailnilaiikk.php",
	dataType: 'json',
	data: {id_ikk:id_ikk,id_bidang:id_bidang,type:"get"},
	success: function(data) {  
	$("#myModalsdok").modal("show");
	$("#modedok").val("dokumen-validasitri2")
	var mode = $("#modedok").val() 
	$("#kodedok").val(data.id_ikk)
	var kode = $("#kodedok").val()  
	var id_bidang = data.id_bidang; 
	$.ajax({
	url: "modul/mod_aplikasi/prosesdetailikk.php",
	data: "mode="+mode+"&kode="+kode+"&id_bidang="+id_bidang,
	cache: false,
	success: function(msg){
	$("#viewdok").html(msg); 
	}
	});  
	}
	});
} 


function validasi3( id_ikk,id_bidang )
{ 
check_session()
	$.ajax({
	type: "POST",
	url: "modul/mod_aplikasi/cruddetailnilaiikk.php",
	dataType: 'json',
	data: {id_ikk:id_ikk,id_bidang:id_bidang,type:"get"},
	success: function(data) {  
	$("#myModalsdok").modal("show");
	$("#modedok").val("dokumen-validasitri3")
	var mode = $("#modedok").val() 
	$("#kodedok").val(data.id_ikk)
	var kode = $("#kodedok").val()  
	var id_bidang = data.id_bidang; 
	$.ajax({
	url: "modul/mod_aplikasi/prosesdetailikk.php",
	data: "mode="+mode+"&kode="+kode+"&id_bidang="+id_bidang,
	cache: false,
	success: function(msg){
	$("#viewdok").html(msg); 
	}
	});  
	}
	});
} 


function validasi4( id_ikk,id_bidang )
{ 
check_session()
	$.ajax({
	type: "POST",
	url: "modul/mod_aplikasi/cruddetailnilaiikk.php",
	dataType: 'json',
	data: {id_ikk:id_ikk,id_bidang:id_bidang,type:"get"},
	success: function(data) {  
	$("#myModalsdok").modal("show");
	$("#modedok").val("dokumen-validasitri4")
	var mode = $("#modedok").val() 
	$("#kodedok").val(data.id_ikk)
	var kode = $("#kodedok").val()  
	var id_bidang = data.id_bidang; 
	$.ajax({
	url: "modul/mod_aplikasi/prosesdetailikk.php",
	data: "mode="+mode+"&kode="+kode+"&id_bidang="+id_bidang,
	cache: false,
	success: function(msg){
	$("#viewdok").html(msg); 
	}
	});  
	}
	});
} 

function unvalidasi1( id_ikk,id_bidang )
{ 
check_session()
	$.ajax({
				type : "POST",
				url	 : "modul/mod_aplikasi/unvalidasitri1.php",
				data : "id_ikk="+id_ikk+"&id_bidang="+id_bidang,
				success : function(data) {
				toastr.success('Validasi berhasil dibatalkan.') 
				$("#myModalsdata").modal("hide");  
				setTimeout(function() {
				location.reload();
				}, 500);
				}
		}); 
} 


function unvalidasi2( id_ikk,id_bidang )
{ 
check_session()
	$.ajax({
				type : "POST",
				url	 : "modul/mod_aplikasi/unvalidasitri2.php",
				data : "id_ikk="+id_ikk+"&id_bidang="+id_bidang,
				success : function(data) {
				toastr.success('Validasi berhasil dibatalkan.') 
				$("#myModalsdata").modal("hide");  
				setTimeout(function() {
				location.reload();
				}, 500);
				}
		}); 
} 


function unvalidasi3( id_ikk,id_bidang )
{ 
check_session()
	$.ajax({
				type : "POST",
				url	 : "modul/mod_aplikasi/unvalidasitri3.php",
				data : "id_ikk="+id_ikk+"&id_bidang="+id_bidang,
				success : function(data) {
				toastr.success('Validasi berhasil dibatalkan.') 
				$("#myModalsdata").modal("hide");  
				setTimeout(function() {
				location.reload();
				}, 500);
				}
		}); 
} 


function unvalidasi4( id_ikk,id_bidang )
{ 
check_session()
	$.ajax({
				type : "POST",
				url	 : "modul/mod_aplikasi/unvalidasitri4.php",
				data : "id_ikk="+id_ikk+"&id_bidang="+id_bidang,
				success : function(data) {
				toastr.success('Validasi berhasil dibatalkan.') 
				$("#myModalsdata").modal("hide");  
				setTimeout(function() {
				location.reload();
				}, 500);
				}
		}); 
} 

function validasidata()
			{
				  var idvalidasi = $("#idvalidasi").val(); 	
					if (idvalidasi==""){
					alert('Tidak bisa di validasi karena terdapat capaian yang belum diisi.') 
					}else{
						$.ajax({
							url: "modul/mod_aplikasi/simpan_validasi.php",
							data : "idvalidasi="+idvalidasi,
							cache: false,
							success: function(msg){ 
								toastr.success('Data berhasil di validasi.') 
								$("#myModalsdok").modal("hide");
								setTimeout(function() {
								  location.reload(); 
								}, 500);
							} 
								});
					}
			}

function view1( id_ikk,id_bidang )
{ 
check_session()
	$.ajax({
	type: "POST",
	url: "modul/mod_aplikasi/cruddetailnilaiikk.php",
	dataType: 'json',
	data: {id_ikk:id_ikk,id_bidang:id_bidang,type:"get"},
	success: function(data) {  
	$("#myModalsdok").modal("show");
	$("#modedok").val("dokumen-view1")
	var mode = $("#modedok").val() 
	$("#kodedok").val(data.id_ikk)
	var kode = $("#kodedok").val()  
	var id_bidang = data.id_bidang; 
	$.ajax({
	url: "modul/mod_aplikasi/prosesdetailikk.php",
	data: "mode="+mode+"&kode="+kode+"&id_bidang="+id_bidang,
	cache: false,
	success: function(msg){
	$("#viewdok").html(msg); 
	}
	});  
	}
	});
} 


function view2( id_ikk,id_bidang )
{ 
check_session()
	$.ajax({
	type: "POST",
	url: "modul/mod_aplikasi/cruddetailnilaiikk.php",
	dataType: 'json',
	data: {id_ikk:id_ikk,id_bidang:id_bidang,type:"get"},
	success: function(data) {  
	$("#myModalsdok").modal("show");
	$("#modedok").val("dokumen-view2")
	var mode = $("#modedok").val() 
	$("#kodedok").val(data.id_ikk)
	var kode = $("#kodedok").val()  
	var id_bidang = data.id_bidang; 
	$.ajax({
	url: "modul/mod_aplikasi/prosesdetailikk.php",
	data: "mode="+mode+"&kode="+kode+"&id_bidang="+id_bidang,
	cache: false,
	success: function(msg){
	$("#viewdok").html(msg); 
	}
	});  
	}
	});
} 


function view3( id_ikk,id_bidang )
{ 
check_session()
	$.ajax({
	type: "POST",
	url: "modul/mod_aplikasi/cruddetailnilaiikk.php",
	dataType: 'json',
	data: {id_ikk:id_ikk,id_bidang:id_bidang,type:"get"},
	success: function(data) {  
	$("#myModalsdok").modal("show");
	$("#modedok").val("dokumen-view3")
	var mode = $("#modedok").val() 
	$("#kodedok").val(data.id_ikk)
	var kode = $("#kodedok").val()  
	var id_bidang = data.id_bidang; 
	$.ajax({
	url: "modul/mod_aplikasi/prosesdetailikk.php",
	data: "mode="+mode+"&kode="+kode+"&id_bidang="+id_bidang,
	cache: false,
	success: function(msg){
	$("#viewdok").html(msg); 
	}
	});  
	}
	});
} 


function view4( id_ikk,id_bidang )
{ 
check_session()
	$.ajax({
	type: "POST",
	url: "modul/mod_aplikasi/cruddetailnilaiikk.php",
	dataType: 'json',
	data: {id_ikk:id_ikk,id_bidang:id_bidang,type:"get"},
	success: function(data) {  
	$("#myModalsdok").modal("show");
	$("#modedok").val("dokumen-view4")
	var mode = $("#modedok").val() 
	$("#kodedok").val(data.id_ikk)
	var kode = $("#kodedok").val()  
	var id_bidang = data.id_bidang; 
	$.ajax({
	url: "modul/mod_aplikasi/prosesdetailikk.php",
	data: "mode="+mode+"&kode="+kode+"&id_bidang="+id_bidang,
	cache: false,
	success: function(msg){
	$("#viewdok").html(msg); 
	}
	});  
	}
	});
} 

		
function cetaktri1( id_data,id_bidang )
{ 
check_session()
	$.ajax({
	type: "POST",
	url: "modul/mod_aplikasi/crudcetakrealisasi.php",
	dataType: 'json',
	data: {id_data:id_data,id_bidang:id_bidang,type:"get"},
	success: function(data) {  
	$("#myModalsdok").modal("show");
	$("#modedok").val("dokumen-cetaktri1")
	var mode = $("#modedok").val() 
	$("#kodedok").val(data.id_data)
	var kode = $("#kodedok").val() 
	$("#kodedok2").val("1") 
	var tri = $("#kodedok2").val() 
	var id_bidang = data.id_bidang
	$.ajax({
	url: "modul/mod_aplikasi/prosesdetailikk.php",
	data: "mode="+mode+"&kode="+kode+"&tri="+tri+"&id_bidang="+id_bidang,
	cache: false,
	success: function(msg){
	$("#viewdok").html(msg); 
	}
	});  
	}
	});
}

		
function cetaktri1a( id_data,id_bidang )
{ 
check_session()
	$.ajax({
	type: "POST",
	url: "modul/mod_aplikasi/crudcetakrealisasi.php",
	dataType: 'json',
	data: {id_data:id_data,id_bidang:id_bidang,type:"get"},
	success: function(data) {  
	$("#myModalsdok").modal("show");
	$("#modedok").val("dokumen-cetaktri1a")
	var mode = $("#modedok").val() 
	$("#kodedok").val(data.id_data)
	var kode = $("#kodedok").val() 
	$("#kodedok2").val("1") 
	var tri = $("#kodedok2").val() 
	var id_bidang = data.id_bidang
	$.ajax({
	url: "modul/mod_aplikasi/prosesdetailikk.php",
	data: "mode="+mode+"&kode="+kode+"&tri="+tri+"&id_bidang="+id_bidang,
	cache: false,
	success: function(msg){
	$("#viewdok").html(msg); 
	}
	});  
	}
	});
}

		
function cetaktri2( id_data,id_bidang )
{ 
check_session()
	$.ajax({
	type: "POST",
	url: "modul/mod_aplikasi/crudcetakrealisasi.php",
	dataType: 'json',
	data: {id_data:id_data,id_bidang:id_bidang,type:"get"},
	success: function(data) {  
	$("#myModalsdok").modal("show");
	$("#modedok").val("dokumen-cetaktri2")
	var mode = $("#modedok").val() 
	$("#kodedok").val(data.id_data)
	var kode = $("#kodedok").val() 
	$("#kodedok2").val("2") 
	var tri = $("#kodedok2").val() 
	var id_bidang = data.id_bidang
	$.ajax({
	url: "modul/mod_aplikasi/prosesdetailikk.php",
	data: "mode="+mode+"&kode="+kode+"&tri="+tri+"&id_bidang="+id_bidang,
	cache: false,
	success: function(msg){
	$("#viewdok").html(msg); 
	}
	});  
	}
	});
}

		
function cetaktri2a( id_data,id_bidang )
{ 
check_session()
	$.ajax({
	type: "POST",
	url: "modul/mod_aplikasi/crudcetakrealisasi.php",
	dataType: 'json',
	data: {id_data:id_data,id_bidang:id_bidang,type:"get"},
	success: function(data) {  
	$("#myModalsdok").modal("show");
	$("#modedok").val("dokumen-cetaktri2a")
	var mode = $("#modedok").val() 
	$("#kodedok").val(data.id_data)
	var kode = $("#kodedok").val() 
	$("#kodedok2").val("2") 
	var tri = $("#kodedok2").val() 
	var id_bidang = data.id_bidang
	$.ajax({
	url: "modul/mod_aplikasi/prosesdetailikk.php",
	data: "mode="+mode+"&kode="+kode+"&tri="+tri+"&id_bidang="+id_bidang,
	cache: false,
	success: function(msg){
	$("#viewdok").html(msg); 
	}
	});  
	}
	});
}

		
function cetaktri3( id_data,id_bidang )
{ 
check_session()
	$.ajax({
	type: "POST",
	url: "modul/mod_aplikasi/crudcetakrealisasi.php",
	dataType: 'json',
	data: {id_data:id_data,id_bidang:id_bidang,type:"get"},
	success: function(data) {  
	$("#myModalsdok").modal("show");
	$("#modedok").val("dokumen-cetaktri3")
	var mode = $("#modedok").val() 
	$("#kodedok").val(data.id_data)
	var kode = $("#kodedok").val() 
	$("#kodedok2").val("3") 
	var tri = $("#kodedok2").val() 
	var id_bidang = data.id_bidang
	$.ajax({
	url: "modul/mod_aplikasi/prosesdetailikk.php",
	data: "mode="+mode+"&kode="+kode+"&tri="+tri+"&id_bidang="+id_bidang,
	cache: false,
	success: function(msg){
	$("#viewdok").html(msg); 
	}
	});  
	}
	});
}

		
function cetaktri3a( id_data,id_bidang )
{ 
check_session()
	$.ajax({
	type: "POST",
	url: "modul/mod_aplikasi/crudcetakrealisasi.php",
	dataType: 'json',
	data: {id_data:id_data,id_bidang:id_bidang,type:"get"},
	success: function(data) {  
	$("#myModalsdok").modal("show");
	$("#modedok").val("dokumen-cetaktri3a")
	var mode = $("#modedok").val() 
	$("#kodedok").val(data.id_data)
	var kode = $("#kodedok").val() 
	$("#kodedok2").val("3") 
	var tri = $("#kodedok2").val() 
	var id_bidang = data.id_bidang
	$.ajax({
	url: "modul/mod_aplikasi/prosesdetailikk.php",
	data: "mode="+mode+"&kode="+kode+"&tri="+tri+"&id_bidang="+id_bidang,
	cache: false,
	success: function(msg){
	$("#viewdok").html(msg); 
	}
	});  
	}
	});
}

		
function cetaktri4( id_data,id_bidang )
{ 
check_session()
	$.ajax({
	type: "POST",
	url: "modul/mod_aplikasi/crudcetakrealisasi.php",
	dataType: 'json',
	data: {id_data:id_data,id_bidang:id_bidang,type:"get"},
	success: function(data) {  
	$("#myModalsdok").modal("show");
	$("#modedok").val("dokumen-cetaktri4")
	var mode = $("#modedok").val() 
	$("#kodedok").val(data.id_data)
	var kode = $("#kodedok").val() 
	$("#kodedok2").val("4") 
	var tri = $("#kodedok2").val() 
	var id_bidang = data.id_bidang
	$.ajax({
	url: "modul/mod_aplikasi/prosesdetailikk.php",
	data: "mode="+mode+"&kode="+kode+"&tri="+tri+"&id_bidang="+id_bidang,
	cache: false,
	success: function(msg){
	$("#viewdok").html(msg); 
	}
	});  
	}
	});
}

		
function cetaktri4a( id_data,id_bidang )
{ 
check_session()
	$.ajax({
	type: "POST",
	url: "modul/mod_aplikasi/crudcetakrealisasi.php",
	dataType: 'json',
	data: {id_data:id_data,id_bidang:id_bidang,type:"get"},
	success: function(data) {  
	$("#myModalsdok").modal("show");
	$("#modedok").val("dokumen-cetaktri4a")
	var mode = $("#modedok").val() 
	$("#kodedok").val(data.id_data)
	var kode = $("#kodedok").val() 
	$("#kodedok2").val("4") 
	var tri = $("#kodedok2").val() 
	var id_bidang = data.id_bidang
	$.ajax({
	url: "modul/mod_aplikasi/prosesdetailikk.php",
	data: "mode="+mode+"&kode="+kode+"&tri="+tri+"&id_bidang="+id_bidang,
	cache: false,
	success: function(msg){
	$("#viewdok").html(msg); 
	}
	});  
	}
	});
}