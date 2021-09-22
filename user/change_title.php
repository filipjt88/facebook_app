<?php 

require('../core/init.php');

if(!isLogged()){
    header('Location: /facebook_app/index.php');
}
$user = getUser($_SESSION["id"]);

if(change_user_title($user)) {
     header('Location:account.php');
} else {
    header('Location: error.php');
}

?>
