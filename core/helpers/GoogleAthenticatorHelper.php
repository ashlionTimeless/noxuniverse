<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 07.03.2018
 * Time: 16:53
 */

namespace core\helpers;
use Dolondro\GoogleAuthenticator\QrImageGenerator\GoogleQrImageGenerator;
use Dolondro\GoogleAuthenticator\Secret;
use Dolondro\GoogleAuthenticator\SecretFactory;
use core\entities\User\User;
use core\repositories\User\UserRepository;
use Dolondro\GoogleAuthenticator\GoogleAuthenticator;

class GoogleAthenticatorHelper
{

    public static function getSecret(int $user_id)
    {
        $user=\Yii::$container->get(UserRepository::class)->get($user_id);
        $secretFactory = new SecretFactory();
        $secret = $secretFactory->create(\Yii::$app->params['app_name'], $user->username);
        return $secret;
    }

    public static function getQRCode(Secret $secret)
    {
        $generator=new GoogleQrImageGenerator();
        return $generator->generateUri($secret);
    }

    public static function checkGACode($ga_key, $code)
    {
        $googleAuth = new GoogleAuthenticator();
        return $googleAuth->authenticate($ga_key, $code);
    }
    //Main Slat Creation Method
//    public static function createSalt(int $user_id)
//    {
//        $user=\Yii::$container->get(UserRepository::class)->get($user_id);
//        $data=static::getUserData($user);
//        $raw=static::getRaw($data);
//        return static::transformIntoSalt($raw);
//    }
//
//    public static function getUserData(User $user)
//    {
//        $data=[];
//        return [$user->auth_key,$user->password_hash,$user->password_reset_token,$user->updated_at];
//    }
//
//    public static function getRaw(array $strbits)
//    {
//        $raw='';
//        foreach($strbits as $s)
//        {
//            $raw.=$s;
//        }
//        $raw.=floor(time()*rand(10000,99999));
//        $raw=str_shuffle($raw);
//        return $raw;
//    }
//
//    //transform received string into salt
//    public static function transformIntoSalt(string $string)
//    {
//        return sha1($string);
//    }
}