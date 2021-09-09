<?php

namespace app;

use PDO;

class Database
{
    public \PDO $conn;

    public function __construct()
    {
        $this->conn = new PDO('mysql:host=localhost, dbname=php_music_crud, charset=utf8mb4', 'root', 'pass');
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getProducts($search = '')
    {
        if ($search) {
            $query = $this->conn->prepare(
                'SELECT * FROM products
                 WHERE title LIKE :title 
                 ORDER BY create_date'
            );
            $query->bindValue(':title', "%$search%");
        } else {
            $query = $this->conn->prepare(
                'SELECT * FROM products 
                 ORDER BY create_date DESC'
            );
            $query->execute();
            $products = $query->fetchAll(PDO::FETCH_ASSOC);
        }
    }
}
