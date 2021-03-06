<div id="sidebar" class="col-md-4">
    <!-- search box -->
    <div class="search-box-container">
        <h4>Search</h4>
        <form class="search-post" action="search.php" method="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search .....">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-danger">Search</button>
                </span>
            </div>
        </form>
    </div>
    <!-- /search box -->
    <!-- recent posts box -->

    <?php
    include './admin/config.php';
    $role = $_SESSION['user_role'];

    $query = "SELECT * FROM subscription WHERE user_id = {$user_id}";

    $result = mysqli_query($connection, $query);
    $rowcnt = mysqli_num_rows($result);

    if ($user_role == 1) {
        $query =    "SELECT post.post_id,
                            post.title,
                            post.post_img, 
                            post.post_date,
                            post.category, 
                            post.has_premium,
                            category.category_name
                    FROM post
                    LEFT JOIN category
                    ON 
                    post.category = category.category_id
                    ORDER BY rand() LIMIT 0, 5";
    } else if (!$rowcnt) {
        $query = "SELECT    post.post_id,
                            post.title,
                            post.post_img, 
                            post.post_date,
                            post.category, 
                            post.has_premium,
                            category.category_name
                    FROM post
                    LEFT JOIN category
                    ON 
                    post.category = category.category_id
                    WHERE has_premium = 'NO'
                    ORDER BY rand() LIMIT 0, 5";
    } else {
        $query = "SELECT    post.post_id,
                            post.title,
                            post.post_img, 
                            post.post_date,
                            post.category, 
                            post.has_premium,
                            category.category_name
                    FROM post
                    LEFT JOIN category
                    ON 
                    post.category = category.category_id
                    WHERE has_premium = 'YES'
                    ORDER BY post.post_id DESC
                    LIMIT 0, 5";
    }

    $result = mysqli_query($connection, $query) or die('query failed');

    ?>

    <div class="recent-post-container" style="margin-bottom: 1em;">
        <?php
            if ($user_role == 1) {
                echo "<h4>All Posts</h4>";
            } else if (!$rowcnt) {
                echo "<h4>Recent Posts</h4>";
            } else {
                echo "<h4>Premium Posts</h4>";
            }
        
        ?>
        
        <?php
        if (mysqli_num_rows($result)) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <div class="recent-post">
                    <a class="post-img" href="single.php?id=<?php echo $row['post_id'] ?>">
                        <img src="./admin/upload/<?php echo $row['post_img'] ?>" alt="" />
                    </a>
                    <div class="post-content">
                        <h5><a href="single.php?id=<?php echo $row['post_id'] ?>"><?php echo $row['title'] ?></a></h5>
                        <span>
                            <i class="fa fa-tags" aria-hidden="true"></i>
                            <a href='category.php?cid=<?php echo $row['category'] ?>'><?php echo $row['category_name'] ?></a>
                        </span>
                        <span>
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                            <?php echo $row['post_date'] ?>
                        </span>
                        <a class="read-more" href="single.php?id=<?php echo $row['post_id'] ?>">read more</a>
                    </div>
                </div>
        <?php }
        } ?>
    </div>

    <!-- /recent posts box -->
</div>