<?php require './include/header.html'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body class="bag">
    <div class="container reg">
        <figure class="text-center">
            <blockquote class="blockquote">
                <p>Sign Up</p>
            </blockquote>
            <figcaption class="blockquote-footer">
                Fill the form to sign up.
            </figcaption>
        </figure>
        <form>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="First Name" aria-label="First Name">
                <input type="text" class="form-control" placeholder="Last Name" aria-label="Last Name">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">@</span>
                <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                <div class="form-text">
                    Your username must be unique. Use number or special-character for making username unique.
                </div>
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>

            <div class="mb-3">
                <div>
                    <label for="#" class="form-label">Gender:</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                    <label class="form-check-label" for="inlineRadio1">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                    <label class="form-check-label" for="inlineRadio2">Female</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                    <label class="form-check-label" for="inlineRadio2">Others</label>
                </div>
            </div>


            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>


            <input type="submit" value="Sign Up" class="btn btn-primary">
        </form>
    </div>
</body>

</html>



<?php require './include/footer.html'; ?>