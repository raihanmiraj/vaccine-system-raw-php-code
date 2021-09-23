<?php
require '../../config/adminsession.php';
require '../../config/conn.php';
include '../../includes/header.php';

?>
    <header class="d-flex justify-content-center py-3 bg-secondary">
        <h1 style="color:white">Nurse Info</h1>
        </header>
<table>
<tr>
<th>Nurse Name</th>
    <th>Hospital_Name </th>
    <th>Localtion</th>
      <th>Nurse Nid</th>
    <th>Sex</th>
    <th>Date Of Birth</th>
    <th>Address</th>
    <th>Contact Number</th>
   
    
</tr>

<?php



$selectData = 'SELECT * FROM `nurse` INNER JOIN hospital on nurse.hospital_id = hospital.id INNER JOIN cities on nurse.city_id = cities.id';
$result = mysqli_query($conn, $selectData);
while($row = mysqli_fetch_assoc($result)){
     $id =  $row['id'];
     $Nurse_Name  =  $row['Nurse_Name'];
     $Hospital_Name  =  $row['Hospital_Name'];
     $Location =  $row['city_name'];
     $Nurse_NID   =  $row['Nurse_NID'];
     $Sex  =  $row['Sex'];
     $Date_of_Birth =  $row['Date_of_Birth'];
     $Address =  $row['Address'];
     $Contact_Number  =  $row['Contact_Number'];
   ?>




<tr>
    <td><?php echo $Nurse_Name; ?></td>
    <td><?php echo $Hospital_Name; ?></td>
 
    <td><?php echo $Location; ?></td>
    <td><?php echo $Nurse_NID; ?></td>
    <td><?php echo $Sex; ?></td>
    <td><?php echo $Date_of_Birth; ?></td>   
    <td><?php echo $Address; ?></td>   
    <td><?php echo $Contact_Number; ?></td>   
 
</tr>


 

<?php
}

 

?></table>

<?php include '../../includes/footer.php'; ?>
