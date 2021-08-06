<?php

include_once 'partials/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $image = $_POST['image'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'] ?: 0;
    $date = date('Y-m-d H:i:s');

    $conn = new PDO('mysql:host=localhost; dbname=php-music-crud; charset=utf8mb4', 'root', 'pass');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = $conn->prepare("INSERT INTO products (image, title, description, price, created_date) VALUES (:image, :title, :description, :price, :date)");

    $query->bindValue(':image', '');
    $query->bindValue(':title', $title);
    $query->bindValue(':description', $description);
    $query->bindValue(':price', $price);
    $query->bindValue(':date', $date);
    $query->execute();
}

?>

<main>
    <form action="" method="post">
        <div>
            <label for="image">Product image</label>
            <input type="file" name="image">
        </div>
        <div>
            <label for="title">Product title</label>
            <input type="text" id="title" name="title">
        </div>
        <div>
            <label for="description">Product description</label>
            <textarea name="description" id="description"></textarea>
        </div>
        <div>
            <label for="price">Product price</label>
            <input type="number" step=".01" name="price" id="price"></input>
        </div>

        <button>Submit</button>
    </form>
</main>

<?php include_once 'partials/footer.php' ?>
