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
td {
  text-align: center;
  width: 50%!important;
}
th{
    text-align: center;  
    width: 50%!important;
}
</style>
 
 <?php
 
 
 if($_SESSION['id']){

    $id  = $_SESSION['id'];
    $HasAvaiable = "SELECT vaccine_registration.id , vaccine.Vaccine_Name, vaccine_registration.Name, nurse.Nurse_Name , vaccine_registration.NID , hospital.Hospital_Name, vaccine_registration.Registration_Date , vaccine_registration.booth_no FROM `vaccine_registration` INNER JOIN hospital ON vaccine_registration.`hospital_id`=hospital.id INNER JOIN registered_person ON vaccine_registration.`id`=registered_person.`vaccine_reg_id` INNER JOIN nurse on registered_person.nurse_id = nurse.id INNER JOIN vaccine on registered_person.vaccine_id = vaccine.id  WHERE  vaccine_registration.id = '".$id."' ";
    $results = mysqli_query($conn, $HasAvaiable);
    if(mysqli_num_rows($results)>0){
         $results = mysqli_fetch_assoc( $results);
    
    $id =  $results['id'];
$NID = $results['NID'];
$Name = $results['Name'];
$Hospital_Name = $results['Hospital_Name'];
$Registration_Date = $results['Registration_Date'];
$booth_no = $results['booth_no'];
$nursename = $results['Nurse_Name'];
$vaccineName = $results['Vaccine_Name'];
 } 
}
 
 
 ?>
 <div class="modal modal-signin position-static d-block bg-light py-5" tabindex="-1" role="dialog" id="modalSignin">
        <div class="modal-dialog" role="document">
          <div class="modal-content rounded-5 shadow" id="table"> 
            <div class="modal-header p-5 pb-4 border-bottom-0 d-flex justify-content-center">
              <!-- <h5 class="modal-title">Modal title</h5> -->
              <h2 class="fw-bold mb-0 d-flex justify-content-center">Certificate</h2>
           
            </div>
      
            <div class="modal-body p-5 pt-0">
          

<div class="container table-responsive py-5" > 
<table class="table table-bordered table-hover">
 
<!-- <tr>
    <th>Name</th>
    <th>Value</th>
   
</tr> -->

<tr>
 <td>Registration ID</td>  
    <td><?php echo $id; ?></td>  
</tr>
<tr>
 <td>NID</td>  
    <td><?php echo $NID; ?></td>  
</tr>
<tr>
 <td>Name</td>  
    <td><?php echo $Name; ?></td>  
</tr>
<tr>
 <td>Hospital Name</td>  
    <td><?php echo $Hospital_Name; ?></td>  
</tr>
<tr>
 <td>Registration Date</td>  
    <td><?php echo $Registration_Date; ?></td>  
</tr>
<tr>
 <td>Booth No</td>  
    <td><?php echo $booth_no; ?></td>  
</tr>
<tr>
 <td>Pushed By</td>  
    <td><?php echo $nursename; ?></td>  
</tr>
<tr>
 <td>Vaccine</td>  
    <td><?php echo $vaccineName; ?></td>  
</tr>
 
  </tbody>
</table>
</div>
<div id="printbutton" class=" d-flex justify-content-center ">

<button onclick="printDiv('table')" class="btn btn-primary px-5 p-3 m-3">Print</button>
</div>
      
            </div>
 
          </div>
      
        </div>
      </div>
 <script>






const Print = () =>{
    window.print();
}


function printDiv(divName) {
 
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;
 

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}



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
 
 