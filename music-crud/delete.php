<?php

$id = $_POST['id'] ?? null;

// Avoid error if URL has no parameters
if (!$id) header ('Location: index.php');

$conn = new PDO('mysql:host=localhost; dbname=php-music-crud', 'root', 'pass');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = $conn->prepare('DELETE FROM products WHERE id = :id');
$query->bindValue(':id', $id);
$query->execute();

header ('Location: index.php');