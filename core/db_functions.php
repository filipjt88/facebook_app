<?php 

function register_user($title,$first_name,$last_name,$email,$password) {
    global $db;
    $role = "user";
    $password_hash = password_hash($password,PASSWORD_DEFAULT);
    $sql = $db->prepare("INSERT INTO users(title,first_name,last_name,email,password,role) VALUES (?,?,?,?,?,?)"); 
    $sql->bind_param('ssssss',$title,$first_name,$last_name,$email,$password_hash,$role); 
    $sql->execute(); // izvrsi

    if($sql->errno == 0){ //errno je error number
        $_SESSION["id"] = $sql->insert_id;
        header('Location: user/home.php');
    } else {
        header('Location: error.php');
    }
}


function login_user($email,$password) {
    global $db;
    $user_password = getPasswordFromDb($email);
    if(!$user_password) {
        return false;
    }
    if(!password_verify($password,$user_password)) {
            return false;
    }
    $sql = $db->prepare("SELECT id FROM users WHERE email = ? AND password = ?");
    $sql->bind_param('ss',$email,$user_password);
    $sql->execute();
    if($sql->errno == 0) {
        $result = $sql->get_result();
        $id = $result->fetch_assoc()["id"];
        $_SESSION["id"] = $id;
        return true;
    } else {
        header('Location: error.php');
    }
}

function getPasswordFromDb($email) {
     global $db;
     $sql = $db->prepare("SELECT password FROM users WHERE email = ?");
     $sql->bind_param('s',$email);
     $sql->execute();
     $result = $sql->get_result();
     if($result->num_rows == 0) {
         return false;
     }
     $password = $result->fetch_assoc()["password"];
     return $password;
}



function isLogged() {
    if(isset($_SESSION["id"])) {
       return true;
    } else {
       return false;
    }
}



function getUser($id) {
   global $db;
   $sql = $db->prepare("SELECT * FROM users WHERE id = ?");
   $sql->bind_param('i',$id);
   $sql->execute();
   $result = $sql->get_result();   
   $user = $result->fetch_assoc();
   return $user;
}

function change_user_title($user) {
        global $db;
        $title = "";
        if($user["title"] == "mr") {
            $title = "ms";
        } else {
            $title = "mr";
        }

        $sql = $db->prepare("UPDATE users SET title = ? , updated_at = CURRENT_TIMESTAMP WHERE id = ?");
        $sql->bind_param('si',$title,$user["id"]);
        $sql->execute();
        if($sql->errno == 0) {
            return true;
        } else {
            return false;
        }
}

function change_user_name($first_name,$last_name,$id) {
    global $db;
    $sql = $db->prepare("UPDATE users SET first_name = ?, last_name = ? , updated_at = CURRENT_TIMESTAMP WHERE id = ?");
    $sql->bind_param('ssi',$first_name,$last_name,$id);
    $sql->execute();

    if($sql->errno == 0) {
    //    header('Location:account.php');
    return true;
    } else {
    //    header('Location:error.php');
    return false;
    }
}


function change_email($email,$id) {
     global $db;
     $sql = $db->prepare("UPDATE users SET email = ?, updated_at = CURRENT_TIMESTAMP WHERE id = ?");
     $sql->bind_param('si',$email,$id);
     $sql->execute();

     if($sql->errno == 0) {
         return true;
     } else {
         return false;
     }
}


function change_password($current_password,$password,$email,$id) {
     global $db;
     $user_password = getPasswordFromDb($email);
     if(!$user_password){
        return false;
     }

     if(!password_verify($current_password,$user_password)) {
          return false;
     }

     $new_hash_password = password_hash($password,PASSWORD_DEFAULT);
     $sql = $db->prepare("UPDATE users SET password = ?, updated_at = CURRENT_TIMESTAMP  WHERE id = ?"); // ?  
     $sql->bind_param('si',$new_hash_password,$id);
     $sql->execute();

     if($sql->errno == 0) {
         return true;
     } else {
         return false;
     }
}






