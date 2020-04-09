<?php 
   session_start();
   if( !isset($_SESSION['mem_id'] ) ){
      header('Location: ../../../../index.php');  
   }
?>