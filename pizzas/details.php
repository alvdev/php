<?php

include './models/db.php';

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

// delete pizza
if (isset($_POST['delete'])) {
    $conn = mysqli_connect(SERVER, DBUSER, DBPASS, DBNAME);

    $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

    $sql = "DELETE FROM pizzas WHERE id = $id_to_delete";

    if (mysqli_query($conn, $sql)) {
        // success
        header('Location: index.php');
    } else {
        // failure
        echo 'query error: ' . mysqli_error($conn);
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">
<?php include './templates/header.php' ?>

    <div class="container center">
        <h2>Details</h2>
        <?php if ($pizza): ?>
            <h4><?= htmlspecialchars($pizza['title']) ?></h4>
            <p>Created by: <?= htmlspecialchars($pizza['email']) ?></p>
            <p><?= htmlspecialchars($pizza['created_at']) ?></p>
            <h5>Ingredients</h5>
            <p><?= $pizza['ingredients'] ?></p>

            <!-- Delete form -->
            <form action="details.php" method="POST">
                <input type="hidden" name="id_to_delete" value="<?= $pizza['id'] ?>">
                <button name="delete" value="Delete" class="btn brand z-depth-0">Delete pizza</button>
            </form>
        <?php else: ?>
            <h5>No such pizza exists</h5>
        <?php endif ?>
    </div>

<?php include './templates/footer.php' ?>

</html>