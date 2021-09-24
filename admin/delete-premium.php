<?php
ob_start();
    include './config.php';
    include './header.php';

    $id = $_GET['id'];
    $pageInfo = $_GET['page'];


    $query = "DELETE FROM subscription WHERE user_id = {$id}";
    $result = mysqli_query($connection, $query);

    if ($result) {
        if ($pageInfo == 'pu') {
            header('location: ./premium-users.php');
        } else {
            header('location: ./request.php');
        }
    } else {
        echo "Query failed!";
    }

    ob_end_flush();
?>



