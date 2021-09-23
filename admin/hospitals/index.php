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
       
            <a   href="hospitalsinfo.php">      <h5 class="text-center">Hospital Info</h5></a> 
           </li>
           <li class=" btn btn-primary" style="height:70px;padding-top: 20px;" >
         <a   href="nurseinfo.php">  <h5 class="text-center"> Nurse</h5></a> 
           </li>
           <li class=" btn btn-primary" style="height:70px;padding-top: 20px;" >
       <a   href="boothinfo.php">      <h5 class="text-center">Booth</h5></a> 
           </li>
          </ul>
          <a class="w-100 mb-2 btn btn-lg rounded-4 btn-success" href="../index.php"  >Back To Admin Home</a>
        </div>
      </div>
    </div>
  </div>

  <?php include '../../includes/footer.php'; ?>