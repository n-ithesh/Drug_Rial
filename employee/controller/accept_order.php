<?php
define('DIR','../../');
require_once DIR . '/config.php';
$admin = new Admin();

$o_id = $_GET['o_id'];

$stmt = $admin->cud("UPDATE `order` SET `o_status`='accepted' where `o_id`='$o_id'","deleted");
echo "<script>alert('Order status has been modified Successfully');window.location='../order.php';</script>";
?>