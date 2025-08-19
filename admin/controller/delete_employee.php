<?php
include '../../config.php';
$admin=new Admin();
$eid=$_GET['e_id'];
$st=$admin->ret("DELETE FROM `employee` where `e_id`='$eid'","saved");
echo "<script>alert('Employee information deleted successfully');window.location='../employees.php';</script>";



?>