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
    ],
    // webSocket
    'websocket' => [
        'class' => 'jianyan\websocket\WebSocketController',
        'server' => 'jianyan\websocket\WebSocketServer',
        'host' => '0.0.0.0',// 监听地址
        'port' => 9501,// 监听端口
        'config' => [// 标准的swoole配置项都可以再此加入
            'daemonize' => false,// 守护进程执行
            'ssl_cert_file' => '',
            'ssl_key_file' => '',
            'pid_file' => __DIR__ . '/../../backend/runtime/logs/server.pid',
            'log_file' => __DIR__ . '/../../backend/runtime/logs/swoole.log',
            'log_level' => 0,
        ],
    ],
    'params' => $params,
];
