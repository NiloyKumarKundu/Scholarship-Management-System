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

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="./css/font-awesome.css">

    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <!-- Menu Bar -->
    <header>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <!-- Brand -->

            <div class="navbar-header">
                    <a class="navbar-brand" href="./index.php">Scholarship Management System</a>
            </div>
            <!-- Links -->

            <?php
            include "./admin/config.php";

            if (isset($_GET['cid'])) {
                $cat_id = $_GET['cid'];
            }

            $query = "SELECT * FROM category WHERE post > 0";
            $result = mysqli_query($connection, $query) or die("Category query failed!");

            if (mysqli_num_rows($result)) {
                $active = "";

            ?>

            <ul class="navbar-nav">
                <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        if (isset($_GET['cid'])) {
                            if ($row['category_id']  == $cat_id) {
                                $active = "active";
                            } else {
                                $active = "";
                            }
                        }

                        echo "<li class='nav-item {$active}'>
                            <a class='nav-link' href='category.php?cid={$row['category_id']}'>{$row['category_name']}</a>
                            </li>";
                    }
                }
                ?>
            </ul>

                <!-- Dropdown -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            <img src="./images/pro.png" class="rounded-circle brandImg" alt=""/>
                        </a>
                        <div class="dropdown-menu bg-secondary bg-gradient dropdown-menu-right">
                            <a class="dropdown-item" href="#">Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Logout</a>
                        </div>
                    </li>
                </ul>
        </nav>
    </header>