<?php
include '../include/config.php';
if(isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    $sql = "delete from home_social where id=$id";
    $result = mysqli_query($connecction, $sql);
    if($result) {
        // echo "Deleted successfully";
        header('location:admin.php');
    }else{
        die(mysqli_error($connecction));
    }
}