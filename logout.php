<?php
    session_start();
    session_destroy();
    session_unset();
    header('location: http://localhost/Spark_Find/admin/index.php');
?>