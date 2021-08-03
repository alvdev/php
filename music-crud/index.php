<?php

// mysqli connect
$conn = mysqli_connect('localhost', 'root', 'pass', 'php-music-crud');
mysqli_set_charset($conn, 'UTF8');

$sql = "SELECT * FROM products";

$result = mysqli_query($conn, $sql);


$row = mysqli_fetch_all($result, MYSQLI_ASSOC);

echo '<pre>';
print_r($row);
echo '</pre>';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music products CRUD</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Music products CRUD</h1>
    <table>
        <thead>
            <tr>
                <td>Title</td>
                <td>Description</td>
                <td>Image</td>
                <td>Price</td>
                <td>Date</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($row as $product): ?>
                <tr>
                    <td><?= $product['title'] ?></td>
                    <td><?= $product['description'] ?></td>
                    <td><?= $product['image'] ?></td>
                    <td><?= $product['price'] ?></td>
                    <td><?= $product['created_date'] ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>