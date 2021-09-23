<?php
    include './config.php';
    include './header.php';

    $id = $_GET['id'];


    $query = "DELETE FROM request WHERE user_id = {$id}";
    $result = mysqli_query($connection, $query);

    if ($result) {
        header('location: ./request.php');
    } else {
        echo "Query failed!";
    }

?>


