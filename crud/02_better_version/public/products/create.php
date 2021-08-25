<?php

/** @var $conn \PDO */
require_once '../../database.php';
require_once '../../functions.php';

$errors = [];
$product = [
    'image' => $_FILES['name'] ?? null,
    'title' => $_POST['title'] ?? null,
    'description' => $_POST['description'] ?? null,
    'price' => $_POST['price'] ?? null,
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    require_once '../../validate_product.php';

    if (!$errors) {
        $query = $conn->prepare("INSERT INTO products (image, title, description, price, created_date) VALUES (:image, :title, :description, :price, :date)");
        $query->bindValue(':image', $imagePath);
        $query->bindValue(':title', $title);
        $query->bindValue(':description', $description);
        $query->bindValue(':price', $price);
        $query->bindValue(':date', date('Y-m-d H:i:s'));
        $query->execute();

        header ('Location: index.php');
    }
}

?>

<?php include_once '../../views/partials/header.php' ?>

<main>

    <h1>Create product</h1>

    <?php include_once '../../views/products/form.php' ?>

</main>

<?php include_once '../../views/partials/header.php' ?>