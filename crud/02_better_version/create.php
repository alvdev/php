<?php

/** @var $conn \PDO */
require_once './database.php';
require_once './functions.php';

$errors = [];
$product = [
    'image' => $_FILES['name'] ?? null,
    'title' => $_POST['title'] ?? null,
    'description' => $_POST['description'] ?? null,
    'price' => $_POST['price'] ?? null,
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $image = $_FILES['image'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'] ?: 0;
    $date = date('Y-m-d H:i:s');

    // Errors control
    if (!$image['name']) $errors[] = 'Image field es mandatory';
    if (!$title) $errors[] = 'Title field is mandatory';
    if (!$description) $errors[] = 'Description field is mandatory';
    if (!$price) $errors[] = 'Price field is mandatory';

    if (!$errors) {
        // Upload image file to the server
        $imagePath = 'assets/images/' . randStr(8) . '/' . strtolower(str_replace(' ', '_', $image['name']));
        mkdir(dirname($imagePath));
        move_uploaded_file($image['tmp_name'], $imagePath);

        $query = $conn->prepare("INSERT INTO products (image, title, description, price, created_date) VALUES (:image, :title, :description, :price, :date)");
        $query->bindValue(':image', $imagePath);
        $query->bindValue(':title', $title);
        $query->bindValue(':description', $description);
        $query->bindValue(':price', $price);
        $query->bindValue(':date', $date);
        $query->execute();

        header ('Location: index.php');
    }
}

?>

<?php include_once './views/partials/header.php' ?>

<main>

    <h1>Create product</h1>

    <?php include_once './views/products/form.php' ?>

</main>

<?php include_once './views/partials/header.php' ?>