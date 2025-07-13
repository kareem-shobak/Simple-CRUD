
<?php
session_start();
if (isset($_SESSION['login']) && $_SESSION['login']['admin'] == 1) {
} else if (isset($_SESSION['login']) && $_SESSION['login']['admin'] == 0) {
    header("location:read.php");
} else {
    header("location:read.php");
}

if (isset($_GET['id'])) {
    $connection = mysqli_connect("localhost", "root", "", "backendphp");
    $id = $_GET['id'];
    mysqli_query($connection, "DELETE FROM `products` WHERE `id`= $id");

    header("location: read.php");
}
