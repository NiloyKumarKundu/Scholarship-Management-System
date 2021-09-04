<?php require './include/header.html'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMS</title>
    <link rel="stylesheet" href="./css/style.css">
</head>


<?php
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $connection = mysqli_connect("localhost", "root", "", "Scholarship") or die("Not connected" . mysqli_error($connection));
    
    $query = "SELECT * FROM users";
    
    $result = mysqli_query($connection, $query);

    $count = mysqli_num_rows($result);
    
    if ($count > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            // echo "{$row['id']}";
            // echo "<br>";
            // echo "{$row['name']}"; 
            // echo "<br>";
            // echo "{$row['email']}";
            // echo "<br>";
            // echo "{$row['password']}";
            // echo "<br>";
            // echo "<br>";
        }
        // echo "$count";
    } else {
        // echo "You don't have any data in your database!";
    }
}
?>





<body class="bag">

    <div class="container log">
        <figure class="text-center">
            <blockquote class="blockquote">
                <h4 class="text-lg-center">Log In</h4>
            </blockquote>
            <figcaption class="blockquote-footer">
                Enter your necessary information to log in.
            </figcaption>
        </figure>
        <form action="index.php" method="POST">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Username" name="username">
            </div>

            <div class="mb-3">
                <input type="password" class="form-control" placeholder="Password" name="password">
            </div>

            <input type="submit" value="Log In" name="submit" class="btn btn-primary">
            <hr>
            <div>
                <p class="footer">
                    Not registered yet? <a href="./signup.php">Sign Up Here</a>
                </p>
            </div>
        </form>
    </div>

    
    <?php require './include/footer.html'; ?>
</body>

</html>



