<?php

function file_required(){

    if (!isset($_FILES['image'])) {
        //  die("There is no file to upload.");
        return true;
     }else{
        return false;
     }
}

 

function file_path(){
    $filepath = $_FILES['image']['tmp_name'];
    return $filepath;
}
function file_size(){
    $file_path=file_path();
    $fileSize = filesize($file_path);
    return $fileSize;
}
function file_type(){
    $file_path=file_path();
    $fileinfo = finfo_open(FILEINFO_MIME_TYPE);
    $filetype = finfo_file($fileinfo, $file_path);
    return $filetype;
    
}


function is_empty_file(){
    $file_size=file_size() ;
    if ($file_size === 0) {
        // die("The file is empty.");
        return true;
     }else{
        return false;
     }
     
}

function max_file_size($size){
    $fileSize=file_size();
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

function allwed(){
    $allowedTypes=allowed_type();
    $filetype=file_type();
    if(!in_array($filetype, array_keys($allowedTypes))) {
        // die("File not allowed.");
        return true;
     }else{
        return false;
     }
     
}


function move_file_to_directory (){
    $filepath= file_path();
    $filetype=file_type();
    $allowedTypes=allowed_type();
    $filename  = basename($filepath); // I'm using the original name here, but you can also change the name of the file here
$extension = $allowedTypes[$filetype];
$targetDirectory = "../../uploads/product"; // __DIR__ is the directory of the current PHP file

$newFilepath = $targetDirectory . "/" . $filename;
return $newFilepath;
}

function move_file(){
    // die(move_file_to_directory ());
   $newFilepath=move_file_to_directory ();
   $filepath=file_path();
//    die($filepath);
//    copy($filepath, $newFilepath)
$move=move_uploaded_file($filepath, $newFilepath);
    if (!$move) { // Copy the file, returns false if failed
        // die("Can't move file.");
        return true;
    }else{
        return false;
    }
    // unlink($filepath); // Delete the temp file
    
    // echo "File uploaded successfully :)";
}

