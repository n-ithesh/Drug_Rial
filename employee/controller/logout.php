<?php
include '../../config.php';
$admin=new Admin();
if(isset($_SESSION['e_id'])){
    session_destroy();
    unset($_SESSION['e_id']);
    $admin->redirect('../index');
}
?>