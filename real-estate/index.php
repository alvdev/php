<?php

require_once './vendor/autoload.php';
require_once 'config/config.php';

// Getting page url
$page = $_GET['page'] ?? 'home';

if ($page === 'login') {
    include_once CTRL . 'loginPage.php';
} else {
    include_once CTRL . 'homePage.php';
}
