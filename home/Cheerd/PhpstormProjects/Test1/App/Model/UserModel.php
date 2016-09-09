<?php
/**
 * Created by PhpStorm.
 * User: Cheerd
 * Date: 09.09.16
 * Time: 9:41
 */

namespace App\Model;
use App\Core\Model;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Sql;


class UserModel extends Model
{
    /*
     * var int id
     */
    public function find($name,$password=null) {
        $sql = new Sql($this->adapter);
        $select = $sql->select();
        $array = array('name'=>$name);
        if (!is_null($password))
            $array['password']=$password;
        $select->from('user')->where($array);

        $selectString = $sql->getSqlStringForSqlObject($select);
        $results = $this->adapter->query($selectString, Adapter::QUERY_MODE_EXECUTE)->toArray();

        return $results[0]['id'];
    }

    public function insert($name,$password,$admin='false') {
        $sql = new Sql($this->adapter);
        $insert = $sql->insert();
        $insert->into('user');
        $insert->values(array('name'=>$name,'password'=>$password,'admin'=>$admin));
        $insertString = $sql->getSqlStringForSqlObject($insert);
        $this->adapter->query($insertString, Adapter::QUERY_MODE_EXECUTE);
        return $this->adapter->getDriver()->getLastGeneratedValue();
    }
}