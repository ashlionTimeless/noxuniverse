<?php
/**
 * Created by PhpStorm.
 * User: a1
 * Date: 24.05.17
 * Time: 20:31
 */

return [
//    'class' => 'yii\web\UrlManager',
////    'hostInfo' => $params['frontendHostInfo'],
//    'enablePrettyUrl' => true,
//    'showScriptName' => false,
    'class' => \common\i18n\I18nUrlManager::className(),
    'enablePrettyUrl' => true,
    'enableStrictParsing' => true,
    'showScriptName' => false,
    'baseUrl' => '/',
    'languages' => ['ua','en'],
    'rules' => [
        '' => 'site/index',
        'blog' => 'site/blog',
        'post' => 'site/post',
        'events' => 'site/events',
        'event' => 'site/event',

//        '<_a:signup>'=>'auth/signup/request',
//        '<_a:confirm|finish>'=>'auth/signup/<_a>',
        //'<_a:signup|confirm>' => 'auth/signup/<_a>',
//        '<_a:login|logout>' => 'auth/auth/<_a>',
//        '<_a:request|reset>' => 'auth/reset/<_a>',
//        'cabinet' => 'cabinet/default/index',
//        'cabinet/<_c:[\w\-]+>' => 'cabinet/<_c>/index',
//        'cabinet/<_c:[\w\-]+>/<id:\d+>' => 'cabinet/<_c>/view',
//        'cabinet/<_c:[\w\-]+>/<_a:[\w-]+>' => 'cabinet/<_c>/<_a>',
//        'cabinet/<_c:[\w\-]+>/<id:\d+>/<_a:[\w\-]+>' => 'cabinet/<_c>/<_a>',
        '<_c:[\w\-]+>' => '<_c>/index',
        '<_c:[\w\-]+>/<id:\d+>' => '<_c>/view',
        '<_c:[\w\-]+>/<_a:[\w-]+>' => '<_c>/<_a>',
        '<_c:[\w\-]+>/<id:\d+>/<_a:[\w\-]+>' => '<_c>/<_a>',
    ],
];