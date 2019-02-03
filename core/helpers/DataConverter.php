<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 11.03.2018
 * Time: 19:09
 */

namespace core\helpers;


class DataConverter
{
    public static function hex2str($hex) {
        $str='';
        for($i=0;$i<strlen($hex);$i+=2)
            $str .= chr(hexdec(substr($hex,$i,2)));

        return $str;
    }
}