<?php
session_start();
include_once('../../core/db.php');
include_once('../../core/helper.php');
if(isset($_POST['id'])) {
    $id= $_POST['id'] ;
    $category=get_row('categories', $id, $conn);
  
    $_SESSION['category']=$category;
    // print_r( $_SESSION['category']);
    // die;
    header('location:../../view/category/edit.php');
    die;
}
