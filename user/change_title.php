<?php 

require('../core/init.php');

if(!isLogged()){// Da li nije logovan, sto znaci uci ce u if ako korisnik nije logovan
    header('Location: /facebook_app/index.php');
}
$user = getUser($_SESSION["id"]);

if(change_user_title($user)) {
     header('Location:account.php');
} else {
    header('Location: error.php');
}

?>