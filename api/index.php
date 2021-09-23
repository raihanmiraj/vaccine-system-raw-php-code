<?php
require '../config/conn.php';

if(isset($_GET['getcities'])){
    $getdetails = "SELECT * FROM cities ";
    $results = mysqli_query($conn, $getdetails);
  $all = mysqli_fetch_all($results,$resulttype = MYSQLI_ASSOC);
     echo  json_encode($all);

}else if(isset($_GET['gethospitalbycity'])){
    $id = $_GET['gethospitalbycity'];
    $getdetails = "SELECT * FROM hospital WHERE city_id ='$id'";
    $results = mysqli_query($conn, $getdetails);
  $all = mysqli_fetch_all($results,$resulttype = MYSQLI_ASSOC);
  echo json_encode($all);
}else if(isset($_GET['getboothbyhospital'])){
    $id = $_GET['getboothbyhospital'];
    $getdetails = "SELECT * FROM booth WHERE hospital_id ='$id'";
    $results = mysqli_query($conn, $getdetails);
  $all = mysqli_fetch_all($results,$resulttype = MYSQLI_ASSOC);
  echo json_encode($all);
}else if(isset($_GET['getallvaccineregistrationid'])){
 
  $getdetails = "SELECT * FROM vaccine_registration ";
  $results = mysqli_query($conn, $getdetails);
$all = mysqli_fetch_all($results,$resulttype = MYSQLI_ASSOC);
echo json_encode($all);
}else if(isset($_GET['getallvaccine'])){
 
  $getdetails = "SELECT * FROM vaccine ";
  $results = mysqli_query($conn, $getdetails);
$all = mysqli_fetch_all($results,$resulttype = MYSQLI_ASSOC);
echo json_encode($all);
}else if(isset($_GET['getallprovidevaccinebyhospitalid'])){
  $id = $_GET['getallprovidevaccinebyhospitalid'];
  $getdetails = "SELECT * FROM `provide_vaccine`  INNER JOIN vaccine on provide_vaccine.vaccine_id = vaccine.id WHERE hospital_id = '$id' ";
  $results = mysqli_query($conn, $getdetails);
$all = mysqli_fetch_all($results,$resulttype = MYSQLI_ASSOC);
echo json_encode($all);
}





?>

 