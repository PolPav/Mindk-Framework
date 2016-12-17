<?php
/**
 * Created by PhpStorm.
 * User: PolPav
 * Date: 07.10.2016
 * Time: 8:18
 */

namespace PolPav\Models;
use PolPav\Exception\ExceptionDB;


use PolPav\FactoryAdapter;

class AbstractModel
{
    protected $db_name = "Mindk_Shop";
    protected $dbo;
    public $table_name = '';
    public $field_name;

    /**
     * AbstractModel construct accept DI FactoryAdapter and set default connect with mysql
     * @param $adapter 
     */
    
    public function __construct(FactoryAdapter $adapter)
    {
        $this->dbo = $adapter::getConnection('mysql', include('../app/config/config.php'));
    }

    public function find($id)
    {
        
            $sql = "SELECT * FROM $this->table_name WHERE $this->field_name = $id";
            $this->dbo->query($sql);
            $result = $this->dbo->fetch('assoc');
        
        if (!$result) {
            return $this->dbo->error();
        }
        return $result;

    }

    public function findAll()
    {
        $sql = "SELECT * FROM $this->table_name";
        $this->dbo->query($sql);
        $result = $this->dbo->fetch('assoc');

        if (!$result) {
            return $this->dbo->error();
        }
        return $result;
    }
}