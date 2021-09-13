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
}
