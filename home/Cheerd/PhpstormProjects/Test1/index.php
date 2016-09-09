<?php
/**
 * Created by PhpStorm.
 * User: Cheerd
 * Date: 07.09.16
 * Time: 17:14
 */
try {
    require_once __DIR__ . '/autoloader.php';

    require_once 'App/App.php';

    (new \App\App())->Run();
}
catch(\Exception $e) {
    echo '<pre>'.$e.'</pre>';
}