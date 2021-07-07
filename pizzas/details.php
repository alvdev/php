<?php

include './src/db.php';

// check GET request id param
if (isset($_GET['id'])) {
    $conn = mysqli_connect(SERVER, DBUSER, DBPASS, DBNAME);
    mysqli_set_charset($conn, 'UTF8');
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // make sql
    $sql = "SELECT * FROM pizzas WHERE id = $id";

    // get the query result
    $result = mysqli_query($conn, $sql);

    // fetch result in array format
    $pizza = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html lang="en">
<?php include './templates/header.php' ?>

    <div class="container">
        <h2>Details</h2>
        <?php if ($pizza): ?>
            <h4><?= htmlspecialchars($pizza['title']) ?></h4>
            <p><?= htmlspecialchars($pizza['created_at']) ?></p>
            <p>Created by: <?= htmlspecialchars($pizza['email']) ?></p>
            <h5>Ingredients</h5>
            <p><?= $pizza['ingredients'] ?></p>
        <?php else:  ?>
            <h5>No such pizza exists</h5>
        <?php endif; ?>
    </div>

<?php include './templates/footer.php' ?>

</html>