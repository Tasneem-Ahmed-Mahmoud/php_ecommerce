<?php
//check request  method

function checkRequestMethod($method)
{
    if(isset($_SERVER["REQUEST_METHOD"])==$method) {
        return true;
    } else {
        return false;
    }
}


// filter input
function  sanitizeInput($input){
    return trim(htmlspecialchars(htmlentities($input)));
}
// required input
function requiredVal($input){
    if(empty($input)){
        return false;
    }else{
        return true;
    }
}
// get maxmum value for input
function  minVal($input,$lenght){
    if(strlen($input)< $lenght){
        return false;
    }
    return true;
}
// get minumum value for input
function  maxVal($input,$lenght){
    if(strlen($input)>$lenght){
        return false;
    }
    return true;
}


// check if that value aready exist to allow update
function is_found($table,$column,$value,$id,$con){
    $sql="SELECT `name` FROM $table WHERE $column='$value' AND `id`!=$id";
    $res=mysqli_query($con,$sql);
    if(mysqli_num_rows($res)){
        return true;
    }else{
        return false;
    }

}

// check uniqueness
function is_uniqe($table,$column,$value,$con){
    $sql="SELECT `$column`  FROM `$table` WHERE `$column`='$value' ";

    if(mysqli_num_rows(mysqli_query($con,$sql)) ){
      
        return true;
    }else{
        return false;
    }

}

// check an input is number
function numericVal($input){
    if(!is_numeric($input)){
        return false;
    }
    return true;
}