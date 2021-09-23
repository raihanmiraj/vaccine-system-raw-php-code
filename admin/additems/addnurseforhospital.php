<?php
require '../../config/adminsession.php';
require '../../config/conn.php';
include '../../includes/header.php';
 
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

 
  echo   $city = $_POST['city'];
  echo   $hospital = $_POST['hospital'];
  echo   $nursename = $_POST['nursename'];
  echo   $address = $_POST['address'];
  echo   $contactnumber = $_POST['contactnumber'];
  echo   $nursenid = $_POST['nursenid'];
  echo   $nursepass = $_POST['nursepassword'];
  echo   $dateofbirth = $_POST['dateofbirth'];
  echo   $sex = $_POST['sex'];

  $insertData = "INSERT INTO `nurse`( `Nurse_Name`, `city_id`, `hospital_id`, `Nurse_NID`, `nurse_pass`, `Sex`, `Date_of_Birth`, `Address`, `Contact_Number`) VALUES ( '".$nursename."', '".$city."','".$hospital."', '".$nursenid."', '".$nursepass."', '".$sex."','".$dateofbirth."', '".$address."',  '".$contactnumber."' )";
 if (mysqli_query($conn, $insertData)) {
                        header("Location:addnurseforhospital.php?message=Nurse Added Success"); 
                        exit();
                    }
   

    
     
 
    
    }else{
     
    }
  
 
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

<div class="modal modal-signin position-static d-block bg-light py-5" tabindex="-1" role="dialog" id="modalSignin">
        <div class="modal-dialog" role="document">
          <div class="modal-content rounded-5 shadow">
            <div class="modal-header p-5 pb-4 border-bottom-0 d-flex justify-content-center">
              <!-- <h5 class="modal-title">Modal title</h5> -->
              <h2 class="fw-bold mb-0 text-center">Add Nurse For Hospital</h2>
           
            </div>
      
            <div class="modal-body p-5 pt-0">
              <form class="" action="" method="POST">
    <?php 
if(isset($_GET['message'])){
 ?>
  <div class="alert alert-success" role="alert">
<?php echo $_GET['message']; ?>
</div>
<?php
    }else if(isset($_GET['error'])){
        ?>
         <div class="alert alert-danger" role="alert">
       <?php echo $_GET['error']; ?>
       </div>
       <?php }  ?>    
           
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
                  <input  type="text" class="form-control rounded-4" name="nursename" id="nursename" placeholder="Nurse Name"  required>
                   </select>
                  <label for="nursename">Nurse Name</label>
                </div>
                
  </div>
 
  <div class="col-md-12">
  <div class="form-floating mb-3">
                  <select  type="text" class="form-control rounded-4" name="sex" id="sex" placeholder="Vaccine Ammount"  required>
                  <option value="Female">Female</option>
<option value="Male">Male</option>


                   </select>
                  <label for="sex">Sex</label>
                </div>
                
  </div> 


  <div class="col-md-12">
  <div class="form-floating mb-3">
                  <input  type="text" class="form-control rounded-4" name="nursenid" id="nursenid" placeholder="Nurse NID"  required>
                   </input>
                  <label for="nursenid">Nurse NID</label>
                </div>
                
  </div>

  
  <div class="col-md-12">
  <div class="form-floating mb-3">
                  <input  type="text" class="form-control rounded-4" name="nursepassword" id="nursepassword" placeholder="Nurse Password"  required>
                   </select>
                  <label for="nursepassword">Nurse Password</label>
                </div>
                
  </div>

  <div class="col-md-12">
  <div class="form-floating mb-3">
                  <input  type="date" class="form-control rounded-4" name="dateofbirth" id="dateofbirth" placeholder="Vaccine Date Of Birth"  required>
                   </select>
                  <label for="dateofbirth">Date Of Birth</label>
                </div>
                
  </div>

  <div class="col-md-12">
  <div class="form-floating mb-3">
                  <input  type="text" class="form-control rounded-4" name="address" id="address" placeholder="Address"  required>
                   </select>
                  <label for="address">Address</label>
                </div>
                
  </div>

  <div class="col-md-12">
  <div class="form-floating mb-3">
                  <input  type="text" class="form-control rounded-4" name="contactnumber" id="contactnumber" placeholder="Contact Number"  required>
                   </select>
                  <label for="contactnumber">Contact Number</label>
                </div>
                
  </div>




    <button class="w-100 mb-2 btn btn-lg rounded-4 btn-primary" type="submit">Add Nurse</button>
    <a class="w-100 mb-2 btn btn-lg rounded-4 btn-success" href="index.php"  >Back To Add Item</a>
                </form>
            </div>
          </div>
        </div>
      </div>
 
<script>

var baseurl = "<?php echo $base_url; ?>"
 


const SelectBoothHandler =(e) => {
    $.get(baseurl + "/api/index.php?getboothbyhospital="+ e, function(data, status){
  data = JSON.parse(data);
  const optiondata =  data.map(i=>{
      return  "<option value="+ i.id+">"+i.Booth_no + "</option>";
  })
  document.getElementById("booth").innerHTML =  optiondata;
   });
}


const SelectCityHandler = (e) =>{

    $.get(baseurl + "/api/index.php?gethospitalbycity="+ e, function(data, status){
  data = JSON.parse(data);
 const optiondata =  data.map(i=>{
    console.log(i);
      return  "<option value="+ i.id+">"+i.Hospital_Name + "</option>"
  });
  document.getElementById("hospital").innerHTML =    optiondata;
 
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



</script>
  <?php include '../../includes/footer.php'; ?>
 
 


