<?php 
$title = "Change name";
require('../core/init.php');

if(!isLogged()){
    header('Location: /facebook_app/index.php');
}
$user = getUser($_SESSION["id"]);


if($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];
    if(!isset($_POST["first_name"]) || empty($_POST["first_name"])) {
        $first_name_error  = "<p class='alert alert-danger text-danger d-inline-block p-1'>First name is required!</p>";
        array_push($errors,$first_name_error);
    } else {
        $first_name = $_POST["first_name"];
    }
    
      if(!isset($_POST["last_name"]) || empty($_POST["last_name"])) {
        $last_name_error  = "<p class='alert alert-danger text-alert text-danger d-inline-block p-1'>Last name is required!</p>";
        array_push($errors,$last_name_error);
    } else {
        $last_name = $_POST["last_name"];
    }

    if(count($errors) == 0) {
        if(change_user_name($first_name,$last_name,$user["id"])) {
            header('Location: account.php');
        } else {
            header('Location: error.php');

        }
    }


 
}


require('./views/change_name.view.php');


?>
