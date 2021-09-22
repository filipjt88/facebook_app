<?php  require('./views/includes/head.php'); ?>
<?php  require('./views/includes/top_header.php'); ?>

<div class="container">
<h1 class="display-4 text-center m-3"><?php echo $user["first_name"]; ?> Account page</h1>
       <div class="row">
          <div class="col-md-4">
            <?php include('./views/includes/sidebar.php'); ?>
          </div>
           <div class="col-md-8">
           <ul class="list-group list-group-flush">
            <li class="list-group-item"><?php echo $user["title"]; ?><a href="user/change_title.php" class="btn btn-warning btn-sm float-right">Change</a></li>
            <li class="list-group-item"><?php echo $user["first_name"] . " " . $user["last_name"]; ?><a href="user/change_name.php" class="btn btn-warning btn-sm float-right">Change</a></li>
            <li class="list-group-item"><?php echo $user["email"]; ?><a href="user/change_email.php" class="btn btn-warning btn-sm float-right">Change</a></li>
            <li class="list-group-item">password<a href="user/change_password.php" class="btn btn-warning btn-sm float-right">Change</a></li>
            <li class="list-group-item">created account<a href="" class="btn btn-secondary text-light btn-sm float-right disabled"><?php echo date("F j, Y, g:i a",strtotime($user["created_at"])); ?></a></li>
            <?php if(isset($user["updated_at"])): ?>
            <li class="list-group-item">updated<a href="" class="btn btn-secondary text-light btn-sm float-right disabled"><?php echo date("F j, Y, g:i a",strtotime($user["updated_at"])); ?></a></li>
            <?php endif; ?>
            </ul>
           </div>
       </div>
        </div>

<?php  require('./views/includes/bottom.php'); ?>