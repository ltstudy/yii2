<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'console\controllers',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'controllerMap' => [
        'fixture' => [
            'class' => 'yii\console\controllers\FixtureController',
            'namespace' => 'common\fixtures',
          ],
    ],
    'components' => [
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
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
    ],

    'class'=>'tsingsun\swoole\server\HttpServer',
    'setting' => [
        'daemonize'=>1,
        'reactor_num'=>1,
        'worker_num'=>1,
        'pid_file' => __DIR__ . '../runtime/server.pid',
        'log_file' => __DIR__ . '../runtime/logs/swoole.log',
        'debug_mode'=> 1,
        'user'=>'tsingsun',
        'group'=>'staff',
    ],
//
//    'class'=>'tsingsun\swoole\server\HttpServer',
//    'setting' => [
//        'daemonize'=>1,
//        'reactor_num'=>1,
//        'worker_num'=>1,
//        'pid_file' => __DIR__ . '/console/runtime/testHttp.pid',
//        'log_file' => __DIR__ . '/console/runtime/logs/swoole.log',
//        'debug_mode'=> 1,
//        'user'=>'tsingsun',
//        'group'=>'staff',
//    ],

//    // webSocket
//    'websocket' => [
//        'class' => 'jianyan\websocket\WebSocketController',
//        'server' => 'jianyan\websocket\WebSocketServer',
//        'host' => '0.0.0.0',// 监听地址
//        'port' => 9501,// 监听端口
//        'config' => [// 标准的swoole配置项都可以再此加入
//            'daemonize' => false,// 守护进程执行
//            'ssl_cert_file' => '',
//            'ssl_key_file' => '',
//            'pid_file' => __DIR__ . '/../../backend/runtime/logs/server.pid',
//            'log_file' => __DIR__ . '/../../backend/runtime/logs/swoole.log',
//            'log_level' => 0,
//        ],
//    ],
    'params' => $params,
];
