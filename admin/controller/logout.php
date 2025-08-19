<?php
include '../../config.php';
$admin=new Admin();
if(isset($_SESSION['a_id'])){
    session_destroy();
    unset($_SESSION['a_id']);
    $admin->redirect('../index');
}
?>