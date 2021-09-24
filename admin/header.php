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
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Admin Panel</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="./css/font-awesome.css">

    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="./css/style.css">
    <script src="../jquery.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>
</head>

<body>
    <!-- HEADER -->
    <header>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <!-- Brand -->

            <div class="navbar-header">
                <a class="navbar-brand" href="post.php">MyScholar</a>
            </div>
            <!-- Links -->

            <?php
            $value = basename($_SERVER['PHP_SELF']);
            $post = '';
            $category = '';
            $user = '';
            $user_id = $_SESSION['user_id'];
            $user_name = $_SESSION['username'];


            if ($value == 'post.php') {
                $post = 'active';
            } else if ($value == 'category.php') {
                $category = 'active';
            } else if ($value == 'users.php') {
                $user = 'active';
            } else if ($value == 'premium.php') {
                $premium = 'active';
            } else if ($value == 'request.php') {
                $moderatorReq = 'active';
            } else if ($value == 'premium-users.php') {
                $premiumUser = 'active';
            } else if ($value == 'moderators.php') {
                $moderator = 'active';
            }
            ?>

            <ul class="navbar-nav">
                <li class="nav-item <?php echo $post ?>">
                    <a class='nav-link' href='./post.php'>Post</a>
                </li>

                <?php if ($_SESSION['user_role'] == '1') { ?>
                    <li class="nav-item <?php echo $category ?>">
                        <a class='nav-link' href="./category.php">Category</a>
                    </li>
                    <li class="nav-item <?php echo $user ?>">
                        <a class='nav-link' href="./users.php">User</a>
                    </li>
                    <li class="nav-item <?php echo $premiumUser ?>">
                        <a class='nav-link' href="./premium-users.php">Premium Users</a>
                    </li>
                    <li class="nav-item <?php echo $moderator ?>">
                        <a class='nav-link' href="./moderators.php">Moderators</a>
                    </li>
                    <li class="nav-item <?php echo $premium ?>">
                        <a class='nav-link' href="./premium.php">Premium Request</a>
                    </li>
                    <li class="nav-item <?php echo $moderatorReq ?>">
                        <a class='nav-link' href="./request.php">Moderator Request</a>
                    </li>
                <?php } ?>
            </ul>

            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item">
                    <a class='nav-link' href="#">
                        <i class="fas fa-user"></i>
                        </span><?php echo " Hello, " . $_SESSION['username'] ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a class='nav-link' href="../home.php">
                    <i class="fas fa-exchange-alt"></i>
                        </span><?php echo "User Mode" ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a class='nav-link' href="./logout.php">
                        <i class="fas fa-sign-out-alt"></i> Logout</a>
                </li>
            </ul>
        </nav>
    </header>

    <!-- /Menu Bar -->