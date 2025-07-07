<?php

if (isset($_GET['id'])) {
    $connection = mysqli_connect("localhost", "root", "", "backendphp");
    $id = $_GET['id'];
    mysqli_query($connection, "DELETE FROM `products` WHERE `id`= $id");

    header("location: read.php");
}
