<?php
include '../../config.php';
$admin=new Admin();
$cartid=$_GET['cart_id'];
$st=$admin->ret("DELETE FROM `cart` where `cart_id`='$cartid'","saved");
echo "<script>alert('Item removed from cart successfully');window.location='../cart.php';</script>";
?>