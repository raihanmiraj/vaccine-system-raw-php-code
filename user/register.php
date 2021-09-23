<?php require '../config/conn.php'; ?>
 <?php include '../includes/header.php'; 
 

 
 if ($_SERVER['REQUEST_METHOD'] == 'POST'){

$name = $_POST['name'];
$nid = $_POST['nid'];
$contactnumber = $_POST['contactnumber'];
$sex = $_POST['sex'];
$dateofbirth = $_POST['dateofbirth'];
$occupation = $_POST['occupation'];
$infoonfirstdisease = $_POST['infoonfirstdisease'];
$presentaddress = $_POST['presentaddress'];
$city = $_POST['city'];
$hospital = $_POST['hospital'];
$booth = $_POST['booth'];
$datevaccineregister = date("Y/m/d");
$mysqli_inserted_id = 0;

$insertData = "INSERT INTO `vaccine_registration`(`Name`, `NID`, `Contact_Number`, `Sex`, `Date_of_Birth`, `Occupation`, `Info_on_Past_Deseases`, `Present_Address`, `hospital_id`, `booth_no`,    `city_id`,`Registration_Date`) VALUES ( '".$name."', '".$nid."', '".$contactnumber."', '".$sex."', '".$dateofbirth."', '".$occupation."', '".$infoonfirstdisease."', '".$presentaddress."', '".$hospital."', '".$booth."', '".$city."', '".$datevaccineregister."' )";
if(mysqli_query($conn, $insertData)){

}else{
 
}
$mysqli_inserted_id = mysqli_insert_id($conn);
$days_ago = date('Y/m/d', strtotime('+10 days', strtotime($datevaccineregister)));
 
 $status = "pending";
$insertRegister = "  INSERT INTO `registered_person`( `nid`, `Status`, `Vaccination_Date`,  `vaccine_reg_id`) VALUES ( '".$nid."', '".$status."', '".$days_ago."', '".$mysqli_inserted_id."')";

if(mysqli_query($conn, $insertRegister)){
  $_SESSION['id'] = $mysqli_inserted_id;
  $_SESSION['nid'] = $nid;

  header("Location:registrationinfo.php"); 
  exit();
}else{
  echo 0;
}


 }
 
 ?>
 
 <div class="modal modal-signin position-static d-block bg-light py-5" tabindex="-1" role="dialog" id="modalSignin">
        <div class="modal-dialog" role="document">
          <div class="modal-content rounded-5 shadow">
            <div class="modal-header p-5 pb-4 border-bottom-0 d-flex justify-content-center">
              <!-- <h5 class="modal-title">Modal title</h5> -->
              <h2 class="fw-bold mb-0 text-center ">Vaccine Registration</h2>
           
            </div>
      
            <div class="modal-body p-5 pt-0">
            <form class="row g-3 needs-validation" action="" method="POST" novalidate>
  <div class="col-md-6">
  <div class="form-floating mb-3">
                  <input type="text" class="form-control rounded-4" name="name" id="name" placeholder="Your Name" required>
                  <label for="name">Name</label>
                </div>
                
  </div>
  <div class="col-md-6">
  <div class="form-floating mb-3">
                  <input type="number" class="form-control rounded-4" name="nid" id="nid" placeholder="National International Card" required>
                  <label for="nid">NID</label>
                </div>
                
  </div>

  <div class="col-md-6">
  <div class="form-floating mb-3">
                  <input type="number" class="form-control rounded-4" name="contactnumber" id="contactnumber" placeholder="Contact Number" required>
                  <label for="contactnumber">Contact Number</label>
                </div>
                
  </div>

  <div class="col-md-6">
  <div class="form-floating mb-3">
  <select  type="text" class="form-control rounded-4" name="sex" id="sex" placeholder="Vaccine Ammount"  required>
                  <option value="Female">Female</option>
