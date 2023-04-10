<?php

session_start();
include_once('../../core/db.php');
include_once('../../core/validation.php');
$errors=[];
if(checkRequestMethod('POST')){
    // print_r($_POST);

    foreach($_POST as $key =>$value){
        $$key= sanitizeInput($value);
    }
    // validate  name
   if(!requiredVal($name)){
    $errors[]="please type the name ";
}elseif(!minVal($name,3)){
    $errors[]=" name  must be at least 3 char";
}elseif(!maxVal($name,10)){
    $errors[]=" name  must be less than 10 char";
}else if(is_uniqe('categories','name',$name,$conn)){
    $errors[]="this value aready exist ";
}

if(empty($errors)){
$sql="INSERT INTO `categories`(`name`) VALUES('$name')";
// echo($sql);
// die;
$res=mysqli_query($conn,$sql);
if($res){
    $_SESSION["success"]="category successfully inserted ";
    
}else{
 $_SESSION["errors"]="error: not inserted";   
}

}else{
    $_SESSION["errors"]=$errors;
}
header('location:../../view/category/create.php');
die;
}
