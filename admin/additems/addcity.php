<?php
require '../../config/adminsession.php';
require '../../config/conn.php';
include '../../includes/header.php';
 
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

 
    $city = $_POST['city'];
 
    $date= date("Y/m/d");
 
    
    $insertData = "INSERT INTO `cities`(  `city_name`, `time`) VALUES ('".$city."', '".$date."' )";
    if(mysqli_query($conn, $insertData)){
        header("Location:addcity.php?message=City Added Successfully"); 
    
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
              <h2 class="fw-bold mb-0 text-center">Add City Name </h2>
           
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
                  <input type="text" class="form-control rounded-4" name="city" id="city" placeholder="City Name">
                  <label for="city">City Name</label>
                </div>
              
                
                <button class="w-100 mb-2 btn btn-lg rounded-4 btn-primary" type="submit">Add City</button>
                Hospital_Name
                </form>
            </div>
          </div>
        </div>
      </div>
 

  <?php include '../../includes/footer.php'; ?>
 
 


