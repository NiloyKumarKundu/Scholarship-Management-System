<?php
ob_start();
include './header.php';
include './config.php';
$id = $_GET['id'];

$query = "UPDATE users SET role = 0 WHERE user_id = {$id}";
$query2 = "UPDATE request SET r_status = 'approved' WHERE user_id = {$id}";

if (mysqli_query($connection, $query)) {
    if (mysqli_query($connection, $query2)) {
        header('location: ./request.php');
    } else {
        echo "Status Failed";
    }
} else {
    echo "Query failed";
}
ob_end_flush();
?>

