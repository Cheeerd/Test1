<?php

/**
 * Created by PhpStorm.
 * User: Cheerd
 * Date: 07.09.16
 * Time: 17:52
 */
namespace App\Core;
require_once 'App/Core/View.php';


class Controller {

    public $model;
    public $view;

    public function __construct()
    {
        $this->view = new \App\Core\View();
    }

    public function indexAction()
    {
    }

    public function redirect($page,$params='') {
        header('Location: /' . $page . '?'.$params);
        exit();
    }
}