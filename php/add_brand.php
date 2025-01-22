<?php
    // include 'config.php';

    // if(isset($_POST['save'])){
    //     $username=$_POST['username'];
    //     $category=$_POST['category'];
    //     $email=$_POST['email'];
    //     $follower=$_POST['follower'];
    //     $description=$_POST['description'];
    //     $password=md5($_POST['password']);

    //     $image_name=$_FILES['photo']['name'];
    //     $image_tmp = $_FILES['photo']['tmp_name'];
        
    //     $sql="INSERT INTO influencer(Username,Email,Password,image,Follower,Description,Category)VALUES('{$username}','{$email}','{$password}','{$image_name}',{$follower},'{$description}',{$category})";
    //     $result=mysqli_query($conn,$sql);
    //     if($result){
    //         move_uploaded_file($image_tmp,'c:/xampp/htdocs/Spark_Find/influencer_images/'.$image_name);
    //         header("Location:http://localhost/Spark_Find/admin/influencer.php");
    //     }else {
    //         echo "Error: " . mysqli_error($conn);
    //     }
    // }

    include 'config.php';


        $username = $_POST['company_name'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $url=$_POST['url'];
        $category=$_POST['category'];
        $image_name = $_FILES['photo']['name'];
        $image_tmp = $_FILES['photo']['tmp_name'];

        // Check if the email already exists
        $email_check_query = "SELECT * FROM company WHERE Email = ?";
        $stmt = mysqli_prepare($conn, $email_check_query);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if(mysqli_num_rows($result) > 0) {
            echo "Error: Email already exists.";
        } else {
            // Insert data if email is unique
            $sql = "INSERT INTO company(Username, Email, Password, image,url,category) VALUES (?, ?, ?, ?, ?,?)";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "ssssss", $username, $email, $password, $image_name, $url,$category);

            if(mysqli_stmt_execute($stmt)){
                move_uploaded_file($image_tmp, 'c:/xampp/htdocs/Spark_Find/influencer_images/'.$image_name);
                header("Location:http://localhost/Spark_Find/admin/brand.php");
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }

        // Close the statement and connection
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    
?>
