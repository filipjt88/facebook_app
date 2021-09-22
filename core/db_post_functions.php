<?php 

function getCategories() {
       global $db;
       $sql = $db->prepare("SELECT * FROM category");
       $sql->execute();
       
       if($sql->errno == 0) {
       $result     = $sql->get_result();
       $categories = mysqli_fetch_all($result,MYSQLI_ASSOC);
       return $categories; 
       } else {
              header("Location:error.php");
       }
      
}


function savePost($title,$body,$image_name,$user_id,$category_id,$public) {
        global $db;
        $sql = $db->prepare("INSERT INTO posts (title,body,image,user_id,category_id,public) VALUES (?,?,?,?,?,?)");
        $sql->bind_param('sssiii',$title,$body,$image_name,$user_id,$category_id,$public);
        $sql->execute();
        if($sql->errno == 0) {
          return true;
        } else {
               return false;
        }
}


function getAllPostsFromUser($id) {
       global $db;
       $sql = $db->prepare("SELECT * FROM posts WHERE user_id = ? ORDER BY created_at DESC");
       $sql->bind_param('i',$id);
       $sql->execute();

       if($sql->errno == 0) {
         $result = $sql->get_result();
         $posts  = $result->fetch_all(MYSQLI_ASSOC);
         return $posts;
       } else {
              return false;
       }
}


function deletePost($id) {
       global $db;
       $sql = $db->prepare("DELETE FROM posts WHERE id = ?");
       $sql->bind_param('i',$id);
       $sql->execute();

       if($sql->errno == 0) {
         return true;
       } else {
         return false;
       }
}


function singlePost($post_id) {
       global $db;
       $sql = $db->prepare("SELECT * FROM posts WHERE id = ?");
       $sql->bind_param('i',$post_id);
       $sql->execute();

       if($sql->errno == 0) {
         $result = $sql->get_result();
         $post   = $result->fetch_assoc();
         return $post;
       } else {
         return false;
       }
}


function updatePost($title,$body,$category_id,$public,$user_id,$post_id) {
       global $db;
       $sql = $db->prepare("UPDATE posts SET title = ?, body = ?, category_id = ?, public = ?, user_id = ?, updated_at = NOW() WHERE id = ?");
       $sql->bind_param('ssiiii',$title,$body,$category_id,$public,$user_id,$post_id);
       $sql->execute();

       if($sql->errno == 0) {
         return true;
       } else {
         return false;
       }
}


function getAllPublicPosts() {
  global $db;
  $sql = $db->prepare("SELECT p.id, p.title, p.body, p.image, p.user_id, p.created_at, p.category_id, u.id AS userId, u.first_name, u.last_name FROM posts p INNER JOIN users u ON p.user_id = u.id 
  AND p.public = 1");
  $sql->execute();

  if($sql->errno == 0) {
    $result = $sql->get_result();
    $posts  = $result->fetch_all(MYSQLI_ASSOC);
    return $posts;
  } else {
    return false;
  }
}

function getAllPublicPostsWithCategory($id) {
  global $db;
  $sql = $db->prepare("SELECT p.id, p.title, p.body, p.image, p.user_id, p.created_at, p.category_id, u.id AS userId, u.first_name, u.last_name FROM posts p INNER JOIN users u ON p.user_id = u.id 
  AND p.public = 1 WHERE p.category_id = ?");
  $sql->bind_param('i',$id);
  $sql->execute();

  if($sql->errno == 0) {
    $result = $sql->get_result();
    $posts  = $result->fetch_all(MYSQLI_ASSOC);
    return $posts;
  } else {
    return false;
  }
}


function getSinglePost($id) {
  global $db;
  $sql = $db->prepare("SELECT p.id, p.title, p.body, p.image, p.user_id, p.created_at, p.category_id, u.id AS userId, u.first_name, u.last_name FROM posts p INNER JOIN users u ON p.user_id = u.id 
  WHERE p.id = ?");
  $sql->bind_param('i',$id);
  $sql->execute();

  if($sql->errno == 0) {
    $result = $sql->get_result();
    $post   = $result->fetch_assoc();
    return $post;
  } else {
    return false;
  }
}



function getAllPublicPostsFromUser($id) {
  global $db;
  $sql = $db->prepare("SELECT p.id, p.title, p.body, p.image, p.user_id, p.created_at, p.category_id, u.id AS userId, u.first_name, u.last_name FROM posts p INNER JOIN users u  ON p.user_id = u.id AND p.public = 1
  WHERE u.id = ?");
  $sql->bind_param('i',$id);
  $sql->execute();

  if($sql->errno == 0) {
    $result = $sql->get_result();
    $posts  = $result->fetch_all(MYSQLI_ASSOC);
    return $posts;
  } else {
         return false;
  }
}


function userVoteUp($post_id) {
  global $db;
  $sql = $db->prepare("INSERT INTO likes (user_id,post_id) VALUES (?,?)");
  $sql->bind_param('ii',$_SESSION['id'],$post_id);
  $sql->execute();

  if($sql->errno == 0) {
         return true;
  } else {
         return false;
  }
}


function voted($post_id) {
  global $db;
  $sql = $db->prepare("SELECT * FROM likes WHERE user_id = ? AND post_id = ?");
  $sql->bind_param('ii',$_SESSION['id'],$post_id);
  $sql->execute();

  if($sql->errno == 0) {
      $result = $sql->get_result();
      $likes  = $result->num_rows;
      if($likes > 0) {
        return true;
      } else {
        return false;
      }
  } else {
       header("Location: error.php");
  }
}


function getLikes($post_id) {
  global $db;
  $sql = $db->prepare("SELECT * FROM likes WHERE post_id = ?");
  $sql->bind_param('i',$post_id);
  $sql->execute();

  if($sql->errno == 0) {
      $result = $sql->get_result();
      $likes  = $result->num_rows;
      return $likes;
  } else {
       header("Location: error.php");
  }
}

function userComment($post_id,$body) {
  global $db;
  $sql = $db->prepare("INSERT INTO comments (user_id,post_id,body) VALUES (?,?,?)");
  $sql->bind_param('iis',$_SESSION['id'],$post_id,$body);
  $sql->execute();

  if($sql->errno == 0) {
    return true;
  } else {
      return false;
  }
}


function getPostComments($post_id) {
  global $db;
  $sql = $db->prepare("SELECT c.body, c.created_at, u.first_name, u.last_name FROM comments c INNER JOIN users u ON c.user_id = u.id WHERE c.post_id = ?");
  $sql->bind_param('i',$post_id);
  $sql->execute();

  if($sql->errno == 0) {
      $result = $sql->get_result();
      $comments = $result->fetch_all(MYSQLI_ASSOC);
      return $comments;
  } else {
      return false;
  }
}



function getCommentUser($id,$body) {
  global $db;
  $sql = $db->prepare("DELETE FROM comments (body) VALUES (?)");
  $sql->bind_param('is',$id,$body);
  $sql->execute();

  if($sql->errno == 0) {
    return true;
  } else {
    return false;
  }
}