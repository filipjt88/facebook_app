<?php  require('./views/includes/head.php'); ?>
<?php  require('./views/includes/top_header.php'); ?>

<h1 class="display-4 text-center m-3"><?php echo $user["first_name"]; ?> Account page</h1>

<div class="container">
       <div class="row">
          <div class="col-4">
            <?php include('./views/includes/sidebar.php'); ?>
          </div>
           <div class="col-8">
            <h1>Change name</h1>
            <form action="user/change_name.php" method="POST">
                  <input type="text" class="form-control" name="first_name" value="<?php echo $user['first_name']; ?>"><br>
                  <?php if(isset($first_name_error)): ?>
                  <p><?php echo $first_name_error; ?></p>
                  <?php endif; ?>
                  <input type="text" class="form-control" name="last_name" value="<?php echo $user['last_name']; ?>"><br>
                  <?php if(isset($last_name_error)): ?>
                  <p><?php echo $last_name_error; ?></p>
                  <?php endif; ?>
                  <button type="submit" class="btn btn-success form-control">Save</button>
                </form>
           </div>
       </div>
        </div>

<?php  require('./views/includes/bottom.php'); ?>