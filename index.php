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

        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
        </div>

        <div class="mb-3">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
        </div>
        <input type="submit" value="Log In" class="btn btn-primary">
</body>

</html>



<?php require './include/footer.html'; ?>