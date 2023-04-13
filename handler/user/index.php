<?php
include_once('../../core/db.php');
include_once('../../core/helper.php');
session_start();
$users=getALl('users',$conn);
$_SESSION['users']=$users;
// print_r($_SESSION['users']);
// die;
header('location:../../view/user/index.php');


die;
