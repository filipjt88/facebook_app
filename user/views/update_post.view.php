<?php  require('./views/includes/head.php'); ?>
<?php  require('./views/includes/top_header.php'); ?>


<div class="container">
       <div class="row mt-5">
          <div class="col-md-4">
            <?php include('./views/includes/sidebar.php'); ?>
          </div>
           <div class="col-md-8">
            <h1>Edit post</h1>
            <form action="user/update_post.php?id=<?php echo $post['id']; ?>" method="POST" enctype="multipart/form-data">
                  <input type="text" class="form-control" name="title" value="<?php echo $post['title']; ?>"><br>
                  <?php if(isset($title_error)): ?>
                  <p><?php echo $title_error; ?></p>
                  <?php endif; ?>
                  <img src="uploads/<?php echo $post['image']; ?>" class="img-fluid mb-5">
                  <textarea name="body" class="form-control" cols="30" rows="10"><?php echo $post['body']; ?></textarea><br>
                  <?php if(isset($body_error)): ?>
                  <p><?php echo $body_error; ?></p>
                  <?php endif; ?>
                  <select name="category" class="form-control">
                   <?php foreach($categories as $cat): ?>
                   <option value="<?php echo $cat['id']; ?>" <?php echo ($post['category_id'] == $cat['id']) ? 'selected' : '' ?>><?php echo $cat["name"]; ?></option>
                   <?php endforeach; ?>
                  </select><br>
                  <select name="public" class="form-control">
                    <option value="1" <?php echo ($post['public'] == 1) ? 'selected' : '' ?>>Public</option>
                    <option value="0" <?php echo ($post['public'] == 0) ? 'selected' : '' ?>>Private</option>
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
                </form>
           </div>
       </div>
        </div>

<?php  require('./views/includes/bottom.php'); ?>