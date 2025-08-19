<?php
define('DIR','../../');
require_once DIR . '/config.php';
$admin = new Admin();

$o_id = $_GET['o_id'];

$stmt = $admin->cud("DELETE FROM `order` where `o_id` = '$o_id'","deleted");
echo "<script>alert('Order has been canceled Successfully');window.location='../orders.php';</script>";
?>