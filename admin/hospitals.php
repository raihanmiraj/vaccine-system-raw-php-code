<?php
require '../config/adminsession.php';
require '../config/conn.php';
include '../includes/header.php';


?>
<table>
<tr>
<th>Hospital Name</th>
    <th>Location</th>
    <th>Vaccine Name</th>
      <th>Company Name</th>
    <th>Distribution Data</th>
    <th>Ammount Of Vaccine</th>
    
</tr>

<?php



$selectData = 'SELECT * FROM `hospital`';
$result = mysqli_query($conn, $selectData);
while($row = mysqli_fetch_assoc($result)){
     $id =  $row['id'];
     $Hospital_Name  =  $row['Hospital_Name'];
     $Location =  $row['Location'];
     $Vaccine_Name  =  $row['Vaccine_Name'];
     $Company_Name  =  $row['Company_Name'];
     $Distribution_Date =  $row['Distribution_Date'];
     $Amount_of_Vaccine_Obtained =  $row['Amount_of_Vaccine_Obtained'];
   ?>




<tr>
    <td><?php echo $Hospital_Name; ?></td>
    <td><?php echo $Location; ?></td>
 
    <td><?php echo $Vaccine_Name; ?></td>
    <td><?php echo $Company_Name; ?></td>
    <td><?php echo $Distribution_Date; ?></td>
    <td><?php echo $Amount_of_Vaccine_Obtained; ?></td>   
 
</tr>


 

<?php
}

 

?></table>
