<?php require "../includes/navbar.php"; ?>
<?php require "../config/config.php"; ?>



<?php

if (isset($_GET['post_id'])) {
    $id = $_GET['post_id'];

    $select = $conn->query("SELECT * FROM posts WHERE id = '$id'");

    $select->execute();

    $post = $select->fetch(PDO::FETCH_OBJ);
} else {
    header('location: http://localhost/clean-blog/404.php');
}

if (isset($_POST['submit']) && isset($_GET['post_id'])) {

    if ($_POST['comment'] == "") {
        // echo "<script>alert('Please write a comment');</script>";
    } else {
        $id = $_GET['post_id'];
        $comment = $_POST['comment'];
        $user_name = $_SESSION['username'];

        $insert = $conn->prepare("INSERT INTO comments (id_post_comment, user_name_comment, comment) VALUES (:id_post_comment, :user_name_comment, :comment)");

        $insert->execute([
            ':id_post_comment' => $id,
            ':user_name_comment' => $user_name,
            ':comment' => $comment
        ]);

        if ($insert) {
            echo "<script>alert('Comment added successfully');</script>";
        } else {
            echo "<script>alert('Failed to add comment');</script>";
        }

        // header("Location: http://localhost/clean-blog/posts/post.php?post_id=" . $id . "");
    }
}

// selecting comments
$comments = $conn->query("SELECT posts.id AS id, comments.id_post_comment AS id_post_comment,
     comments.user_name_comment AS user_name_comment, comments.comment AS comment, comments.created_at AS created_at,
      comments.status_comment AS status_comment FROM posts JOIN comments ON posts.id= comments.id_post_comment WHERE posts.id = '$id'
       AND comments.status_comment = 1");

$comments->execute();
$allcomments = $comments->fetchAll(PDO::FETCH_OBJ);


?>
<!-- Page Header-->
<header class="masthead" style="background-image: url('../images/<?php echo $post->img; ?>')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="post-heading">
                    <h1><?php echo $post->title; ?></h1>
                    <h2 class="subheading"><?php echo $post->subtitle; ?></h2>
                    <span class="meta">
                        Posted by
                        <a href="#!"><?php echo $post->user_name; ?></a>
                        <?php

                        $created_at = $post->created_at;

                        $formattedDate = date("F j, Y", strtotime($created_at));

                        echo $formattedDate;
                        ?>
                    </span>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Post Content-->
<article class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <p><?php echo $post->body; ?></p>

                <?php if (isset($_SESSION['user_id']) and $_SESSION['user_id'] == $post->user_id) : ?>
                    <a href="update.php?upd_id=<?php echo $post->id; ?>" class="btn btn-primary a-btn-slide-text">
                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                        <span><strong>Update</strong></span>
                    </a>
                    <a href="http://localhost/clean-blog/posts/delete.php?del_id=<?php echo $post->id; ?>" class="btn btn-danger a-btn-slide-text float-end">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        <span><strong>Delete</strong></span>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</article>


<section>
    <div class="container my-5 py-5">
        <div class="row d-flex justify-content-center">
            <?php if (isset($_POST['submit']) and ($_POST['comment'] == '')) : ?>
                <div class="alert alert-danger" role="alert">
                    Please write a comment
                </div>
            <?php endif; ?>
            <div class="col-md-12 col-lg-10 col-xl-8">
                <h3 class="mb-5">Comments</h3>
                <?php if (count($allcomments) > 0) : ?>
                  
                    <?php foreach ($allcomments as $comment): ?>
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-start align-items-center">

                                    <div>
                                        <h6 class="fw-bold text-primary"><?php echo $comment->user_name_comment; ?>
                                            <h8 class="p-3 text-black">(<?php

                                                                        $created_at = $comment->created_at;

                                                                        $formattedDate = date("F j, Y", strtotime($created_at));

                                                                        echo $formattedDate;
                                                                        ?>
                                                )</h8>
                                        </h6>

                                    </div>
                                </div>

                                <p class="mt-3 mb-4 pb-2">
                                    <?php echo $comment->comment; ?>
                                </p>

                                <hr class="my-4" />

                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="alert alert-danger" role="alert">
                            No comments yet
                        </div>

                    <?php endif; ?>


                    <?php if (isset($_SESSION['username'])) : ?>

                        <form method="POST" action="post.php?post_id=<?php echo $post->id; ?>">

                            <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">

                                <div class="d-flex flex-start w-100">

                                    <div class="form-outline w-100">
                                        <textarea class="form-control" id="" placeholder="write message" rows="4"
                                            name="comment"></textarea>

                                    </div>
                                </div>
                                <div class="float-end mt-2 pt-1">
                                    <button type="submit" name="submit" class="btn btn-primary btn-sm mb-3">Post comment</button>
                                </div>
                            </div>
                        </form>
                    <?php else: ?>
                        <div class="alert alert-danger" role="alert">
                            Please login to comment
                        </div>
                    <?php endif; ?>
                        </div>
            </div>
        </div>
    </div>
</section>
<?php require "../includes/footer.php"; ?>