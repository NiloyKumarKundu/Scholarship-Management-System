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

<div class="container">
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

                            <a href="./single.php?id=<?php echo $row['post_id'];?>" class="btn btn-primary float-right" style="margin-left: 1em;">Read</a>
                            <a href="" class="btn btn-primary float-right">Remove</a>
                        </div>
                    </div>
                <?php
                }
                ?>
                <div style="margin-bottom: 3em;"></div>
            <?php
            } else {

            }
            ?>

        </div>
    </div>
</div>
<?php include './footer.php' ?>