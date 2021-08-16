<?php

echo $_GET['name'];
$image = $_FILES['image'];

echo '<pre>';
print_r($image);
echo '</pre>';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <br><br>
        <label for="name">Introduce el nombre de la imagen</label>
        <input type="text" id="name" name="name">
        <br><br>
        <label for="image">Envía la imagen</label>
        <input type="file" name="image" id="image">
        <button>Enviar</button>
    </form>
</body>
</html>