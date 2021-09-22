<?php  require('./views/includes/head.php'); ?>
<?php  require('./views/includes/top_header.php'); ?>

<h1 class="display-4 text-center m-3"><?php echo $user["first_name"]; ?> Account page</h1>

<div class="container">
       <div class="row">
          <div class="col-4">
            <?php include('./views/includes/sidebar.php'); ?>
          </div>
           <div class="col-8">
            <h1>Change email</h1>
            <form action="user/change_email.php" method="POST">
                  <input type="email" class="form-control" name="email" value="<?php echo $user['email']; ?>"><br>
                  <?php if(isset($email_error)): ?>
                  <p><?php echo $email_error; ?></p>
                  <?php endif; ?>
                  <button type="submit" class="btn btn-success form-control">Save</button>
                </form>
           </div>
       </div>
        </div>

<?php  require('./views/includes/bottom.php'); ?>