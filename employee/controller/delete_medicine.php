<?php
include '../../config.php';
$admin=new Admin();
$mid=$_GET['m_id'];
$st=$admin->ret("DELETE FROM `medicine` where `m_id`='$mid'","saved");
echo "<script>alert(' medicine deleted successfully');window.location='../medicine.php';</script>";



?>