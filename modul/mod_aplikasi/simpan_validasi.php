<?php
require_once'../../koneksi.php';
//require_once 'fungsi.php';
//include'datediff.php';
  
		$SQL = mysqli_query($con, "update tb_nilai_ikk_tri1 set validasi='1' where id_nilai='$_GET[idvalidasi]'"); 
?>