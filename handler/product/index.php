<?php
include_once('../../core/db.php');
include_once('../../core/helper.php');
session_start();
$products=getALl('product_category',$conn);
$_SESSION['products']=$products;
// print_r($_SESSION['categories']);
// die;
header('location:../../view/product/index.php');


die;
