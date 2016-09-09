<?php
/**
 * Created by PhpStorm.
 * User: Cheerd
 * Date: 05.09.16
 * Time: 7:43
 */
interface I1 {
    function print1($s);
}

interface I2 {
    function print2($s);
}

class C1 {
    function print3($s) {
        echo '3 '.$s;
    }
}

class Test extends C1 implements I1, I2 {
    function print1($s) {
        echo '1 '.$s;
    }

    function print2($s) {
        echo '2 '.$s;
    }
}

$test = new Test();

$test->print1('qwe');
echo '<br>';
$test->print2('qwe');
echo '<br>';
$test->print3('qwe');
echo '<br>';


?>