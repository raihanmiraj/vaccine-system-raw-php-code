<?php require '../config/nursesession.php';
require '../config/conn.php';
include '../includes/header.php';
if(isset($_GET['id'])){


    $id = $_GET['id'];

}

?>

<header class="d-flex justify-content-center py-3 bg-secondary">
        <h1 style="color:white">Vaccine Pushed History</h1>
        </header>

<table>
<tr>
    <th>Vaccine Reg ID</th>
    <th>Vaccine Name</th>
    <th>User NID</th>
 
</tr>

<?php



$selectData = "SELECT  registered_person.*  , vaccine.Vaccine_Name  FROM `registered_person`
INNER JOIN vaccine ON registered_person.`vaccine_id`=vaccine.id WHERE nurse_id =  '$id' ";
     
$result = mysqli_query($conn, $selectData);
while($row = mysqli_fetch_assoc($result)){
     $id =  $row['id'];
     $Vaccine_Name =  $row['Vaccine_Name'];
     $vaccine_reg_id =  $row['vaccine_reg_id'];
     $nid =  $row['nid'];
 
    



     ?>




<tr>
    <td><?php echo $vaccine_reg_id; ?></td>
    <td><?php echo $Vaccine_Name; ?></td>
 
    <td><?php echo $nid; ?></td>
 
</tr>






<?php
}

 

?></table>
