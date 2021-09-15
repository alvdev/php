<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Idealisto Real Estate</title>
    <meta name="description" content="Real Estate CMS for realtors">
    <link rel="stylesheet" href="public/css/style.css">
    <script src="./public/js/script.js" defer></script>
</head>

<body class="<?= $_GET['page'] ?: 'PEPE' ?>">

    <?php
    if (!isset($_GET['page']) == 'login') {
        include_once __DIR__ . '/aside.php';
    }
    ?>

    <nav>
        <div class="logo"><a href="./">idealisto</a></div>

        <form action="./" class="locale" method="post">
            <button name="lang" value="es"><img src=" ./public/img/locales/es24.png" alt=""></button>
            <button name="lang" value="en"><img src=" ./public/img/locales/en24.png" alt=""></button>
        </form>

        <div class="btn-group">
            <a href="#" class="btn blue">Add property</a>
            <a href="?page=login" class="btn">Login</a>
        </div>
    </nav>

    <main>
