<?php
if(!isset($_SESSION)) { 
    session_start();
  } 
 
  if(isset($_SESSION['username']) && isset($_SESSION['password'])){
  
  }else{
    require 'conn.php';
    $url = $base_url . '/adminlogin.php';
   header("Location: $url ");
    exit();
 
  }
 
?>