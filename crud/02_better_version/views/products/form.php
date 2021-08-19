<?php if ($errors) : ?>
    <div class="alert error">
        <ul>
            <?php foreach ($errors as $error) : ?>
                <li><?= $error ?></li>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif ?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="edit-img">
        <?php if ($product['image']) : ?>
            <img src="<?= $product['image'] ?>" alt="<?= $product['title'] ?>">
        <?php endif ?>
        <div>
            <label for="image">Product image</label>
            <input type="file" name="image" id="image" value="<?= $product['image'] ?>">
        </div>
    </div>
    <div>
        <label for="title">Product title</label>
        <input type="text" name="title" id="title" value="<?= $product['title'] ?>">
    </div>
    <div>
        <label for="description">Product description</label>
        <input type="text" name="description" id="description" value="<?= $product['description'] ?>">
    </div>
    <div>
        <label for="price">Product price</label>
        <input type="number" step="0.01" name="price" id="price" value="<?= $product['price'] ?>">
    </div>
    <button class="btn-lg bg-blue">Create product</button>
</form>