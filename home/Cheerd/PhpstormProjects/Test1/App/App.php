<?php
/**
 * Created by PhpStorm.
 * User: Cheerd
 * Date: 08.09.16
 * Time: 7:41
 */

namespace App;

require_once 'App/Core/Model.php';
require_once 'App/Core/View.php';
require_once 'App/Core/Controller.php';
require_once 'App/Core/Route.php';


class App
{
    public function Run() {
        \App\Core\Route::start();
    }
}