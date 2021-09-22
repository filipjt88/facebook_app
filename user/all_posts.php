<?php 

$title = "All posts";
require('../core/init.php');

if(!isLogged()){// Da li nije logovan, sto znaci uci ce u if ako korisnik nije logovan
    header('Location: /facebook_app/index.php');
}

$user = getUser($_SESSION["id"]);
$posts = getAllPostsFromUser($user['id']);


require('./views/all_posts.view.php');


?>