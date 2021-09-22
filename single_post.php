<?php

$title = "Facebook";
require_once('core/init.php');

$categories = getCategories();

$post       = getSinglePost($_GET['id']);
  
$likes      = getLikes($_GET['id']);
 
$comments   = getPostComments($_GET['id']);



require('views/single_post.view.php');