<?php 

$title = "Home";
require('../core/init.php');

if(!isLogged()){// Da li nije logovan, sto znaci uci ce u if ako korisnik nije logovan
    header('Location: /LoginSystem/index.php');
}

$user  = getUser($_SESSION["id"]);
$posts = getAllPostsFromUser($user['id']);
$id    = $_GET['id'];

if(deletePost($id)) {
    unlink(ROOT."/uploads/".$_GET['image']);
    header("Location: all_posts.php");
} else {
    header("Location: /facebook/error.php");
}


require('./views/delete_post.view.php');


?>