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
 
function inputpembilang( id_ikk )
{ 
check_session()
	$.ajax({
	type: "POST",
	url: "modul/mod_aplikasi/crudinputtriwulan.php",
	dataType: 'json',
	data: {id_ikk:id_ikk,type:"get"},
	success: function(data) {  
	$("#myModalsdok").modal("show");
	$("#modedok").val("dokumen-input-triwulan1-a")
	var mode = $("#modedok").val() 
	$("#kodedok").val(data.id_ikk)
	var kode = $("#kodedok").val() 
	$.ajax({
	url: "modul/mod_aplikasi/prosesdaftartriwulan.php",
	data: "mode="+mode+"&kode="+kode,
	cache: false,
	success: function(msg){
	$("#viewdok").html(msg);  
	}
	});  
	}
	});
} 
 
function inputpembagi( id_ikk )
{ 
check_session()
	$.ajax({
	type: "POST",
	url: "modul/mod_aplikasi/crudinputtriwulan.php",
	dataType: 'json',
	data: {id_ikk:id_ikk,type:"get"},
	success: function(data) {  
	$("#myModalsdok").modal("show");
	$("#modedok").val("dokumen-input-triwulan1-b")
	var mode = $("#modedok").val() 
	$("#kodedok").val(data.id_ikk)
	var kode = $("#kodedok").val() 
	$.ajax({
	url: "modul/mod_aplikasi/prosesdaftartriwulan.php",
	data: "mode="+mode+"&kode="+kode,
	cache: false,
	success: function(msg){
	$("#viewdok").html(msg);  
	}
	});  
	}
	});
} 

 
function upload( id_dukung )
{ 
check_session()
	$.ajax({
	type: "POST",
	url: "modul/mod_aplikasi/cruduploaddata.php",
	dataType: 'json',
	data: {id_dukung:id_dukung,type:"get"},
	success: function(data) {  
	$("#myModalsdok").modal("show");
	$("#modedok").val("dokumen-upload1-data")
	var mode = $("#modedok").val() 
	$("#kodedok").val(data.id_dukung)
	var kode = $("#kodedok").val() 
	$.ajax({
	url: "modul/mod_aplikasi/prosesdaftartriwulan.php",
	data: "mode="+mode+"&kode="+kode,
	cache: false,
	success: function(msg){
	$("#viewdok").html(msg);  
	}
	});  
	}
	});
} 

