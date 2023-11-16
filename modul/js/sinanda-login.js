function login( )
{ 
			var username = $("#username").val();
			 var passw = $("#password").val(); 
			if(username==""){
				toastr.error('Maaf Anda Belum Memasukan Username .. !'); 
				 $("#ceklogin").html("")  
			}else if(passw==""){
				toastr.error('Maaf Anda Belum Memasukan Password .. !');   
				 $("#ceklogin").html("")  
			}else{ 
			var data = $('#formLogin').serialize();			
			$.ajax({
				type: 'POST',
				url: "validasi.php",
				data:data,
				success: function(data){ 
				 $("#ceklogin").html(data);  					
				 var nomorcek2 = $("#nomorcek").val(); 
				 if (nomorcek2==0){ 
				 $("#ceklogin").html(data);  	 
				 }else{ 
				 $("#myModalsdata").modal("show");   
					document.getElementById('usernamex').value=document.getElementById('username').value
					document.getElementById('passwordx').value=document.getElementById('password').value
					document.getElementById('tahunx').value=document.getElementById('tahun').value					 
				 }
				}
				}); 	
			}  
}