<?php 

include_once './views/partials/header.php';
require_once './database.php';

?>

<main>

<h1>Products CRUD</h1>

<div class="top-table">
    <form action="" id="search" method="get">
        <input type="text" name="search" placeholder="Input product name to search" value="<?= $search ?>">
        <button>Search</button>
    </form>

    <a href="create.php" class="btn bg-green">Create new product</a>
</div>

<table>
    <thead>
        <tr>
            <td class="center">#</td>
            <td class="center">image</td>
            <td>title</td>
            <td>description</td>
            <td>price</td>
            <td class="actions">actions</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $product): ?>
            <tr>
                <td class="center"><?= $product['id'] ?></td>
                <td class="center">
                    <img src="<?= $product['image'] ?: 'https://via.placeholder.com/50/FFFF00/000000?text=IMAGE' ?>">
                </td>
                <td><?= $product['title'] ?></td>
                <td><?= $product['description'] ?></td>
                <td><?= $product['price'] ?></td>
                <td class="actions">
                    <a href="delete.php?id=<?= $product['id'] ?>" class="btn bg-red">Delete</a>
                    <a href="edit.php?id=<?= $product['id'] ?>" class="btn bg-blue">Edit</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

</main>

<?php include_once './views/partials/footer.php' ?>