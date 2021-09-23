<?php  require  '../config/adminsession.php'; ?>
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

 
<!-- 
<div class="contentbox">
<div class="box">
<a href="vaccines.php">Vaccines</a>
</div>
<div class="box">
<a href="hospitals.php">Hospital</a>
</div>
<div class="box">
<a href="vaccineregistrationinfo.php">Vaccine Reg Info</a>
</div>
 <div class="box">
 <a href="logout.php">Logout</a>
</div>



 </div> -->





 <div class="modal modal-tour position-static d-block bg-light py-5" tabindex="-1" role="dialog" id="modalTour">
    <div class="modal-dialog" role="document">
      <div class="modal-content rounded-6 shadow">
        <div class="  p-5 " >
          <h2 class="fw-bold mb-0 text-center">Administration Mode</h2>
  
          <ul class="d-grid gap-4 my-5 list-unstyled">
            <li class=" btn btn-primary" style="height:70px;padding-top: 20px;" >
       
            <a   href="vaccines.php">      <h5 class="text-center">Vaccines</h5></a> 
           </li>
           <li class=" btn btn-primary" style="height:70px;padding-top: 20px;" >
         <a   href="hospitals/index.php">  <h5 class="text-center"> Hospitals</h5></a> 
           </li>
           <li class=" btn btn-primary" style="height:70px;padding-top: 20px;" >
       <a   href="vaccineregistrationinfo.php">      <h5 class="text-center">Vaccine Registration Info</h5></a> 
           </li>
           <li class=" btn btn-primary" style="height:70px;padding-top: 20px;" >
       <a   href="additems/index.php">      <h5 class="text-center">Add Items</h5></a> 
           </li>

          </ul>
          <div class=" d-flex justify-content-center ">
<a href="../logout.php" class="btn btn-primary px-5 p-3">Log Out</a>
</div>
        </div>
  
      </div>

              

    </div>
  </div>


