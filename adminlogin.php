<?php require 'config/conn.php'; ?>
<?php require 'includes/header.php'; ?>




<div class="modal modal-signin position-static d-block bg-light py-5" tabindex="-1" role="dialog" id="modalSignin">
        <div class="modal-dialog" role="document">
          <div class="modal-content rounded-5 shadow">
            <div class="modal-header p-5 pb-4 border-bottom-0">
              <!-- <h5 class="modal-title">Modal title</h5> -->
              <h2 class="fw-bold mb-0">Admin Login</h2>
           
            </div>
      
            <div class="modal-body p-5 pt-0">
              <form class="" method="POST" action="loginprocess.php">

              <?php 
if(isset($_GET['message'])){
 ?>
  <div class="alert alert-danger" role="alert">
<?php echo $_GET['message']; ?>
</div>
<?php
    } ?>      
                <div class="form-floating mb-3">
                  <input type="text" name="username" class="form-control rounded-4" id="username" placeholder="Username" required>
                  <label for="username">Username</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="password" name="password" class="form-control rounded-4" id="password" placeholder="Password" required>
                  <label for="password">Password</label>
                </div>
                <!-- <a class="w-100 mb-2 btn btn-lg rounded-4 btn-primary"  href="admin/index.html">Log in</a> -->
                 <button class="w-100 mb-2 btn btn-lg rounded-4 btn-primary"   type="submit">Log in</button>
                <hr class="my-4">
          <h2 class="fs-5 fw-bold mb-3">Or Login As</h2>
                <a class="w-100 py-2 mb-2 btn btn-outline-dark rounded-4"  href="userlogin.php">
                    User
                </a>
                <a class="w-100 py-2 mb-2 btn btn-outline-primary rounded-4"  href="nurselogin.php">
               Nurse
                </a>
           
              </form>
            </div>
          </div>
        </div>
      </div>



 

<?php include 'includes/footer.php'; ?>
