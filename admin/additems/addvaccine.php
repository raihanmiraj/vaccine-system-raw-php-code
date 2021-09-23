<?php
require '../../config/adminsession.php';
require '../../config/conn.php';
include '../../includes/header.php';
 
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

 
    $vaccinename = $_POST['vaccinename'];
     $companyname = $_POST['companyname'];
     $importdate = $_POST['importdate'];
    $productiondate = $_POST['productiondate'];
    $expirydate = $_POST['expirydate'];
    $productioncompany = $_POST['productioncompany'];
     $vaccinestore = $_POST['vaccinestore'];
  $shipmentno = $_POST['shipmentno'];
 

  $insertData = "INSERT INTO `vaccine`(  `Vaccine_Name`, `Company_Name`, `Import_Date`, `Production_Date`, `Expiry_Date`, `Production_Country`, `Amount_of_Vaccine_Stored`, `Shipment_no`) VALUES ('".$vaccinename."', '".$companyname."','".$importdate."', '".$productiondate."', '".$expirydate."', '".$productioncompany."','".$vaccinestore."', '".$shipmentno."'  )";
 if (mysqli_query($conn, $insertData)) {
                        header("Location:addvaccine.php?message=Vaccine Added Success"); 
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
              <h2 class="fw-bold mb-0 text-center">Add Vaccine</h2>
           
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
                  <input  type="text" class="form-control rounded-4" name="vaccinename" id="vaccinename" placeholder="Vaccine_Name"  required>
                   </input>
                  <label for="vaccinename">Vaccine Name</label>
                </div>
                
  </div>

  
  <div class="col-md-12">
  <div class="form-floating mb-3">
                  <input  type="text" class="form-control rounded-4" name="companyname" id="companyname" placeholder="companyname"  required>
                   </input>
                  <label for="companyname">Company Name</label>
                </div>
                
  </div>


  
  <div class="col-md-12">
  <div class="form-floating mb-3">
                  <input  type="date" class="form-control rounded-4" name="importdate" id="importdate" placeholder="importdate"  required>
                   </input>
                  <label for="importdate">Import Date</label>
                </div>
                
  </div>

  
  <div class="col-md-12">
  <div class="form-floating mb-3">
                  <input  type="date" class="form-control rounded-4" name="productiondate" id="productiondate" placeholder="productiondate"  required>
                   </input>
                  <label for="productiondate">Production Date</label>
                </div>
                
  </div>

  
  <div class="col-md-12">
  <div class="form-floating mb-3">
                  <input  type="date" class="form-control rounded-4" name="expirydate" id="expirydate" placeholder="expirydate"  required>
                   </input>
                  <label for="expirydate">Expiry Date</label>
                </div>
                
  </div>

  
  <div class="col-md-12">
  <div class="form-floating mb-3">
                  <input  type="text" class="form-control rounded-4" name="productioncompany" id="productioncompany" placeholder="productioncompany"  required>
                   </input>
                  <label for="productioncompany">Production Country</label>
                </div>
                
  </div>


  
  <div class="col-md-12">
  <div class="form-floating mb-3">
                  <input  type="text" class="form-control rounded-4" name="vaccinestore" id="vaccinestore" placeholder="vaccinestore"  required>
                   </input>
                  <label for="vaccinestore">Amount of Vaccine Stored</label>
                </div>
                
  </div>

  
  <div class="col-md-12">
  <div class="form-floating mb-3">
                  <input  type="text" class="form-control rounded-4" name="shipmentno" id="shipmentno" placeholder="shipmentno"  required>
                   </input>
                  <label for="shipmentno">Shipment no</label>
                </div>
                
  </div>

 




    <button class="w-100 mb-2 btn btn-lg rounded-4 btn-primary" type="submit">Add Vaccine</button>
                <a class="w-100 mb-2 btn btn-lg rounded-4 btn-success" href="index.php"  >Back To Add Item</a>
                </form>
            </div>
          </div>
        </div>
      </div>
 
<script>

var baseurl = "<?php echo $base_url; ?>"
 
 



</script>
  <?php include '../../includes/footer.php'; ?>
 
 


