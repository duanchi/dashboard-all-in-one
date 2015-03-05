<?php
/**
 * Created by PhpStorm.
 * User: fate
 * Date: 15/2/7
 * Time: 下午9:56
 */

class View {

    const VIEW_TYPE_BLITZ       =   0;
    const VIEW_TYPE_SMARTY      =   1;

    private static $__instance  =   NULL;

    public  static function __initialize($_template_file, $_settings = NULL, $_view_type = self::VIEW_TYPE_BLITZ) {

        $_instance              =   NULL;

        switch ($_view_type) {

            case self::VIEW_TYPE_SMARTY:

                break;

            case self::VIEW_TYPE_BLITZ:
            default:
                $_instance      =   new \View\Blitz($_template_file, $_settings);
                break;
        }
        self::$__instance       =   $_instance;
    }

    public  static function instance() {
        return self::$__instance;
    }
}