function simpan1a()
{
check_session();  
	var angka = $("#angka").val(); 
				if(angka==''){
				 toastr.error('Maaf Angka yang dimasukan tidak boleh kosong .. !');
				}else{ 	 
				var data = $('.form-horizontal').serialize();
				$.ajax({
				type: 'POST',
				url: "modul/mod_aplikasi/simpan_datatriwulan.php",
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
} 

function simpan1b()
{
check_session();  
	var angka = $("#angka").val(); 
				if(angka==''){
				 toastr.error('Maaf Angka yang dimasukan tidak boleh kosong .. !');
				}else if(angka=='0'){
				  toastr.error('Maaf Angka yang dimasukan tidak boleh Nol .. !');
				}else{ 	 
				var data = $('.form-horizontal').serialize();
				$.ajax({
				type: 'POST',
				url: "modul/mod_aplikasi/simpan_datatriwulanb.php",
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
} 


function submitupload1()
{
check_session();  
		  var iddukung = $("#iddukung").val(); 
		  var inputFile1 = document.getElementById('file1');
		  var pathFile1 = inputFile1.value;  
		  var ekstensiOk = /(\.pdf|\.PDF)$/i;  
		  
				if(pathFile1==""){
				toastr.error('File Upload belum dipilih .. !');  
				}else{ 	 
				const file1 = $('#file1').prop('files')[0];  
				
				  let formData = new FormData();
			        formData.append('file1', file1);  
					formData.append('iddukung', iddukung);  
			        $.ajax({
			            type: 'POST',
			            url: "modul/mod_aplikasi/simpanfileupload1.php",
			            data: formData,
			            cache: false,
			            processData: false,
			            contentType: false,
			            success: function (msg) {
						toastr.success('Data berhasil disimpan.') 
						$("#myModalsdok").modal("hide");
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


function inputpembilang2( id_ikk )
{ 
check_session()
	$.ajax({
	type: "POST",
	url: "modul/mod_aplikasi/crudinputtriwulan.php",
	dataType: 'json',
	data: {id_ikk:id_ikk,type:"get"},
	success: function(data) {  
	$("#myModalsdok").modal("show");
	$("#modedok").val("dokumen-input-triwulan2-a")
	var mode = $("#modedok").val() 
	$("#kodedok").val(data.id_ikk)
	var kode = $("#kodedok").val() 
	$.ajax({
	url: "modul/mod_aplikasi/prosesdaftartriwulan.php",
	data: "mode="+mode+"&kode="+kode,
	cache: false,
	success: function(msg){
	$("#viewdok").html(msg);  
	}
	});  
	}
	});
} 
 
function inputpembagi2( id_ikk )
{ 
check_session()
	$.ajax({
	type: "POST",
	url: "modul/mod_aplikasi/crudinputtriwulan.php",
	dataType: 'json',
	data: {id_ikk:id_ikk,type:"get"},
	success: function(data) {  
	$("#myModalsdok").modal("show");
	$("#modedok").val("dokumen-input-triwulan2-b")
	var mode = $("#modedok").val() 
	$("#kodedok").val(data.id_ikk)
	var kode = $("#kodedok").val() 
	$.ajax({
	url: "modul/mod_aplikasi/prosesdaftartriwulan.php",
	data: "mode="+mode+"&kode="+kode,
	cache: false,
	success: function(msg){
	$("#viewdok").html(msg);  
	}
	});  
	}
	});
}  

function simpan2a()
{
check_session();  
	var angka = $("#angka").val(); 
				if(angka==''){
				 toastr.error('Maaf Angka yang dimasukan tidak boleh kosong .. !');
				}else{ 	 
				var data = $('.form-horizontal').serialize();
				$.ajax({
				type: 'POST',
				url: "modul/mod_aplikasi/simpan_datatriwulan2.php",
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
} 

function simpan2b()
{
check_session();  
	var angka = $("#angka").val(); 
				if(angka==''){
				  toastr.error('Maaf Angka yang dimasukan tidak boleh kosong .. !');
				}else if(angka=='0'){
				  toastr.error('Maaf Angka yang dimasukan tidak boleh Nol .. !');
				}else{ 	 
				var data = $('.form-horizontal').serialize();
				$.ajax({
				type: 'POST',
				url: "modul/mod_aplikasi/simpan_datatriwulan2b.php",
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
} 


function submitupload2()
{
check_session();  
		  var iddukung = $("#iddukung").val(); 
		  var inputFile1 = document.getElementById('file1');
		  var pathFile1 = inputFile1.value;  
		  var ekstensiOk = /(\.pdf|\.PDF)$/i;  
		  
				if(pathFile1==""){
				toastr.error('File Upload belum dipilih .. !');  
				}else{ 	 
				const file1 = $('#file1').prop('files')[0];  
				
				  let formData = new FormData();
			        formData.append('file1', file1);  
					formData.append('iddukung', iddukung);  
			        $.ajax({
			            type: 'POST',
			            url: "modul/mod_aplikasi/simpanfileupload2.php",
			            data: formData,
			            cache: false,
			            processData: false,
			            contentType: false,
			            success: function (msg) {
						toastr.success('Data berhasil disimpan.') 
						$("#myModalsdok").modal("hide");
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

function inputpembilang3( id_ikk )
{ 
check_session()
	$.ajax({
	type: "POST",
	url: "modul/mod_aplikasi/crudinputtriwulan.php",
	dataType: 'json',
	data: {id_ikk:id_ikk,type:"get"},
	success: function(data) {  
	$("#myModalsdok").modal("show");
	$("#modedok").val("dokumen-input-triwulan3-a")
	var mode = $("#modedok").val() 
	$("#kodedok").val(data.id_ikk)
	var kode = $("#kodedok").val() 
	$.ajax({
	url: "modul/mod_aplikasi/prosesdaftartriwulan.php",
	data: "mode="+mode+"&kode="+kode,
	cache: false,
	success: function(msg){
	$("#viewdok").html(msg);  
	}
	});  
	}
	});
} 
 
function inputpembagi3( id_ikk )
{ 
check_session()
	$.ajax({
	type: "POST",
	url: "modul/mod_aplikasi/crudinputtriwulan.php",
	dataType: 'json',
	data: {id_ikk:id_ikk,type:"get"},
	success: function(data) {  
	$("#myModalsdok").modal("show");
	$("#modedok").val("dokumen-input-triwulan3-b")
	var mode = $("#modedok").val() 
	$("#kodedok").val(data.id_ikk)
	var kode = $("#kodedok").val() 
	$.ajax({
	url: "modul/mod_aplikasi/prosesdaftartriwulan.php",
	data: "mode="+mode+"&kode="+kode,
	cache: false,
	success: function(msg){
	$("#viewdok").html(msg);  
	}
	});  
	}
	});
}  

function simpan3a()
{
check_session();  
	var angka = $("#angka").val(); 
				if(angka==''){
				 toastr.error('Maaf Angka yang dimasukan tidak boleh kosong .. !');
				}else{ 	 
				var data = $('.form-horizontal').serialize();
				$.ajax({
				type: 'POST',
				url: "modul/mod_aplikasi/simpan_datatriwulan3.php",
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
} 

function simpan3b()
{
check_session();  
	var angka = $("#angka").val(); 
				if(angka==''){
				  toastr.error('Maaf Angka yang dimasukan tidak boleh kosong .. !');
				}else if(angka=='0'){
				  toastr.error('Maaf Angka yang dimasukan tidak boleh Nol .. !');
				}else{ 	 
				var data = $('.form-horizontal').serialize();
				$.ajax({
				type: 'POST',
				url: "modul/mod_aplikasi/simpan_datatriwulan3b.php",
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
} 


function inputpembilang4( id_ikk )
{ 
check_session()
	$.ajax({
	type: "POST",
	url: "modul/mod_aplikasi/crudinputtriwulan.php",
	dataType: 'json',
	data: {id_ikk:id_ikk,type:"get"},
	success: function(data) {  
	$("#myModalsdok").modal("show");
	$("#modedok").val("dokumen-input-triwulan4-a")
	var mode = $("#modedok").val() 
	$("#kodedok").val(data.id_ikk)
	var kode = $("#kodedok").val() 
	$.ajax({
	url: "modul/mod_aplikasi/prosesdaftartriwulan.php",
	data: "mode="+mode+"&kode="+kode,
	cache: false,
	success: function(msg){
	$("#viewdok").html(msg);  
	}
	});  
	}
	});
} 
 
function inputpembagi4( id_ikk )
{ 
check_session()
	$.ajax({
	type: "POST",
	url: "modul/mod_aplikasi/crudinputtriwulan.php",
	dataType: 'json',
	data: {id_ikk:id_ikk,type:"get"},
	success: function(data) {  
	$("#myModalsdok").modal("show");
	$("#modedok").val("dokumen-input-triwulan4-b")
	var mode = $("#modedok").val() 
	$("#kodedok").val(data.id_ikk)
	var kode = $("#kodedok").val() 
	$.ajax({
	url: "modul/mod_aplikasi/prosesdaftartriwulan.php",
	data: "mode="+mode+"&kode="+kode,
	cache: false,
	success: function(msg){
	$("#viewdok").html(msg);  
	}
	});  
	}
	});
}  

function simpan4a()
{
check_session();  
	var angka = $("#angka").val(); 
				if(angka==''){
				  toastr.error('Maaf Angka yang dimasukan tidak boleh kosong .. !');
				}else{ 	 
				var data = $('.form-horizontal').serialize();
				$.ajax({
				type: 'POST',
				url: "modul/mod_aplikasi/simpan_datatriwulan4.php",
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
} 

function simpan4b()
{
check_session();  
	var angka = $("#angka").val(); 
				if(angka==''){
				  toastr.error('Maaf Angka yang dimasukan tidak boleh kosong .. !');
				}else if(angka=='0'){
				  toastr.error('Maaf Angka yang dimasukan tidak boleh Nol .. !');
				}else{ 	 
				var data = $('.form-horizontal').serialize();
				$.ajax({
				type: 'POST',
				url: "modul/mod_aplikasi/simpan_datatriwulan4b.php",
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
} 


function cetakcapaian1()
		{ 
		check_session()
			$("#myModalsdok").modal("show");
			$("#myModalLabel").html("<b>Tambah Data");
			$("#modedok").val("dokumen-cetakcapaian1")
			var mode = $("#modedok").val() 
			var kode = $("#kodedok").val() 
			$.ajax({
			url: "modul/mod_aplikasi/prosesdaftartriwulan.php",
			data: "mode="+mode+"&kode="+kode,
			cache: false,
			success: function(msg){
			$("#viewdok").html(msg);
			}
			});  
		} 
		


function cetakcapaian2()
		{ 
		check_session()
			$("#myModalsdok").modal("show");
			$("#myModalLabel").html("<b>Tambah Data");
			$("#modedok").val("dokumen-cetakcapaian2")
			var mode = $("#modedok").val() 
			var kode = $("#kodedok").val() 
			$.ajax({
			url: "modul/mod_aplikasi/prosesdaftartriwulan.php",
			data: "mode="+mode+"&kode="+kode,
			cache: false,
			success: function(msg){
			$("#viewdok").html(msg);
			}
			});  
		} 
		
		
		

function cetakcapaian3()
		{ 
		check_session()
			$("#myModalsdok").modal("show");
			$("#myModalLabel").html("<b>Tambah Data");
			$("#modedok").val("dokumen-cetakcapaian3")
			var mode = $("#modedok").val() 
			var kode = $("#kodedok").val() 
			$.ajax({
			url: "modul/mod_aplikasi/prosesdaftartriwulan.php",
			data: "mode="+mode+"&kode="+kode,
			cache: false,
			success: function(msg){
			$("#viewdok").html(msg);
			}
			});  
		} 
		
		


function cetakcapaian4()
		{ 
		check_session()
			$("#myModalsdok").modal("show");
			$("#myModalLabel").html("<b>Tambah Data");
			$("#modedok").val("dokumen-cetakcapaian4")
			var mode = $("#modedok").val() 
			var kode = $("#kodedok").val() 
			$.ajax({
			url: "modul/mod_aplikasi/prosesdaftartriwulan.php",
			data: "mode="+mode+"&kode="+kode,
			cache: false,
			success: function(msg){
			$("#viewdok").html(msg);
			}
			});  
		} 
  
 