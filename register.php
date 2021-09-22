<?php 

require('core/init.php');

// Pokupiti podatke
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];
    if(!isset($_POST["first_name"]) || empty($_POST["first_name"])) {
        $first_name_error = "<p class='alert alert-danger text-danger d-inline-block p-1'>First name is required!</p>";
        array_push($errors,$first_name_error);
    } else {
        $first_name = $_POST["first_name"];
    }
    
    if(!isset($_POST["last_name"]) || empty($_POST["last_name"])) {
        $last_name_error = "<p class='alert alert-danger text-danger d-inline-block p-1'>Last name is required!</p>";
        array_push($errors,$last_name_error);
    } else {
        $last_name = $_POST["last_name"];
    }
    
    if(!isset($_POST["email"]) || empty($_POST["email"])) {
        $email_error = "<p class='alert alert-danger text-danger d-inline-block p-1'>Email is required!</p>";
        array_push($errors,$email_error);
    } else {
        $email = $_POST["email"];
    }
    
    if(!isset($_POST["password"]) || empty($_POST["password"])) {
        $password_error = "<p class='alert alert-danger text-danger d-inline-block p-1'>Password is required!</p>";
        array_push($errors,$password_error);
    } else {
        $password = $_POST["password"];
    }
    
    if($_POST["password"] !== $_POST["password_repeat"]) {
        $password_repeat_error = "<p class='alert alert-danger text-danger d-inline-block p-1'>
        Passwords do not match!</p>";
        array_push($errors,$password_repeat_error);
    }
    
    if(count($errors) == 0) {
       register_user($_POST["title"],$first_name,$last_name,$email,$password);
    }
}


// if(1 == 1) echo "Danilo";

require('views/register.view.php');

?>