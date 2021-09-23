<?php
require 'config/conn.php';
if(isset($_POST['nid'])  && isset($_POST['password'])){

  $nid  = $_POST['nid'];
  $password  = $_POST['password'];
$HasAvaiable = "SELECT * FROM `nurse` WHERE  Nurse_NID = '".$nid."' AND nurse_pass = '".$password."' ";
$results = mysqli_query($conn, $HasAvaiable);
 
if(mysqli_num_rows($results)>0){
     $results = mysqli_fetch_assoc( $results);
   session_start();
   $_SESSION['nurse_nid'] =$nid ;
   $_SESSION['password'] =   $password;
   $_SESSION['nurse_id'] =   $results['id'];
   $_SESSION['hospital_id'] =   $results['hospital_id'];
 
 header("Location:nurse/index.php");
 exit(); 

}else{
    header("Location:nurselogin.php?message=Incorrect Password Or NID");
    exit(); 
}


  
}  else if(isset($_POST['username']) && $_POST['password']){

  
  $username  = $_POST['username'];
  $password  = $_POST['password'];
$HasAvaiable = "SELECT * FROM `vaccine_system_administrator` WHERE  username = '".$username."' AND password = '".$password."' ";
$results = mysqli_query($conn, $HasAvaiable);
 
if(mysqli_num_rows($results)>0){
     $results = mysqli_fetch_assoc( $results);
   session_start();
   $_SESSION['username'] = $results['username'];
   $_SESSION['password'] =  $results['password'];
   $_SESSION['id'] =  $results['id'];
   $_SESSION['is_admin'] = 1;
 
 header("Location:admin/index.php");
 exit(); 

}else{
    header("Location:adminlogin.php?message=Incorrect Password Or Username");
    exit(); 
}
}else if(isset($_POST['nid'])){
  $nid  = $_POST['nid'];
 $HasAvaiable = "SELECT * FROM `vaccine_registration` WHERE  NID = '".$nid."' ";
 $results = mysqli_query($conn, $HasAvaiable);
 if(mysqli_num_rows($results)>0){
      $results = mysqli_fetch_assoc( $results);
    session_start();
    $_SESSION["id"] = $results["id"];
    $_SESSION['nid'] =  $results['NID'];
    $_SESSION['is_admin'] = 0;
   
  
   header("Location:user/index.php");
  exit(); 
 }else{
     header("Location:userlogin.php?message=This NID Doesn't Exist, Register One"); exit(); 
 }
 
 
 }




?>