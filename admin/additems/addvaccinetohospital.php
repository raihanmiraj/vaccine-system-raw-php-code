<?php
require '../../config/adminsession.php';
require '../../config/conn.php';
include '../../includes/header.php';
 
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

 
    $city = $_POST['city'];
    $hospital = $_POST['hospital'];
    $vaccine = $_POST['vaccine'];
    $vaccineammount = $_POST['vaccineammount'];
  
      $findIfVaccineAvailable =  "SELECT * FROM `vaccine`  WHERE  id = '$vaccine'";

        $result = mysqli_query($conn, $findIfVaccineAvailable);
        if(mysqli_num_rows($result)>0){
            $row = mysqli_fetch_assoc($result);
            if($row['Amount_of_Vaccine_Stored']> $vaccineammount){
                $storedVaccine = $row['Amount_of_Vaccine_Stored']- $vaccineammount;

                $updateVaccineStoredInfo =  "UPDATE `vaccine` SET `Amount_of_Vaccine_Stored`= '$storedVaccine'  WHERE  `id` = '$vaccine'  ";
        if(mysqli_query($conn, $updateVaccineStoredInfo)){
        
            $checkIfthisVaccineExistInThisHospital = "SELECT * FROM `provide_vaccine` WHERE   `hospital_id` = '$hospital' AND `vaccine_id` ='$vaccine'";
            $resultforCheckExistVaccine = mysqli_query($conn, $checkIfthisVaccineExistInThisHospital);
            $distributiondate = date("Y/m/d");
            if(mysqli_num_rows($resultforCheckExistVaccine)>0){
                    $row = mysqli_fetch_assoc($resultforCheckExistVaccine);
                    $id =  $row['id'];
                    $ammount = $row['ammount'];
                    $updateAmmount = $ammount +  $vaccineammount;

                    $updateData = "UPDATE `provide_vaccine` SET `ammount`='$updateAmmount' WHERE id = '$id'";
                    if (mysqli_query($conn, $updateData)) {
                        header("Location:addvaccinetohospital.php?message=Provide Vaccine to Hospital Successfully"); 
                    }

            }else{
                $insertData = "INSERT INTO `provide_vaccine`(  `city_id`, `hospital_id`, `vaccine_id`, `ammount`, `Distribution_Date`) VALUES ( '".$city."', '".$hospital."','".$vaccine."', '".$vaccineammount."' , '".$distributiondate."'  )";
                if (mysqli_query($conn, $insertData)) {
                    header("Location:addvaccinetohospital.php?message=Provide Vaccine to Hospital Successfully"); 
                }
            }

           

        }else{
          echo   0;
        }
            }else{
                header("Location:addvaccinetohospital.php?error=Sorry!!!Unsuccessful, Only ".$row['Amount_of_Vaccine_Stored']." vaccine available"); 
            }
       }




    
        exit();
 
    
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
              <h2 class="fw-bold mb-0 text-center">Provide Vaccine To Hospital</h2>
           
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
                  <select  type="text" class="form-control rounded-4" name="vaccine" id="vaccine" placeholder="vaccine"  required>
                   </select>
                  <label for="vaccine">Select Vaccine</label>
                </div>
                
  </div>

  <div class="col-md-12">
  <div class="form-floating mb-3">
                  <input  type="number" class="form-control rounded-4" name="vaccineammount" id="vaccineammount" placeholder="Vaccine Ammount"  required>
                   </select>
                  <label for="vaccineammount">Vaccine Ammount</label>
                </div>
                
  </div>




    <button class="w-100 mb-2 btn btn-lg rounded-4 btn-primary" type="submit">Provide</button>
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

//   vaccine

$.get(baseurl + "/api/index.php?getallvaccine", function(data, status){
  data = JSON.parse(data);
 var optiondata =  data.map(i=>{
      return  "<option value="+ i.id+">"+ i.Vaccine_Name  + "</option>"
  })
  document.getElementById("vaccine").innerHTML =  optiondata;
 
  });
});


// 



</script>
  <?php include '../../includes/footer.php'; ?>
 
 


