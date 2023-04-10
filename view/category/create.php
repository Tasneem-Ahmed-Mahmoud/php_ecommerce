
<?php
include_once('../../layout/header.php');
include_once('../../layout/navbar.php');

?>




<div class="container mt-5 pt-5 ">

<a href="http://localhost/eraasoft/task1/view/category/index.php" class="btn btn-info my-3  mt-5 ">Go Back</a>



    <form action="../../handler/category/store.php" method="post" class="p-5 borderborder-2 w-75 m-auto">
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
    <button class="btn btn-primary   form-control" type="submit">Add</button>
  </div>

    </form>
</div>












<?php
include_once('../../layout/footer.php');
?>