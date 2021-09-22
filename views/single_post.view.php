<?php require('views/includes/head.php');  ?>
<?php require('views/includes/top_header.php'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <ul class="list-group">
            <a href="index.php" class="list-group-item">Back</a>
            </ul>
        </div>
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-body">
                    <img src="uploads/<?php echo $post['image'] ?>" class="img-fluid">
                    <a href="user_posts.php?id=<?php echo $post['user_id']; ?>" class="btn btn-sm btn-warning m-2">Post by: <?php echo $post['first_name'] . " " . $post['last_name']; ?></a>
                    <span class="created_at text-secondary"><i class="far fa-clock mt-1 text-success"></i><?php echo date("d.m.Y H:i:s",strtotime($post['created_at'])); ?></span>
                    <h3 class="text-center"><?php echo $post['title']; ?></h3>
                    <p class="text-center"><?php echo $post['body']; ?></p>
                </div>
                <div class="card-footer">
                    <?php if(isLogged() && !voted($post['id'])): ?>
                    <a href="voteUp.php?post_id=<?php echo $post['id']; ?>" class="badge bg-light"><i class="far fa-thumbs-up"></i><?php echo $likes; ?></a>
                    <?php else: ?>
                        <span class="badge bg-light"><i class="far fa-thumbs-up"></i><?php echo $likes; ?></span>
                    <?php endif; ?>
                </div>
                <?php if(isLogged()): ?>
                <div class="card-footer">
                    <h4>Comments</h4>
                    <form action="new_comment.php" method="POST">
                        <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>">
                        <textarea name="body" cols="30" rows="1" class="form-control"></textarea>
                        <?php if(isset($body_error)): ?>
                        <p class="text-danger"><?php echo $body_error; ?></p>
                        <?php endif; ?>
                        <button class="btn btn-success btn-sm mt-3">Post comment</button>
                    </form>
                </div>
                <?php endif; ?>
                <div class="card-footer">
                   <?php foreach($comments as $comment): ?>
                    <div class="card-header">
                        <dl>
                            <dd><?php echo $comment['first_name'] ?></dd>
                            <dd><?php echo $comment['body']; ?></dd>
                            <span class="created_at_comment text-dark"><i class="far fa-clock mt-1 text-success"></i><?php echo date("d.m.Y H:i:s",strtotime($comment['created_at'])); ?></span>
                            <a href="user/update_comment.php?id=<?php echo $post['id']; ?>" class="btn btn-sm btn-warning float-start"><i class="far fa-edit"></i></a>
                            <a href="user/delete_comment.php?id=<?php echo $post['id']; ?>&body=<?php echo $post['body']; ?>" class="btn btn-sm btn-danger float-end"><i class="far fa-trash-alt"></i></a>
                        </dl>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require('views/includes/bottom.php');  ?>


