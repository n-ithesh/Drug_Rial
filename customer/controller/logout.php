<?php
include '../../config.php';
$admin=new Admin();
if(isset($_SESSION['c_id'])){
    session_destroy();
    unset($_SESSION['c_id']);
    $admin->redirect('../index');
}
?>