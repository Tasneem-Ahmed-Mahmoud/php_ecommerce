

<?php
include_once('../../layout/header.php');
include_once('../../layout/navbar.php');
?>





<form action="../../handelers/user/store.php"  method="POST" class=" m-auto my-5 shadow w-50 p-3" enctype="multipart/form-data">

<h1 class=" text-center border p-2 ">Add User</h1>
<?php if(isset($_SESSION["errors"])): foreach($_SESSION["errors"] as $key => $val):?>

<div class="alert alert-danger" role="alert">
<?php
echo $val;

?>
</div>
    <?php endforeach ;unset($_SESSION["errors"]); endif;?>

    <?php 
    if(isset($_SESSION["success"])): ?>
    <div class="alert alert-success" role="alert">
<?php
echo $_SESSION["success"];?>
</div>
<?php unset($_SESSION["success"]); endif;?>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Name</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" name="name">
</div>


<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Email</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" name="email">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Phone</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" name="phone">
</div>



<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Image</label>
  <input type="file" class="form-control " id="exampleFormControlInput1"name="image"  >
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Password</label>
  <input type="file" class="form-control " id="exampleFormControlInput1"name="password"  >
</div>
<div class="mb-3">

  <input type="submit" class="form-control btn btn-info" value="Add" >
</div>
</form>



<?php
include_once('../../layout/footer.php');
?>

