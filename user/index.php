<?php  require  '../config/session.php'; ?>
<?php require '../config/conn.php'; ?>
<?php require '../includes/header.php'; ?>
<style>
    a{
        text-decoration: none;
        color: #fff;
    }
    a:hover{
    color:#fff;
    cursor: pointer;
}

</style>

 

 <div class="modal modal-tour position-static d-block bg-light py-5" tabindex="-1" role="dialog" id="modalTour">
    <div class="modal-dialog" role="document">
      <div class="modal-content rounded-6 shadow">
        <div class="  p-5 " >
          <h2 class="fw-bold mb-0 text-center">Your Status</h2>
  
          <ul class="d-grid gap-4 my-5 list-unstyled">
            <li class=" btn btn-primary" style="height:70px;padding-top: 20px;" >
       
            <a   href="registrationinfo.php">      <h5 class="text-center">Registration info</h5></a> 
           </li>
<?php
$id  = $_SESSION['id']; 
           $findsql ="SELECT * FROM `registered_person`  WHERE  vaccine_reg_id = '$id' ";
$result = mysqli_query($conn, $findsql);
if (mysqli_num_rows($result)>0) {
    $row = mysqli_fetch_assoc($result);
    if ($row['Status'] =='pending') {
        ?>
           <li class=" btn btn-secondary" style="height:70px;padding-top: 20px;" >
         <h5 class="text-center"> Certificate </h5> 
           </li>

           <?php
    }else {

      ?>
      <li class=" btn btn-success" style="height:70px;padding-top: 20px;" >
    <a   href="certificate.php">  <h5 class="text-center"> Certificate </h5></a> 
      </li>

      <?php


    }
}?>
           
          </ul>
  
        </div>
      </div>
    </div>
  </div>


