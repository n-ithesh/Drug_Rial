<?php
include '../../config.php';
$admin=new Admin();
$fid=$_GET['f_id'];
$st=$admin->ret("DELETE FROM `feedback` where `f_id`='$fid'","saved");
echo "<script>alert(' feedback deleted successfully');window.location='../view_feedback.php';</script>";



?>