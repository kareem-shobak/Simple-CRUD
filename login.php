<?php
session_start();
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $connection = mysqli_connect("localhost", "root", "", "backendphp");
    $query = mysqli_query($connection, "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'");
    $result = mysqli_fetch_assoc($query);
    if (empty($result)) {
?>
        <html>
        <div class="alert alert-danger" role="alert" style="margin-bottom: 0px;">
            Email or Password Is NOT Correct!
        </div>

        </html>
    <?php
    } else {
    ?>
        <html>
        <div class="alert alert-success" role="alert" style="margin-bottom: 0px;">
            Login succsesfuly!
        </div>

        </html>
<?php
        echo "<script>
            setTimeout(function() {
            window.location.href = 'read.php';
            }, 1000);
        </script>";
        $_SESSION['login'] = $result;
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="login.css">
        <title>Login</title>
    </head>
</head>

<body>
    <nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark" style="border-bottom: 0px solid black !important; ">
        <div>
            <a href="login.php" style="font-weight: bold;font-size:35px;color:white;text-decoration: none;">
                C R U D
            </a>
        </div>
    </nav>
    <form action="login.php" method="post">
        <div class="container mt-5" style="width: 650px;">
            <div class="form-group">
                <label for="formGroupExampleInput">Email</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Ex: ahmed@example.com" name="email">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Password</label>
                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Ex: 8754321" name="password">
                <div class="parent-login-or-creat">
                    <div class="child-login-or-creat">
                        <a href=""><button type="submit" class="btn btn-primary" style="padding: 5px 35px; margin:15px 0px">Login</button></a>
                    </div>

                </div>
            </div>
        </div>
    </form>
    <a href="register.php"><button type="submit" class="btn btn-secondary" style="padding: 5px 35px;margin-left:325px;">Creat New User</button></a>
</body>

</html>



<?php
