<?php
  include './header.php';
  include './admin/config.php';
    $id = $_GET['id'];
    $value = $_GET['value'];
    
    // echo $_SESSION['user_id'];
    if ($value) {
      $query = "UPDATE users SET fav = 1 WHERE user_id = '{$_SESSION['user_id']}'";

    } else {
      $query = "UPDATE users SET fav = 0 WHERE user_id = '{$_SESSION['user_id']}'";
    }

    $result = mysqli_query($connection, $query);

    if ($result) {
      header("location: ./single.php?id={$id}");
    } else {
      echo "Query failed!";
    }

?>