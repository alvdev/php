<?php

namespace config;

use PDO;

class Database
{
    protected $host = 'localhost';
    protected $dbname = '00daw_inmobiliaria';
    protected $charset = 'utf8mb4';
    protected $dbuser = 'root';
    protected $dbpass = 'pass';

    protected function connect()
    {
        $dsn = "mysql:host=$this->host; dbname=$this->dbname; charset=$this->charset";
        $conn = new PDO($dsn, $this->dbuser, $this->dbpass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conn;
    }

    public function getPisos()
    {
        $sql = "SELECT * FROM pisos LIMIT 30";
        $query = $this->connect()->query($sql);
        $results = $query->fetchAll(PDO::FETCH_BOTH);

        return $results;
    }
}
