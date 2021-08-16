<?php 

include_once 'partials/header.php';

$search = $_GET['search'] ?? '';

// DB connection and query
$conn = new PDO('mysql:host=localhost; dbname=php-music-crud; charset=utf8mb4', 'root', 'pass');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = $conn->prepare("SELECT * FROM products ORDER BY id DESC");
$sql->execute();

$products = $sql->fetchAll(PDO::FETCH_ASSOC);

if ($search) {
    $sql = $conn->prepare("SELECT * FROM products WHERE title LIKE :search");
    $sql->bindValue(':search', '%' . $search . '%');
    $sql->execute();

    $products = $sql->fetchAll(PDO::FETCH_ASSOC);
}

?>

<main>
    
    <h1>Music products CRUD</h1>
    
    <div class="top-table">
        <form action="" id="search" method="get">
            <input type="text" name="search" value="<?= $search ?>">
            <button class="">Search</button>
        </form>

        <a href="create.php" class="btn bg-green">Create new product</a>
    </div>
    
    <table>
        <thead>
            <tr>
                <td class="center">#</td>
                <td class="center">Image</td>
                <td>Title</td>
                <td>Description</td>
                <td>Price</td>
                <td>Date</td>
                <td class="actions">Actions</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td class="center"><?= $product['id'] ?></td>
                    <td class="center">
                        <img src="<?= $product['image'] ?>" height="100">
                    </td>
                    <td><?= $product['title'] ?></td>
                    <td><?= $product['description'] ?></td>
                    <td><?= $product['price'] ?></td>
                    <td><?= $product['created_date'] ?></td>
                    <td class="actions">
                        <a href="edit.php?id=<?= $product['id'] ?>" class="btn bg-blue">Edit</a>
                        <form action="delete.php" method="post">
                            <input type="hidden" name="id" value="<?= $product['id'] ?>">
                            <button type="submit" class="btn bg-red">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

</main>

<?php include_once 'partials/footer.php' ?>