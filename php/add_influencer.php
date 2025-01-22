<?php
    include 'config.php';

        $username = $_POST['username'];
        $category = $_POST['category'];
        $email = $_POST['email'];
        $follower = $_POST['follower'];
        $description = $_POST['description'];
        $password = md5($_POST['password']);

        $image_name = $_FILES['photo']['name'];
        $image_tmp = $_FILES['photo']['tmp_name'];

        // Check if the email already exists
        $email_check_query = "SELECT * FROM influencer WHERE Email = ?";
        $stmt = mysqli_prepare($conn, $email_check_query);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if(mysqli_num_rows($result) > 0) {
            echo "Error: Email already exists.";
        } else {
            // Insert data if email is unique
            $sql = "INSERT INTO influencer(Username, Email, Password, image, Follower, Description, Category) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "ssssiss", $username, $email, $password, $image_name, $follower, $description, $category);

            if(mysqli_stmt_execute($stmt)){
                move_uploaded_file($image_tmp, 'c:/xampp/htdocs/Spark_Find/influencer_images/'.$image_name);
                header("Location:http://localhost/Spark_Find/admin/influencer.php");
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }

        // Close the statement and connection
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    
?>
