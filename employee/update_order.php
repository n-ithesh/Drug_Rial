<?php
include '../config.php';
$admin=new Admin();
if(!isset($_SESSION['e_id'])){
  header('Location:index.php');
}
$eid=$_SESSION['e_id'];
$stmt=$admin->ret("SELECT * FROM `employee` where `e_id`='$eid'");
$row=$stmt->fetch(PDO::FETCH_ASSOC);
$oid=$_GET['o_id'];
$stmt2=$admin->ret("SELECT * FROM `order` inner join `medicine` on medicine.m_id=order.m_id inner join `customer` on customer.c_id=customer.c_id where `o_id`='$oid'");
$row2=$stmt2->fetch(PDO::FETCH_ASSOC);
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
              <h3 class="mb-0 "> Manage Orders 
              </h3>
            </div>
            <div class="row">
              <div class="col-lg-6 stretch-card grid-margin">
                <div class="card">
                  <div class="card-body ">
                    <div class="d-flex justify-content-center">
                    <?php if($row2['c_dp']==""){ ?>
                    <img src="assets/images/dp.jfif" alt="profile" />
                    <?php } else { ?>
                      <img src="controller/<?php echo $row2['m_image']; ?>" alt="profile" style="width:200px"/>
                      <?php } ?>
                    </div>
                      <form method="post" action="controller/order.php" enctype="multipart/form-data">
                        <div class="d-flex justify-content-center mt-5" style="gap:20px">
                        <div class="w-100">
                            <input type="hidden" value="<?php echo $oid; ?>" name="oid">
                            <select class="form-control text-dark" name="status" required> 
                                <option value="" hidden><?php echo $row2['o_status']; ?></option>
                                <option value="Picked by courier">Picked by courier</option>
                                <option value="On the way">On the way</option>
                                <option value="Delivered">Delivered</option>
                                <option value="completed">Completed</option>
                            </select>
                        </div>
                        <div>
                          <input type="submit" name="update" class="btn btn-primary">
                        </div>
                        </div>
                      </form>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 stretch-card grid-margin ">
                <div class="card ">
                  <div class="card-body ">
                    <div class="table-responsive">
                        <table class="table table-dark">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th><?php echo $row2['o_name']; ?></th>
                                </tr>
                                <tr>
                                    <th>Medicine</th>
                                    <th><?php echo $row2['m_title']; ?></th>
                                </tr>
                                <tr>
                                    <th>Quantity</th>
                                    <th><?php echo $row2['o_qty']; ?></th>
                                </tr>
                                <tr>
                                    <th>Amount</th>
                                    <th><?php echo $row2['o_total_amount']; ?></th>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <th><?php echo $row2['o_address']; ?></th>
                                </tr>
                                <tr>
                                    <th>City</th>
                                    <th><?php echo $row2['o_city']; ?></th>
                                    <tr>
                                    <th>Pin</th>
                                    <th><?php echo $row2['o_pin']; ?></th>
                                </tr>
                                </tr>
                                <tr>
                                    <th>State</th>
                                    <th><?php echo $row2['o_state']; ?></th>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <th><?php echo $row2['o_status']; ?></th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                  </div>
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