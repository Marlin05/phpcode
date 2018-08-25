<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'layout' => 'basic',
    //'layout' => 'main',
    'language' => 'ru-RU',
     'aliases' => [
       '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'ZPTF-F3ZuQzIBUzluYvatA1_HanfPBSP',
             'baseUrl' => ''
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            // 'suffix' => '.html',
            'rules' => [
             /* [

                   // 'about' => 'site/about',
              // задаём отдельные правила для гл.стр.
              // главная стр. поэтому пустая стр. п.40 main.php
                    'pattern' => '',
                    'route' => 'site/index',
                     'suffix' => '',

                    //что добисывать в конец к ссылкам
                  
                ],*/
              //  '<action:(about|contact|login)>' => 'site/<action>',
                // сначала конкретное название экшена
               // '<action:about>' => 'page/about',
                //затем общее
                 //'<action:\w+>' => 'site/<action>',
//               
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
    ],
           
    'params' => $params,
];

// Gii при вкл ЧПУ и перен.адр. доступен http://1cy/gii
if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
       // 'allowedIPs' => ['127.0.0.1']
    ];
}

return $config;
