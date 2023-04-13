<?php
include_once('../../layout/header.php');
include_once('../../layout/navbar.php');
include_once('../../core/helper.php');
include_once('../../core/db.php');
$categories=getAll('categories',$conn);

?>











<div class="container mt-5 pt-5 ">

<a href="http://localhost/eraasoft/task1/view/product/index.php" class="btn btn-info my-3  mt-5 ">Go Back</a>



    <form action="../../handler/product/store.php" method="post" class="p-5 border border-2 w-75 m-auto" enctype="multipart/form-data" >
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
  <input type="text" class="form-control" id="exampleFormControlInput1"  name="name"  >
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Description</label>
  <textarea name="" id="" cols="30" rows="10"        name="description"   ></textarea>
  
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Price</label>
  <input type="text" class="form-control" id="exampleFormControlInput1"name="price"  >
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Offer</label>
  <input type="text" class="form-control " id="exampleFormControlInput1"name="offer"  >
</div>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Image</label>
  <input type="file" class="form-control " id="exampleFormControlInput1"name="image"  >
</div>
<div class="mb-3">

<select class="form-select" aria-label="Default select example" name="category_id">
  <?php foreach($categories as $key => $val):?>
  <option value="<?=$val['id']?>"><?= $val["name"]?></option>
  <?php endforeach; ?>
</select>


<div class="my-3">
    <button class="btn btn-primary   form-control" type="submit">Add</button>
  </div>

    </form>
</div>

















<?php
include_once('../../layout/footer.php');
?>