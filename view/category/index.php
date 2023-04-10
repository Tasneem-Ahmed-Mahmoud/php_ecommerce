<?php
include_once('../../layout/header.php');
include_once('../../layout/navbar.php');
include_once('../../core/helper.php');
  include_once('../../core/db.php');
    $categories=getALl('categories',$conn);
  
?>






   <div class="container pt-5 mt-5">
    <h1 class="text-center text-danger">ALL CAtegories</h1>
   
 <a href="http://localhost/eraasoft/task1/view/category/create.php" class="btn btn-info my-3">Create New</a>

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
      <th scope="col">Action</th>
     
    </tr>
  </thead>

  <tbody>
    <?php   if(!empty($categories)): 
    $index=0;
    foreach($categories as  $category):
      $index++;
    ?>
    <tr>
      <th scope="row"><?=$index?></th>
      <td><?=$category['name']?></td>
      <td class="d-flex">
        <form action="../../handler/category/delete.php" method="post" class="px-1">
        <input type="text" hidden  value="<?=$category['id'] ?>" name="id">
    <button class="btn btn-danger"  type="submit">Delete</button>
 
       </form>
       <form action="./../../handler/category/edit.php" method="post" class="px-1">
        <input type="text" hidden  value="<?=$category['id'] ?>" name="id">
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