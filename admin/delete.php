<?php
include 'config.php';
if(isset($_GET['id'])){
    $user_id  = $_GET['id'];
    $sql = "DELETE FROM user WHERE user_id = {$user_id}";
    if(mysqli_query($conn, $sql)){
        header("location: {$hostname}/users.php");
}
}elseif(isset($_GET['cid'])){
    $cat_id  = $_GET['cid'];
    $sql = "DELETE FROM category WHERE category_id = {$cat_id}";
    if(mysqli_query($conn, $sql)){
        header("location: {$hostname}/category.php");
}
}
?>