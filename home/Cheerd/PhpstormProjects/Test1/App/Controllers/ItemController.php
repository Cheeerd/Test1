<?php
/**
 * Created by PhpStorm.
 * User: Cheerd
 * Date: 08.09.16
 * Time: 12:33
 */

namespace App\Controllers;

use App\Core\Model;
use App\Model\ItemModel;
use \App\Core\View;
use App\Model\Uploader;

class ItemController extends \App\Core\Controller
{
    function __construct()
    {
        $this->model = new ItemModel();
        $this->view = new View();
    }


    function indexAction()
    {
        $data = $this->model->getData();
        $this->view->generate('Item/indexView.php', 'templateView.php', $data);
    }

    function createAction()
    {
        if (isset($_POST['name'])) {
            $user_id=AccountController::getUserId();
            if (is_null($user_id))
                $this->redirect('Account/signin');
            $id=$this->model->insert($_POST['name'],$_POST['qty'],(new Uploader())->Upload('image'),$user_id);
            $this->redirect('Item/edit','id='.$id);
        }
        $this->view->generate('Item/createView.php', 'templateView.php');
    }

    function editAction()
    {
        if (isset($_POST['name'])) {
            $user_id=AccountController::getUserId();
            if (is_null($user_id))
                $this->redirect('Account/signin');
            $image=null;
            if (isset($_FILES['image']) && $_FILES['image']['name']!='')
                $image=(new Uploader())->Upload('image');
            $this->model->update($_POST['id'],$_POST['name'],$_POST['qty'],$image);
            $this->redirect('Item/edit','id='.$_POST['id']);
        } else {
            $user_id=AccountController::getUserId();
            $data=$this->model->getData($_GET['id']);
            if (is_null($user_id) || $user_id != $data[0]['user_id'])
                $this->view->generate('Item/watchView.php', 'templateView.php', $data);
            else
                $this->view->generate('Item/editView.php', 'templateView.php', $data);
        }
    }

    function saveAction()
    {
        $this->view->generate('Item/indexView.php', 'templateView.php');
    }

    function deleteAction()
    {
        if (AccountController::getUserId()==$this->model->getData($_GET['id'])[0]['user_id'])
            $this->model->delete($_GET['id']);
        else
            $this->redirect('Account/signin');
        $this->redirect('Item/');
    }
}