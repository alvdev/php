<?php

include './config/config.php';

// db sql query
$sql = "SELECT title, ingredients, id FROM pizzas";

// db query result
$result = mysqli_query($conn, $sql);

// fetch resulting rows as an array
$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

// free memory and close db connection
mysqli_free_result($result);
mysqli_close($conn);

//echo '<pre>';
//print_r($pizzas);
//echo '</pre>';