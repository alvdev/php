<?php

namespace app\models;

use config\Database;
use \PDO;
use app\controllers\QueryController;

class Query extends Database
{
    protected $select;
    protected $from;
    protected $where;

    public function __construct($select, $from)
    {
        $this->select = $select;
        $this->from = $from;
       //$this->where = $where;
    }

    // Filter form methods
    public function getProvinces()
    {
        $sql = "SELECT {$this->select} FROM {$this->from}";
        $query = parent::connect()->query($sql);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    }


    // Table results methods
    public function select()
    {
        $obj = new QueryController();
        $sql = $obj->filter();
        $query = parent::connect()->query($sql);
        $results = $query->fetchAll(PDO::FETCH_BOTH);

        return $results;
    }
}
