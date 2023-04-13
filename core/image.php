<?php

// function file_required($f_name){

//     if (!isset($_FILES[$f_name])) {
//         //  die("There is no file to upload.");
//         return true;
//      }else{
//         return false;
//      }
// }

// return temp name of file
function tmp_name($f_name){
    $filepath = $_FILES[$f_name]['tmp_name'];

    return $filepath;
}
// return file size 
function file_size($f_name){
    $tmp_name=tmp_name($f_name);
    $fileSize = filesize($tmp_name);
    return $fileSize;
}
// return file type
function file_type($f_name){
    $tmp_name=tmp_name($f_name);
    $fileinfo = finfo_open(FILEINFO_MIME_TYPE);
    $filetype = finfo_file($fileinfo, $tmp_name);
    return $filetype;
    
}

// chek size of file 
function is_empty_file($f_name){
    $file_size=file_size($f_name) ;
    if ($file_size === 0) {
        // die("The file is empty.");
        return true;
     }else{
        return false;
     }
     
}
// chek  max size of file 

function max_file_size($size,$f_name){
    $fileSize=file_size($f_name);
    if ($fileSize >$size ) { // 3 MB (1 byte * 1024 * 1024 * 3 (for 3 MB))
        // die("The file is too large");
        return true;
     }else{
        return false;
     }
     
}


function allowed_type(){
    $allowedTypes = [
        'image/png' => 'png',
        'image/jpeg' => 'jpg'
     ];
    return $allowedTypes;
}

function allwed($f_name){
    $allowedTypes=allowed_type();
    $filetype=file_type($f_name);
    if(!in_array($filetype, array_keys($allowedTypes))) {
        // die("File not allowed.");
        return true;
     }else{
        return false;
     }
     
}


function move_file_to_directory ($f_name,$folder){
    $tmp_name=tmp_name($f_name);
    $filetype=file_type($f_name);
    $allowedTypes=allowed_type();
  
    $filename  = basename($tmp_name); // I'm using the original name here, but you can also change the name of the file here
echo ($filename);
    $extension = $allowedTypes[$filetype];
$targetDirectory = "../../uploads/$folder"; 

$newFilepath = $targetDirectory . "/" . $filename.".".$extension ;

   $ftmp_name=tmp_name($f_name);
 move_uploaded_file($ftmp_name, $newFilepath);

    
  return  $filename.".".$extension;
}

