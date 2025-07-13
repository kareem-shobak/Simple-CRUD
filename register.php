<?php

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $connection = mysqli_connect("localhost", "root", "", "backendphp");
    $query = mysqli_query($connection, "INSERT INTO `users` (`name`,`email`,`password`) VALUES ('$name','$email','$password')");
    header("location:login.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Register</title>
</head>

<body>
    <nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark" style="border-bottom: 0px solid black !important; ">
        <div>
            <a href="login.php" style="font-weight: bold;font-size:35px;color:white;text-decoration: none;">
                C R U D
            </a>
        </div>
    </nav>
    <form action="register.php" method="post">
        <div class="container mt-5" style="width: 650px;">
            <div class="form-group">
                <label for="formGroupExampleInput">Name</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Ex: ahmed" name="name">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Email</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Ex: ahmed@example.com" name="email">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Password</label>
                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Ex: 8754321" name="password">
                <a href=""><button type="submit" class="btn btn-primary" style="padding: 5px 35px; margin:15px 0px">Register</button></a>
            </div>
        </div>
    </form>
</body>

</html>