<?php include './header.php' ?>

<style>
    .card {
        flex-direction: row;
        align-items: center;
    }


    .card img {
        width: 30%;
        height: 160px !important;
        border-top-right-radius: 0;
        border-bottom-left-radius: calc(0.25rem - 1px);
    }
</style>



<?php
include './admin/config.php';
$query =    "SELECT	post.post_id,
                                post.post_date,
                                post.title,
                                post.post_img,
                                post.description,
                                post.author,
                                category.category_name
                        FROM    post
                        JOIN    favourite
                        ON      post.post_id = favourite.post_id
                        JOIN    category
                        ON      post.category = category.category_id
                        WHERE   favourite.user_id = {$user_id}";

$result = mysqli_query($connection, $query) or die('Query failed');
$count = mysqli_num_rows($result);
?>

<div class="container" style="min-height: 800px;">
    <div class="row">
        <div class="col-md-12" style="margin-top: 3em;">
            <div class="card">
                <div class="card-header inline-text text-muted">
                    <h4><i class="fas fa-star"> Favourites </i></h4>
                </div>
            </div>
            <?php
            if ($count > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <div class="card">

                        <img src="./admin/upload/<?php echo $row['post_img']; ?>" class="card-img-top" style="border:  1px solid #e7e7e7; display: block;" />

                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['title']; ?></h5>
                            <div class="inner-content clearfix">
                                <div class="post-information">
                                    <span>
                                        <i class="fa fa-tags" style="font-size: small;" aria-hidden="true"></i>
                                        <small><?php echo $row['category_name'] ?></small>
                                    </span>
                                    <span style="margin-left: 0.5em;">
                                        <i class="fa fa-calendar" style="font-size: small;" aria-hidden="true"></i>
                                        <small><?php echo $row['post_date'] ?></small>
                                    </span>
                                </div>
                            </div>
                            <p class="card-text">
                                <?php echo substr(strip_tags($row['description']), 0, 250); ?>...
                            </p>

                            <a href="./single.php?id=<?php echo $row['post_id']; ?>" class="btn btn-success btn-sm float-right" style="margin-left: 1em;">Read More</a>
                            <a href="./removeFav.php?id=<?php echo $row['post_id'] ?>" onclick="return confirm('Are You Sure?')" class="btn btn-danger btn-sm float-right">Remove</a>
                        </div>
                    </div>
                <?php
                }


                $query2 = "SELECT * FROM favourite";
                $result2 = mysqli_query($connection, $query2) or dir("Failed.");
                if (mysqli_num_rows($result2)) {
                    $total_records = mysqli_num_rows($result2);
                    $total_page = ceil($total_records / $limit);

                    echo "<nav aria-label='Page navigation example'>";
                    echo "<ul class='pagination justify-content-center'>";
                    if ($page_number > 1) {
                        echo '<li class="page-item">';
                        echo '<a class="page-link" href="favourites.php?cid=' . $rcv_cid . '&page=' . ($page_number - 1) . '">Previous</a>';
                        echo "</li>";
                    }

                    for ($i = 1; $i <= $total_page; $i++) {
                        if ($i == $page_number) {
                            $active = "active";
                        } else {
                            $active = "";
                        }
                        echo '<li class="page-item ' . $active . '">';
                        echo '<a class="page-link" href="favourites.php?cid=' . $rcv_cid . '&page=' . $i . '">' . $i . '</a></li>';
                    }
                    if ($total_page > $page_number) {
                        echo '<li class="page-item"><a class="page-link" href="favourites.php?cid=' . $rcv_cid . '&page=' . ($page_number + 1) . '">Next</a></li>';
                    }
                    echo "</ul>";
                }


                ?>
            <?php
            } else {
            ?>

                <div class="card-body">
                    <div class="post-information">
                        <h5 class="card-text">No items have been selected yet.</h5>
                    </div>
                </div>
            <?php
            }
            ?>

        </div>
    </div>
</div>
<?php include './footer.php' ?>