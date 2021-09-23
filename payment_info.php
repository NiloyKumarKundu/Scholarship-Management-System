<?php
include './header.php';
include './admin/config.php';
if (isset($_POST['submit'])) {
    $money = $_POST['money'];
    $payment_no = $_POST['payment_no'];
    $status = 'pending';

    $query = "INSERT INTO subscription(user_id, price, trxid, cur_status) VALUES ({$user_id}, {$money}, '{$payment_no}', '$status')";


    if (mysqli_query($connection, $query)) { 
        header("location: ./profile.php");
    } else {
        echo "Query Failed";
    }
}
?>