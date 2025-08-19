<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="text-center sidebar-brand-wrapper d-flex align-items-center">
          <a class="sidebar-brand brand-logo" href="home.php"><img src="assets/images/lg.png" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini pl-4 pt-3" href="home.php"><img src="assets/images/lg.png" alt="logo" /></a>
        </div>
        <ul class="nav">
          <li class="nav-item nav-profile">
            <a href="../admin/profile.php" class="nav-link">
              <div class="nav-profile-image">
             
              <img class="nav-profile-img mr-2"  src="controller/<?php echo $row['a_dp']; ?>">
                <span class="login-status online"></span>
                <!--change to offline or busy as needed-->
              </div>
              <div class="nav-profile-text d-flex flex-column pr-3">
                <span class="badge badge-danger text-white ml-3 rounded"><?php echo $row['a_name']; ?></span>
              </div>
              <span class="badge badge-danger text-white ml-3 rounded"></span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="home.php">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-contacts menu-icon"></i>
              <span class="menu-title">Manage</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="employees.php">Staff</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="customers.php">Customers</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="categories.php">
              <i class="fa fa-archive menu-icon"></i>
              <span class="menu-title">Category</span>
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