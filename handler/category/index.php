<?php
include_once('../../core/db.php');
include_once('../../core/helper.php');
session_start();

print_r($_POST);
die;
$categories=getALl('categories',$conn);
$_SESSION['categories']=$categories;
// print_r($_SESSION['categories']);
// die;
header('location:../../view/category/index.php');


die;









