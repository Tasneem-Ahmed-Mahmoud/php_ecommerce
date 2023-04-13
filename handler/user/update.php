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

//validate email

if(!requiredVal($email)){
    $errors[]="please type the email ";
}elseif(is_email($email)){
    $errors[]="$email is not a valid email address ";
}
else if(is_uniqe('users','email',$email,$conn)){
    $errors[]="this email aready exist ";
}
// validate password
if(!requiredVal($password)){
    $errors[]="password is required";
}elseif(is_password($password)){
    $errors[] = "password must be from 8-16 and contains at least one digit and one upper case letter";
}


//validate phone
if(!requiredVal($phone)){
    $errors[]="please type the phone ";
}elseif(!maxVal($phone,10)){
    $errors[]="phone must be less than 10 charachters ";   
}elseif(is_phone($phone)){
    $errors[]="$phone is not a valid phone number so that only + - . and 0-9 ";
}
else if(is_uniqe('users','phone',$phone,$conn)){
    $errors[]="this phone aready exist ";
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

///////////////////////////////////////////////

if(empty($errors)){
    $image= move_file_to_directory('image','user');
    $filepath= tmp_name('image');
     unlink($filepath); // Delete the temp file
 
    $password=sha1($password);
$sql="UPDATE `users` SET `name`='$name',`email`='$email',`password`=$password'
,`image`=`$image`,`phone`='$phone' WHERE `id`=$id";
// echo($sql);
// die;
$res=mysqli_query($conn,$sql);
if($res){
    $_SESSION["success"]="user successfully updated";
    
}else{
 $_SESSION["errors"]="error: not updated";   
}

}else{
    $_SESSION["errors"]=$errors;
}
header("location:../../view/user/edit.php?id=$id");
die;
}




