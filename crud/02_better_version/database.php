<?php

$conn = new PDO('mysql:host=localhost; dbname=php-music-crud; charset=utf8mb4', 'root', 'pass');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = $conn->prepare("SELECT * FROM products ORDER BY id DESC");
$query->execute();

$products = $query->fetchAll(PDO::FETCH_ASSOC);
