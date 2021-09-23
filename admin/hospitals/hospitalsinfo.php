<?php
require '../../config/adminsession.php';
require '../../config/conn.php';
include '../../includes/header.php';

?>
    <header class="d-flex justify-content-center py-3 bg-secondary">
        <h1 style="color:white">Hospitals Info</h1>
        </header>
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



$selectData = 'SELECT * FROM `hospital` INNER JOIN cities on hospital.city_id = cities.id INNER JOIN provide_vaccine on hospital.id = provide_vaccine.hospital_id INNER JOIN vaccine on provide_vaccine.vaccine_id = vaccine.id';
$result = mysqli_query($conn, $selectData);
while($row = mysqli_fetch_assoc($result)){
     $id =  $row['id'];
     $Hospital_Name  =  $row['Hospital_Name'];
     $Location =  $row['city_name'];
     $Vaccine_Name  =  $row['Vaccine_Name'];
     $Company_Name  =  $row['Company_Name'];
     $Distribution_Date =  $row['Distribution_Date'];
     $Amount_of_Vaccine_Obtained =  $row['ammount'];
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

<?php include '../../includes/footer.php'; ?>
