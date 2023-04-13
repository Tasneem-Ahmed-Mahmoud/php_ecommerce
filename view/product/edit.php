
<?php
ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
session_start();
include_once('../../layout/header.php');
include_once('../../layout/navbar.php');
include_once('../../core/db.php');
include_once('../../core/helper.php');
include_once('../../core/db.php');
$categories=getALl('categories',$conn);
print_r( $_SESSION['product']);
//   print_r($categories);
//   die;
if(isset($_GET['id'])){
    $_SESSION['product'] = get_row('products',$_GET['id'],$conn); 
}
?>




<div class="container mt-5 pt-5 ">


    <form action="../../handler/product/update.php" method="post" class="p-5 borderborder-2 w-75 m-auto" enctype="multipart/form-data">
    <?php if(isset($_SESSION["errors"])): foreach($_SESSION["errors"] as $key => $val):?>

<div class="alert alert-danger" role="alert">
<?php
echo $val;

?>
</div>
    <?php endforeach ;unset($_SESSION["errors"]); endif;?>


   <?php  if(isset($_SESSION["success"])): ?>
    <div class="alert alert-success" role="alert">
<?php
echo $_SESSION["success"];?>
</div>
<?php unset($_SESSION["success"]); endif;?>

<input type="text" hidden value="<?php if(isset($_SESSION['product'])){echo $_SESSION['product']['id'];}?>" name="id">
    <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Name</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" name="name" value="<?php if(isset($_SESSION['product'])){echo $_SESSION['product']['name'];}?>">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Price</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" name="price" value="<?php if(isset($_SESSION['product'])){echo $_SESSION['product']['price'];}?>">
</div>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Offer</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" name="offer" value="<?php if(isset($_SESSION['product'])){echo $_SESSION['product']['offer'];}?>">
</div>


<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label">Description</label>
<div class="form-floating">

  <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="description"><?php if(isset($_SESSION['product'])){echo $_SESSION['product']['description'];}?></textarea>

</div>
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Image</label>
  <input type="file" class="form-control " id="exampleFormControlInput1" name="image"  >
  <?php if( isset($_SESSION['product']['image'])): ?>
  <img   style="width: 100px; height:100px" src="../../uploads/product/<?php if(isset($_SESSION['product'])){echo $_SESSION['product']['image'];}?>" alt="" srcset="">
<?php  endif;?>
</div>

<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label">Category</label>
<select class="form-select" aria-label="Default select example" name="category_id">
  <?php foreach($categories as $key => $val):?>
  <option value="<?=$val['id']?>" <?php if($val['id'] ==  $_SESSION['product']['category_id']){echo "selected";}?>><?= $val["name"]?></option>
  <?php endforeach; ?>
</select>
</div>
<div class="mb-3">
    <button class="btn btn-primary   form-control" type="submit">Add</button>
  </div>

    </form>













<?php
include_once('../../layout/footer.php');
?>