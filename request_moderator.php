<?php
include './header.php';
if (isset($_POST['submit'])) {
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone_no'];
    $status = 'pending';

    $query = "INSERT INTO request(user_id, user_name, email, phone_no, r_status) VALUES ({$user_id}, '{$user_name}', '{$email}', '{$phone}', '{$status}')";

    if (mysqli_query($connection, $query)) {
        header("location: ./profile.php?id=success");
    } else {
        echo "Query failed!";
    }
}
?>

