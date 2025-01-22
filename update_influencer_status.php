<?php
    session_start();
   include 'php/config.php';
   $id=$_SESSION['influencer_id']; 
   $time=time()+10;
   $sql="UPDATE influencer SET last_login={$time} WHERE i_id={$id}";
   $result=mysqli_query($conn,$sql);
?>