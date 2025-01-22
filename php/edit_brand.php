<?php
    include 'config.php';

        $id=$_POST['id'];
        $username=$_POST['username'];
        $email=$_POST['email'];
        $category=$_POST['category'];
        $url=$_POST['url'];
        $new_image=$_FILES['new_image']['name'];
        $old_image=$_POST['old_image'];

        if($new_image !=""){
            $update_filename=$new_image;
        }
        else{
            $update_filename=$old_image;
        }

        $sql="UPDATE company SET UserName='{$username}',Email='{$email}',image='{$update_filename}',url='{$url}',category={$category} WHERE c_id={$id}";
        $result=mysqli_query($conn,$sql);
        if($result){
            if($_FILES['new_image']['name'] !=""){
                move_uploaded_file($_FILES['new_image']['tmp_name'], 'c:/xampp/htdocs/Spark_Find/influencer_images/'.$new_image);
                
                if(file_exists("c:/xampp/htdocs/Spark_Find/influencer_images/".$old_image)){
                    unlink("c:/xampp/htdocs/Spark_Find/influencer_images/".$old_image);
                }
                
            }
            header("Location:http://localhost/spark_Find/admin/influencer.php");
        }
    
?>