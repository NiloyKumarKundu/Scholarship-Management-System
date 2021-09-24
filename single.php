<?php include 'header.php'; ?>
<div id="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->

                <?php

                include "./admin/config.php";

                $post_id = $_GET['id'];

                $query =    "SELECT post.post_id,
                                    post.title,
                                    post.description,
                                    post.post_img,
                                    post.post_date,
                                    post.category,
                                    category.category_name,
                                    users.username,
                                    post.author
                            FROM post
                            LEFT JOIN category
                            ON 
                            post.category = category.category_id
                            LEFT JOIN users
                            ON 
                            post.author = users.user_id
                            WHERE post.post_id = {$post_id};";

                $result = mysqli_query($connection, $query) or die("Failed");
                $count = mysqli_num_rows($result);
                $query2 = "SELECT COUNT(fav_id) AS cnt FROM favourite WHERE user_id = {$_SESSION['user_id']} && post_id = {$post_id}";
                $result2 = mysqli_query($connection, $query2);
                // $favourite = mysqli_num_rows($result2);
                $row2 = mysqli_fetch_assoc($result2);


                $query3 = "SELECT cur_status FROM subscription WHERE user_id = {$user_id}";
                $result3 = mysqli_query($connection, $query3);
                $row3 = mysqli_fetch_assoc($result3);

                if ($count > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {

                ?>
                        <div class="post-container">
                            <div class="post-content">
                                <div class="single-post">


                                    <h3 id="all-change"><?php echo $row['title'] ?></h3>
                                    <div class="post-information">
                                        <span>
                                            <i class="fa fa-tags" aria-hidden="true"></i>
                                            <a href="category.php?cid=<?php echo $row['category'] ?>"><?php echo $row['category_name'] ?></a>
                                        </span>
                                        <span>
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                            <a href='author.php?author_id=<?php echo $row['author'] ?>'><?php echo $row['username'] ?></a>
                                        </span>
                                        <span>
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                            <?php echo $row['post_date'] ?>
                                        </span>

                                        <?php
                                            if ($row3['cur_status'] == 'approved') {
                                                if ($row2['cnt']) {
                                                    echo '<a href="./save-post.php?id='.$post_id.'&value=0"><i class="fas fa-star"></i>Remove From Favourite</a>';
                                                } else {
                                                    echo '<a href="./save-post.php?id='.$post_id.'&value=1"><i class="far fa-star"></i>Add to favourite</a>';
                                                }
                                            }
                                        ?>
                                    </div>
                                    <img class="single-feature-image" src="./admin/upload/<?php echo $row['post_img'] ?>" alt="" />
                                    <div class="container text-justify">
                                        <p class="text-justify">
                                            <?php echo $row['description'] ?>
                                        </p>
                                    </div>
                                    <div class="d-grid gap-2 col-3 mx-auto">
                                        <button class="btn btn-primary" type="button">Apply Now!</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo "No record Found!";
                }
                ?>
                <!-- /post-container -->
            </div>
            <?php include 'sidebar.php'; ?>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
