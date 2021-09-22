<?php require('views/includes/head.php');  ?>
<?php require('views/includes/top_header.php'); ?>

<div class="container">
<h1 class="display-4 text-center"><?php echo $all_public_posts[0]['first_name']; ?>'s posts</h1>
    <div class="row">
        <div class="col-md-4">
            <ul class="list-group">
            <a href="index.php" class="list-group-item">Back</a></ul>
        </div>
        <div class="col-md-8">
            <?php foreach($all_public_posts as $post): ?>
            <div class="card mb-4">
                <div class="card-body">
                    <img src="uploads/<?php echo $post['image'] ?>" class="img-fluid">
                    <a href="" class="btn btn-sm btn-secondary m-2">Post by: <?php echo $post['first_name'] . " " . $post['last_name']; ?></a>
                    <span class="created_at"><i class="far fa-clock mt-1"></i><?php echo date("d.m.Y H:i:s",strtotime($post['created_at'])); ?></span>
                    <h3 class="text-center"><?php echo $post['title']; ?></h3>
                    <p class="text-center"><?php echo substr($post['body'],0,200); ?> . . . </p>
                    <a href="single_post.php?id=<?php echo $post['id']; ?>" class="btn btn-info form-control">Read more</a>
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


