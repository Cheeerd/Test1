<?php
/**
 * Created by PhpStorm.
 * User: Cheerd
 * Date: 07.09.16
 * Time: 17:53
 */

namespace App\Core;


class View
{
    //public $template_view; // здесь можно указать общий вид по умолчанию.

    function generate($content_view, $template_view, $data = null)
    {
        /*
        if(is_array($data)) {
            // преобразуем элементы массива в переменные
            extract($data);
        }
        */

        include 'App/View/'.$template_view;
    }
}