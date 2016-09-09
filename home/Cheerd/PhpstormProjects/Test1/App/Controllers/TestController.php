<?php

/**
 * Created by PhpStorm.
 * User: Cheerd
 * Date: 07.09.16
 * Time: 17:28
 */

namespace App\Controllers;
require_once 'App/Core/Controller.php';


class TestController extends \App\Core\Controller
{
    function testAction()
    {
        echo 'test';
    }

    function indexAction()
    {
        $this->view->generate('mainView.php', 'templateView.php');
    }

    function aboutAction() {
        $this->view->generate('aboutView.php', 'templateView.php');
    }

    function contactAction() {
        $this->view->generate('contactView.php', 'templateView.php');
    }
}
