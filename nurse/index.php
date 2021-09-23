<?php  require  '../config/nursesession.php'; ?>
<?php require '../config/conn.php'; ?>
<?php require '../includes/header.php';
  $nurseID =$_SESSION['nurse_id'];
 
 

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
       
            <a   href="pushvaccine.php">      <h5 class="text-center">Push Vaccine</h5></a> 
           </li>
           <li class=" btn btn-primary" style="height:70px;padding-top: 20px;" >
         <a   href="vaccinepushhistory.php?id=<?php echo $nurseID; ?>">  <h5 class="text-center">Vaccine Push History</h5></a> 
           </li>
           
          </ul>
        
  <div class=" d-flex justify-content-center ">

<a href="../logout.php" class="btn btn-primary px-5 p-3">Log Out</a>
</div>
        </div>
      </div>
    </div>
  </div>


  <?php require '../includes/footer.php'; ?>