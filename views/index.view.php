<?php require('views/includes/head.php');  ?>
<?php require('views/includes/top_header.php'); ?>

<div class="container">
    <div class="row mt-5">
        <div class="col-md-4">
            <ul class="list-group">
        <h1 class="text-center">All Public posts</h1>
            <a href="index.php" class="list-group-item">All category</a>
                <?php foreach($categories as $category): ?>
                    <a href="index.php?cat=<?php echo $category['id']; ?>" class="list-group-item allcat"><?php echo $category['name']; ?></a>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="col-md-6">
            <?php foreach($all_public_posts as $post): ?>
            <div class="card mb-4">
                <div class="card-body">
                    <img src="uploads/<?php echo $post['image'] ?>" class="img-fluid">
                    <a href="user_posts.php?id=<?php echo $post['user_id']; ?>" class="btn btn-sm btn-secondary text-light m-2">Post by: <?php echo $post['first_name'] . " " . $post['last_name']; ?></a>
                    <span class="created_at text-secondary"><i class="far fa-clock mt-1 mr-1 text-success"></i> <?php echo date("d-m-Y H:i:s",strtotime($post['created_at'])); ?></span>
                    <h3 class="text-center"><?php echo $post['title']; ?></h3>
                    <p class="text-center"><?php echo substr($post['body'],0,200); ?> . . . </p>
                    <a href="single_post.php?id=<?php echo $post['id']; ?>" class="btn btn-primary form-control text-light">Read more</a>
                </div>
            </div>
            <?php endforeach; ?>
            <?php if(count($all_public_posts) == 0): ?>
                <h1 class="display-4">No posts this category</h1>
                <?php endif; ?>
        </div>
    </div>
</div>

<?php require('views/includes/bottom.php');  ?>
