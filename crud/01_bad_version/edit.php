<?php

$id = $_GET['id'] ?? header('Location: index.php');
$errors = [];

function randStr($n)
{
    $chars = '0123456780ABCDEFGHIJKLMNOPQRSTUWXYZabcdefghijklmnopqrstuvwxyz';
    $str = '';

    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($chars) - 1);
        $str .= $chars[$index];
    }

    return $str;
}

// DB connection
$conn = new PDO('mysql:host=localhost; dbname=php-music-crud; charset=utf8mb4', 'root', 'pass');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Get product array properties
$query = $conn->prepare("SELECT * FROM products WHERE id = :id");
$query->bindValue(':id', $id);
$query->execute();

$product = $query->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $image = $_FILES['image'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // Errors control
    if (!$image) $errors[] = 'Product image is required';
    if (!$title) $errors[] = 'Product title is required';
    if (!$price) $errors[] = 'Product price is required';
    if (!$description) $errors[] = 'Product description is required';

    // Actual image path before overwrite it
    $imagePath = $product['image'];

    if (!$errors) {
        // Check if previous image exists and remove it if it does.
        if ($image['tmp_name']) {
            unlink($product['image']);

            // Recursively create upload image directory and put the file in it
            $imagePath = 'images/' . randStr(8) . '/' . $image['name'];
            mkdir(dirname($imagePath), 0777, true);
            move_uploaded_file($image['tmp_name'], $imagePath);
        }

        // Edit product query
        $update = $conn->prepare("UPDATE products SET title = :title, description = :description, image = :image, price = :price WHERE id = :id");

        $update->bindValue(':id', $id);
        $update->bindValue(':title', $title);
        $update->bindValue(':description', $description);
        if ($image) $update->bindValue(':image', $imagePath);
        $update->bindValue(':price', $price);

        $update->execute();

        header('Location: index.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="style.css">
</head>

<body id="edit-product">
    <nav>
        <a href="index.php">Home</a>
        <a href="create.php">Create</a>
    </nav>
    <main>
        <h1>Edit product</h1>

        <?php if ($errors) : ?>
        <div class="alert error">
            <ul>
                <?php foreach ($errors as $error) : ?>
                <li><?= $error ?></li>
                <?php endforeach ?>
            </ul>
        </div>
        <?php endif ?>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="edit-img">
                <?php if ($product['image']) : ?>
                <img src="<?= $product['image'] ?>" alt="<?= $product['title'] ?>" height="100">
                <?php endif ?>

                <div>
                    <label for="image">Product image</label>
                    <input type="file" name="image">
                </div>
            </div>

            <div>
                <label for="title">Product title</label>
                <input type="text" id="title" name="title" value="<?= $product['title'] ?>">
            </div>

            <div>
                <label for="description">Product description</label>
                <textarea name="description" id="description"><?= $product['description'] ?></textarea>
            </div>

            <div>
                <label for="price">Product price</label>
                <input type="number" id="price" step="0.01" name="price" value="<?= $product['price'] ?>">
            </div>

            <button type="submit" class="btn-lg bg-blue">Submit</button>
        </form>
    </main>
</body>

</html>
