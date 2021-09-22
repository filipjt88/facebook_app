<?php 

$title = "Home";
require('../core/init.php');

if(!isLogged()){
    header('Location: /facebook/index.php');
}

$user       = getUser($_SESSION["id"]);
$categories = getCategories();
$id         = $_GET['id'];
$posts      = getAllPostsFromUser($user['id']);
$post       = singlePost($id);



if($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];
    if(!isset($_POST["title"]) || empty($_POST["title"])) {
        $title_error  = "<p class='alert alert-danger text-danger d-inline-block p-1'>Title is required!</p>";
        array_push($errors,$title_error);
    } else {
        $title = $_POST["title"];
    }

    if(!isset($_POST["body"]) || empty($_POST["body"])) {
        $body_error  = "<p class='alert alert-danger text-danger d-inline-block p-1'>Body is required!</p>";
        array_push($errors,$body_error);
    } else {
        $body = $_POST["body"];
    }


    if(count($errors) == 0) {
       if(updatePost($title,$body,$_POST['category'],$_POST['public'],$user['id'],$id)) {
            header("Location: all_posts.php");
       } else {
        header("Location: /facebook/error.php");
       }
    }


}

require('./views/update_post.view.php');


?>
