<?php
include 'config.php';
if($_SERVER['REQUEST_METHOD'] === 'GET'){
    if(!isset($_GET['page'])){
        $page  = 1;
    }else{
       $page = $_GET['page'];
    }
    $offset = ($page - 1) * $limit;
    $output = [];
    $sql = "SELECT post.post_id, post.title, post.category, post.post_date, post.author, category.category_id, category.category_name, user.user_id, user.username FROM post
    LEFT JOIN category ON post.category = category.category_id
    LEFT JOIN user ON post.author = user.user_id ORDER BY post.post_id DESC LIMIT $offset, $limit";
    $result = mysqli_query($conn, $sql);
    $output['all_data'] = mysqli_fetch_all($result, MYSQLI_ASSOC);
    /* pagination */
    $sql1 = "SELECT post.post_id FROM post";
    $result1 = mysqli_query($conn, $sql1);
    $output['all_post'] = mysqli_fetch_all($result1, MYSQLI_ASSOC);
    /* Category Fetch */
    $sql2 = "SELECT * FROM category";
    $result2 = mysqli_query($conn, $sql2);
    $output['all_category'] = mysqli_fetch_all($result2, MYSQLI_ASSOC);
    echo json_encode($output);
    mysqli_close($conn);
    exit;
}elseif($_SERVER["REQUEST_METHOD"] === "POST") {
    // cannot use json function because json not upload image file.
        $p_title = $_POST["p_title"];
        $p_des = $_POST["p_des"];
        $p_category = $_POST["p_category"];
        $date = date("d M, Y");
        $author = $_SESSION['user_id'];
        $p_image = $_FILES['p_image'];
        $errors = [];
        $file_name = $_FILES["p_image"]["name"];
        $file_size = $_FILES["p_image"]["size"];
        $file_temp = $_FILES["p_image"]["tmp_name"];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $file_unique_name = uniqid() . '_' . $file_name;
        $file_already_exist =  file_exists($targetFile);
        if($file_size > 3000000){
            echo $errors[] = 'Allow File Size 3MB.';
        }
        if($file_ext !== "png" && $file_ext !== "jpg" && $file_ext !== "jpeg"){
           echo $errors[] = 'This File is not Allowed. Please Choose a jpg or png file.';
        }
        if(empty($errors) === true){
            move_uploaded_file($file_temp, 'uploads/'.$file_unique_name);
        $sql = "INSERT INTO post(title, description, category, post_date, author, post_img) VALUES ('{$p_title}',
                '{$p_des}', '{$p_category}', '{$date}','{$author}', '{$file_unique_name}');";
        $sql .= "UPDATE category SET post = post + 1 WHERE category_id = {$p_category}";
            if(mysqli_multi_query($conn, $sql)){
                echo json_encode(array('insert' => 'success'));
            }else{
                echo json_encode(array('insert' => 'success'));
            }
        }
        mysqli_close($conn);
        exit;
}
?>