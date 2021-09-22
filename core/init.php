<?php   

require('config.php');
require('connection.php');
require('helpers.php');
require('db_functions.php');
require('db_post_functions.php');

// START SESSION
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}
// paleo
// usage
// PHP_SESSION_ON
// PHP_SESSION_NONE
