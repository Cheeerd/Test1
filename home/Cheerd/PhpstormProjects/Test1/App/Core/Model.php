<?php
/**
 * Created by PhpStorm.
 * User: Cheerd
 * Date: 07.09.16
 * Time: 17:52
 */

namespace App\Core;
use Zend\Db\Adapter\Adapter;



class Model
{
    protected $adapter;

    public function __construct()
    {
        $this->adapter = new Adapter(array(
            'driver' => 'Pdo_Sqlite',
            'database' => 'Database/test1.db'
        ));
    }

    public function getData() {

    }
}