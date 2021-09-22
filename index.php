<?php

$title = "Facebook";
require_once('core/init.php');


$categories       = getCategories();


if(isset($_GET['cat'])) {
    $all_public_posts = getAllPublicPostsWithCategory($_GET['cat']);
} else {
    $all_public_posts = getAllPublicPosts();
}


require('views/index.view.php');