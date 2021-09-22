<?php 

$title = "Home";
require('../core/init.php');

if(!isLogged()){
    header('Location: /LoginSystem/index.php');
}

$user = getUser($_SESSION["id"]);
$posts = getAllPostsFromUser($user['id']);


require('./views/home.view.php');


?>
