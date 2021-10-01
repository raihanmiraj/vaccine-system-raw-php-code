<?php
require '../../config/adminsession.php';
require '../../config/conn.php';
include '../../includes/header.php';
 
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

 
    $city = $_POST['city'];
    $hospitalname = $_POST['hospitalname'];
  
    $insertData = "INSERT INTO `hospital`(  `city_id`, `Hospital_Name`) VALUES ('".$city."', '".$hospitalname."' )";
    if(mysqli_query($conn, $insertData)){
        header("Location:addhospital.php?message=Hospital Added Successfully"); 
    
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
              <h2 class="fw-bold mb-0 text-center">Add Hospital Name </h2>
           
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
    } ?>    
                <div class="form-floating mb-3">
                  <select type="text" class="form-control rounded-4" name="city" id="city" >


                  </select>
                  <label for="city">City Name</label>
                </div>

                <div class="form-floating mb-3">
                  <input type="text" class="form-control rounded-4" name="hospitalname" id="hospitalname" placeholder="Hospital Name">
                  <label for="hospitalname">Hospital Name</label>
                </div>
              
                
                <button class="w-100 mb-2 btn btn-lg rounded-4 btn-primary" type="submit">Add Hospital</button>
                <a class="w-100 mb-2 btn btn-lg rounded-4 btn-success" href="index.php"  >Back To Add Item</a>
                </form>
            </div>
          </div>
        </div>
      </div>
 
<script>

var baseurl = "<?php echo $base_url; ?>"
$( document ).ready(function() {
    $.get(baseurl + "/api/index.php?getcities", function(data, status){
  data = JSON.parse(data);
 var optiondata =  data.map(i=>{
      return  "<option value="+ i.id+">"+i.city_name + "</option>"
  })
  document.getElementById("city").innerHTML ="<option value=''>Select City</option>" + optiondata;
 
  });
 
});



</script>
  <?php include '../../includes/footer.php'; ?>
 
 


