<?php
include '../../config.php';
$admin=new Admin();
$cid=$_GET['c_id'];
$st=$admin->ret("DELETE FROM `customer` where `c_id`='$cid'","saved");
echo "<script>alert('Customer information deleted successfully');window.location='../customers.php';</script>";

?>