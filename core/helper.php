
<?php

// select all data from  a table
function getAll($tableName,$con){
    $sql='SELECT * FROM '.$tableName;
    $res=mysqli_query($con,$sql);
    $allData=[];
if(mysqli_num_rows($res)>0) {
    while($row=mysqli_fetch_assoc($res)) {
        $allData[]=$row;
    }
}
    return $allData;

}
//select row

function get_row($table,$id,$con){
    $sql="SELECT * FROM  `$table` WHERE `id`=$id";
    $res=mysqli_query($con,$sql);
    return mysqli_fetch_assoc($res);
}
//delete
function delete($table,$id,$con){
    $sql="DELETE FROM $table WHERE `id`=$id";
   
    if(mysqli_query($con,$sql)){
        return true;
    }else{
        return false;
    }
}

// update
function update($table ,$column,$value,$id,$con){
    $sql="UPDATE `$table` SET `$column`='$value' WHERE `id`=$id";
    if(mysqli_query($con,$sql) ){
      
        return true;
    }else{
        return false;
    }

}