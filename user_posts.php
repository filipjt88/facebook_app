<?php

$title = "Facebook";
require_once('core/init.php');



$all_public_posts = getAllPublicPostsFromUser($_GET['id']);




require('views/user_posts.view.php');