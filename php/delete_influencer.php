<?php
include 'config.php';
    $id=$_POST['id'];
    
    $sql1="SELECT*FROM influencer WHERE i_id={$id}";
    $result1=mysqli_query($conn,$sql1);
    $row=mysqli_fetch_assoc($result1);

    if(file_exists("c:/xampp/htdocs/Spark_Find/influencer_images/".$row['image'])){
        unlink("c:/xampp/htdocs/Spark_Find/influencer_images/".$row['image']);
    }
    
    $sql2="DELETE FROM influencer WHERE i_id={$id}";
    $result2=mysqli_query($conn,$sql2);

    if($result2){
        echo "100";
    }   
?>