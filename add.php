<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Add Product</title>

</head>

<body>
    <div class="add-form">
        <form action="add.php" method="post">
            <div class="form-group">
                <label for="formGroupExampleInput">Product Tilte</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="iphone 8" name="title">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Product Price</label>
                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="1000" name="price">
            </div>
            <button type="submit" class="btn btn-primary">Add New Product</button>
        </form>
    </div>
</body>

</html>

<?php




if (isset($_POST['title'], $_POST['price']) && $_POST['title'] !== "" && $_POST['price'] !== "") {
    $connection = mysqli_connect("localhost", "root", "", "backendphp");
    $title = $_POST['title'];
    $price = $_POST['price'];
    mysqli_query($connection, "INSERT INTO `products` (`title`,`price`) VALUES ('$title',$price)");
    if (mysqli_affected_rows($connection)) { ?>
        <html>
        <div class="alert alert-success" role="alert">
            Poduct inserted sucssesfuly!
        </div>

        </html>
<?php
        echo "<script>
    setTimeout(function() {
        window.location.href = 'read.php';
    }, 1000);
</script>";
    }
}





?>