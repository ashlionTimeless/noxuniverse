<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 11.03.2018
 * Time: 20:07
 */

namespace core\helpers;


use ForceUTF8\Encoding;

class EncodingHelper
{
    public static function toUtf8(string $str)
    {
        return Encoding::fixUTF8($str);
    }
}