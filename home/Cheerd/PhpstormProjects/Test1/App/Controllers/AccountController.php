<?php
/**
 * Created by PhpStorm.
 * User: Cheerd
 * Date: 09.09.16
 * Time: 9:39
 */

namespace App\Controllers;

use App\Model\UserModel;
use App\Core\View;
use App\Core\Controller;
use App\Model\TokenModel;

class AccountController extends Controller
{

    function __construct()
    {
        $this->model = new UserModel();
        $this->view = new View();
    }

    function signinAction() {
        if (isset($_POST['name'])) {
            $id = $this->model->find($_POST['name'],$_POST['password']);
            if (is_null($id)) {
                $this->redirect('account/signin','error=error');
            } else {
                setcookie('token',(new TokenModel())->create($id),null,'/');
                $this->redirect('Test/');
            }
        } else
        $this->view->generate('Account/signinView.php', 'templateView.php',isset($_GET['error']));
    }

    function logoutAction() {
        if (AccountController::isAuthenticated()) {
            (new TokenModel())->delete($_COOKIE['token']);
            setcookie('token', null, null, '/');
        }
        $this->redirect('Test/');
    }

    function SignupAction() {
        if (isset($_POST['name'])) {
            if ($this->model->find($_POST['name'])) {
                $this->redirect('account/signup','error=error');
            } else {
                setcookie('token',(new TokenModel())->create($this->model->insert($_POST['name'],$_POST['password'])),null,'/');
                $this->redirect('Test/');
            }
        } else
            $this->view->generate('Account/signupView.php', 'templateView.php',isset($_GET['error']));

    }

    private static function isAuthenticated() {
        return isset($_COOKIE['token']);
    }

    public static function getUserName() {
        if (self::isAuthenticated()) {
            $token = new TokenModel();
            $name = $token->find($_COOKIE['token'], true);
            if (is_null($name)) {
                setcookie('token',null,null,'/');
            }
            return $name;
        }
        else
            return false;
    }

    public static function getUserId() {
        if (self::isAuthenticated()) {
            $token = new TokenModel();
            $id = $token->find($_COOKIE['token']);
            if (is_null($id)) {
                setcookie('token',null,null,'/');
            }
            return $id;
        }
        else
            return false;
    }


}