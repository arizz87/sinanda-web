<div class="nav-tabs-custom">
                  <ul class="nav nav-tabs">
			<?php
			 if ($_GET['aplikasi']=="data-ikk-triwulan1"){
			?>
			 <li class="active"><a href="data-triwulan1"  title="Daftar Bidang"><b><div style="color:green">Data IKK Bidang</b></div></a></li> 
			 <li class=""><a href="#" title="Detail Data Dukung"><b><div style="color:blue">Data Dukung Bidang</b></div></a></li> 
			 <?php
			 }else{
			?>
			 <li class=""><a href="data-triwulan1"  title="Daftar Bidang"><b><div style="color:green">Data IKK Bidang</b></div></a></li> 
			 <li class="active"><a href="#" title="Detail Data Dukung"><b><div style="color:blue">Data Dukung Bidang</b></div></a></li> 
			 <?php
			 }
			?>				  
				 </ul>  
                  <div class="tab-content">
                      <?PHP if($_GET['aplikasi']=="data-ikk-triwulan1"){ ?>
                          <?php include'detail-data-tri1.php';?> 
                      <?php } else{ ?>
                          <?php include'detail-data-ikk.php';?> 
                      <?php }  ?>     					  
                </div>                    
            </div>