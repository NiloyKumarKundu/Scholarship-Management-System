<?php include "header.php"; ?>


<div id="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-3 col-md-6" style="margin-left: 17em; margin-top: 8em;">
                <div class="card-header" style="background-color: #c8cccb;">
                    <h4>Apply for Moderator</h4>
                </div>

                <?php
                include './admin/config.php';
                $query = "SELECT * FROM users";
                $result = mysqli_query($connection, $query);
                $cnt = mysqli_num_rows($result);

                if ($cnt > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $email = $row['email'];
                        $phone_no = $row['phone_no'];
                    }
                }
                // echo $email;
                ?>




                <!-- Form -->
                <form action="./request_moderator.php" method="POST" enctype="multipart/form-data">
                    <div class="input-group mb-3">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" value="<?php echo $user_name ?>" name="user_name" placeholder="<?php echo $user_name ?>" readonly aria-describedby="basic-addon1">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i></span>
                            </div>
                            <input type="text" class="form-control" value="<?php echo $email ?>" name="email" placeholder="<?php echo $email ?>" readonly aria-describedby="basic-addon1">
                        </div>


                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone"></i> </i></span>
                            </div>
                            <input type="text" readonly value="<?php echo $phone_no ?> " name="phone_no" class="form-control" placeholder="<?php echo $phone_no ?>" aria-describedby="basic-addon1">
                        </div>

                        <div style="margin-left: 420px;">
                            <input type="submit" name="submit" value="Apply" class="btn btn-success text-light" id="">
                        </div>
                    </div>
                </form>
                <!--/Form -->
            </div>
        </div>
    </div>
</div>








<?php include "footer.php"; ?>