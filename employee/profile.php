<?php
include '../config.php';
$admin=new Admin();
if(!isset($_SESSION['e_id'])){
  header('Location:index.php');
}
$eid=$_SESSION['e_id'];
$stmt=$admin->ret("SELECT * FROM `employee` where `e_id`='$eid'");
$row=$stmt->fetch(PDO::FETCH_ASSOC);
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
            <div class="page-header flex-wrap">
              <h3 class="mb-0"> Edit Profile 
              </h3>
              
            </div>
            <div class="row">
              <div class="col-lg-6 stretch-card grid-margin">
                <div class="card bg-secondary">
                  <div class="card-body ">
                    <?php if($row['e_dp']==""){ ?>
                    <img src="assets/images/dp.jfif" alt="profile" />
                    <?php } else { ?>
                      <img src="controller/<?php echo $row['e_dp']; ?>" alt="profile" style="width:200px;border-radius: 40%;"/>
                      <?php } ?>
                      <form method="post" action="controller/profile.php" enctype="multipart/form-data">
                        <div class="d-flex mt-4" style="gap:20px">
                        <div>
                          <input type="file" name="img" class="form-control">
                        </div>
                        <div>
                          <input type="submit" name="ndp" class="btn btn-primary">
                        </div>
                        </div>
                      </form>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 stretch-card grid-margin ">
                <div class="card bg-secondary">
                  <div class="card-body ">
                  <form method="post" action="controller/profile.php" enctype="multipart/form-data ">
                        <div>

                        <div class="d-flex w-100 mt-3" style="gap: 17px;">
                          <label>Name</label>
                          <input type="text" name="name" class="form-control" value="<?php echo $row['e_name']; ?>">
                        </div>
                        <div class="d-flex w-100 mt-3" style="gap:17px;">
                          <label>Email</label>
                          <input type="text" name="email" class="form-control" value="<?php echo $row['e_email']; ?>">
                        </div>
                        <div class="d-flex w-100 mt-3" style="gap: 17px;">
                          <label>Phone</label>
                          <input type="number" name="phone" class="form-control" value="<?php echo $row['e_phone']; ?>">
                        </div>
                        <div class="d-flex w-100 mt-3" style="gap:17px;">
                          <label>Address</label>
                          <input type="text" name="address" value="<?php echo $row['e_address']; ?>" class="form-control">
                        </div>

                        </div>
                        <div>
                          <input style="float:right" type="submit" name="update" class="btn btn-primary mt-3">
                        </div>
                      </form>

                  </div>
                </div>
              </div>
              <div class="col-lg-6 stretch-card grid-margin ">
                <div class="card bg-secondary">
                  <div class="card-body ">
                  <form method="post" action="controller/profile.php" enctype="multipart/form-data ">
                        <div>

                        <div class="d-flex w-100 mt-3" style="gap: 17px;">
                          <label>New Password</label>
                          <input type="text" name="np" class="form-control">
                        </div>
                        <div class="d-flex w-100 mt-3" style="gap:17px;">
                          <label>Confirm Password</label>
                          <input type="password" name="cp" class="form-control">
                        </div>

                        </div>
                        <div>
                          <input style="float:right" type="submit" name="up" class="btn btn-primary mt-3">
                        </div>
                      </form>

                  </div>
                </div>
              </div>
            </div>
          </div>  
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