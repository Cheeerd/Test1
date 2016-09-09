<?php
/**
 * Created by PhpStorm.
 * User: Cheerd
 * Date: 07.09.16
 * Time: 17:22
 */

namespace App\Core;


class Route
{
    static function start()
    {

        // контроллер и действие по умолчанию
        $controller_name = 'Test';
        $action_name = 'index';


        $routes= explode('?',$_SERVER['REQUEST_URI'])[0];
        $routes = explode('/', $routes);

        // получаем имя контроллера
        if ( !empty($routes[1]) )
        {
            $controller_name = $routes[1];
        }

        // получаем имя экшена
        if ( !empty($routes[2]) )
        {
            $action_name = $routes[2];
        }

        $controller_name=ucfirst(strtolower($controller_name));

        // добавляем префиксы
        $model_name = $controller_name.'Model';
        $controller_name = $controller_name.'Controller';
        $action_name = $action_name.'Action';

        // подцепляем файл с классом модели (файла модели может и не быть)

        $model_file = strtolower($model_name).'.php';
        $model_path = "App/Model/".$model_file;
        if(file_exists($model_path))
        {
            include "/App/Model/".$model_file;
        }

        // подцепляем файл с классом контроллера
        $controller_file = $controller_name.'.php';
        $controller_path = "App/Controllers/".$controller_file;

        if(file_exists($controller_path))
        {
            include "App/Controllers/".$controller_file;
        }
        else
        {
            Route::ErrorPage404();
        }

        $controller_name='\\App\\Controllers\\'.$controller_name;

        // создаем контроллер
        $controller = new $controller_name();
        $action = $action_name;


        if(method_exists($controller, $action))
        {
            // вызываем действие контроллера
            $controller->$action();
        }
        else
        {
            // здесь также разумнее было бы кинуть исключение
            Route::ErrorPage404();
        }

    }

    function ErrorPage404()
    {
        /*host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:'.$host.'404');*/
        echo "Error 404";
    }

}