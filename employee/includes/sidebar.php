<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="text-center sidebar-brand-wrapper d-flex align-items-center">
          <a class="sidebar-brand brand-logo" href="home.php"><img src="assets/images/lg.png" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini pl-4 pt-3" href="home.php"><img src="assets/images/lg.png" alt="logo" /></a>
        </div>
        <ul class="nav">
          <li class="nav-item nav-profile">
            <a href="../employee/profile.php" class="nav-link">
              <div class="nav-profile-image">
              <img class="nav-profile-img mr-2"  src="controller/<?php echo $row['e_dp']; ?>">
                <span class="login-status online"></span>
                <!--change to offline or busy as needed-->
              </div>
              <div class="nav-profile-text d-flex flex-column pr-3">
                <span class="badge badge-danger text-white ml-3 rounded"></span>
              </div>
              <span class="badge badge-danger text-white ml-3 rounded"><?php echo $row['e_name']; ?></span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="home.php">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="medicine.php">
              <i class="fa fa-cart-plus menu-icon"></i>
              <span class="menu-title">Medicines</span>
            </a>
          </li>
         
          <li class="nav-item">
            <a class="nav-link" href="view_customer.php">
              <i class="fa fa-vcard menu-icon"></i>
              <span class="menu-title">Customer</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="order.php">
              <i class="fa fa-dedent menu-icon"></i>
              <span class="menu-title">Order</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="view_payment.php">
              <i class="fa fa-credit-card menu-icon"></i>
              <span class="menu-title">Payment</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="view_feedback.php">
              <i class="fa fa-comments menu-icon"></i>
              <span class="menu-title">Feedbacks</span>
            </a>
          </li>
          
        </ul>
      </nav>