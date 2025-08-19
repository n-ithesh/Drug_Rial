<?php
include '../config.php';
$admin=new Admin();
if(!isset($_SESSION['e_id'])){
  header('Location:index.php');
}
$eid=$_SESSION['e_id'];
$stmt=$admin->ret("SELECT * FROM `employee` where `e_id`='$eid'");
$row=$stmt->fetch(PDO::FETCH_ASSOC);

$mid = $_GET['m_id'];
$stmt2 = $admin->ret("SELECT * FROM `medicine` inner join `category` on category.cat_id=medicine.cat_id where `m_id`='$mid'");
$row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Drug Rial | Employee</title>
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css" />
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css" />
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="shortcut icon" href="assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
    <?php include 'includes/sidebar.php';?>
      <div class="container-fluid page-body-wrapper">
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close mdi mdi-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-default-theme">
            <div class="img-ss rounded-circle bg-light border mr-3"></div> Default
          </div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme">
            <div class="img-ss rounded-circle bg-dark border mr-3"></div> Dark
          </div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles light"></div>
            <div class="tiles dark"></div>
          </div>
        </div>
        <?php include 'includes/topbar.php';?>

        <div class="main-panel">
          <div class="content-wrapper pb-0">
            
            <div class="row">
              <div class="col-lg-12 stretch-card grid-margin">
              <div class="card">
                  <div class="card-body" style="background-color:#d3daff ;">
                    <h4 class="card-title">Add Medicine</h4>
                    <!-- <p class="card-description">Basic form layout</p> -->
                    <form class="forms-sample" action="controller/add_medicine.php" method="post" enctype="multipart/form-data">
                      <div class="d-flex" style="gap: 20px;">
                        <div class="form-group w-100">
                            <label >Medicine Title</label>
                            <input type="text" value="<?php echo $row2['m_title']; ?>" class="form-control"  placeholder="Title" name="Title"/>
                            <input type="hidden" value="<?php echo $mid; ?>" class="form-control"  placeholder="Title" name="mid"/>
                        </div>
                        
                        <div class="form-group w-100">
                            <label>category</label>
                            <select class="form-control text-dark" name="cat" required>
                              <option value="" hidden><?php echo $row2['cat_name']; ?></option>
                              <?php $stmt=$admin->ret("SELECT * FROM `category` where `cat_status`='active'");
                              while($row=$stmt->fetch(PDO::FETCH_ASSOC)){ ?>
                              <option value="<?php echo $row['cat_id']; ?>"><?php echo $row['cat_name']; ?></option>
                            
                            <?php } ?>  
                            </select>                      
                          </div>
                      </div>
                      <div class="d-flex" style="gap: 20px;">
                      <div class="form-group w-100">
                            <label>Description</label>
                            <input type="text" class="form-control" value="<?php echo $row2['m_description']; ?>" placeholder="Description" name="Description"/>
                        </div>
                        
                        <div class="form-group w-100">
                            <label >Price</label>
                            <input type="number" class="form-control"value="<?php echo $row2['m_mrp']; ?>"  placeholder="Price" name="price" />
                        </div>
                      </div>
                      <div class="d-flex" style="gap: 20px;">
                      <div class="form-group w-50">
                            <label >Btach No.</label>
                            <input type="number" class="form-control" value="<?php echo $row2['m_batch_no']; ?>" placeholder="Btach No" name="batch" />
                        </div>
                        
                        <div class="form-group w-50">
                            <label >Manufacture</label>
                            <input type="text" class="form-control"  placeholder="Manufacture"value="<?php echo $row2['m_manufacture']; ?>" name="manu" />
                        </div>
                      </div>
                      <div class="d-flex" style="gap: 20px;">
                        <div class="form-group w-50">
                            <label >Expiry Date</label>
                            <input type="date" class="form-control"  placeholder="Expiry Date"value="<?php echo $row2['m_expiry_date']; ?>" name="expiry" />
                        </div>
                        <div class="form-group w-50">
                            <label >Quantity</label>
                            <input type="text" class="form-control"  placeholder="Quantity"value="<?php echo $row2['m_qty']; ?>" name="quty" />
                        </div>
                    </div>
                        <div class="d-flex" style="gap: 20px;">
                        <div class="form-group w-100">
                            <label >Image</label>
                            <input type="file" class="form-control"  placeholder="Image" name="image" required/>
                        </div>
                        <div class="form-group w-100">
                            <label for="exampleInputUsername1">Status</label>
                            <select class="form-control text-dark" name="status" required>
                                <option value="" hidden><?php echo $row2['cat_status']; ?></option>
                                <option value="available">Available</option>
                                <option value="unavailable">Unavailable</option>
                            </select>
                        </div>
                      
                        </div>
                      
                      
                      <button style="float: right;" type="submit" class="btn btn-primary ml-2" name="update"> Submit </button>
                      <button style="float: right;" class="btn btn-light" type="reset" name="add">Cancel</button>
                    </form>
                  </div>
                </div>
            </div>
          </div>
          <?php include 'includes/footer.php'?>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="assets/vendors/flot/jquery.flot.js"></script>
    <script src="assets/vendors/flot/jquery.flot.resize.js"></script>
    <script src="assets/vendors/flot/jquery.flot.categories.js"></script>
    <script src="assets/vendors/flot/jquery.flot.fillbetween.js"></script>
    <script src="assets/vendors/flot/jquery.flot.stack.js"></script>
    <script src="assets/vendors/flot/jquery.flot.pie.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>