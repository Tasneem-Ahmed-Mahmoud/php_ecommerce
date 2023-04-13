<?php
include_once('../../layout/header.php');
include_once('../../layout/navbar.php');
include_once('../../core/helper.php');
  include_once('../../core/db.php');
    $products=getALl('product_category',$conn);
  
?>






   <div class="container pt-5 mt-5">
    <h1 class="text-center text-danger">ALL products</h1>
   
 
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

 <table class="table table-success table-striped ">

<thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">price</th>
      <th scope="col">offer</th>
      <th scope="col">description</th>
      <th scope="col">category</th>
      <th scope="col">Action</th>
     
    </tr>
  </thead>

  <tbody>
    <?php   if(!empty($products)): 
    $index=0;
    foreach($products as  $product):
      $index++;
    ?>
    <tr>
      <th scope="row"><?=$index?></th>
      <td><?=$product['product_name']?></td>
      <td><?=$product['price']?></td>
      <td><?=$product['offer']?></td>
      <td><?=$product['description']?></td>
      <td><?=$product['category_name']?></td>
      <td class="d-flex">
        <form action="../../handler/product/delete.php" method="post" class="px-1">
        <input type="text" hidden  value="<?=$product['product_id'] ?>" name="id">
    <button class="btn btn-danger"  type="submit">Delete</button>
 
       </form>
       <form action="./../../handler/product/edit.php" method="post" class="px-1">
        <input type="text" hidden  value="<?=$product['product_id'] ?>" name="id">
    <button class="btn btn-info"  type="submit">Edit</button>
 
       </form>
      </td>
    
    </tr>
    <?php endforeach; endif; ?>
    </tbody>




</table>


</div>






<?php
include_once('../../layout/footer.php');
?>














<?php
include_once('../../layout/footer.php');
?>