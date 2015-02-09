<?php
//var_dump(filter_var('/^http://localhost/login/login.action(.*)/', FILTER_VALIDATE_REGEXP));

$View = new Blitz();
$View->load('Where is the {{ $what }}, Lebowski?');
$View->set(array('what' => 'money'));
$View->display();


//var_dump(microtime());

function unescape($str)
{
    $ret = '';
    $len = strlen($str);
    for ($i = 0; $i < $len; $i ++)
    {
        if ($str[$i] == '%' && $str[$i + 1] == 'u')
        {
            $val = hexdec(substr($str, $i + 2, 4));
            if ($val < 0x7f)
                $ret .= chr($val);
            else
                if ($val < 0x800)
                    $ret .= chr(0xc0 | ($val >> 6)) .
                        chr(0x80 | ($val & 0x3f));
                else
                    $ret .= chr(0xe0 | ($val >> 12)) .
                        chr(0x80 | (($val >> 6) & 0x3f)) .
                        chr(0x80 | ($val & 0x3f));
            $i += 5;
        } else
            if ($str[$i] == '%')
            {
                $ret .= urldecode(substr($str, $i, 3));
                $i += 2;
            } else
                $ret .= $str[$i];
    }
    return $ret;
}






class Timespent {
    private static $start_time = 0;
    private static $stop_time = 0;
    private static $spend_time = [];
    private static $total_time = 0;

    public static function _init() {
        self::$total_time = self::get_microtime();
        self::start();
    }

    public static function get_microtime()
    {
        list($usec, $sec) = explode(' ', microtime());
        return ((float)$usec + (float)$sec);
    }

    public static function start()
    {
        self::$start_time = self::get_microtime();
    }

    public static function suspend($_flag = 'FINISH')
    {
        self::$stop_time = self::get_microtime();
        self::_spent($_flag);
    }

    public static function record($_flag = 'FINISH')
    {
        self::suspend($_flag);
        self::start();
    }

    private static function _spent($_flag = '')
    {
        $time = round((self::$stop_time - self::$start_time) * 1000, 3);
        !empty($_flag) ? self::$spend_time[$_flag] = $time : self::$spend_time[] = $time;
    }

    public static function spent() {
        self::total();
        $_result = '';
        foreach (self::$spend_time as $_key => $_node) {
            $_result .= $_key . ': ' . $_node . 'ms, ';
        }
        return $_result;
    }

    public static function total() {
        self::$spend_time['TOTAL'] = round((self::get_microtime() - self::$total_time) * 1000, 3);
    }

}