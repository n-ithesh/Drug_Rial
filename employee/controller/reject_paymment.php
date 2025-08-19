<?php
define('DIR','../../');
require_once DIR . '/config.php';
$admin = new Admin();

$p_id = $_GET['p_id'];
$st=$admin->ret("SELECT * FROM `payment` where `p_id`='$p_id'");
$ro=$st->fetch(PDO::FETCH_ASSOC);
$oid=$ro['o_id'];

$stmt = $admin->cud("UPDATE `payment` SET `p_status`='pending' where `p_id`='$p_id'","deleted");
echo "<script>alert('Payment status has been modified Successfully');window.location='../view_payment.php';</script>";
?>