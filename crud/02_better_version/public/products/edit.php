<?php

include_once '../../views/partials/header.php';
require_once '../../database.php';
require_once '../../functions.php';

$id = $_GET['id'] ?? header ('Location: index.php');

$errors = [];

$query = $conn->prepare("SELECT * FROM products WHERE id = :id");
$query->bindValue(':id', $id);
$query->execute();

$product = $query->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    require_once '../../validate_product.php';

    if (!$errors) {
        $query = $conn->prepare("UPDATE products SET image = :image, title = :title, description = :description, price = :price WHERE id = :id");

        $query->bindValue(':id', $id);
        $query->bindValue(':image', $imagePath);
        $query->bindValue(':title', $title);
        $query->bindValue(':description', $description);
        $query->bindValue(':price', $price);

        $query->execute();

        header ('Location: index.php');
    }
}

?>

<main id="edit-product">

    <h1>Update product</h1>

    <?php include_once '../../views/products/form.php' ?>

</main>

<?php include_once '../../views/partials/footer.php'; ?>