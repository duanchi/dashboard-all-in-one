<?php
/**
 * Created by PhpStorm.
 * User: lovemybud
 * Date: 15/7/15
 * Time: 23:18
 */

namespace Callback\Restful;


class Request
{
    static public function complete($arg1 = NULL, $arg2 = NULL, $arg3 = NULL) {
        echo 'Complete!',$arg1,'-',$arg2,'+';
        var_dump($arg3);
    }
}