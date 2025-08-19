<?php
include '../../config.php';
$admin=new Admin();
$oid=$_GET['o_id'];
$st=$admin->ret("DELETE FROM `order` where `o_id`='$oid'","saved");
echo "<script>alert(' medicine deleted successfully');window.location='../order.php';</script>";



?>