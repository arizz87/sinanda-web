<div class="nav-tabs-custom">
                  <ul class="nav nav-tabs">
			<?php
			 if ($_GET['aplikasi']=="daftar-bidang"){
			?>
			 <li class="active"><a href="set-ikk-bidang"  title="Daftar Bidang"><b><div style="color:#F00">Daftar Bidang</b></div></a></li>
			 <li class=""><a href="#" title="Detail Data IKK"><b><div style="color:green">Detail Data</b></div></a></li>  
			 <?php
			 }else if ($_GET['aplikasi']=="detail-data"){
			?>
			 <li class=""><a href="set-ikk-bidang"  title="Daftar Bidang"><b><div style="color:#F00">Daftar Bidang</b></div></a></li>
			 <li class="active"><a href="#" title="Detail Data IKK"><b><div style="color:green">Detail Data</b></div></a></li>  
			 <?php
			 }else{
			?>
			 <li class=""><a href="set-ikk-bidang"  title="Daftar Bidang"><b><div style="color:#F00">Daftar Bidang</b></div></a></li>
			 <li class=""><a href="#" title="Detail Data IKK"><b><div style="color:green">Detail Data</b></div></a></li>  
			 <?php
			 }
			?>				  
				 </ul>  
                  <div class="tab-content">
                      <?PHP if($_GET['aplikasi']=="daftar-bidang"){ ?>
                          <?php include'set-ikk-bidang.php';?> 
                      <?php } else if($_GET['aplikasi']=="detail-data"){ ?>
                          <?php include'detail-data-ikk.php';?> 
                      <?php }  else if($_GET['aplikasi']=="detail-data-dukung"){ ?>
                          <?php include'detail-data-dukung.php';?> 
                      <?php } ?>     					  
                </div>                    
            </div>