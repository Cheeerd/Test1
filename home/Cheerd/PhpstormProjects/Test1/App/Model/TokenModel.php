<?php
/**
 * Created by PhpStorm.
 * User: Cheerd
 * Date: 07.09.16
 * Time: 17:07
 */

namespace App\Model;
use App\Core\Model;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Sql;


class TokenModel extends Model
{

    public function find($token, $name=false) {
        $sql = new Sql($this->adapter);
        $select = $sql->select();
        $select->from('token');

        if ($name) {
            $select->join('user','user_id=user.id',array('user_id' => 'name'),$select::JOIN_INNER);
        }
        $select->where(array('value'=>$token));

        $selectString = $sql->getSqlStringForSqlObject($select);
        $results = $this->adapter->query($selectString, Adapter::QUERY_MODE_EXECUTE)->toArray();
        return $results[0]['user_id'];
    }

    public function create($user_id) {
        $token_value=$this->generateRandomString(30);

        $sql = new Sql($this->adapter);
        $insert = $sql->insert();
        $insert->into('token');
        $insert->values(array('user_id'=>$user_id,'value'=>$token_value));
        $insertString = $sql->getSqlStringForSqlObject($insert);
        $this->adapter->query($insertString, Adapter::QUERY_MODE_EXECUTE);

        return $token_value;
    }

    public function delete($token) {
        $sql = new Sql($this->adapter);
        $delete=$sql->delete();
        $delete->from('token');
        $delete->where(array('value'=>token));

        $deleteString = $sql->getSqlStringForSqlObject($delete);
        $this->adapter->query($deleteString, Adapter::QUERY_MODE_EXECUTE);
    }

    private function generateRandomString($length = 30) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}