<?php
require '../../config/adminsession.php';
require '../../config/conn.php';
include '../../includes/header.php';
 
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
 
    $city = $_POST['city'];
    $hospital = $_POST['hospital'];
    $floor = $_POST['floor'];
    $wing = $_POST['wing'];
    $section = $_POST['section'];
 
  $insertData = "INSERT INTO `booth`(`city_id` ,  `hospital_id`, `Floor`, `Wing`, `Section`) VALUES ('".$city."', '".$hospital."','".$floor."', '".$wing."', '".$section."' )";
                if (mysqli_query($conn, $insertData)) {
                    header("Location:addbooth.php?message=Booth Added Success"); 
                }
 

            else{
                header("Location:addbooth.php?error=Error, Does't Added"); 
            }
      




    
     
 
    
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
              <h2 class="fw-bold mb-0 text-center">Add Booth</h2>
           
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

 
<!-- 
  <div class="col-md-12">
  <div class="form-floating mb-3">
                  <input  type="text" class="form-control rounded-4" name="location" id="location" placeholder="location"  required>
                   </input>
                  <label for="location">Location</label>
                </div>
                
  </div> -->

  <div class="col-md-12">
  <div class="form-floating mb-3">
                  <input  type="text" class="form-control rounded-4" name="floor" id="floor" placeholder="floor"  required>
                   </input>
                  <label for="floor">Floor</label>
                </div>
                
  </div>

  <div class="col-md-12">
  <div class="form-floating mb-3">
                  <input  type="text" class="form-control rounded-4" name="wing" id="wing" placeholder="wing"  required>
                   </input>
                  <label for="wing">Wing</label>
                </div>
                
  </div>

  <div class="col-md-12">
  <div class="form-floating mb-3">
                  <input  type="text" class="form-control rounded-4" name="section" id="section" placeholder="section"  required>
                   </input>
                  <label for="section">Section</label>
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

 
});


// 



</script>
  <?php include '../../includes/footer.php'; ?>
 
 


