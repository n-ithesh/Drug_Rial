<?php
include '../config.php';
$admin=new Admin();
if(!isset($_SESSION['a_id'])){
  header('Location:index.php');
}
$aid=$_SESSION['a_id'];
$stmt=$admin->ret("SELECT * FROM `admin` where `a_id`='$aid'");
$row=$stmt->fetch(PDO::FETCH_ASSOC);
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Drug Rial | Admin</title>
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
              <h3 class="mb-0"> Hi, welcome back! <?php echo $row['a_name']; ?>
              </h3>
              
            </div>
            <div class="row">
              <div class="col-xl-4 col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <?php
                      $stmt2=$admin->ret("SELECT * FROM `medicine`");
                      $row2=$stmt2->fetch(PDO::FETCH_ASSOC);
                      $num2=$stmt2->rowCount();
                    ?>
                    <h4 class="card-title text-black"><?php echo $num2; ?></h4>
                    <p class="text-muted badge badge-inverse-success">Medicines</p>
                    
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  <?php
                      $stmt3=$admin->ret("SELECT * FROM `order` inner join `medicine` on medicine.m_id=order.m_id");
                      $row3=$stmt3->fetch(PDO::FETCH_ASSOC);
                      $num3=$stmt3->rowCount();
                    ?>
                    <h4 class="card-title text-black"><?php echo $num3; ?></h4>
                    <p class="text-muted badge badge-inverse-success ">Orders</p>
                    
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  <?php
                      $stmt4=$admin->ret("SELECT SUM(`p_amount`) FROM `payment` ");
                      $row4=$stmt4->fetch(PDO::FETCH_ASSOC);
                      $num4=implode($row4);
                    ?>
                    <h4 class="card-title text-black"><?php echo $num4; ?></h4>
                    <p class="text-muted pb-2 badge badge-inverse-success ">Transactions</p>

                    
                  </div>
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-xl-8 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body px-0 overflow-auto">
                    <h4 class="card-title pl-4">Purchase History</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead class="bg-light">
                          <tr>
                            <th>Customer</th>
                            <th>Madicine</th>
                            <th>Quantity</th>
                            <th>Amount</th>
                            <th>Status</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                            $stmt5=$admin->ret("SELECT * FROM `order` inner join `medicine` on medicine.m_id=order.m_id inner join `customer` on customer.c_id=order.c_id  order by `o_id` desc LIMIT 5");
                            while($row5=$stmt5->fetch(PDO::FETCH_ASSOC)){
                              $id=$row5['o_id'];
                        ?>
                          <tr>
                            <td>
                              <div class="d-flex align-items-center">
                                <img src="../customer/controller/<?php echo $row5['c_dp']; ?>" alt="image">
                                <div class="table-user-name ml-3">
                                  <p class="mb-0 font-weight-medium"> <?php echo $row5['c_name']; ?> </p>
                                  <small> </small>
                                </div>
                              </div>
                            </td>
                            <td><?php echo $row5['m_title']; ?></td>
                            <td><?php echo $row5['o_qty']; ?></td>
                            <td><?php echo $row5['o_total_amount']; ?></td>
                            <td>
                              <div class="badge badge-inverse-success"> <?php echo $row5['o_status']; ?></div>
                            </td>

                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                    <a class="text-black mt-3 d-block pl-4" href="order.php">
                      <!-- <span class="font-weight-medium h6">View all order history</span> -->
                      <!-- <i class="mdi mdi-chevron-right"></i> -->
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="card-title font-weight-medium"> Latest Transactions</div>
                    <!-- <p class="text-muted"> Lorem ipsum dolor sitadipiscing elit, sed amet do eiusmod tempor we find a new solution </p> -->
                    <?php
                            $stmt5=$admin->ret("SELECT * FROM `payment` inner join `order` on order.o_id=payment.o_id inner join `medicine` on medicine.m_id=order.m_id inner join `customer` on customer.c_id=order.c_id order by `p_id` desc LIMIT 5");
                            while($row5=$stmt5->fetch(PDO::FETCH_ASSOC)){
                              $id=$row5['o_id'];
                        ?>
                    <div class="d-flex flex-wrap border-bottom py-2 border-top justify-content-between">
                      <img class="survey-img mb-lg-2" src="../customer/controller/<?php echo $row5['c_dp'] ?>" alt="">
                      <div class="pt-2">
                        <h5 class="mb-0"><?php echo $row5['c_name'] ?></h5>
                        <p class="mb-0 text-muted"><?php echo $row5['p_amount'] ?></p>
                        <h5 class="mb-0"><?php echo $row5['m_title'] ?></h5>
                      </div>
                    </div>
                    <?php } ?>
                    <a class="text-black mt-3 d-block font-weight-medium h6" href="view_payment.php">View all <i class="mdi mdi-chevron-right"></i></a>
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