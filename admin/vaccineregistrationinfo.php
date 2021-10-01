<?php
require '../config/adminsession.php';
require '../config/conn.php';
include '../includes/header.php';


$checkingVaccinated = "SELECT * FROM `registered_person`";
$result = mysqli_query($conn, $checkingVaccinated);
$numberOfVaccinatedPerson = 0;
$totalRegistered = 0;
$pending = 0;
while($row = mysqli_fetch_assoc($result)){
if($row['Status'] == 'vaccinated'){
  $numberOfVaccinatedPerson++;
}else{
  $pending++;
}


$totalRegistered++;
}






?>

<header class="d-flex justify-content-center py-3 bg-secondary">
        <h1 style="color:white">Vaccine Registration Info</h1>
        </header>

<div class="row p-4 py-10">
  <div class="col-md-4">
  <div class="alert alert-primary" role="alert">
Total Registered Person : <?php echo $totalRegistered; ?>
</div>
  </div>
  <div class="col-md-4">
  <div class="alert alert-success" role="alert">
  Number Of Vaccinated Person : <?php echo $numberOfVaccinatedPerson; ?>
</div>
    </div>
    <div class="col-md-4">
    <div class="alert alert-danger" role="alert">
 Number Of Pending Person : <?php echo $pending; ?>
</div>
    </div>
</div>


<table>
<tr>
<th>Name</th>
    <th>NID</th>
    <th>Contact Number</th>
      <th>Sex</th>
    <th>Date Of Birth</th>
    <th>Occupation</th>
    <th>Info past disease</th>
    <th>Present Address</th>
  
    <th>Reg Date</th>
    <th>Status</th>
    
</tr>

<?php



$selectData = 'SELECT * FROM `registered_person` INNER JOIN  vaccine_registration on registered_person.vaccine_reg_id = vaccine_registration.id';
$result = mysqli_query($conn, $selectData);
while($row = mysqli_fetch_assoc($result)){
     $id =  $row['id'];
     $Name  =  $row['Name'];
     $NID  =  $row['NID'];
     $Contact_Number   =  $row['Contact_Number'];
     $Sex  =  $row['Sex'];
     $Date_of_Birth =  $row['Date_of_Birth'];
     $Occupation =  $row['Occupation'];
     $Info_on_Past_Deseases =  $row['Info_on_Past_Deseases'];
     $Present_Address =  $row['Present_Address'];
 
     $Registration_Date =  $row['Registration_Date'];
     $status =  $row['Status'];
   
   ?>




<tr>
    <td><?php echo $Name; ?></td>
    <td><?php echo $NID; ?></td>
 
    <td><?php echo $Contact_Number; ?></td>
    <td><?php echo $Sex; ?></td>
    <td><?php echo $Date_of_Birth; ?></td>
    <td><?php echo $Occupation; ?></td>   
    <td><?php echo $Info_on_Past_Deseases; ?></td>   
    <td><?php echo $Present_Address; ?></td>   
 
    <td><?php echo $Registration_Date; ?></td> 

    <?php if($status == 'pending'){

      ?>
<td><span class="badge bg-warning text-dark"><?php echo $status; ?></span></td>  
      <?php

    }else{?>
 <td><span class="badge bg-success"><?php echo $status; ?></span></td>  
<?php
    }
    ?>
   
 
 
</tr>


 

<?php
}

 

?></table>
