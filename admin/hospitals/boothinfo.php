<?php
require '../../config/adminsession.php';
require '../../config/conn.php';
include '../../includes/header.php';

?>

<header class="d-flex justify-content-center py-3 bg-secondary">
        <h1 style="color:white">Booth Info</h1>
        </header>
<table>
<tr>
 
    <th>Hospital_Name </th>
    <th>Localtion</th>
      <th>Floor</th>
 
    <th>Wing</th>
    <th>Section</th>
    <th>Booth No</th>
   
    
</tr>

<?php



$selectData = 'SELECT booth.* , hospital.Hospital_Name , cities.city_name FROM `booth` INNER JOIN hospital on booth.hospital_id = hospital.id  INNER JOIN cities on booth.city_id = cities.id';
$result = mysqli_query($conn, $selectData);
while($row = mysqli_fetch_assoc($result)){
     $id =  $row['id'];
  
     $Hospital_Name  =  $row['Hospital_Name'];
     $Location =  $row['city_name'];
     $Floor   =  $row['Floor'];
     $Wing  =  $row['Wing'];
     $Section =  $row['Section'];
     $Booth_no =  $row['id'];
 
   ?>




<tr>
    <td><?php echo $Hospital_Name; ?></td>
    <td><?php echo $Location; ?></td>
 
    <td><?php echo $Floor; ?></td>
    <td><?php echo $Wing; ?></td>
    <td><?php echo $Section; ?></td>
    <td><?php echo $Booth_no; ?></td>   
  
 
</tr>


 

<?php
}

 

?></table>

<?php include '../../includes/footer.php'; ?>
