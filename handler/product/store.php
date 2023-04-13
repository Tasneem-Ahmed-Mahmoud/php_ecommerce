<?php 
session_start();
include_once('../../core/db.php');
include_once('../../core/helper.php');
include_once('../../core/validation.php');
include_once('../../core/image.php');
$errors=[];
if(checkRequestMethod('POST')) {
    
    // print_r($_POST);
    // print_r($_FILES['image']['name']);

// die;
    foreach($_POST as $key =>$value) {
        $$key= sanitizeInput($value);
    }

// validate name
    if(!requiredVal($name)){
        $errors[]="type name please";
    }elseif(!MinVal($name,2)){
        $errors[]="name must be at least 2 char"; 
    }elseif(!MaxVal($name,30)){
        $errors[]="name must be less than 30 char"; 
    
    }
    // validate price
    if(!requiredVal($price)){
        $errors[]="type price please";
    }elseif(!numericVal($price)){
        $errors[]=" price must be number";
    }
    // validate  offer
    if(!requiredVal($offer)){
        $errors[]="type offer please";
    }elseif(!numericVal($offer)){
        $errors[]="offer must be number";
    }
    // validate description
    if(!requiredVal($description)){
        $errors[]="type description please";
    }elseif(!MinVal($description,10)){
        $errors[]="description must be at least 10 char"; 
    }elseif(!MaxVal($description,200)){
        $errors[]="description must be less than 200 char"; 
        
    }
    
//validate image
if(!requiredVal($_FILES['image']['name'])){
    $errors[]="there is no file to upload";
}
elseif(is_empty_file('image')){
    $errors[]="this file is empty";
}elseif(max_file_size(3145728,'image')){
    $errors[]="the file size is too large";
}elseif(allwed('image')){
    $errors[]="the file type not allwed uplode .png or .jpg";}


if(empty($errors)){
   $image= move_file_to_directory('image','product');

   $filepath= tmp_name('image');
    unlink($filepath); // Delete the temp file

$sql="INSERT INTO `products` (`name`,`description`,`price`,`offer`,`category_id`,`image`)
VALUES('$name','$description','$price','$offer','$category_id','$image')";

if(mysqli_query($conn,$sql)){
    $_SESSION["success"]="product  successfully inserted ";
    
}else{
 $_SESSION["errors"]="error: not inserted";   
}
}else{
    $_SESSION["errors"]=$errors;
}


header('location:../../view/product/create.php');
die;
    
}









