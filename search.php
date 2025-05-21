<?php 
$basepath='';
require 'includes/header.php'; ?>
<?php require 'config/config.php'; ?>



<?php

$rows=[];
$search = "";

if(isset($_POST['search'])) {
    if($_POST['search'] == "") {
        // echo "<script>alert('Please enter a search term.');</script>";
        header("Location: http://localhost/clean-blog/index.php");

    } else {
        $search = $_POST['search'];
        $data = $conn->query("SELECT * FROM posts WHERE title LIKE '%$search%' AND status = 1");
        $data->execute();
        $rows = $data->fetchAll(PDO::FETCH_OBJ);

        if($data->rowCount() > 0) {
            echo "<div>Search Results for '$search' </div>";
           
    


        } else {
            echo "<div>No results found for '$search'</div>";
        }
    }
} else {
    header("Location: http://localhost/clean-blog/index.php");
}




?>


<div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                
                <?php if(count($rows) > 0) : ?>
                    
                    <div><?php echo count($rows); ?> Results found. </div>
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
                <?php endif; ?>
                    <!-- Pager-->
                    
</div>















<?php require 'includes/footer.php'; ?>