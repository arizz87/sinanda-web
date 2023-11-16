<?php  
 //check_session.php  
 session_start();
 if(isset($_SESSION['level']))  
 {  
      echo '0';     //session not expired       
 }  
 else  
 {  
      echo '1';     //session expired  
 }
 ?>