<?php
  include './header.php';
  include './admin/config.php';
    $id = $_GET['id'];
    $user = $_SESSION['user_id'];


    
    // echo $_SESSION['user_id'];
    $query = "DELETE FROM favourite WHERE user_id = {$user} && post_id = {$id}";

    $result = mysqli_query($connection, $query);

    if ($result) {
      header("location: ./favourites.php");
    } else {
      echo "Query failed!";
    }

?>