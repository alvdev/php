<?php

include_once './views/partials/header.php';
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
    if ($image['name']) {
        $imagePath = './assets/images/' . randStr(8) . '/' . strtolower(str_replace(' ', '_', $image['name']));
        mkdir(dirname($imagePath));
        move_uploaded_file($image['tmp_name'], $imagePath);
    }

    $query = $conn->prepare("UPDATE products SET image = :image, title = :title, description = :description, price = :price WHERE id = :id");

    $query->bindValue(':id', $id);
    $query->bindValue(':image', $imagePath);
    $query->bindValue(':title', $title);
    $query->bindValue(':description', $description);
    $query->bindValue(':price', $price);

    $query->execute();

    header ('Location: index.php');
}

?>

<main id="edit-product">

    <h1>Update product</h1>

    <?php include_once 'views/products/form.php' ?>

</main>

<?php include_once './views/partials/footer.php'; ?>