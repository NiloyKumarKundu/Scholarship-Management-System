<?php
ob_start();
include './header.php';

include "./admin/config.php";
if (isset($_FILES['fileToUpload'])) {
    $errors = array();

    $file_name = $_FILES['fileToUpload']['name'];
    $file_size = $_FILES['fileToUpload']['size'];
    $file_tmp = $_FILES['fileToUpload']['tmp_name'];
    $file_type = $_FILES['fileToUpload']['type'];
    
    $temp = explode('.', $file_name);
    $file_ext = end($temp);


    $extensions = array("jpeg", "jpg", "png");

    if (in_array($file_ext, $extensions) === false) {
        $errors[] = "This extension file not allowed, Please choose a JPG or PNG file.";
    }

    if ($file_size > 3097152) {
        $errors[] = "File size must be 3mb or lower.";
    }
    $new_name = time() . "-" . basename($file_name);
    $target = "./ProPic/" . $new_name;

    if (empty($errors) == true) {
        $sql = "UPDATE users SET propic = '{$new_name}' WHERE user_id = {$user_id}";
    
        if (mysqli_multi_query($connection, $sql) ) {
            move_uploaded_file($file_tmp, $target);
            header("location: ./profile.php");
        } else {
            echo "<div class='alert alert-danger'>Upload Failed.</div>";
        }
    } else {
        print_r($errors);
        die();
    }
}
ob_end_flush();
?>

<div style="min-height: 800px;"></div>

<?php

include './footer.php';

?>
