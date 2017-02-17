<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\Pesanan;
use common\models\PesananSearch;
use common\models\User_;

use yii\helpers\Json;

use \DateTime;


class UserController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('site/login');
        }

        return $this->render('index');
    }

    public function actionAgend($start=NULL,$end=NULL,$_=NULL){

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $times = Agenda::find()->all();

        $events = array();

        foreach ($times AS $time){
            //Testing
            $Event = new \yii2fullcalendar\models\Event();
            $Event->id = $time->id;
            $Event->title = $time->id_ruang;
            $Event->start = $time->tanggal_mulai;
            $Event->end = $time->tanggal_selesai;
            $events[] = $Event;
        }
    }

    public function actionProfil()
    {
        $model = User_::find()
            ->where([ 'id' => Yii::$app->user->identity->id ])
            ->one();

        return $this->render('profil', [
            'model' => $model,
        ]);
    }

    public function actionRuangan()
    {
        $searchModel = new PesananSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $events = Pesanan::find()->all();
        
      $tasks=[];  
      foreach ($events AS $eve){
      //Testing
      $event = new \yii2fullcalendar\models\Event();
      $event->id = $eve->id;
      $event->backgroundColor='red';
      $event->title = $eve->id_ruang;
      $event->start = $eve->tanggal_mulai; 
      
      $tasks[] = $event;
    }
        
        return $this->render('ruangan', ['events' => $tasks,
            ]);
        
    }

}