<option value="Male">Male</option>
                 </select>
                 <label for="sex">Sex</label>
                </div>
                
  </div>
  
  <div class="col-md-6">
  <div class="form-floating mb-3">
                  <input type="date" class="form-control rounded-4" name="dateofbirth" id="dateofbirth" placeholder="Date Of Birth" required>
                  <label for="dateofbirth">Date Of Birth</label>
                </div>
                
  </div>
  <div class="col-md-6">
  <div class="form-floating mb-3">
                  <input type="text" class="form-control rounded-4" name="occupation" id="occupation" placeholder="Occupation" required>
                  <label for="occupation">Occupation</label>
                </div>
                
  </div>
  <div class="col-md-6">
  <div class="form-floating mb-3">
                  <input type="text" class="form-control rounded-4" name="infoonfirstdisease" id="infoonfirstdisease" placeholder="Info On First Disease"  >
                  <label for="infoonfirstdisease">Info On First Disease</label>
                </div>
                
  </div>

  <div class="col-md-6">
  <div class="form-floating mb-3">
                  <input type="text" class="form-control rounded-4" name="presentaddress" id="presentaddress" placeholder="Present Address " required>
                  <label for="presentaddress">Present Address </label>
                </div>
                
  </div>

  <div class="col-md-12">
  <div class="form-floating mb-3">
                  <Select type="text" onchange="SelectCityHandler(this.value)"  class="form-control rounded-4" name="city" id="city" placeholder="city"  required>



                  </Select>
                  <label for="city">City </label>
                </div>
                
  </div>


  <div class="col-md-12">
  <div class="form-floating mb-3">
                  <select onchange="SelectBoothHandler(this.value)" type="text" class="form-control rounded-4" name="hospital" id="hospital" placeholder="Registration Date"  required>
                     
                     
                  </select>
                  <label for="hospital">Select Hospital</label>
                </div>
                
  </div>


  <div class="col-md-12">
  <div class="form-floating mb-3">
                  <select  type="text" class="form-control rounded-4" name="booth" id="booth" placeholder="Booth"  required>
                     
                     
                  </select>
                  <label for="booth">Select Booth</label>
                </div>
                
  </div>

 

  <div class="col-12 d-flex justify-content-center">
    <button class="btn btn-success px-5 p-3" type="submit">Submit</button>
  </div>
</form>
            </div>
          </div>
        </div>
      </div>
 <script>

const SelectHospitalHandler = (e)=>{
  


    
}


const SelectBoothHandler =(e) => {
    $.get(baseurl + "/api/index.php?getboothbyhospital="+ e, function(data, status){
  data = JSON.parse(data);
  const optiondata =  data.map(i=>{
      return  "<option value="+ i.id+">"+i.id + "</option>";
  });
  console.log(optiondata);
  document.getElementById("booth").innerHTML =  "<option value=''>Select Booth</option>" + optiondata;
   });
}


const SelectCityHandler = (e) =>{

    $.get(baseurl + "/api/index.php?gethospitalbycity="+ e, function(data, status){
  data = JSON.parse(data);
 const optiondata =  data.map(i=>{
    console.log(i);
      return  "<option value="+ i.id+">"+i.Hospital_Name + "</option>"
  });
  document.getElementById("hospital").innerHTML =  "<option value=''>Select Hospital</option>" +   optiondata;
 
  });
}

var baseurl = "<?php echo $base_url; ?>";
 


$( document ).ready(function() {
    $.get(baseurl + "/api/index.php?getcities", function(data, status){
  data = JSON.parse(data);
 var optiondata =  data.map(i=>{
      return  "<option value="+ i.id+">"+i.city_name + "</option>"
  })
  document.getElementById("city").innerHTML ="<option value=''>Select City</option>" + optiondata;
 
  });

// Rendering Number 1 Booth
  $.get(baseurl + "/api/index.php?getboothbyhospital=1", function(data, status){
  data = JSON.parse(data);
  var optiondata =  data.map(i=>{
      return  "<option value="+ i.id+">"+i.Booth_no + "</option>";
  })
  document.getElementById("booth").innerHTML ="<option value=''>Select Booth</option>" + optiondata;
   });
// Rendering Number 1 Hospital
   $.get(baseurl + "/api/index.php?gethospitalbycity=1", function(data, status){
  data = JSON.parse(data);
 const optiondata =  data.map(i=>{
    console.log(i);
      return  "<option value="+ i.id+">"+i.Hospital_Name + "</option>"
  });
  document.getElementById("hospital").innerHTML = "<option value=''>Select Hospital</option>"  +  optiondata;
 
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
 
 