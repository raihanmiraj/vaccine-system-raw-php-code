<?php require '../config/nursesession.php';
require '../config/conn.php';
include '../includes/header.php';
 
 
 $hospital_ID_for_this_nurse =    $_SESSION['hospital_id'];
 
 if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['nurse_id'])){
 
// $vaccineregid = $_POST['vaccineregid'];
// $vaccine = $_POST['vaccine'];
// $nurse_id = $_SESSION['nurse_id'];
// $findsql ="SELECT * FROM `registered_person`  WHERE  vaccine_reg_id = '$vaccineregid'";
// $result = mysqli_query($conn, $findsql);
// if(mysqli_num_rows($result)>0){
//     $row = mysqli_fetch_assoc($result);
//    if($row['Status'] =='pending'){
//        $user_vaccine_status_id = $row['id']; 
//        $datevaccineregister = date("Y/m/d");

//     $updateVaccineRegistration = "UPDATE `registered_person` SET  `Status`='vaccinated',`Vaccination_Date`='$datevaccineregister' ,`vaccine_id`='$vaccine',`nurse_id`='$nurse_id'  WHERE  id = '$user_vaccine_status_id'";
//        if (mysqli_query($conn, $updateVaccineRegistration)) {
//         $findIfVaccineAvailable =  "SELECT * FROM `vaccine`  WHERE  id = '$vaccine'";

//         $result = mysqli_query($conn, $findIfVaccineAvailable);
//         if(mysqli_num_rows($result)>0){
//             $row = mysqli_fetch_assoc($result);
//             if($row['Amount_of_Vaccine_Stored']>0){
//                 $storedVaccine = $row['Amount_of_Vaccine_Stored']-1;

//                 $updateVaccineStoredInfo =  "UPDATE `vaccine` SET `Amount_of_Vaccine_Stored`= '$storedVaccine'  WHERE  `id` = '$vaccine'  ";
//         if(mysqli_query($conn, $updateVaccineStoredInfo)){
//             header("Location:pushvaccine.php?message=Vaccine Reg ID : $vaccineregid successfully vaccinated ");
//         }else{
//           echo   0;
//         }
//             }
//        }

//    }


    
//    }else{
//     header("Location:pushvaccine.php?message=This User Already Vaccinated");
//    }
     
// } 


$vaccineregid = $_POST['vaccineregid'];
$vaccine = $_POST['vaccine'];
$nurse_id = $_SESSION['nurse_id'];
$findsql ="SELECT * FROM `registered_person`  WHERE  vaccine_reg_id = '$vaccineregid'";
$result = mysqli_query($conn, $findsql);
if(mysqli_num_rows($result)>0){
    $row = mysqli_fetch_assoc($result);
   if($row['Status'] =='pending'){
       $user_vaccine_status_id = $row['id']; 
       $datevaccineregister = date("Y/m/d");


       $findIfVaccineAvailable =  "SELECT * FROM `provide_vaccine` WHERE  `hospital_id` = '$hospital_ID_for_this_nurse'  AND  `vaccine_id` = '$vaccine'";

       $result = mysqli_query($conn, $findIfVaccineAvailable);
       if(mysqli_num_rows($result)>0){
           $row = mysqli_fetch_assoc($result);
           if($row['ammount']>0){
               $storedVaccine = $row['ammount']-1;
               $provide_vaccine_id = $row['id'];

               $updateVaccineRegistration = "UPDATE `registered_person` SET  `Status`='vaccinated',`Vaccination_Date`='$datevaccineregister' ,`vaccine_id`='$vaccine',`nurse_id`='$nurse_id'  WHERE  id = '$user_vaccine_status_id'";
               if (mysqli_query($conn, $updateVaccineRegistration)) {

                $updateVaccineStoredInfo =  "UPDATE `provide_vaccine` SET `ammount`= '$storedVaccine'  WHERE  `id` = '$provide_vaccine_id'  ";
                if(mysqli_query($conn, $updateVaccineStoredInfo)){
                    header("Location:pushvaccine.php?message=Vaccine Reg ID : $vaccineregid successfully vaccinated ");
                }else{
                  echo   0;
                }
            }

         
           }
      }



  


    
   }else{
    header("Location:pushvaccine.php?message=This User Already Vaccinated");
   }
     
} 



 }
 
 ?>
 
 <div class="modal modal-signin position-static d-block bg-light py-5" tabindex="-1" role="dialog" id="modalSignin">
        <div class="modal-dialog" role="document">
          <div class="modal-content rounded-5 shadow">
            <div class="modal-header p-5 pb-4 border-bottom-0 d-flex justify-content-center">
              <!-- <h5 class="modal-title">Modal title</h5> -->
              <h2 class="fw-bold mb-0 text-center ">Push Vaccine</h2>
           
            </div>
      
            <div class="modal-body p-5 pt-0">
            <form class="row g-3 needs-validation" action="" method="POST" novalidate>
  
       

<?php 
if(isset($_GET['message'])){
 ?>
  <div class="alert alert-success" role="alert">
<?php echo $_GET['message']; ?>
</div>
<?php
    } ?>      
            
  <div class="col-md-12">
  <div class="form-floating mb-3">
                  <Select type="text"  class="form-control rounded-4" name="vaccineregid" id="vaccineregid" placeholder="vaccineregid"  required>

 </Select>
                  <label for="city">Vaccine Registration ID </label>
                </div>
                
  </div>


  <div class="col-md-12">
  <div class="form-floating mb-3">
                  <select   type="text" class="form-control rounded-4" name="vaccine" id="vaccine" placeholder="Registration Date"  required>
                     
                     
                  </select>
                  <label for="vaccine">Select Vaccine</label>
                </div>
                
  </div>

  <div class="col-12 d-flex justify-content-center">
    <button class="btn btn-success px-5 p-3" type="submit">PUSH Vaccine</button>
  </div>
</form>
            </div>
          </div>
        </div>
      </div>
 <script>

 

var baseurl = "<?php echo $base_url; ?>";
 
var hospital_id = '<?php echo $hospital_ID_for_this_nurse; ?>';

$( document ).ready(function() {
    $.get(baseurl + "/api/index.php?getallvaccineregistrationid", function(data, status){
  data = JSON.parse(data);
 var optiondata =  data.map(i=>{
   if(i.hospital_id == "<?php echo $hospital_ID_for_this_nurse; ?>"){
    return  "<option value="+ i.id+">"+ i.id + "</option>"
   }
    
  })
  document.getElementById("vaccineregid").innerHTML ="<option value=''>Select Vaccine Reg ID</option>" + optiondata;
 
  });

console.log(hospital_id);
  $.get(baseurl + "/api/index.php?getallprovidevaccinebyhospitalid="+hospital_id, function(data, status){
  data = JSON.parse(data);
 var optiondata =  data.map(i=>{
    
    return  "<option value="+ i.id+">"+ i.Vaccine_Name  + "</option>"
 
    
  })
  document.getElementById("vaccine").innerHTML =  optiondata;
 
  });

 
});


// 
 









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
 
 