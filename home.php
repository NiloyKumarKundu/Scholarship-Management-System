<?php include './header.php'; ?>
<div id="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->
                <div class="post-container">
                    <h2 class="page-heading">Available Scholarships</h2>
                    <?php

                    include "./admin/config.php";
                    $limit = 5;

                    if (isset($_GET['page'])) {
                        $page_number = $_GET['page'];
                    } else {
                        $page_number = 1;
                    }

                    $offset = ($page_number - 1) * $limit;

                    $query =    "SELECT post.post_id,
                                        post.title,
                                        post.description,
                                        post.post_img, 
                                        post.post_date,
                                        post.category, 
                                        post.author,
                                        category.category_name,
                                        users.username 
                                FROM post
                                LEFT JOIN category
                                ON 
                                post.category = category.category_id
                                LEFT JOIN users 
                                ON 
                                post.author = users.user_id
                                ORDER BY post.post_id DESC LIMIT {$offset},{$limit}";

                    $result = mysqli_query($connection, $query) or die("Failed");
                    $count = mysqli_num_rows($result);

                    if ($count > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {

                    ?>
                            <div class="post-content">
                                <div class="row">
                                    <div class="col-md-4 mt-2 mt-lg-0">
                                        <a class="post-img" href="single.php?id=<?php echo $row['post_id'] ?>"><img  src="./admin/upload/<?php echo $row['post_img'] ?>" alt="" /></a>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="inner-content clearfix">
                                            <h3><a href='single.php?id=<?php echo $row['post_id'] ?>'><?php echo $row['title'] ?></a></h3>
                                            <div class="post-information">
                                                <span>
                                                    <i class="fa fa-tags" aria-hidden="true"></i>
                                                    <a href='category.php?cid=<?php echo $row['category'] ?>'><?php echo $row['category_name'] ?></a>
                                                </span>
                                                <span>
                                                    <i class="fa fa-user" aria-hidden="true"></i>
                                                    <a href='author.php?author_id=<?php echo $row['author'] ?>'><?php echo $row['username'] ?></a>
                                                </span>
                                                <span>
                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                    <?php echo $row['post_date'] ?>
                                                </span>
                                            </div>
                                            <p class="description">
                                                <?php echo substr(strip_tags($row['description']), 0, 150) . "..." ?>
                                            </p>
                                            <a class='read-more pull-right' href='single.php?id=<?php echo $row['post_id'] ?>'>read more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    <?php
                        }
                    } else {
                        echo "No record Found!";
                    }

                    $query2 = "SELECT * FROM post";
                    $result2 = mysqli_query($connection, $query2) or dir("Failed.");
                    if (mysqli_num_rows($result2)) {
                        $total_records = mysqli_num_rows($result2);
                        $total_page = ceil($total_records / $limit);

                        echo "<nav aria-label='Page navigation example'>";
                        echo "<ul class='pagination justify-content-center'>";
                        if ($page_number > 1) {
                            echo '<li class="page-item">';
                            echo '<a class="page-link" href="home.php?page=' . ($page_number - 1) . '">Previous</a>';
                            echo "</li>";
                        }

                        for ($i = 1; $i <= $total_page; $i++) {

                            if ($i == $page_number) {
                                $active = "active";
                            } else {
                                $active = "";
                            }

                            echo '<li class="page-item ' . $active . '">';
                            echo '<a class="page-link" href="home.php?page=' . $i . '">' . $i . '</a></li>';
                        }
                        if ($total_page > $page_number) {
                            echo '<li class="page-item"><a class="page-link" href="home.php?page=' . ($page_number + 1) . '">Next</a></li>';
                        }
                        echo "</ul>";
                    }
                    ?>

                </div><!-- /post-container -->
            </div>
            <?php include 'sidebar.php'; ?>
        </div>
    </div>
</div>
<?php include './footer.php'; ?>