<?php
ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
session_start();
include_once('../../core/db.php');
include_once('../../core/helper.php');
if(isset($_POST['id'])) {
    $id= $_POST['id'] ;
    $product=get_row('products', $id, $conn);
    $_SESSION['product']=$product;
    // print_r( $_SESSION['product']);
    // die;
    header('location:../../view/product/edit.php');
    die;
}
