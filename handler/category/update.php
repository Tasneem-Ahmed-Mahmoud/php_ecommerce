<?php 
session_start();
include_once('../../core/db.php');
include_once('../../core/validation.php');
include_once('../../core/helper.php');
$errors=[];
if(checkRequestMethod('POST')) {
    print_r($_POST);


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
}elseif(is_found('categories','name',$name,$id,$conn)){
    $errors[]="this value aready exist";
}


if(empty($errors)){
    if(update('categories','name',$name,$id,$conn)){
        $_SESSION["success"]="category successfully inserted ";
        
    }else{
     $_SESSION["errors"]="error: not inserted";   
    }
    
    }else{
        $_SESSION["errors"]=$errors;
    }
    header("location:../../view/category/edit.php?id=$id");
    die;



}