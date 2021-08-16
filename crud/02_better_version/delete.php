<?php

require_once 'database.php';

$id = $_GET['id'] ?? header ('Location: index.php');

$query = $conn->prepare("DELETE FROM products WHERE id = :id");
$query->bindValue(':id', $id);
$query->execute();

header ('Location: index.php');