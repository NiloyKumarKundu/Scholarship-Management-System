<?php ob_start();
include './header.php'; ?>
<div id="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->
                <div class="post-container">
                    <h2 class="page-heading">Edit Profile</h2>
                    <?php

                    include "./admin/config.php";

                    $query = "SELECT * FROM users WHERE user_id = {$user_id}";
                    $id = '';
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                    }

                    $result = mysqli_query($connection, $query) or die("Failed");
                    $count = mysqli_num_rows($result);

                    if ($count > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {

                    ?>
                            <div class="post-content">
                                <div class="row">
                                    <?php
                                    if ($id == 'success') {
                                    ?>
                                        <ol class="breadcrumb" style="margin-left: 5em">
                                            <!-- <div class="breadcrumb-item"> -->
                                            <li class="text-secondary" style="margin-top: 0.4em; margin-right: 10em;">
                                                <h6 class="text-success">
                                                    Your profile has been updated successfully.
                                                </h6>
                                            </li>
                                        </ol>
                                    <?php
                                    }
                                    ?>

                                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" style="margin-left: 5em;">
                                        <h4>Personal Info</h4>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <input type="text" name="first_name" value="<?php echo $row['first_name'] ?>" class="form-control" placeholder="First Name">
                                            <input type="text" value="<?php echo $row['last_name'] ?>" name="last_name" class="form-control" placeholder="Last Name">
                                        </div><!-- form-group// -->

                                        <div class="form-group input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user-tie"></i> </span>
                                            </div>
                                            <input name="username" value="<?php echo $row['username'] ?>" disabled class="form-control" placeholder="Username" type="text">
                                        </div> <!-- form-group// -->

                                        <div class="form-group input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                                            </div>
                                            <input name="email" disabled value="<?php echo $row['email'] ?>" class="form-control" placeholder="Email address" type="email">
                                        </div> <!-- form-group// -->

                                        <div class="form-group input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"> <i class="fas fa-book-reader"></i> </span>
                                            </div>
                                            <input name="bio" value="<?php echo $row['bio'] ?>" class="form-control" placeholder="Bio" type="text">
                                        </div> <!-- form-group// -->


                                        <div class="form-group input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                                            </div>
                                            <input name="phone_no" value="<?php echo $row['phone_no'] ?>" class="form-control" placeholder="Phone number" type="text">
                                        </div> <!-- form-group// -->

                                        <div class="form-group input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                                            </div>
                                            <input name="address" value="<?php echo $row['address'] ?>" class="form-control" placeholder="Address" type="text">
                                        </div> <!-- form-group// -->

                                        <div class="form-group input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></i></span>
                                            </div>
                                            <input name="dob" value="<?php echo $row['dob'] ?>" class="form-control" placeholder="Date of Birth" type="date">
                                        </div> <!-- form-group// -->

                                        <?php
                                        $male = '';
                                        $female = '';
                                        $others = '';

                                        if ($row['gender'] == 'Male') {
                                            $male = 'checked';
                                        } else if ($row['gender'] == 'Female') {
                                            $female = 'checked';
                                        } else {
                                            $others = 'checked';
                                        }

                                        ?>

                                        <div class="form-group input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                                            </div>
                                            <div class="form-check-inline" style="margin-left: 1em;">
                                                <input class="form-check-input" <?php echo $male ?> type="radio" name="gender" value="Male">
                                                <label class="form-check-label">
                                                    Male
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <input class="form-check-input" <?php echo $female ?> type="radio" name="gender" value="Female">
                                                <label class="form-check-label">
                                                    Female
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <input class="form-check-input" <?php echo $others ?> type="radio" name="gender" value="Others">
                                                <label class="form-check-label">
                                                    Others
                                                </label>
                                            </div>
                                        </div>


                                        <div class="form-group input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"> <i class="fas fa-heart"></i> </span>
                                            </div>
                                            <input class="form-control" disabled placeholder="Interested Category" type="text">
                                        </div>

                                        <?php
                                        $newQuery =     "SELECT category_name
                                                        FROM category
                                                        WHERE category_id = ANY (
                                                            SELECT category_id
                                                            FROM interestedCategory
                                                            WHERE user_id = {$user_id})";

                                        $newRes = mysqli_query($connection, $newQuery);
                                        $cntRes = mysqli_num_rows($newRes);

                                        $query2 = "SELECT * FROM category";
                                        $res2 = mysqli_query($connection, $query2);
                                        $cnt2 = mysqli_num_rows($res2);

                                        ?>

                                        <div class="form-group input-group">
                                            <?php if ($cnt2 > 0) {
                                                $interestedCategory = array();
                                                while ($newRow = mysqli_fetch_assoc($newRes)) {
                                                    foreach ($newRow as $key => $value) {
                                                        $interestedCategory[] = $value;
                                                    }
                                                }

                                                while ($newRow = mysqli_fetch_assoc($res2)) {
                                                    if (in_array($newRow['category_name'], $interestedCategory) === false) {
                                            ?>
                                                        <div class="form-check-inline" style="margin-left: 1em;">
                                                            <input class="form-check-input" value=<?php echo  $newRow['category_id'] ?> type="checkbox" name="category[]">
                                                            <label class="form-check-label">
                                                                <?php echo  $newRow['category_name'] ?>
                                                            </label>
                                                        </div>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <div class="form-check-inline" style="margin-left: 1em;">
                                                            <input class="form-check-input" value=<?php echo  $newRow['category_id'] ?> checked type="checkbox" name="category[]">
                                                            <label class="form-check-label">
                                                                <?php echo  $newRow['category_name'] ?>
                                                            </label>
                                                        </div>

                                            <?php
                                                    }
                                                }
                                            }
                                            ?>
                                        </div>

                                        <div class="form-group input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"> <i class="fas fa-globe-asia"></i> </span>
                                            </div>
                                            <input class="form-control" name="country" placeholder="Country" type="text" value="<?php echo $row['country'] ?>">
                                        </div>

                                        <div class="form-group input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"> <i class="fas fa-flag"></i> </span>
                                            </div>
                                            <input class="form-control" name="nationality" value="<?php echo $row['nationality'] ?>" placeholder="Nationality" type="text">
                                        </div>

                                        <h4 style="margin-top: 1em;">Education</h4>
                                        <div class="form-group input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-school"></i> </span>
                                            </div>
                                            <input class="form-control" name="school" value="<?php echo $row['school'] ?>" placeholder="School Name" type="text">
                                        </div>

                                        <div class="form-group input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-chalkboard-teacher"></i> </span>
                                            </div>
                                            <input class="form-control" name="college" value="<?php echo $row['college'] ?>" placeholder="College Name" type="text">
                                        </div>

                                        <div class="form-group input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-graduation-cap"></i> </span>
                                            </div>
                                            <input class="form-control" name="university" value="<?php echo $row['university'] ?>" placeholder="University Name" type="text">
                                        </div>

                                        <h4>Social Media</h4>
                                        <div class="form-group input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-globe"></i>
                                                </span>
                                            </div>
                                            <input class="form-control" name="website" value="<?php echo $row['website'] ?>" placeholder="Website Link (ex: www.google.com)" type="text">
                                        </div>

                                        <div class="form-group input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fab fa-github-square"></i> </span>
                                            </div>
                                            <input class="form-control" name="github" value="<?php echo $row['github'] ?>" placeholder="Github URL (after '/' part)" type="text">
                                        </div>
                                        <div class="form-group input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fab fa-twitter-square"></i>
                                                </span>
                                            </div>
                                            <input class="form-control" name="twitter" value="<?php echo $row['twitter'] ?>" placeholder="Twitter URL (Ex: tom45)" type="text">
                                        </div>
                                        <div class="form-group input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fab fa-instagram"></i>
                                                </span>
                                            </div>
                                            <input class="form-control" name="instragram" value="<?php echo $row['instragram'] ?>" placeholder="Instragram URL (Ex: tom45)" type="text">
                                        </div>
                                        <div class="form-group input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fab fa-facebook-square"></i>
                                                </span>
                                            </div>
                                            <input class="form-control" name="facebook" value="<?php echo $row['facebook'] ?>" placeholder="Facebook URL (Ex: tom45)" type="text">
                                        </div>



                                <?php
                            }
                        };

                                ?>


                                <div class="form-group">
                                    <input type="submit" name="submit" value="Done" class="btn btn-primary btn-block">
                                </div> <!-- form-group// -->
                                    </form>
                                </div>
                            </div>
                </div><!-- /post-container -->
            </div>

            <?php

            if (isset($_POST['submit'])) {
                $first_name = mysqli_real_escape_string($connection, $_POST['first_name']);
                $last_name = mysqli_real_escape_string($connection, $_POST['last_name']);
                $address = mysqli_real_escape_string($connection, $_POST['address']);
                $bio = mysqli_real_escape_string($connection, $_POST['bio']);
                $gender = mysqli_real_escape_string($connection, $_POST['gender']);
                $phone_no = mysqli_real_escape_string($connection, $_POST['phone_no']);
                $dob = $_POST['dob'];
                $tempTime = strtotime($dob);
                $mysqltime = date('Y/m/d H:i:s', $tempTime);
                $date_of_birth = mysqli_real_escape_string($connection, $mysqltime);
                $category = $_POST['category'];
                $gender = mysqli_real_escape_string($connection, $_POST['gender']);
                $country = mysqli_real_escape_string($connection, $_POST['country']);
                $nationality = mysqli_real_escape_string($connection, $_POST['nationality']);
                $school = mysqli_real_escape_string($connection, $_POST['school']);
                $college = mysqli_real_escape_string($connection, $_POST['college']);
                $university = mysqli_real_escape_string($connection, $_POST['university']);
                $website = mysqli_real_escape_string($connection, $_POST['website']);
                $github = mysqli_real_escape_string($connection, $_POST['github']);
                $instragram = mysqli_real_escape_string($connection, $_POST['instragram']);
                $facebook = mysqli_real_escape_string($connection, $_POST['facebook']);



                $query =    "UPDATE users
                            SET first_name = '{$first_name}',
                            last_name = '{$last_name}',
                            address = '{$address}',
                            bio = '{$bio}',
                            gender = '{$gender}',
                            phone_no = '{$phone_no}',
                            dob = '{$date_of_birth}',
                            country = '{$country}',
                            nationality = '{$nationality}',
                            school = '{$school}',
                            college = '{$college}',
                            university = '{$university}',
                            website = '{$website}',
                            github = '{$github}',
                            instragram = '{$instragram}',
                            facebook = '{$facebook}'
                            WHERE user_id = {$user_id}";

                if (mysqli_query($connection, $query)) {
                    $innerQuery = "DELETE FROM interestedCategory WHERE user_id = {$user_id}";
                    mysqli_query($connection, $innerQuery) or die("Delete Failed");

                    foreach ($category as $key => $values) {
                        $innerQuery = "INSERT INTO interestedCategory(category_id, user_id) VALUES ({$values}, {$user_id});";
                        mysqli_query($connection, $innerQuery) or die("Insert failed");
                    }
                    header("location: ./edit-profile.php?id=success");
                } else {
                    echo "failed";
                }
            }

            ob_end_flush();
            ?>



            <?php include 'sidebar.php'; ?>
        </div>
    </div>
</div>
<?php include './footer.php'; ?>