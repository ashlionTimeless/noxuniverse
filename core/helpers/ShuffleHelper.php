<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 11.03.2018
 * Time: 18:07
 */

namespace core\helpers;


class ShuffleHelper
{
    public static function shuffleStrings(array $array)
    {
        $result='';
        foreach($array as $str)
        {
            $result.=$str;
        }
        return str_shuffle($result);
    }
}