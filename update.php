<?php
$connection = mysqli_connect("localhost", "root", "", "backendphp");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'];
    $title = $_POST['title'];
    $price = $_POST['price'];

    $query = "UPDATE `products` SET `title` = '$title', `price` = $price WHERE `id` = $id";
    $result = mysqli_query($connection, $query);

    if ($result) {
        header("refresh:1;url=read.php");
        exit;
    }
} elseif (isset($_GET['id'], $_GET['title'], $_GET['price'])) {
    $id = $_GET['id'];
    $title = $_GET['title'];
    $price = $_GET['price'];
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Update Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
</head>

<body class="container mt-5">
    <h2>Update Product</h2>
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?= $id ?>">
        <div class="form-group">
            <label for="title">Product Title</label>
            <input type="text" class="form-control" id="title" name="title" value="<?= htmlspecialchars($title) ?>" required>
        </div>
        <div class="form-group">
            <label for="price">Product Price</label>
            <input type="text" class="form-control" id="price" name="price" value="<?= $price ?>" required>
        </div>
        <button type="submit" class="btn btn-warning">Update</button>
        <a href="read.php" class="btn btn-secondary">back</a>
    </form>
</body>

</html>