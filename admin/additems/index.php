<?php
require '../../config/adminsession.php';
require '../../config/conn.php';
include '../../includes/header.php';

?>
 
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
          <h2 class="fw-bold mb-0 text-center">Administration Mode</h2>
  
          <ul class="d-grid gap-4 my-5 list-unstyled">
            <li class=" btn btn-primary" style="height:70px;padding-top: 20px;" >
       
            <a   href="addcity.php">      <h5 class="text-center">Add City</h5></a> 
           </li>
           <li class=" btn btn-primary" style="height:70px;padding-top: 20px;" >
         <a   href="addhospital.php">  <h5 class="text-center">Add Hospital</h5></a> 
           </li>
           <li class=" btn btn-primary" style="height:70px;padding-top: 20px;" >
       <a   href="addbooth.php">      <h5 class="text-center">Add Booth</h5></a> 
           </li>
           <li class=" btn btn-primary" style="height:70px;padding-top: 20px;" >
       <a   href="addvaccine.php">      <h5 class="text-center">Add Vaccine</h5></a> 
           </li>
           <li class=" btn btn-primary" style="height:70px;padding-top: 20px;" >
       <a   href="addnurseforhospital.php">      <h5 class="text-center">Add Nurse</h5></a> 
           </li>
           <li class=" btn btn-primary" style="height:70px;padding-top: 20px;" >
       <a   href="addvaccinetohospital.php">      <h5 class="text-center">Give Vaccine To Hospital</h5></a> 
           </li>
           <!-- <li class=" btn btn-primary" style="height:70px;padding-top: 20px;" >
       <a   href="addnurse.php">      <h5 class="text-center">Add Nurse</h5></a> 
           </li>
           <li class=" btn btn-primary" style="height:70px;padding-top: 20px;" >
       <a   href="addnurse.php">      <h5 class="text-center">Add Nurse</h5></a> 
           </li> -->
           <li class=" btn btn-primary" style="height:70px;padding-top: 20px;" >
       <a   href="addadmin.php">      <h5 class="text-center">Add Admin</h5></a> 
           </li>
          </ul>
          <a class="w-100 mb-2 btn btn-lg rounded-4 btn-success" href="../index.php"  >Back To Admin Home</a>
        </div>
      </div>
    </div>
  </div>

  <?php include '../../includes/footer.php'; ?>