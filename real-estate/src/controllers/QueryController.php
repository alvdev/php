<?php

namespace app\controllers;

use config\Database;
use PDO;

class QueryController
{
    protected $operation;
    protected $type;
    protected $province;
    protected $limit;
    protected $price;

    public function __construct()
    {
        $this->operation = $_GET['operation'] ?? $_POST['operation'] ?? 'sale';
        $this->type = $_GET['type'] ?? $_POST['type'] ?? null;
        $this->province = $_GET['province'] ?? $_POST['province'] ?? null;
        $this->limit = $_GET['limit'] ?? $_POST['limit'] ?? 10;
        $this->price = $_GET['price'] ?? $_POST['price'] ?? 200000;
    }

    public function showFilters($from)
    {
        $sql = "SELECT * FROM {$from}";
        $db = new Database();
        $conn = $db->connect()->query($sql);
        $results = $conn->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    }

    public function getProperties()
    {
        if ($this->type) {
            $types = "'" . implode('\', \'', $this->type) . "'";
        } else {
            $types = "'" . 'piso' . "'";
        }

        if ($this->province) {
            $provinces = "'" . implode('\', \'', $this->province) . "'";
        } else {
            $provinces = "'" . 'lleida' . "'";
        }

        $sql =
            "SELECT * FROM operaciones, pisos, provincias, tipos
             WHERE op_operacion LIKE '{$this->operation}'
             AND tipo_nombre IN ({$types})
             AND prov_nombre IN ({$provinces})
             AND piso_precio_venta < $this->price
             ORDER BY piso_precio_venta ASC
             LIMIT {$this->limit}
            ";

        $db = new Database();
        $query = $db->connect()->query($sql);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    }
}
