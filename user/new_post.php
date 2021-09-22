<?php 
$title = "New post";
require('../core/init.php');

if(!isLogged()){
    header('Location: /facebook_app/index.php');
}


$user       = getUser($_SESSION["id"]);
$categories = getCategories();
$posts      = getAllPostsFromUser($user['id']);

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

    if(!isset($_FILES["file"]['name']) || empty($_FILES["file"]['name'])) {
        $file_error  = "<p class='alert alert-danger text-danger d-inline-block p-1'>Fiile image is required!</p>";
        array_push($errors,$file_error);
    }

    $cat = $_POST["category"];

    
    if(count($errors) == 0) {
        // file upload
        $name        = $_FILES['file']["name"];
        // define document image folder
        $target_dir  = $_SERVER['DOCUMENT_ROOT']."/facebook/uploads/";
        //define unique image name
        // $target_name = time().basename($_FILES['file']['name']);
        $target_name = time().$name; // time function
        // define full path
        $target_file = $target_dir.$target_name;
        // select file type
        $image_file_type = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // valid file extensions
        $extensions_arr  = ['jpg','jpeg','png','gif'];
        // check extensions
        if(in_array($image_file_type,$extensions_arr)) {
             // upload file
             if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)) {
                  // save post to db
                  if(savePost($title,$body,$target_name,$user['id'],$cat,$_POST['public'])) {
                    //    $post_created = "<p class='alert alert-secondary text-success d-inline-block p-1'>Post created</p>";
                    header("Location: all_posts.php");
                  } else {
                        $post_not_created = "<p class='alert alert-light text-danger d-inline-block p-1'>Post not created</p>";
                  }
             } else {
                  $ups = "<p class='alert alert-light text-danger d-inline-block p-1'>Ups something went wrong</p>";
             }
        } else {
            $file_type_error = "<p class='alert alert-light text-danger d-inline-block p-1'>Image must be jpg,jpeg,png,gif</p>";
        }
    }
}


require('./views/new_post.view.php');
