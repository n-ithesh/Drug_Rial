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
            
            <div class="row">
              <div class="col-lg-12 stretch-card grid-margin">
                <div class="card">
                <div class="card-body">
                    <h4 class="card-title badge badge-inverse-success ">Order Details </h4>
                    </p>
                    <div class="table-responsive">
                      <table class="table table-dark">
                        <thead>
                          <tr>
                            <th> Date</th>
                            <th>Medicine</th>
                            <th>Customer</th>
                            <th>Contact</th>
                            <th>Address</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th colspan="2" class="text-center">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i=1;
                                $st=$admin->ret("SELECT * FROM `order` inner join `medicine` on medicine.m_id=order.m_id inner join `customer` on customer.c_id=order.c_id where medicine.e_id='$eid' order by `o_id`");
                                while($row=$st->fetch(PDO::FETCH_ASSOC)){
                            ?>
                          <tr>
                            <td><?php echo $row['o_date']; ?></td>
                            <td><?php echo $row['m_title']; ?> X <?php echo $row['o_qty']; ?></td>
                            <td><?php echo $row['o_name']; ?></td>
                            <td><?php echo $row['o_phone']; ?></td>
                            <td><?php echo $row['o_address']; ?>, <?php echo $row['o_city']; ?><br><?php echo $row['o_state']; ?> - <?php echo $row['o_pin']; ?></td>
                            <td><?php echo $row['o_total_amount']; ?></td>
                            <td><?php echo $row['o_status']; ?></td>
                            <td>
                                    <a href="controller/accept_order.php?o_id=<?php echo $row['o_id']; ?>">
                                    <!-- <i class="mdi mdi-delete" style="font-size: 20px;"></i> -->
                                    <i class="mdi mdi-thumb-up text-success" style="font-size: 20px;"></i>
                                    </a>
                            </td>
                            <td>
                            <a href="controller/reject_order.php?o_id=<?php echo $row['o_id']; ?>">
                              <i class="mdi mdi-thumb-down text-danger" style="font-size: 20px;"></i>
                                    <!-- <i class="mdi mdi-border-color" style="font-size: 20px;"></i> -->
                                    </a>
                            </td>
                            <td>
                            <a href="update_order.php?o_id=<?php echo $row['o_id']; ?>">
                              <!-- <i class="mdi mdi-thumb-down text-danger" style="font-size: 20px;"></i> -->
                                    <i class="mdi mdi-pencil-box text-light" style="font-size: 20px;"></i>
                                    </a>
                            </td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                    
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