<?php
$params = array_merge(
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
//        'language' => 'en-EN',
    'language'=>isset($_COOKIE['language']) ? $_COOKIE['language'] : 'ua-UA',

    'bootstrap' => [
        'common\bootstrap\SetUp',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'i18n' => [
            'class' => Zelenin\yii\modules\I18n\components\I18N::className(),
            'languages' => ['ua-UA', 'en-EN'],
            'translations' => [
//                'yii' => [
//                    'class' => yii\i18n\DbMessageSource::className()
//                ]
                '*' => [
                    'class' => yii\i18n\DbMessageSource::className(),
                    'forceTranslation' => true
                ],

            ]
        ],

        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
    'params' => $params,
];
