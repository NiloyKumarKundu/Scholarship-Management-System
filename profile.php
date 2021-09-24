<?php include './header.php' ?>

<div class="container">
    <div class="main-body" style="min-height: 760px;">
        <?php
        $status = 'none';
        if (isset($_GET['id'])) {
            $status = $_GET['id'];
        }

        $query = "SELECT * FROM request WHERE user_id = {$user_id}";

        $result = mysqli_query($connection, $query) or die('Query Failed');
        $r_status = 'none';
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $r_status = $row['r_status'];
            }
        }

        ?>

        <?php
        // if(isset())
        $user_id = $_SESSION['user_id'];
        // echo $user_id;
        $query = "SELECT * FROM users WHERE user_id = {$user_id}";
        $result = mysqli_query($connection, $query) or die("Query failed!");

        $query2 = "SELECT * FROM subscription WHERE user_id = {$user_id}";
        $result2 = mysqli_query($connection, $query2);

        if (mysqli_num_rows($result)) {
            $row2 = mysqli_fetch_assoc($result2);
        }

        if (mysqli_num_rows($result)) {
            while ($row = mysqli_fetch_assoc($result)) {

        ?>

                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb" class="main-breadcrumb">
                    <ol class="breadcrumb">
                        <!-- <div class="breadcrumb-item"> -->
                        <li class="text-secondary" style="margin-top: 0.4em; margin-right: 1em;">
                            <?php
                            if ($status == 'success') {
                            ?>
                                <h6>Your application has been submitted successfully.
                                    Please wait for admin's approval.</h6>
                            <?php
                            } else {
                            ?>
                                <?php
                                if ($r_status == 'pending') {
                                ?>
                                    <h6>Your request is pending. Please wait for admin's approval.</h6>
                                <?php
                                } else if ($r_status == 'approved') {
                                ?>
                                    <h6>You are in user mode. To switch in moderator mode just </h6>

                                <?php
                                } else if ($row['role'] == 1) {
                                ?>
                                    <h6>You are in user mode. To switch in Admin mode just </h6>
                                <?php
                                } else {
                                ?>
                                    <h6>Want to be a moderator?</h6>
                                <?php
                                }
                                ?>
                            <?php
                            }

                            ?>
                        </li>
                        <!-- </div> -->

                        <?php
                        if (($r_status == 'approved' && $status == 'none') || $row['role'] == 1) {
                        ?>
                            <li class="breadcrumb-item">
                                <button class="btn btn-sm btn-primary">
                                    <a href="./admin/post.php" style="color: #fff;">Click Here!</a>
                                </button>
                            </li>
                        <?php
                        } else if ($status != 'success' && $r_status != 'pending') {
                        ?>
                            <li class="breadcrumb-item">
                                <button class="btn btn-sm btn-primary"><a href="./applynow.php" style="color: #fff;">Apply Now!</a></button>
                            </li>
                        <?php
                        }

                        ?>

                    </ol>
                </nav>

                <!-- /Breadcrumb -->

                <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="./ProPic/<?php echo $row['propic'] ?>" alt="" class="rounded-circle" width="150">
                                    <div class="mt-3">
                                        <h4><?php echo $row['username'] ?></h4>
                                        <p class="text-secondary mb-1"><?php echo $row['bio'] ?></p>
                                        <p class="text-muted font-size-sm"><?php echo $row['address'] ?></p>
                                        <button class="btn btn-primary"><a href="./update-profile-pic.php" style="color: #fff;">Update Profile Picture</a></button>
                                        <button class="btn btn-outline-primary edit-profile"><a href="./edit-profile.php">Edit Profile</a></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                            if ($row['website']) {
                                $OriginalString = $row['website'];
                                $newString = explode(".", $OriginalString);
                                $website = $newString;
                                $websiteLink = 'http://'.$row['website'];
                            } else {
                                $newString = "Not Added";
                                $websiteLink = '$';
                            }
                            
                            if ($row['github']) {
                                $github = $row['github'];
                                $githubLink = "http://github.com/".$github;
                            } else {
                                $github = "Not Added";
                                $githubLink =  '#';
                            }

                            if ($row['twitter']) {
                                $twitter = $row['twitter'];
                                $twitterLink = "http://twitter.com/".$twitter;
                            } else {
                                $twitter = "Not Added";
                                $twitterLink =  '#';
                            }

                            if ($row['instragram']) {
                                $instragram = $row['instragram'];
                                $instragramLink = "http://instragram.com/".$instragram;
                            } else {
                                $instragram = "Not Added";
                                $instragramLink =  '#';
                            }

                            if ($row['facebook']) {
                                $facebook = $row['facebook'];
                                $facebookLink = "http://facebook.com/".$facebook;
                            } else {
                                $facebook = "Not Added";
                                $facebookLink =  '#';
                            }
                        ?>

                        <div class="card mt-3">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <line x1="2" y1="12" x2="22" y2="12"></line>
                                            <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                                        </svg>Website</h6>
                                    <span class="text-secondary"><a href="<?php echo $websiteLink ?>"><?php echo $website[0] ?></a></span>
                                </li>

                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github mr-2 icon-inline">
                                            <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path>
                                        </svg>Github</h6>
                                    <span class="text-secondary"><a href="<?php echo $githubLink ?>"><?php echo $github ?></a></span>
                                </li>

                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info">
                                            <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
                                        </svg>Twitter</h6>
                                    <span class="text-secondary"><a href="<?php echo $twitterLink ?>"><?php echo $twitter ?></a></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger">
                                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                        </svg>Instagram</h6>
                                    <span class="text-secondary"><a href="<?php echo $instragramLink ?>"><?php echo $instragram ?></a></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary">
                                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                        </svg>Facebook</h6>
                                    <span class="text-secondary"><a href="<?php echo $facebookLink ?>"><?php echo $facebook ?></a></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Full Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?php echo $row['first_name'] . " " . $row['last_name'] ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?php echo $row['email'] ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Phone</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?php echo $row['phone_no'] ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Address</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?php echo $row['address'] ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Date of Birth</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?php
                                        $mysqlDate = strtotime($row['dob']);
                                        $phpDate = date('d F, Y', $mysqlDate);
                                        echo $phpDate;
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row gutters-sm">
                            <div class="col-sm-7 mb-3">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Other Informations</i></h6>

                                        <div class="row">
                                            <div class="col-sm-3">
                                                <small class="mb-0">Gender</small>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <small class="mb-0"><?php echo $row['gender'] ?></small>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <small class="mb-0">Country</small>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <small class="mb-0">Bangladesh</small>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <small class="mb-0">Nationality</small>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <small class="mb-0">Bangladeshi</small>
                                            </div>
                                        </div>
                                        <br>
                                        <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Educational Status</i></h6>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <small class="mb-0">School</small>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <small class="mb-0">Biggan School</small>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <small class="mb-0">College</small>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <small class="mb-0">New Govt. Degree College</small>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <small class="mb-0">University</small>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <small class="mb-0">UIU</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
                            $newQuery =     "SELECT category_name
                                                FROM category
                                                WHERE category_id = ANY (
                                                    SELECT category_id
                                                    FROM interestedCategory
                                                    WHERE user_id = {$user_id}
                                                )";

                            $newRes = mysqli_query($connection, $newQuery);
                            $cntRes = mysqli_num_rows($newRes);

                            ?>

                            <div class="col-sm-5 mb-3">
                                <div class="card h-50">
                                    <div class="card-body">
                                        <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Interested Category</i></h6>
                                        <div class="row">
                                            <div class="col text-secondary">
                                                <?php
                                                if ($cntRes > 0) {
                                                    while ($newValue = mysqli_fetch_assoc($newRes)) {
                                                        foreach ($newValue as $key => $value) {
                                                ?>
                                                            <small class="badge-pill badge-dark"><?php echo $value ?></small>
                                                <?php
                                                        }
                                                    }
                                                } else {
                                                    echo "<small> You haven't select any category </small>";
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card h-50">
                                    <div class="card-body">
                                        <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Account</i></h6>

                                        <?php

                                        if ($row['role'] == 1) {
                                        ?>
                                            <small class="mb-0">
                                                For being the admin, you don't need any premium access. <br>
                                                Thank you!
                                            </small>
                                        <?php
                                        } else if ($row2['cur_status'] == 'pending') {
                                        ?>
                                            <small class="mb-0">
                                                Your premium request has been approved. <br>
                                                Please wait for admin approval. <br>
                                                Thank you!
                                            </small>
                                        <?php
                                        } else if ($row2['cur_status'] == 'approved') {
                                        ?>
                                            <small class="mb-0">Congratulations!! You have successfully upgrade to premium user. <br></small>

                                            <?php
                                            $mysqlDate = strtotime($row2['expire_date']);
                                            $expireDate = date('d F, Y', $mysqlDate);
                                            ?>
                                            <h6 class="text-muted">Expired on: <?php echo $expireDate ?> </h6>
                                        <?php
                                        } else {
                                        ?>
                                            <small class="mb-0">To experience the amazing premium features...</small>
                                            <a href="upgrade.php" class="btn btn-primary btn-sm btn-block" role="button">Upgrade Now!</a>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <?php }
        } ?>
    </div>

</div>
</div>




<?php include './footer.php' ?>