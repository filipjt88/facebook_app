<?php  require('./views/includes/head.php'); ?>
<?php  require('./views/includes/top_header.php'); ?>


<div class="container">
       <div class="row mt-5">
          <div class="col-md-4">
            <?php include('./views/includes/sidebar.php'); ?>
          </div>
           <div class="col-md-8">
            <h1>Make new post</h1>
            <form action="user/new_post.php" method="POST" enctype="multipart/form-data">
                  <input type="text" class="form-control" name="title" placeholder="Title"><br>
                  <?php if(isset($title_error)): ?>
                  <p><?php echo $title_error; ?></p>
                  <?php endif; ?>
                  <textarea name="body" class="form-control" cols="30" rows="10" placeholder="body" value="<?php if(isset($body)) echo $body; ?>"></textarea><br>
                  <?php if(isset($body_error)): ?>
                  <p><?php echo $body_error; ?></p>
                  <?php endif; ?>
                  <input type="file" class="form-control" name="file"><br>
                  <?php if(isset($file_error)): ?>
                  <p><?php echo $file_error; ?></p>
                  <?php endif; ?>
                  <select name="category" class="form-control">
                   <?php foreach($categories as $category): ?>
                   <option value="<?php echo $category['id']; ?>"><?php echo $category["name"]; ?></option>
                   <?php endforeach; ?>
                  </select><br>
                  <select name="public" class="form-control">
                    <option value="1">Public</option>
                    <option value="0">Private</option>
                  </select><br>
                  <button type="submit" class="btn btn-primary form-control">Save post</button>
                  <?php if(isset($success)): ?>
                  <div class='bg-success mt-2'><?php echo $success; ?></div>
                  <?php endif; ?>
                  <?php if(isset($post_created)): ?>
                  <p><?php echo $post_created; ?></p>
                  <?php endif; ?>
                  <?php if(isset($post_not_created)): ?>
                  <p><?php echo $post_not_created; ?></p>
                  <?php endif; ?>
                  <?php if(isset($ups)): ?>
                  <p><?php echo $ups; ?></p>
                  <?php endif; ?>
                </form>
           </div>
       </div>
        </div>

<?php  require('./views/includes/bottom.php'); ?>