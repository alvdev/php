<?php
require_once './controllers/controller.php';
?>

<!DOCTYPE html>
<html lang="en">

    <?php include 'templates/header.php'; ?>

    <div class="container center">
        <h2>User's ideal pizzas</h2>
        <div class="row">

            <?php foreach ($pizzas as $pizza): ?>

                <div class="col s6 md3">
                    <div class="card z-depth-0">
                        <div class="center">
                            <img src="./public/images/pizza.svg" alt="pizza" class="pizza">
                            <h3><?= htmlspecialchars($pizza['title']); ?></h3>
                            <ul>
                            <?php foreach (preg_split('/, ?/', $pizza['ingredients']) as $ingredient): ?>
                                <li><?= $ingredient ?></li>
                            <?php endforeach ?>
                            </ul>
                            <div class="card-action right-align">
                                <a href="details.php?id=<?= $pizza['id'] ?>" class="brand-text">More info</a>
                            </div>
                        </div>
                    </div>
                </div>
                
            <?php endforeach ?>
        </div>

    </div>

    <?php include 'templates/footer.php'; ?>

</html>