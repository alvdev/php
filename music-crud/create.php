<?php include_once 'partials/header.php' ?>

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
            <input type="number" step=".01" name="description" id="description"></input>
        </div>

        <button>Submit</button>
    </form>
</main>

<?php include_once 'partials/footer.php' ?>
