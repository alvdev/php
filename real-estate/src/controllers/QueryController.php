<?php

namespace app\controllers;

use app\models\Query;

class QueryController
{
    protected $operation = 'this is casi working';
    protected $province;
    protected $limit;
    protected $price;

    public function __construct()
    {
        $this->operation = $_GET['operation'] ?? $_POST['operation'] ?? null;
        $this->province = $_GET['province'] ?? $_POST['province'] ?? null;
        $this->limit = $_GET['limit'] ?? $_POST['limit'] ?? null;
        $this->price = $_GET['price'] ?? $_POST['price'] ?? null;
    }

    public function filter()
    {
        $sql = "SELECT * FROM pisos";
        return $sql;
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function getProvinces()
    {
        $provinces = new Query('*', 'provincias');
        return $provinces->getProvinces();
    }
}
