<?php

include_once 'partials/header.php';

$errors = [];

// Define empty variables to prevent undefined variables input value errors
$title = $price = $description = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $image = $_FILES['image'] ?? null;
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'] ?: 0;
    $date = date('Y-m-d H:i:s');

    // Errors control
    if (!$title) $errors[] = 'Product title is required';
    if (!$price) $errors[] = 'Product price is required';
    if (!$description) $errors[] = 'Product description is required';

    // Submit form only if there are no errors to have no side effects
    if (empty($errors)) {
        if ($image) {
            is_dir('images') ?: mkdir('images');
            move_uploaded_file($image['tmp_name'], 'images/' . $image['name']);
        }

        $conn = new PDO('mysql:host=localhost; dbname=php-music-crud; charset=utf8mb4', 'root', 'pass');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = $conn->prepare("INSERT INTO products (image, title, description, price, created_date) VALUES (:image, :title, :description, :price, :date)");

        $query->bindValue(':image', '');
        $query->bindValue(':title', $title);
        $query->bindValue(':description', $description);
        $query->bindValue(':price', $price);
        $query->bindValue(':date', $date);
        $query->execute();

        header('Location: index.php');
    }
}

echo '<pre>';
print_r($_FILES);
echo '</pre>';

?>

<main>

    <h1>Create new product</h1>

    <?php if (!empty($errors)): ?>
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
            <input type="file" id="image" name="image">
        </div>

        <div>
            <label for="title">Product title</label>
            <input type="text" id="title" name="title" value="<?= $title ?>">
        </div>

        <div>
            <label for="description">Product description</label>
            <textarea name="description" id="description"><?= trim($description) ?></textarea>
        </div>

        <div>
            <label for="price">Product price</label>
            <input type="number" step=".01" name="price" id="price" value="<?= $price ?>">
        </div>

        <button class="btn-lg bg-blue">Submit</button>
    </form>

</main>

<?php include_once 'partials/footer.php' ?>