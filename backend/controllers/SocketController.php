<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use tsingsun\swoole\server as server;
//use jianyan\websocket\
use Swoole;
Class SocketController extends Controller{
    const HOST = '0.0.0.0';
    const PORT = 9501;

    private $ws;

    /**
     * 连接websock
     * @return [type] [deception]
     */

//    public $enableCsrfValidation = false;
//
//    public function init()
//    {
//        \Yii::$app->user->enableSession = false;
//        parent::init(); // TODO: Change the autogenerated stub
//    }
//
//    public function behaviors()
//    {
//        $behaviors = parent::behaviors();
//        $behaviors['authenticator'] =[
//            'class'=>QueryParamAuth::className(),
//        ];
//        return $behaviors;
//    }
//
//    /**
//     * Displays homepage.
//     *
//     * @return string
//     */
//    public function actionOpen()
//    {
//        return 'hello';
//
//    }
//
//    public function actionMessage()
//    {
//        return rand(100,1000);
//    }
//
//    public function actionClose()
//    {
//        return 'close';
//
//    }

    public function actionIndex()
    {
        echo 1111111;
    }

//    public function __construct()
//    {
//        $this->sw = new Swoole\WebSocket\Server(self::HOST, self::PORT);
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
////
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




}

//new SocketController();
