<?php require 'config/conn.php'; ?>
 <?php include 'includes/header.php';
 
 if (isset($_SESSION['nid'])) {
  header("Location:user/index.php");
}?>
 
 <div class="modal modal-signin position-static d-block bg-light py-5" tabindex="-1" role="dialog" id="modalSignin">
        <div class="modal-dialog" role="document">
          <div class="modal-content rounded-5 shadow">
            <div class="modal-header p-5 pb-4 border-bottom-0">
              <!-- <h5 class="modal-title">Modal title</h5> -->
              <h2 class="fw-bold mb-0 text-center">User Login</h2>
           
            </div>
      
            <div class="modal-body p-5 pt-0">
              <form class="" action="loginprocess.php" method="POST">
    <?php 
if(isset($_GET['message'])){
 ?>
  <div class="alert alert-danger" role="alert">
<?php echo $_GET['message']; ?>
</div>
<?php
    } ?>    
                <div class="form-floating mb-3">
                  <input type="text" class="form-control rounded-4" name="nid" id="floatingInput" placeholder="National International Card">
                  <label for="floatingInput">NID</label>
                </div>
                
                <button class="w-100 mb-2 btn btn-lg rounded-4 btn-primary" type="submit">Log in </button>
                <a class="w-100 mb-2 btn btn-lg rounded-4 btn-success" href="user/register.php"  >Registration For Vaccine</a>
               
              </form>
            </div>
          </div>
        </div>
      </div>
 

  <?php include 'includes/footer.php'; ?>
 
 