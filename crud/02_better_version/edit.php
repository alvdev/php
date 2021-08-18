<?php

include_once './partials/header.php';
require_once './database.php';
require_once './functions.php';

$id = $_GET['id'] ?? header ('Location: index.php');

$errors = [];

$query = $conn->prepare("SELECT * FROM products WHERE id = :id");
$query->bindValue(':id', $id);
$query->execute();

$product = $query->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $image = $_FILES['image'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'] ?: 0;

    // Error control
    if (!$image) $errors[] = 'Image is mandatory';
    if (!$title) $errors[] = 'Title is mandatory';
    if (!$description) $errors[] = 'Description is mandatory';
    if ($price == 0) $errors[] = 'Price is mandatory';

    // Upload image
    $imagePath = './assets/images/' . randStr(8) . '/' . strtolower(str_replace(' ', '_', $image['name']));
    mkdir(dirname($imagePath));
    move_uploaded_file($image['tmp_name'], $imagePath);

    echo $imagePath . '<- This is the image path';

    $query = $conn->prepare("UPDATE products SET image = :image, title = :title, description = :description, price = :price WHERE id = :id");

    $query->bindValue(':id', $id);
    $query->bindValue(':image', $imagePath);
    $query->bindValue(':title', $title);
    $query->bindValue(':description', $description);
    $query->bindValue(':price', $price);

    $query->execute();
}

?>

<main id="edit-product">

    <h1>Update product</h1>

    <?php if ($errors): ?>
        <div class="alert error">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?= $error ?></li>
                <?php endforeach ?>
            </ul>
        </div>
    <?php endif ?>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="edit-img">
            <?php if ($product['image']): ?>
                <img src="<?= $product['image'] ?>" alt="<?= $product['title'] ?>">
            <?php endif ?>
            <div>
                <label for="image">Product image</label>
                <input type="file" name="image" id="image" value="<?= $product['image'] ?>">
            </div>
        </div>
        <div>
            <label for="title">Product title</label>
            <input type="text" name="title" id="title" value="<?= $product['title'] ?>">
        </div>
        <div>
            <label for="description">Product description</label>
            <input type="text" name="description" id="description" value="<?= $product['description'] ?>">
        </div>
        <div>
            <label for="price">Product price</label>
            <input type="number" step="0.01" name="price" id="price" value="<?= $product['price'] ?>">
        </div>
        <button class="btn-lg bg-blue">Create product</button>
    </form>

</main>

<?php include_once './partials/footer.php'; ?>