<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use jianyan\websocket\server;
Class SocketController extends Controller{
    const HOST = '0.0.0.0';
    const PORT = 9501;

    private $sw;

    /**
     * 原生测试连接swoole
     * @return [type] [deception]
     */

//    public function __construct()
//    {
//        $this->sw = new swoole_websocket_server(self::HOST, self::PORT);
//        /*设置sw对象*/
//        $this->sw->set([
//            'worker_num' => 8,
//            'max_request' => 10000,
//            'deamonize' => false,
//        ]);
//
//        $this->sw->on('Start', [$this, 'onStart']);
//        $this->sw->on('Message', [$this, 'onMessage']);
//        $this->sw->on('Close', [$this, 'onClose']);
//
//        $this->sw->start();
//
//    }
//
//    public function actionOnStart($sw, $request)
//    {
//        print_r($request->fd);
//
//        $sw->push($request->fd, "Hello World\n");
//    }
//
//    public function actionOnMessage($sw, $frame)
//    {
//        echo "监听:{$frame->data}\n";
//
//        $sw->push($sw->fd, "server:{$frame->data}");
//    }
//
//    public function actionOnClose($sw, $fd)
//    {
//        echo "close:{$fd}\n";
//    }



    public function actionIndex()
    {


        echo '11111222';
    }
}

//new SocketController();
