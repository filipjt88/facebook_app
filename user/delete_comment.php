<?php 

$title = "Delete comment";
require('../core/init.php');

if(!isLogged()){// Da li nije logovan, sto znaci uci ce u if ako korisnik nije logovan
    header('Location: /LoginSystem/index.php');
}

$user  = getUser($_SESSION["id"]);
$posts = getAllPostsFromUser($user['id']);
$id    = $_GET['id'];





?>