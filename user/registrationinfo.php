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
 
 <?php
 
 
 if($_SESSION['id']){

    $id  = $_SESSION['id'];
    $HasAvaiable = "SELECT  vaccine_registration.id , vaccine_registration.Name , vaccine_registration.NID , hospital.Hospital_Name, vaccine_registration.Registration_Date , vaccine_registration.booth_no    FROM `vaccine_registration`
    INNER JOIN hospital ON vaccine_registration.`hospital_id`=hospital.id 
       INNER JOIN registered_person ON vaccine_registration.`id`=registered_person.`vaccine_reg_id`  WHERE  vaccine_registration.id = '".$id."' ";
    $results = mysqli_query($conn, $HasAvaiable);
    if(mysqli_num_rows($results)>0){
         $results = mysqli_fetch_assoc( $results);
    
    $id =  $results['id'];
$NID = $results['NID'];
$Name = $results['Name'];
$Hospital_Name = $results['Hospital_Name'];
$Registration_Date = $results['Registration_Date'];
$booth_no = $results['booth_no'];
 } 
}
 
 
 ?>
 <div class="modal modal-signin position-static d-block bg-light py-5" tabindex="-1" role="dialog" id="modalSignin">
        <div class="modal-dialog" role="document">
          <div class="modal-content rounded-5 shadow">
            <div class="modal-header p-5 pb-4 border-bottom-0">
              <!-- <h5 class="modal-title">Modal title</h5> -->
              <h2 class="fw-bold mb-0 d-flex justify-content-center">Registration Info</h2>
           
            </div>
      
            <div class="modal-body p-5 pt-0">
           
            <ul class="d-grid gap-4 my-5 list-unstyled">
                <div class="row">
            <div class="col-md-6">
            <li class=" alert alert-primary" style="height:70px;padding-top: 20px;" >
       
                <h5 class="text-center">Reg ID: <?php echo $id; ?></h5> 
           </li>
            </div>
            <div class="col-md-6">
            <li class="alert alert-primary" style="height:70px;padding-top: 20px;" >
       
                <h5 class="text-center"><?php echo $NID; ?></h5> 
           </li>
            </div>
            </div>
            <div class="row">
            <div class="col-md-6">
            <li class="alert alert-primary" style="height:70px;padding-top: 20px;" >
       
                <h5 class="text-center"><?php echo $Name; ?></h5> 
           </li>
            </div>
            <div class="col-md-6">
            <li class="alert alert-primary" style="height:70px;padding-top: 20px;" >
       
                <h5 class="text-center"><?php echo $Hospital_Name; ?></h5> 
           </li>
            </div>
            </div>
            <div class="row">
            <div class="col-md-6">
            <li class="alert alert-primary" style="height:70px;padding-top: 20px;" >
       
                <h5 class="text-center"><?php echo $Registration_Date; ?></h5> 
           </li>
            </div>
            <div class="col-md-6">
            <li class="alert alert-primary" style="height:70px;padding-top: 20px;" >
       
                <h5 class="text-center">Booth No: <?php echo $booth_no; ?></h5> 
           </li>
            </div>
            </div>
           
          </ul>
          <!-- <a class="w-100 mb-2 btn btn-lg rounded-4 btn-success" href="index.php"  >Back</a> -->
          <div class="row  ">
          <div class="col-md-6  d-flex justify-content-center">

<a href="../logout.php" class="btn btn-primary  rounded-4 px-5 p-3">Log Out</a>
</div>

<div class="col-md-6  d-flex justify-content-center">

<a href="index.php" class="btn btn-success  rounded-4 px-5 p-3">Back</a>
</div>
          </div>
        



            </div>
          </div>
        </div>
      </div>
 <script>









     // Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
 </script>

  <?php include '../includes/footer.php'; ?>
 
 