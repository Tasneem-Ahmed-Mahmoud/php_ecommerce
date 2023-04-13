

<?php
ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
session_start();
include_once('../../layout/header.php');
include_once('../../layout/navbar.php');
include_once('../../core/db.php');
include_once('../../core/helper.php');
include_once('../../core/db.php');

print_r( $_SESSION['user']);

if(isset($_GET['id'])){
    $_SESSION['user'] = get_row('users',$_GET['id'],$conn); 
}
?>





<form action="../../handelers/user/update.php"  method="POST" class=" m-auto my-5 shadow w-50 p-3" enctype="multipart/form-data">

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
<input type="text"   hidden name="id" value="<?php if(isset($_SESSION['user'])){echo $_SESSION['user']['id'];}?>">
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Name</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" name="name"  value="<?php if(isset($_SESSION['user'])){echo $_SESSION['user']['name'];}?>">
</div>


<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Email</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" name="email"  value="<?php if(isset($_SESSION['user'])){echo $_SESSION['user']['email'];}?>">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Phone</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" name="phone" value="<?php if(isset($_SESSION['user'])){echo $_SESSION['user']['phone'];}?>">
</div>



<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Image</label>
  <input type="file" class="form-control " id="exampleFormControlInput1"name="image"  >
  <?php if( isset($_SESSION['user']['image'])): ?>
  <img   style="width: 100px; height:100px" src="../../uploads/user/<?php if(isset($_SESSION['user'])){echo $_SESSION['user']['image'];}?>" alt="" srcset="">
<?php  endif;?>
</div>
<!-- <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Password</label>
  <input type="file" class="form-control " id="exampleFormControlInput1"name="password"   value="<?php if(isset($_SESSION['user'])){echo $_SESSION['user']['password'];}?>">
</div> -->
<div class="mb-3">

  <input type="submit" class="form-control btn btn-info" value="Add" >
</div>
</form>



<?php
include_once('../../layout/footer.php');
?>

