<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'homeUrl' => '/',
    'name' => 'Nox Universe',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'aliases' => [
        '@staticRoot' => $params['staticPath'],
        '@static' => $params['staticHostInfo'],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'cookieValidationKey' => $params['cookieValidationKey'],
            'baseUrl'=>'/',
        ],
        'user' => [
            'identityClass' => 'core\entities\User\User',
            'enableAutoLogin' => true,
            'loginUrl' => ['auth/auth/login'],
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log'          => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets'    => [
                [
                    'class'  => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'backendUrlManager' => require __DIR__ . '/urlManager.php',

        'frontendUrlManager' => require __DIR__ . '/../../frontend/config/urlManager.php',

        'urlManager' => function () {

            return Yii::$app->get('backendUrlManager');

        },
    ],
//    'as access' => [
//        'class' => 'yii\filters\AccessControl',
//        'except' => [
//            'auth/auth/login',
//            'site/error',
//            'auth/reset/request',
//            'auth/signup/request',
//            'auth/signup/confirm',
//            'auth/signup/finish',
//            'site/index',
////            'cabinet/index',
////            'cabinet/update',
////            'cabinet/wallet/index',
////            'cabinet/wallet/create',
////            'cabinet/wallet/update',
////            'cabinet/wallet/delete',
////            'cabinet/wallet/unlock',
////            'cabinet/wallet/view',
//        ],
//        'rules' => [
//            [
//                'allow' => true,
//                'roles' => ['@']
//            ]
//        ],
//    ],
    'on beforeRequest' => function () {
        $pathInfo = Yii::$app->request->pathInfo;
        if (!empty($pathInfo) && substr($pathInfo, -1) === '/') {
            Yii::$app->response->redirect('/' . substr(rtrim($pathInfo), 0, -1), 301)->send();
        }
    },

    'params' => $params,
];
