<?php
define('SERVER', 'localhost');
define('DBUSER', 'root');
define('DBPASS', 'pass');
define('DBNAME', '0_pizza');

// db connection
$conn = mysqli_connect(SERVER, DBUSER, DBPASS, DBNAME);
mysqli_set_charset($conn, 'UTF8');

// check db connection
if (!$conn) {
    echo 'DB connection error' . mysqli_connect_error();
}