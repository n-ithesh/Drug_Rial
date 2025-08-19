<nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="homepage.php"> <img src="img/lg.png" alt="logo" style="width: 250px;"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="menu_icon"><i class="fas fa-bars"></i></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <a class="nav-link" href="homepage.php">Home</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="profile.php">Profile</a>
                                        </li>

                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_1"
                                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Categories
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                                    <?php 
                                                    $st=$admin->ret("SELECT * FROM `category` where `cat_status`='active'");
                                                    while($ro=$st->fetch(PDO::FETCH_ASSOC)){
                                                    ?>
                                                <a class="dropdown-item" href="view_medicine.php?cat_id=<?php echo $ro['cat_id']; ?>"><?php echo $ro['cat_name']; ?></a>
                                                <?php } ?>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="orders.php">Orders</a>
                                        </li>
                                        <li class="nav-item ">
                                            <a class="nav-link " href="payments.php">
                                                Payments
                                            </a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_3"
                                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                More
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                                <a class="dropdown-item" href="about.php"> 
                                                    About Us                                           
                                                </a>
                                                <a class="dropdown-item" href="contact.php">Contact Us</a>
                                                <a class="dropdown-item" href="controller/logout.php" onclick="return confirm('Are you sure, you want to logout?')" >Logout</a>
                                                
                                            </div>
                                        </li>
                            </ul>
                        </div>
                        <div class="hearer_icon d-flex align-items-center">
                            <!-- <a id="search_1" href="javascript:void(0)"><i class="ti-search"></i></a> -->
                            <a href="cart.php">
                                <i class="flaticon-shopping-cart-black-shape"></i>
                            </a>
                        </div>
                    </nav>