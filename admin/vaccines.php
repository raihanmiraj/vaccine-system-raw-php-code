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
    <th>Vaccine Name</th>
    <th>Company Name</th>
    <th>Import Date</th>
    <th>Production Date</th>
    <th>Expiary Date</th>
    <th>Production Country</th>
    <th>Ammount Of Vaccine Stored</th>
    <th>Shipment No</th>
</tr>

<?php



$selectData = 'SELECT * FROM `vaccine`';
$result = mysqli_query($conn, $selectData);
while($row = mysqli_fetch_assoc($result)){
     $id =  $row['id'];
     $Vaccine_Name =  $row['Vaccine_Name'];
     $Company_Name =  $row['Company_Name'];
     $Import_Date =  $row['Import_Date'];
     $Production_Date =  $row['Production_Date'];
     $Expiry_Date =  $row['Expiry_Date'];
     $Production_Country =  $row['Production_Country'];
     $Amount_of_Vaccine_Stored =  $row['Amount_of_Vaccine_Stored'];
     $Shipment_no =  $row['Shipment_no'];
    



     ?>




<tr>
    <td><?php echo $Vaccine_Name; ?></td>
    <td><?php echo $Company_Name; ?></td>
 
    <td><?php echo $Import_Date; ?></td>
    <td><?php echo $Production_Date; ?></td>
    <td><?php echo $Expiry_Date; ?></td>
    <td><?php echo $Production_Country; ?></td>   
    <td><?php echo $Amount_of_Vaccine_Stored; ?></td>
    <td><?php echo $Shipment_no; ?></td>
</tr>






<?php
}

 

?></table>
