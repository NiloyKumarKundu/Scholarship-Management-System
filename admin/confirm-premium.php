<?php
    include './config.php';
    $userid = $_GET['id'];

    $query = "UPDATE subscription SET start_date = CURRENT_DATE, expire_date = DATE(CURRENT_DATE + INTERVAL 1 MONTH), cur_status = 'approved' WHERE user_id = {$userid}";

    $query2 = "UPDATE users SET role = 3 WHERE user_id = {$userid}";

    if (mysqli_query($connection, $query)) {
        if (mysqli_query($connection, $query2)) {
            header("location: ./premium.php");
        } else {
            echo "Not complete!";
        }
    } else {
        echo "Query Failed";
    }

?>