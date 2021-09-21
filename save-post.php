<?php
  include './header.php';
  include './admin/config.php';
    $id = $_GET['id'];
    $value = $_GET['value'];
    
    // echo $_SESSION['user_id'];
    if ($value) {
      $query = "INSERT INTO favourite(post_id, user_id) VALUES({$id}, {$_SESSION['user_id']})";

    } else {
      $query = "DELETE FROM favourite WHERE user_id = {$_SESSION['user_id']} && post_id = {$id}";
    }

    $result = mysqli_query($connection, $query);

    if ($result) {
      header("location: ./single.php?id={$id}");
    } else {
      echo "Query failed!";
    }

?>