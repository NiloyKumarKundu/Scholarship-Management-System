<?php
    session_start();
    if (isset($_SESSION['username'])) {
        header("location: home.php");
    }
?>


<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

    <div class="container col-md-4" style="margin-top: 15em; margin-left: 35em">
        <div class="card card-login">
            <ul class="card-body">
                <li class="list-group-item disabled">
                    <h3>Login</h3>
                </li>
            </ul>
            <!-- Form Start -->
            <div class="card-body">
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                    <div class="form-group">
                        <div class="form-label-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" placeholder="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-label-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="" required>
                        </div>
                    </div>
                    <input type="submit" name="login" class="btn btn-primary btn-block" value="login" />
                </form>
            </div>
            <div class="card-body">
                <div class="list-group-item">
                    <label>Haven't registered yet?</label>
                    <a href="./sign-up.php">Sign Up Here!</a>
                </div>
            </div>
            <!-- /Form  End -->

            <?php
                if (isset($_POST['login'])) {
                    include "./admin/config.php";

                    $username = mysqli_real_escape_string($connection, $_POST['username']);
                    $password = md5($_POST['password']);

                    $query = "SELECT user_id,username,role FROM users WHERE username='{$username}' AND password='{$password}'";
                    $result = mysqli_query($connection, $query) or die("Query Failed.");

                    if (mysqli_num_rows($result) > 0) {

                        while ($row = mysqli_fetch_assoc($result)) {
                            $query = "SELECT expire_date FROM subscription WHERE user_id = '{$row['user_id']}'";
                            $result = mysqli_query($connection, $query);
                            $cnt = mysqli_num_rows($result);

                            if ($cnt > 0) {
                                while ($newRow = mysqli_fetch_assoc($result)) {
                                    if (date("Y-m-d") <= $newRow['expire_date'] ) {
                                        session_start();

                                        $_SESSION['username'] = $row['username'];
                                        $_SESSION['user_id'] = $row['user_id'];
                                        $_SESSION['user_role'] = $row['role'];

                                        header("location: home.php");
                                    } else {
                                        $newQuery = "DELETE FROM subscription WHERE user_id = {$row['user_id']}";
                                        if (mysqli_query($connection, $newQuery)) {
                                            session_start();

                                            $_SESSION['username'] = $row['username'];
                                            $_SESSION['user_id'] = $row['user_id'];
                                            $_SESSION['user_role'] = $row['role'];

                                            header("location: home.php");
                                        } else {
                                            echo "Failed";
                                        }
                                    }
                                }
                            } else {
                                session_start();

                                $_SESSION['username'] = $row['username'];
                                $_SESSION['user_id'] = $row['user_id'];
                                $_SESSION['user_role'] = $row['role'];

                                header("location: home.php");
                            }
                        }
                    } else {
                        echo "Username or Password is incorrect.";
                    }
                }
            ?>
        </div>
    </div>
</body>

</html>