<?php 
session_start();
include_once('../../core/db.php');
include_once('../../core/helper.php');
include_once('../../core/validation.php');


if(checkRequestMethod('POST')){
    $id=$_POST['id'];
  
    if(delete('categories',$id,$conn)){
       $_SESSION['success']="item deleted successfully";
    }else{
        $_SESSION['errors']="deleted faild";
    }
header('location:../../view/category/index.php');
die;
}