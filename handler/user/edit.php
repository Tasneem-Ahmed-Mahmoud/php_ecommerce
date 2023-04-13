<?php
ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
session_start();
include_once('../../core/db.php');
include_once('../../core/helper.php');
if(isset($_POST['id'])) {
    $id= $_POST['id'] ;
    $user=get_row('users', $id, $conn);
    $_SESSION['user']=$user;
    // print_r( $_SESSION['user']);
    // die;
    header('location:../../view/user/edit.php');
    die;
}