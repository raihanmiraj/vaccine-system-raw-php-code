<?php
if(!isset($_SESSION)) { 
    session_start();
  } 
 
  if(isset($_SESSION['nurse_nid']) && isset($_SESSION['password']) && isset($_SESSION['nurse_id'])){
 
  }else{
    require 'conn.php';
    $url = $base_url . '/nurselogin.php';
   header("Location: $url ");
    exit();
 
  }
 
?>