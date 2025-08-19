<?php
include '../../config.php';
$admin=new Admin();
$eid=$_SESSION['e_id'];

if(isset($_POST['update'])){
    $id=$_POST['oid'];
    $status=$_POST['status'];
    $st=$admin->cud("UPDATE `order` SET `o_status`='$status' WHERE `o_id`='$id'","saved");
    echo "<script>alert('Order status updated successfully');window.location='../order.php';</script>";
}
?>