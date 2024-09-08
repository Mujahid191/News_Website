<?php
include 'config.php';
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    // Function for navigation
    $result = [];
    $sql2 = "SELECT * FROM category WHERE category.post > 0";
    $query_run2 = mysqli_query($conn, $sql2);
    $result['all_category'] = mysqli_fetch_all($query_run2, MYSQLI_ASSOC);
    // function for side bar
    $sql0 = "SELECT post.post_id, post.title, post.post_date, post.post_img, category.category_id, category.category_name FROM post 
    LEFT JOIN category ON category.category_id = post.category ORDER BY post.post_id DESC LIMIT 4";
    $query_run0 = mysqli_query($conn, $sql0);
    $result['sidebar_post'] = mysqli_fetch_all($query_run0, MYSQLI_ASSOC);
    // index page post
    if(isset($_GET['file'])){
        isset($_GET['page']) ? $page = $_GET['page'] : $page  = 1;
        $offset = ($page - 1) * $limit;
        $sql = "SELECT post.post_id, post.title, post.description, post.post_date, post.post_img, category.category_id, category.category_name, user.user_id, user.username FROM post LEFT JOIN category ON category.category_id = post.category LEFT JOIN user ON user_id = post.author ORDER BY post.post_id DESC LIMIT $offset, $limit";
        $query_run = mysqli_query($conn, $sql);
        $result['all_post'] = mysqli_fetch_all($query_run, MYSQLI_ASSOC);
        // index pagination
        $sql1 = "SELECT post.post_id FROM post";
        $query_run1 = mysqli_query($conn, $sql1);
        $result['post_pagination'] = mysqli_fetch_all($query_run1, MYSQLI_ASSOC);
    }
    // Show Data By category
    if(isset($_GET['cid'])){
        $cid = $_GET['cid'];
        isset($_GET['cpage']) ? $cpage = $_GET['cpage'] : $cpage  = 1;
        $offset = ($cpage - 1) * $limit;
        $sql3 = "SELECT post.post_id, post.title, post.description, post.category, post.post_date, post.post_img, category.category_id, category.category_name, user.user_id, user.username FROM post LEFT JOIN category ON category.category_id = post.category LEFT JOIN user ON user_id = post.author WHERE post.category = {$cid} ORDER BY post.post_id DESC LIMIT $offset, $limit";
        $query_run3  = mysqli_query($conn,$sql3);
        $result['post_by_category'] = mysqli_fetch_all($query_run3, MYSQLI_ASSOC);
        /* category pagination */
        $sql4 = "SELECT post.post_id FROM post WHERE post.category = {$cid}";
        $query_run4 = mysqli_query($conn, $sql4);
        $result['category_pagination'] = mysqli_fetch_all($query_run4, MYSQLI_ASSOC);
    }
    // single post
    if(isset($_GET['pid'])){
        $pid = $_GET['pid'];
        $sql5 = "SELECT post.post_id, post.title, post.description, post.post_date, post.post_img, category.category_id, category.category_name, user.user_id, user.username FROM post LEFT JOIN category ON category.category_id = post.category LEFT JOIN user ON user_id = post.author WHERE post.post_id = $pid";
        $query_run5 = mysqli_query($conn, $sql5);
        $result['single_post'] = mysqli_fetch_all($query_run5, MYSQLI_ASSOC);
    }
    // Author post
    if(isset($_GET['uid'])){
        $uid = $_GET['uid'];
        isset($_GET['upage']) ? $upage = $_GET['upage'] : $upage  = 3;
        $offset = ($upage - 1) * $limit;
        $sql6 = "SELECT post.post_id, post.title, post.description, post.author, post.post_date, post.post_img, category.category_id, category.category_name, user.user_id, user.username FROM post LEFT JOIN category ON category.category_id = post.category LEFT JOIN user ON user_id = post.author WHERE post.author = {$uid} ORDER BY post.post_id DESC LIMIT $offset, $limit";
        $query_run6 = mysqli_query($conn, $sql6);
        $result['author_post'] = mysqli_fetch_all($query_run6, MYSQLI_ASSOC);

        $sql7 = "SELECT post.post_id FROM post WHERE post.author = $uid";
        $query_run7 = mysqli_query($conn, $sql7);
        $result['author_pagination'] = mysqli_fetch_all($query_run7, MYSQLI_ASSOC);
    }
    // search data
    if(isset($_GET['search'])){
        $search = $_GET['search'];
        isset($_GET['page']) ? $page = $_GET['page'] : $page  = 1;
        $offset = ($page - 1) * $limit;
        $sql8 = "SELECT post.post_id, post.title, post.description, post.post_date, post.post_img, category.category_id, category.category_name, user.user_id, user.username FROM post LEFT JOIN category ON category.category_id = post.category LEFT JOIN user ON user_id = post.author WHERE post.title LIKE '%{$search}%' OR post.description LIKE '%{$search}%' OR category.category_name LIKE '%{$search}%' ORDER BY post.post_id DESC LIMIT $offset, $limit";
        $query_run8 = mysqli_query($conn, $sql8);
        $result['search_post'] = mysqli_fetch_all($query_run8, MYSQLI_ASSOC);
        // search pagination
        $sql9 = "SELECT post.title, post.description, category.category_name FROM post 
        LEFT JOIN category ON post.category = category.category_id
        WHERE title LIKE '%{$search}%' OR post.description LIKE '%{$search}%' OR category.category_name LIKE '%{$search}%'";
        $query_run9 = mysqli_query($conn, $sql9);
        $result['search_pagination'] = mysqli_fetch_all($query_run9, MYSQLI_ASSOC);
    }
    echo json_encode($result, JSON_PRETTY_PRINT);
}
?>