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
    <title>Scholarship</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">


    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="./css/font-awesome.css">

    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="./css/style.css">
    <script src="./jquery.js"></script>
    <script src="./script.js"></script>
</head>

<body>
    <!-- Menu Bar -->
    <header>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <!-- Brand -->

            <div class="navbar-header">
                    <a class="navbar-brand" href="./index.php">MyScholar</a>
            </div>
            <!-- Links -->

            <?php
            include "./admin/config.php";

            $user_id = $_SESSION['user_id'];
            $user_name = $_SESSION['username'];
            $user_role = $_SESSION['user_role'];

            $value = basename($_SERVER['PHP_SELF']);
            if ($value == 'home.php') {
                $activeHome = 'active';
            } else if ($value == 'favourites.php') {
                $activeFavourites = 'active';
            } else if ($value == 'about-us.php') {
                $activeAboutUs = 'active';
            }


            ?>

            <ul class="navbar-nav">
                <li class='nav-item <?php echo $activeHome ?>'>
                    <a class='nav-link' href='home.php?'>Home</a>
                </li>
                <?php
                    if ($user_role != 2) {
                        echo "<li class='nav-item {$activeFavourites}'>
                                <a class='nav-link' href='favourites.php?'>Favourites</a>
                            </li>";
                    }
                ?>
                
                <li class='nav-item <?php echo $activeAboutUs ?>'>
                    <a class='nav-link' href='about-us.php?'>About Us</a>
                </li>
            </ul>

                <!-- Dropdown -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            <img src="./images/pro.png" class="rounded-circle brandImg" alt=""/>
                        </a>
                        <div class="dropdown-menu bg-secondary bg-gradient dropdown-menu-right">
                            <a class="dropdown-item" href="profile.php">Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="./logout.php">Logout</a>
                        </div>
                    </li>
                </ul>
        </nav>
    </header>