<?php

require_once('core/init.php');

$post_id = $_POST['post_id'];
$body    = $_POST['body'];

if(userComment($post_id,$body)) {
    header("Location: single_post.php?id=".$post_id);
} else {
    header("Location: error.php");
}



if($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];
    if(!isset($_POST["body"]) || empty($_POST["body"])) {
        $body_error  = "<p class='alert alert-danger text-danger d-inline-block p-1'>This field is required!</p>";
        array_push($errors,$body_error);
    } else {
        $body = $_POST["body"];
    }
    
    if(count($errors) == 0) {
        if(getCommentUser($id,$body)) {
            header("Location: single_post.php");
        }
    } else {
       header("Location: error.php");
    }
 
}



