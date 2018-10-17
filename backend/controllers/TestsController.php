<?php
namespace backend\controlles;

use Yii;
use yii\web\Controller;

Class TestsController extends Controller {

    public $enableCsrfValidation = false;

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
        return 'hello';
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