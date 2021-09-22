<?php
include "./admin/config.php";
if (isset($_FILES['fileToUpload'])) {
    $errors = array();

    $file_name = $_FILES['fileToUpload']['name'];
    $file_size = $_FILES['fileToUpload']['size'];
    $file_tmp = $_FILES['fileToUpload']['tmp_name'];
    $file_type = $_FILES['fileToUpload']['type'];
    $file_ext = end(explode('.', $file_name));

    $extensions = array("jpeg", "jpg", "png");

    if (in_array($file_ext, $extensions) === false) {
        $errors[] = "This extension file not allowed, Please choose a JPG or PNG file.";
    }

    if ($file_size > 2097152) {
        $errors[] = "File size must be 2mb or lower.";
    }
    $new_name = time() . "-" . basename($file_name);
    $target = "./ProPic//" . $new_name;

    if (empty($errors) == true) {
        move_uploaded_file($file_tmp, $target);

        $sql = "INSERT INTO propic FROM users WHERE user_id = {$user_id}";

        if (mysqli_multi_query($connection, $sql)) {
            header("location: ./profile.php");
        } else {
            echo "<div class='alert alert-danger'>Query Failed.</div>";
        }
    } else {
        print_r($errors);
        die();
    }
}

?>
