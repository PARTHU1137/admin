<?php
include 'config.php';


    $category = $_POST['category'];

    // Check if the category already exists
    $category_check_query = "SELECT * FROM category WHERE category = ?";
    $stmt = mysqli_prepare($conn, $category_check_query);
    mysqli_stmt_bind_param($stmt, "s", $category);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($result) > 0) {
        echo "Error: Category already exists.";
    } else {
        // Insert data if category is unique
        $sql = "INSERT INTO category (category) VALUES (?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $category);

        if(mysqli_stmt_execute($stmt)){
            header("Location: http://localhost/Spark_Find/admin/category.php");
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }

    // Close statement and connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

?>
