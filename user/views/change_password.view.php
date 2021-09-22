<?php  require('./views/includes/head.php'); ?>
<?php  require('./views/includes/top_header.php'); ?>

<h1 class="display-4 text-center m-3"><?php echo $user["first_name"]; ?> Account page</h1>

<div class="container">
       <div class="row">
          <div class="col-4">
            <?php include('./views/includes/sidebar.php'); ?>
          </div>
           <div class="col-8">
            <h1>Change password</h1>
            <form action="user/change_password.php" method="POST">
                  <input type="password" class="form-control" name="current_password" placeholder="Current password"><br>
                  <?php if(isset($current_password_error)): ?>
                  <p><?php echo $current_password_error; ?></p>
                  <?php endif; ?>
                  <input type="password" class="form-control" name="password" placeholder="New password"><br>
                  <?php if(isset($password_error)): ?>
                  <p><?php echo $password_error; ?></p>
                  <?php endif; ?>
                  <input type="password" class="form-control" name="password_repeat" placeholder="Repeat new password"><br>
                  <?php if(isset($password_repeat_error)): ?>
                  <p><?php echo $password_repeat_error; ?></p>
                  <?php endif; ?>
                  <?php if(isset($password_match)): ?>
                  <p><?php echo $password_match; ?></p>
                  <?php endif; ?>
                  <button type="submit" class="btn btn-success form-control">Save</button>
                  <?php if(isset($success)): ?>
                  <div class='bg-success mt-2'><?php echo $success; ?></div>
                  <?php endif; ?>
                </form>
           </div>
       </div>
        </div>

<?php  require('./views/includes/bottom.php'); ?>