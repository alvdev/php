<?php

require_once './vendor/autoload.php';
require_once 'config/config.php';

$db = new config\Database;
$pisos = $db->getPisos();

?>

<?php include_once VIEW . 'templates/header.php' ?>

<?php include_once './src/views/templates/main.php' ?>

<?php include_once './src/views/templates/footer.php' ?>
