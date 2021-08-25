<?php

$image = $_FILES['image'];
$title = $_POST['title'];
$description = $_POST['description'];
$price = $_POST['price'] ?: 0;

// Error control
if (!$image['name'] && !$product['image']) $errors[] = 'Image is mandatory';
if (!$title) $errors[] = 'Title is mandatory';
if (!$description) $errors[] = 'Description is mandatory';
if ($price == 0) $errors[] = 'Price is mandatory';

// Upload image
if ($image['name']) {
    $imagePath = '/public/assets/images/' . randStr(8) . '/' . strtolower(str_replace(' ', '_', $image['name']));
    mkdir(dirname($imagePath));
    move_uploaded_file($image['tmp_name'], $imagePath);
} else {
    // Keep image path if exists
    $imagePath = $product['image'];
}