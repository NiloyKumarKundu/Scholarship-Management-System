<?php ob_start(); include './header.php' ?>



<div id="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-3 col-md-6" style="margin-left: 17em; margin-top: 10em; min-height:600px">
                <div class="card-header" style="background-color: #c8cccb;">
                    <h4>Change Password</h4>
                </div>

                <?php
                include './config.php';
                $query = "SELECT * FROM users WHERE user_id = {$user_id}";
                $result = mysqli_query($connection, $query);
                $cnt = mysqli_num_rows($result);
                $current_Password = '';

                $row = mysqli_fetch_assoc($result);
                $current_Password = $row['password'];

                ?>

                <!-- Form -->
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
                    <div class="input-group mb-3">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fas fa-key"></i>
                                </span>
                            </div>
                            <input type="password" class="form-control" name="current_password" placeholder="Current Password" aria-describedby="basic-addon1">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fas fa-unlock-alt"></i>
                                </span>
                            </div>
                            <input type="password" class="form-control" name="new_password" placeholder="New Password" aria-describedby="basic-addon1">
                        </div>


                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fas fa-lock"></i>
                                </span>
                            </div>
                            <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" aria-describedby="basic-addon1">
                        </div>

                        <?php
                        if (isset($_POST['submit'])) {
                            $cur_password = $_POST['current_password'];
                            $new_password = $_POST['new_password'];
                            $confirm_password = $_POST['confirm_password'];

                            if (md5($cur_password) == $current_Password) {
                                if ($new_password == $confirm_password) {
                                    $new_password = md5($confirm_password);

                                    $query = "UPDATE users SET password = '{$new_password}' WHERE user_id = {$user_id}";
                                    if (mysqli_query($connection, $query)) {
                                        echo '<script>alert("Password Changed Successfully")</script>';
                                        header("location: ./post.php");
                                    } else {
                                        echo "Query failed";
                                    }
                                } else {
                                    echo "Password Mismatch";
                                }
                            } else {
                                echo "Current password is wrong!";
                            }
                        }

                        ?>

                        <div style="margin-left: 420px;">
                            <input type="submit" name="submit" value="Done" class="btn btn-success text-light" id="">
                        </div>
                    </div>
                </form>
                <!--/Form -->
                <?php ob_end_flush(); ?>
            </div>
        </div>
    </div>
</div>




<?php include './footer.php' ?>