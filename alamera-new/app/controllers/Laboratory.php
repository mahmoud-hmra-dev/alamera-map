<?php

include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/middleware.php");
include(ROOT_PATH . "/app/helpers/validatePost.php");


$tablee = 'Laboratory';

$topics = selectAll('topics');
$posts1 = selectAll($tablee);


$errors = array();
$id = "";
$title = "";
$Laboratory = "";
$body = "";
$topic_id = "";
$published = "";





if (isset($_GET['id'])) {
    $post11 = selectOne($tablee, ['id' => $_GET['id']]);

    $id = $post11['id'];
    $title = $post11['title'];
    $body = $post11['body'];
    $depot = $post11['Laboratory'];
    $topic_id = $post11['topic_id'];
    $published = $post11['published'];
}

if (isset($_GET['delete_id'])) {
    adminOnly();
    $count = delete($tablee, $_GET['delete_id']);
    $_SESSION['message'] = "Post deleted successfully";
    $_SESSION['type'] = "success";
    header("location: " . BASE_URL . "/admin/Laboratory/index.php"); 
    exit();
}

if (isset($_GET['published']) && isset($_GET['p_id'])) {
    adminOnly();
    $published = $_GET['published'];
    $p_id = $_GET['p_id'];
    $count = update($tablee, $p_id, ['published' => $published]);
    $_SESSION['message'] = "Post published state changed!";
    $_SESSION['type'] = "success";
    header("location: " . BASE_URL . "/admin/Laboratory/index.php"); 

    exit();
   
}




if (isset($_POST['add-post'])) {
    adminOnly();
    $errors = validatePost($_POST);

    if (count($errors) == 0) {
        unset($_POST['add-post']);
        $_POST['user_id'] = $_SESSION['id'];
        $_POST['published'] = isset($_POST['published']) ? 1 : 0;
        $_POST['body'] = htmlentities($_POST['body']);
    
        $post_id = create($tablee, $_POST);
        $_SESSION['message'] = "Laboratory created successfully";
        $_SESSION['type'] = "success";
        header("location: " . BASE_URL . "/admin/Laboratory/create.php"); 
        exit();    
    } else {
        $title = $_POST['title'];
        $body = $_POST['body'];
        $Laboratory = $_POST['Laboratory'];
        $topic_id = $_POST['topic_id'];
        $published = isset($_POST['published']) ? 1 : 0;
    }
}




?>
