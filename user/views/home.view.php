<?php  require('./views/includes/head.php'); ?>
<?php  require('./views/includes/top_header.php'); ?>

<h1 class="display-4 text-center m-3"><?php echo $user["first_name"]; ?> Home page</h1>

<div class="container">
       <div class="row mt-5">
          <div class="col-md-4">
            <?php include('./views/includes/sidebar.php'); ?>
          </div>
           <div class="col-md-8">
           <?php foreach($posts as $post): ?>
            <div class="card mb-4">
                <div class="card-body">
                    <img src="uploads/<?php echo $post['image'] ?>" class="img-fluid">
                    <a href="user_posts.php?id=<?php echo $post['user_id']; ?>" class="btn btn-sm btn-secondary m-2 text-light">Post by: <?php echo $user['first_name'] . " " . $user['last_name']; ?></a>
                    <span class="created_at text-secondary"><i class="far fa-clock mt-1 mr-1 text-success"></i> <?php echo date("d-m-Y H:i:s",strtotime($post['created_at'])); ?></span>
                    <h3 class="text-center"><?php echo $post['title']; ?></h3>
                    <p class="text-center"><?php echo substr($post['body'],0,200); ?> . . . </p>
                    <a href="single_post.php?id=<?php echo $post['id']; ?>" class="btn btn-info form-control text-light">Read more</a>
                </div>
            </div>
            <?php endforeach; ?>
            <?php if(count($posts) == 0): ?>
                <h1 class="display-4">No posts this category</h1>
                <?php endif; ?>
           </div>
       </div>
        </div>

<?php  require('./views/includes/bottom.php'); ?>


