<?php
    include 'config.php';
    $id=$_POST['id'];
    $category=$_POST['category'];

    $sql="UPDATE category SET category='{$category}' WHERE id={$id}";
    $result=mysqli_query($conn,$sql);
  
?>