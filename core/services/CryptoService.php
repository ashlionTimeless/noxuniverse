<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 11.03.2018
 * Time: 12:55
 */

namespace core\services;


use core\helpers\DataConverter;

class CryptoService
{

    public static function encrypt($plaintext, $key,$nonce,$bin2hex=true)
    {
        $ciphertext=sodium_crypto_secretbox($plaintext,$nonce,$key);
        if($bin2hex)
        {
            $ciphertext=bin2hex($ciphertext);
        }
        return $ciphertext;
    }

    public static function decrypt($ciphertext, $key,$nonce,$hex2bin=true)
    {
        if($hex2bin)
        {
            $ciphertext=hex2bin($ciphertext);
        }
        $plaintext=sodium_crypto_secretbox_open($ciphertext,$nonce,$key);
        return $plaintext;
    }

    public static function hash($string)
    {
        return hash('sha256',$string);
    }

    public static function prepareNonce()
    {
        $nonce=bin2hex(random_bytes(SODIUM_CRYPTO_SECRETBOX_NONCEBYTES/2));
        return $nonce;
    }

}