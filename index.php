 <?php require 'config/conn.php'; ?>
 <?php include 'includes/header.php'; ?>

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
          <h2 class="fw-bold mb-0 text-center">Vaccine Registration System</h2>
  
          <ul class="d-grid gap-4 my-5 list-unstyled">
            <li class=" btn btn-primary" style="height:70px;padding-top: 20px;" >
       
            <a   href="userlogin.php">      <h5 class="text-center">User Login</h5></a> 
           </li>
           <li class=" btn btn-primary" style="height:70px;padding-top: 20px;" >
         <a   href="adminlogin.php">  <h5 class="text-center"> Admin Login</h5></a> 
           </li>
           <li class=" btn btn-primary" style="height:70px;padding-top: 20px;" >
       <a   href="nurselogin.php">      <h5 class="text-center">Nurse Login</h5></a> 
           </li>
          </ul>
        
        </div>
      </div>
    </div>
  </div>

  <?php include 'includes/footer.php'; ?>
 