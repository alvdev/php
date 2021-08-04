<?php

// mysqli db connect version
/* $conn = mysqli_connect('localhost', 'root', 'pass', 'php-music-crud');
mysqli_set_charset($conn, 'UTF8');

$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_all($result, MYSQLI_ASSOC); */

// PDO db connect version
$conn = new PDO('mysql:host=localhost;dbname=php-music-crud;charset=utf8', 'root', 'pass');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = $conn->prepare('SELECT * FROM products ORDER BY created_date DESC');
$sql->execute();

$products = $sql->fetchAll(PDO::FETCH_ASSOC);

$conn->clos

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music products CRUD</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>