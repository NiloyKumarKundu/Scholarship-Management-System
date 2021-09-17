<?php
    session_start();
    session_regenerate_id();
    if (!isset($_SESSION['username'])) {
        header("location: index.php");
    }


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Admin Panel</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="../css/font-awesome.css">

    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <!-- HEADER -->
    <header>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="post.php">Scholarship Management System</a>
            </div>

            <?php
            $value = basename($_SERVER['PHP_SELF']);
            $post = '';
            $category = '';
            $user = '';
            if ($value == 'post.php') {
                $post = 'active';
            } else if ($value == 'category.php') {
                $category = 'active';
            } else if ($value == 'users.php') {
                $user = 'active';
            }
            ?>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="<?php echo $post ?>"><a href="./post.php">Post <span class="sr-only">(current)</span></a></li>
                    <?php if ($_SESSION['user_role'] == '1') { ?>
                        <li class="<?php echo $category ?>"><a href="./category.php">Category</a></li>
                        <li class="<?php echo $user ?>"><a href="./users.php">User</a></li>
                    <?php } ?>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#">
                            <span class="glyphicon glyphicon-user"></span><?php echo " Hello, " . $_SESSION['username'] ?>
                        </a>
                    </li>
                    <li><a href="./logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    </header>

    <!-- /Menu Bar -->