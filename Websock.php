<?php
namespace yii;

use \tsingsun\swoole\server\Server;

defined('WEBROOT') or define('WEBROOT', __DIR__);

require(__DIR__ . '/vendor/autoload.php');
$config = [
    'class'=>'tsingsun\swoole\server\WebSocketServer',
    'serverType'=>'websocket',
    'port' => 9502,
    'setting' => [
        'daemonize'=>0,
        'worker_num'=>1,
        'pid_file' => __DIR__ . '/backend/runtime/server.pid',

    ],
//    'pid_file' => __DIR__ . '/console/runtime/testHttp.pid',
//    'log_file' => __DIR__ . '/console/runtime/logs/swoole.log',
];



Server::run($config,function (Server $server){
    $starter = new \tsingsun\swoole\bootstrap\WebSocketApp($server);
    //初始化函数独立,为了在启动时,不会加载Yii相关的文件,在库更新时采用reload平滑启动服务器
    $starter->init = function ($bootstrap) {
        require(__DIR__ . '/vendor/yiisoft/yii2/Yii.php');

        $config = \yii\helpers\ArrayHelper::merge(
            require(__DIR__ . '/console/config/main.php'),
            require(__DIR__ . '/console/config/main-local.php')
        );
        \Yii::setAlias('@webroot', WEBROOT);
        \Yii::setAlias('@web', '/');
        $bootstrap->appConfig = $config;
    };
    $starter->formatData = function ($data) {

        if($data instanceof \yii\web\ForbiddenHttpException){
            return ['errors' => [['code' => $data->getCode(), 'message' => $data->getMessage()]]];
        } elseif($data instanceof \Throwable){
            return ['errors' => [['code' => $data->getCode(), 'message' => $data->getMessage()]]];
        }
        return json_encode($data);
    };
    $server->bootstrap = $starter;
//    $server->getSwoole()->
    $server->start();
});