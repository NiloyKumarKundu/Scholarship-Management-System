<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">


    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="./css/font-awesome.css">
    <script src="./jquery.js"></script>
    <script>
        $flag = true;
        if ($flag) {
            $(document).ready(function() {
                $('#user').hide();
            });
        }
    </script>
</head>

<body>



    <?php
    include './admin/config.php';

    $query = "SELECT * FROM category";
    $result = mysqli_query($connection, $query);
    $cnt = mysqli_num_rows($result);


    ?>



    <div class="card bg-light">
        <article class="card-body col-md-6" style="margin-left: 23em; height: 800px; margin-top: 3em;">
            <h4 class="card-title mt-3 text-center">Create Account</h4>
            <p class="text-center">Get started with your free account</p>




            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text"  name="first_name" class="form-control" placeholder="First Name">
                    <input type="text"  name="last_name" class="form-control" placeholder="Last Name">
                </div><!-- form-group// -->

                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user-tie"></i> </span>
                    </div>
                    <input name="username"  class="form-control" placeholder="Username" type="text">
                </div> <!-- form-group// -->
                <div style="margin-top: -1em;" id="user">
                    <small class="text-danger">Username has already taken. Please try another one.</small>
                </div>


                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                    </div>
                    <input name="email"  class="form-control" placeholder="Email address" type="email">
                </div> <!-- form-group// -->

                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fas fa-lock"></i> </span>
                    </div>
                    <input class="form-control"  name="password" placeholder="Create password" type="password">
                </div> <!-- form-group// -->



                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                    </div>
                    <input name="phone_no"  class="form-control" placeholder="Phone number" type="text">
                </div> <!-- form-group// -->

                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                    </div>
                    <input name="address"  class="form-control" placeholder="Address" type="text">
                </div> <!-- form-group// -->

                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></i></span>
                    </div>
                    <input name="dob"  class="form-control" placeholder="Date of Birth" type="date">
                </div> <!-- form-group// -->


                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                    </div>
                    <div class="form-check-inline" style="margin-left: 1em;">
                        <input class="form-check-input" type="radio" name="gender" value="Male" checked>
                        <label class="form-check-label">
                            Male
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" value="Female">
                        <label class="form-check-label">
                            Female
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" value="Others">
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

                <div class="form-group input-group">
                    <?php if ($cnt > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                            <div class="form-check-inline" style="margin-left: 1em;">
                                <input class="form-check-input" type="checkbox" name="category[]" value=<?php echo  $row['category_id'] ?>>
                                <label class="form-check-label">
                                    <?php echo  $row['category_name'] ?>
                                </label>
                            </div>
                    <?php }
                    } ?>
                </div>


                <div class="form-group">
                    <input type="submit" name="submit" value="Create Account" class="btn btn-primary btn-block">
                </div> <!-- form-group// -->
                <p class="text-center">Have an account? <a href="index.php">Log In</a> </p>
            </form>
            <?php


            if (isset($_POST['submit'])) {
                $first_name = mysqli_real_escape_string($connection, $_POST['first_name']);
                $last_name = mysqli_real_escape_string($connection, $_POST['last_name']);
                $username = mysqli_real_escape_string($connection, strtolower($_POST['username']));
                $email = mysqli_real_escape_string($connection, $_POST['email']);
                $password = md5($_POST['password']);
                $address = mysqli_real_escape_string($connection, $_POST['address']);
                $gender = mysqli_real_escape_string($connection, $_POST['gender']);
                $phone_no = mysqli_real_escape_string($connection, $_POST['phone_no']);
                $dob = $_POST['dob'];
                $tempTime = strtotime($dob);
                $mysqltime = date('Y/m/d H:i:s', $tempTime);
                $date_of_birth = mysqli_real_escape_string($connection, $mysqltime);
                $category = $_POST['category'];


                $query2 = "SELECT username FROM users WHERE username = '{$username}'";
                $result = mysqli_query($connection, $query2) or die('Query failed');
                $row = mysqli_fetch_assoc($result);


                if ($row) {
            ?>
                    <script>
                        flag = false;
                        $(document).ready(function() {
                            $('#user').show();
                        });
                    </script>
            <?php
                } else {
                    $query = "INSERT INTO users(first_name, last_name, username, email, password, address, gender, phone_no, dob) VALUES('{$first_name}', '{$last_name}', '{$username}', '{$email}', '{$password}', '{$address}', '{$gender}', '{$phone_no}', '{$date_of_birth}')";

                    if (mysqli_query($connection, $query)) {

                        $temp = "SELECT user_id FROM users WHERE username = '{$username}'";
                        $result = mysqli_query($connection, $temp);
                        $cnt = mysqli_num_rows($result);
                        if ($cnt > 0) {
                            $row = mysqli_fetch_assoc($result);
                            echo $row['user_id'];
                        }

                        foreach($category as $key=> $values) {
                            $query = "INSERT INTO interestedCategory(user_id, category_id) VALUES ({$row['user_id']}, {$values})";
                            $result = mysqli_query($connection, $query) or die('Category Failed');
                        }

                        echo '<script>alert("Registration Successfull!\nPlease Log In.")</script>';
                    } else {
                        echo "Username or Password is incorrect.";
                    }
                }
            }
            ?>
        </article>
    </div> <!-- card.// -->


    <!--container end.//-->
</body>

</html>