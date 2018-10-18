<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,  //美化url==ture
            'enableStrictParsing' => false,  //不启用严格解析
            'showScriptName' => false,   //隐藏index.php
            'rules' => [
                '<module:\w+>/<controller:\w+>/<id:\d+>' => '<module>/<controller>/view',
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '/m-api/' => '/meanpan-api/index', // 默认index
                '/mp-api/<action>' => '/meanpan-api/<action>',   // /mp-api/*==>/meanpan-api/*
            ],
        ],

        'class'=>'tsingsun\swoole\server\HttpServer',
        'setting' => [
            'daemonize'=>1,
            'reactor_num'=>1,
            'worker_num'=>1,
            'pid_file' => __DIR__ . '/console/runtime/testHttp.pid',
            'log_file' => __DIR__ . '/console/runtime/logs/swoole.log',
            'debug_mode'=> 1,
            'user'=>'tsingsun',
            'group'=>'staff',
        ],


        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
];
