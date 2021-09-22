<?php 

$title = "Delete comment";
require('../core/init.php');

if(!isLogged()){
    header('Location: /LoginSystem/index.php');
}

$user  = getUser($_SESSION["id"]);
$posts = getAllPostsFromUser($user['id']);
$id    = $_GET['id'];





?>
