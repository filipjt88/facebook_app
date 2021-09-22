<?php 

$title = "All posts";
require('../core/init.php');

if(!isLogged()){
    header('Location: /facebook_app/index.php');
}

$user = getUser($_SESSION["id"]);
$posts = getAllPostsFromUser($user['id']);


require('./views/all_posts.view.php');


?>
