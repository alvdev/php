<?php

include_once './partials/header.php';
require_once './database.php';
require_once './functions.php';

$errors = [];
$image = $_FILES['image'] ?? null;
$title = $_POST['title'] ?? null;
$description = $_POST['description'] ?? null;
$price = $_POST['price'] ?? null;
$date = date('Y-m-d H:i:s');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Errors control
    if (!$image) $errors[] = 'Image field es mandatory';
    if (!$title) $errors[] = 'Title field is mandatory';
    if (!$description) $errors[] = 'Description field is mandatory';
    if (!$price) $errors[] = 'Price field is mandatory';

    if (!$errors) {
        
           // Upload image file to the server
        $imagePath = 'assets/images/' . randStr(8) . '/' . $image['name'];
        mkdir(dirname($imagePath));
        move_uploaded_file($image['tmp_name'], $imagePath);

        $query = $conn->prepare("INSERT INTO products (image, title, description, price, created_date) VALUES (:image, :title, :description, :price, :date)");
        $query->bindValue(':image', $imagePath);
        $query->bindValue(':title', $title);
        $query->bindValue(':description', $description);
        $query->bindValue(':price', $price);
        $query->bindValue(':date', $date);
        $query->execute();
    }

}



echo '<pre>';
print_r($_FILES);
echo '</pre>';

?>

<main>

    <h1>Create product</h1>

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
        <div>
            <label for="image">Product image</label>
            <input type="file" name="image" id="image" value="<?= $image ?>">
        </div>
        <div>
            <label for="title">Product title</label>
            <input type="text" name="title" id="title" value="<?= $title ?>">
        </div>
        <div>
            <label for="description">Product description</label>
            <input type="text" name="description" id="description" value="<?= $description ?>">
        </div>
        <div>
            <label for="price">Product price</label>
            <input type="number" step="0.01" name="price" id="price" value="<?= $price ?>">
        </div>
        <button class="btn-lg bg-blue">Create product</button>
    </form>

</main>