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
    if(!isset($_POST["email"]) || empty($_POST["email"])) {
        $email_error  = "<p class='alert alert-danger text-danger d-inline-block p-1'>First name is required!</p>";
        array_push($errors,$email_error);
    } else {
        $email = $_POST["email"];
    }

    if(count($errors) == 0) {
        if(change_email($email,$user["id"])) {
            header('Location: account.php');
        } else {
            header('Location: error.php');

        }
    }
}


require('./views/change_email.view.php');
