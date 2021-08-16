<?php 

include_once 'partials/header.php';
require_once 'database.php';

?>

<main>

<table>
    <thead>
        <tr>
            <td>id</td>
            <td>image</td>
            <td>title</td>
            <td>description</td>
            <td>price</td>
            <td>actions</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?= $product['id'] ?></td>
                <td><img src="<?= $product['image'] ?>"></td>
                <td><?= $product['title'] ?></td>
                <td><?= $product['description'] ?></td>
                <td><?= $product['price'] ?></td>
                <td>
                    <a href="#" class="btn bg-red">Delete</a>
                    <a href="#" class="btn bg-blue">Update</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

</main>

<?php include_once 'partials/footer.php' ?>