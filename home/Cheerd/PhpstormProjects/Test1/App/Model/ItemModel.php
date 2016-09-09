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


class ItemModel extends Model
{

    public function getData($id) {
        $sql = new Sql($this->adapter);
        $select = $sql->select();
        $select->from('item');
        if (!is_null($id))
            $select->where(array('item.id'=>$id));
        $select->join('user','user_id=user.id',array('user_name' => 'name'),$select::JOIN_INNER);

        $selectString = $sql->getSqlStringForSqlObject($select);
        $results = $this->adapter->query($selectString, Adapter::QUERY_MODE_EXECUTE)->toArray();
        return $results;
    }

    public function insert($name,$qty,$image,$owner) {
        $sql = new Sql($this->adapter);
        $insert = $sql->insert();
        $insert->into('item');
        $insert->values(array('name'=>$name,'qty'=>$qty,'image'=>$image,'user_id'=>$owner));
        $insertString = $sql->getSqlStringForSqlObject($insert);
        $this->adapter->query($insertString, Adapter::QUERY_MODE_EXECUTE);
        return $this->adapter->getDriver()->getLastGeneratedValue();
    }

    public function delete($id) {
        $sql=new Sql($this->adapter);
        $delete=$sql->delete();
        $delete->from('item');
        $delete->where(array('id'=>$id));
        $deleteString=$sql->getSqlStringForSqlObject($delete);
        $this->adapter->query($deleteString,Adapter::QUERY_MODE_EXECUTE);
    }

    public function update($id,$name,$qty,$image=null) {
        $sql = new Sql($this->adapter);
        $update = $sql->update();
        $update->table('item');
        $array=array('name'=>$name,'qty'=>$qty);
        if (!is_null($image)) {
            $array['image']=$image;
        }
        $update->set($array);
        $update->where(array('id'=>$id));
        $updateString = $sql->getSqlStringForSqlObject($update);
        $this->adapter->query($updateString, Adapter::QUERY_MODE_EXECUTE);
    }
}