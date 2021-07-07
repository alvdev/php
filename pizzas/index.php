<?php
require_once './src/controller.php';
?>

<!DOCTYPE html>
<html lang="en">

    <?php include 'templates/header.php'; ?>

    <div class="container">
        <h2>User's ideal pizzas</h2>
        <div class="row">
            <?php foreach ($pizzas as $pizza): ?>
                <div class="card z-depth-0">
                    <div class="card-content center">
                        <h3><?= htmlspecialchars($pizza['title']); ?></h3>
                        <ul>
                        <?php foreach (preg_split('/, ?/', $pizza['ingredients']) as $ingredient): ?>
                            <li><?= $ingredient ?></li>
                        <?php endforeach ?>
                        </ul>
                        <div class="card-action right-align">
                            <a href="details.php?id=<?= $pizza['id'] ?>" class="brand-text">More infos</a>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>

    <?php include 'templates/footer.php'; ?>

</html>