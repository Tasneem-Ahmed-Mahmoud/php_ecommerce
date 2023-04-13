<?php
include_once('../../layout/header.php');
include_once('../../layout/navbar.php');
?>

<div class="m-auto  w-75">

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

</div>

<table class="table table-border  my-5 m-auto w-75 text-center shadow">

<thead>
  <tr>
    <th scope="col">#</th>
    <th scope="col">Name</th>
    <th scope="col">Email</th>
    <th scope="col">Phone</th>
    <th scope="col">Image</th>
    <th scope="col" colspan="2">Actions</th>
  </tr>
</thead>
<tbody>


  <?php
  if(isset($_SESSION['users'])):
    $users=$_SESSION['users'];
  $i=1; foreach($users as $user):?>
                      <tr>
                        <td><?=$i++; ?></td>
                         <td><?= $user["name"];?></td>
                         <td><?= $user["email"];?></td>
                         <td><?= $user["phone"];?></td>
                        
                         <td>
                            <img src="../../uploads/user/<?= $user["image"];?>" alt="" srcset="" style="width:50px;hieght:50px">
                         </td>
                         
                          
                          
                          
                         <td class="d-flex">
        <form action="../../handler/user/delete.php" method="post" class="px-1">
        <input type="text" hidden  value="<?=$user['id'] ?>" name="id">
    <button class="btn btn-danger"  type="submit">Delete</button>
 
       </form>
       <form action="./../../handler/user/edit.php" method="post" class="px-1">
        <input type="text" hidden  value="<?=$user['id'] ?>" name="id">
    <button class="btn btn-info"  type="submit">Edit</button>
 
       </form>
      </td>
                        </tr>
                      <?php endforeach; endif;?>
                  </tbody>
</table>





<?php
include_once('../../layout/footer.php');
?>
