<?php 
$title = "Change email";
require('../core/init.php');

if(!isLogged()){
    header('Location: /facebook_app/index.php');
}

$user = getUser($_SESSION["id"]);
$posts = getAllPostsFromUser($user['id']);


if($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];
    if(!isset($_POST["current_password"]) || empty($_POST["current_password"])) {
        $current_password_error  = "<p class='alert alert-danger text-danger d-inline-block p-1'>Current password is required!</p>";
        array_push($errors,$current_password_error);
    } else {
        $current_password = $_POST["current_password"];
    }

    if(!isset($_POST["password"]) || empty($_POST["password"])) {
        $password_error  = "<p class='alert alert-danger text-danger d-inline-block p-1'>New password is required!</p>";
        array_push($errors,$password_error);
    } else {
        $password = $_POST["password"];
    }

    if(!isset($_POST["password_repeat"]) || empty($_POST["password_repeat"])) {
        $password_repeat_error  = "<p class='alert alert-danger text-danger d-inline-block p-1'>Password repeat is required!</p>";
        array_push($errors,$password_repeat_error);
    } else {
        $password_repeat = $_POST["password_repeat"];
    }

    if($_POST["password_repeat"] != $_POST["password"]) {
        $password_match  = "<p class='alert alert-danger text-danger d-inline-block p-1'>Password do not match!</p>";
        array_push($errors,$password_match);
    }



    if(count($errors) == 0) {
        if(change_password($current_password,$password,$user["email"],$user["id"])) {
            //header('Location: account.php');
            $success = "password changed";
        } else {
            //header('Location: error.php');
            $current_password_error = "password not correct";

        }
    }
}


require('./views/change_password.view.php');
