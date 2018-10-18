<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use tsingsun\swoole\server\Server as Server;
Class TestsController extends Controller {

    public $enableCsrfValidation = false;
    protected $serv;
    const  HOST = "0.0.0.0";
    const  PORT = "9501";

    public function __construct(Server $serv)
    {
        $this->server = $serv;
    }

    public function init()
    {
        \Yii::$app->user->enableSession = false;
        parent::init(); // TODO: Change the autogenerated stub
    }



    public function behaviors()
    {
        $behaviors = parent::behaviors();
//        $behaviors['authenticator'] =[
//            'class'=>QueryParamAuth::className(),
//        ];
        return $behaviors;
    }


    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionOpen()
    {
        echo $this->serv->$host;
    }

    public function actionMessage()
    {

        return rand(100,1000);
    }

    public function actionClose()
    {
        return 'close';
        /** @var Application */

    }
}