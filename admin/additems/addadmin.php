<?php
require '../../config/adminsession.php';
require '../../config/conn.php';
include '../../includes/header.php';
 
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
 
    $name = $_POST['name'];
    $nid = $_POST['nid'];
    $username = $_POST['username'];
    $password = $_POST['password'];
 
 
  $insertData = "INSERT INTO `vaccine_system_administrator`(  `Name`, `NID`, `username`, `password`) VALUES ('".$name."', '".$nid."','".$username."', '".$password."' )";
                if (mysqli_query($conn, $insertData)) {
                    header("Location:addadmin.php?message=Admin Added Success"); 
                }
    else{
                header("Location:addadmin.php?error=Error, Does't Added"); 
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
              <h2 class="fw-bold mb-0 text-center">Add Admin</h2>
           
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
                  <input  type="text" class="form-control rounded-4" name="name" id="name" placeholder="name"  required>
                   </input>
                  <label for="name">Name</label>
                </div>
                
  </div>

  <div class="col-md-12">
  <div class="form-floating mb-3">
                  <input  type="text" class="form-control rounded-4" name="nid" id="nid" placeholder="nid"  required>
                   </input>
                  <label for="nid">NID</label>
                </div>
                
  </div>

  <div class="col-md-12">
  <div class="form-floating mb-3">
                  <input  type="text" class="form-control rounded-4" name="username" id="username" placeholder="username"  required>
                   </input>
                  <label for="username">Username</label>
                </div>
                
  </div>

  <div class="col-md-12">
  <div class="form-floating mb-3">
                  <input  type="text" class="form-control rounded-4" name="password" id="password" placeholder="password"  required>
                   </input>
                  <label for="password">Password</label>
                </div>
                
  </div>




    <button class="w-100 mb-2 btn btn-lg rounded-4 btn-primary" type="submit">Add Admin</button>
    <a class="w-100 mb-2 btn btn-lg rounded-4 btn-success" href="index.php"  >Back To Add Item</a>
                </form>
            </div>
          </div>
        </div>
      </div>
 
 
 
  <?php include '../../includes/footer.php'; ?>
 
 


