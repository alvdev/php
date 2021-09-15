<?php

session_start();

$lang = $_GET['lang'] ?? $_POST['lang'] ?? $_COOKIE['lang'] ?? 'en';

//$_SESSION['lang'] = $lang;
setcookie('lang', $lang, time() + 3600 * 24 * 30);

/* Remove all existing cookies */
// foreach ($_COOKIE as $cookieKey => $key) {
//     echo $cookieKey;
//     foreach ($_COOKIE as $cookieVal) {
//         echo $cookieVal;
//         setcookie($cookieKey, $cookieVal, time() - 100);
//     }
// }

switch ($lang) {
    case 'en':
        $fileName = 'en.php';
        break;
    case 'es':
        $fileName = 'es.php';
        break;
    default:
        $fileName = 'es.php';
}

require_once 'lang/' . $fileName;
