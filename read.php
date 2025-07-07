<?php
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
    <table class="table" id="product-table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Product Title</th>
                <th scope="col">Product Price</th>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $key => $vlaue) : ?>
                <tr>
                    <th><?= $vlaue['id'] ?></th>
                    <td><?= $vlaue['title'] ?></td>
                    <td><?= $vlaue['price'] ?></td>
                    <td><a href="update.php?id=<?= $vlaue['id'] ?>&title=<?= urlencode($vlaue['title']) ?>&price=<?= $vlaue['price'] ?>"><button type="button" class="btn btn-warning">Update</button></a></td>
                    <td><a href="delete.php?id=<?= $vlaue['id'] ?>"><button type="button" class="btn btn-danger">Delete</button></a></td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="add.php"><button type="button" class="btn btn-primary" id="add-button">Add New Product</button></a>
</body>

</html>