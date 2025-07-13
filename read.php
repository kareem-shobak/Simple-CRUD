<?php
session_start();
if (isset($_SESSION['login'])) {
} else {
    header("location:login.php");
}
//* verify user login

$connection = mysqli_connect("localhost", "root", "", "backendphp");
$qurey = mysqli_query($connection, "SELECT * FROM `products`");
$result = mysqli_fetch_all($qurey, MYSQLI_ASSOC);
$id = $_POST['id'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="readstyle.css">
    <title>Read</title>
</head>

<body>
    <nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark" style="border-bottom: 0px solid black !important; ">
        <div>
            <a href="login.php" style="font-weight: bold;font-size:35px;color:white;text-decoration: none;">
                C R U D
            </a>
        </div>
        <div class="btns">
            <a href="logout.php"><button type="button" class="btn btn-danger">Logout</button></a>
            <?php if ($_SESSION['login']['admin']): ?>
                <a href="add.php"><button type="button" class="btn btn-primary" id="add-button">Add New Product</button></a>
            <?php endif; ?>
        </div>
    </nav>
    <table class="table" id="product-table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Product Title</th>
                <th scope="col">Product Price</th>
                <?php if ($_SESSION['login']['admin']): ?>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $key => $vlaue) : ?>
                <tr>
                    <th><?= $vlaue['id'] ?></th>
                    <td><?= $vlaue['title'] ?></td>
                    <td><?= $vlaue['price'] ?></td>
                    <?php if ($_SESSION['login']['admin']): ?>
                        <td><a href="update.php?id=<?= $vlaue['id'] ?>&title=<?= urlencode($vlaue['title']) ?>&price=<?= $vlaue['price'] ?>"><button type="button" class="btn btn-warning" style="color:white;">Update</button></a></td>
                        <td><a href="delete.php?id=<?= $vlaue['id'] ?>"><button type="button" class="btn btn-danger">Delete</button></a></td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>