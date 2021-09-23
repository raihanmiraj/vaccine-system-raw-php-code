<?php
if(!isset($_SESSION)) { 
    session_start();
  } 
  if(isset($_SESSION['nid'])){
  
  }else{
    require 'conn.php';
   $url = $base_url . '/userlogin.php';
  header("Location: $url ");
   exit();
  }
   
?>