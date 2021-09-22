<?php 

require('core/init.php');

// Pokupiti podatke

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];
    if(!isset($_POST["email"]) || empty($_POST["email"])) {
        $email_error  = "<p class='alert alert-danger text-danger d-inline-block p-1'>Email is required!</p>";
        array_push($errors,$email_error);
    } else {
        $email = $_POST["email"];
    }
    
      if(!isset($_POST["password"]) || empty($_POST["password"])) {
        $password_error  = "<p class='alert alert-danger text-alert text-danger d-inline-block p-1'>Password is required!</p>";
        array_push($errors,$password_error);
    } else {
        $password = $_POST["password"];
    }

    if(count($errors) == 0) {
        if(login_user($email,$password)) {
            header('Location: user/home.php');
        } else {
            $wrong_password_or_email = "Mail and password combination is not correct";
        }
    }
 
}
    





require('views/login.view.php');
