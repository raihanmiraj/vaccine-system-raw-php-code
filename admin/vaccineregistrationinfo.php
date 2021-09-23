<?php
require '../config/adminsession.php';
require '../config/conn.php';
include '../includes/header.php';


?>

<header class="d-flex justify-content-center py-3 bg-secondary">
        <h1 style="color:white">Vaccine Registration Info</h1>
        </header>
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
    <th>Where to</th>
    <th>Reg Date</th>
    
</tr>

<?php



$selectData = 'SELECT * FROM `vaccine_registration`';
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
     $From_where_willing_to_get_Vaccinated =  $row['From_where_willing_to_get_Vaccinated'];
     $Registration_Date =  $row['Registration_Date'];
   
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
    <td><?php echo $From_where_willing_to_get_Vaccinated; ?></td>   
    <td><?php echo $Registration_Date; ?></td>   
 
 
</tr>


 

<?php
}

 

?></table>
