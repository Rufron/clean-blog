<?php 
$basepath='';
require 'includes/header.php'; 
?>
<?php require 'config/config.php'; ?>


<?php 

    $posts = $conn->query("SELECT * FROM posts WHERE status = 1 ORDER BY created_at DESC");
    $posts->execute();
    $rows = $posts->fetchAll(PDO::FETCH_OBJ);

    $categories = $conn->query("SELECT * FROM categories");
    $categories->execute();
    $categories = $categories->fetchAll(PDO::FETCH_OBJ);

?>
        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <?php //echo 'Hello ' .  $_SESSION['username']; ?>
                <div class="col-md-10 col-lg-8 col-xl-7">
                <?php foreach($rows as $row) : ?>
                    <!-- Post preview-->
                    <div class="post-preview">
                        <a href="http://localhost/clean-blog/posts/post.php?post_id=<?php echo $row->id; ?>">
                            <h2 class="post-title"><?php echo $row->title; ?></h2>
                            <h3 class="post-subtitle"><?php echo $row->subtitle;?></h3>
                        </a>
                        <p class="post-meta">
                            Posted by
                            <a href="#!"><?php echo $row->user_name; ?></a>
                            
                            <?php
                            
                                $created_at = $row->created_at;
                               
                                $formattedDate = date("F j, Y", strtotime($created_at));

                                echo $formattedDate; 
                            ?>
                        </p>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                <?php endforeach; ?>
                    <!-- Pager-->
                    
                </div>
            </div>
        </div>
        
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <h3 class="text-center">Categories</h3>
            <br>
            <br>
            <br>

            <?php foreach ($categories as $cat) : ?>
                        <div class="col-md-6">
                            <a href="http://localhost/clean-blog/categories/category.php?cat_id=<?php echo $cat->id; ?>">
                                <div class="alert alert-dark bg-dark text-white text-center" role="alert">
                                    <?php echo $cat->name ; ?>
                                </div>
                            </a>
                        </div>
            <?php endforeach; ?>
        </div>
        
<?php require 'includes/footer.php'; ?>
  
