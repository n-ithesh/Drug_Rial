<?php
include '../../config.php';
$admin=new Admin();
$cid=$_GET['cat_id'];
$st=$admin->ret("DELETE FROM `category` where `cat_id`='$cid'","saved");
echo "<script>alert(' category deleted successfully');window.location='../categories.php';</script>";
?>