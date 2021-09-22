<?php  require('./views/includes/head.php'); ?>
<?php  require('./views/includes/top_header.php'); ?>

<h1 class="display-4 text-center m-3"><?php echo $user["first_name"]; ?> All posts</h1>
<div class="container">
       <div class="row">
          <div class="col-md-4">
            <?php include('./views/includes/sidebar.php'); ?>
          </div>
           <div class="col-md-8">
            <div class="row">
                <?php foreach($posts as $post): ?>
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header text-center">
                            <p><?php echo ($post['public']) ? '<i class="far fa-eye"></i>' : '<i class="far fa-eye-slash"></i>' ?></p>
                                <p><?php echo $post['title']; ?></p>
                            </div>
                            <div class="card-body">
                            <img src="uploads/<?php echo $post['image']; ?>" class ="img-fluid">
                            </div>
                            <div class="card-footer">
                                <a href="user/update_post.php?id=<?php echo $post['id']; ?>" class="btn btn-sm btn-warning float-start"><i class="far fa-edit"></i></a>
                                <a href="user/delete_post.php?id=<?php echo $post['id']; ?>&image=<?php echo $post['image']; ?>" class="btn btn-sm btn-danger float-end"><i class="far fa-trash-alt"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
           </div>
       </div>
        </div>

<?php  require('./views/includes/bottom.php'); ?>