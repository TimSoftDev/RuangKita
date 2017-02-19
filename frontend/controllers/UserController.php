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
use common\models\User;
use common\models\Ruangan;

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

    public function actionProfil()
    {
        $model = User::find()
            ->where([ 'id' => Yii::$app->user->identity->id ])
            ->one();

        return $this->render('profil', [
            'model' => $model,
        ]);
    }

    public function actionRuangan()
    {
        $pesanan = Ruangan::find()->all();
        
        $tasks=[];  
        foreach ($pesanan AS $_ruang){
            $ruang = new \yii2fullcalendar\models\Event();
            $ruang->id = $_ruang->id;

            if ($_ruang->status == 'Menunggu Validasi') {
                $ruang->backgroundColor='blue';
            } else if ($_ruang->status == 'Aktif') {
                $ruang->backgroundColor='green';
            } else {
                $ruang->backgroundColor='red';
            }

            $ruang->title = $_ruang->ruang;
            $ruang->start = $_ruang->waktu_mulai; 
            $ruang->end = $_ruang->waktu_selesai;
              
            $tasks[] = $ruang;
        }
    
        return $this->render('ruangan', ['ruang' => $tasks, ]);
    }

    public function actionPesan()
    {
        $model = new Ruangan();

        if ($model->load(Yii::$app->request->post())) {
            $model->nim_mahasiswa = Yii::$app->user->identity->nim;
            $model->status = 'Menunggu Validasi';
            $model->waktu_pesan = date('Y-m-d H:i');            
            $model->waktu_validasi = date('Y-m-d H:i');
            $model->save();
            return $this->redirect(['pesanan']);
        } else {
            return $this->render('pesan', [
                'model' => $model,
            ]);
        }
    }

    public function actionPesanan()
    {
        $pesanan = Ruangan::find()
        ->where(['nim_mahasiswa' => Yii::$app->user->identity->nim] )
        ->all();
    
        $tasks=[];  
        foreach ($pesanan AS $_ruang){
            $ruang = new \yii2fullcalendar\models\Event();
            $ruang->id = $_ruang->nim_mahasiswa;

            if ($_ruang->status == 'Menunggu Validasi') {
                $ruang->backgroundColor='orange';
                $ruang->borderColor='orange';
            } else if ($_ruang->status == 'Aktif') {
                $ruang->backgroundColor='green';
            } else {
                $ruang->backgroundColor='red';
            }

            $ruang->title = $_ruang->ruang;
            $ruang->start = $_ruang->waktu_mulai; 
            $ruang->end = $_ruang->waktu_selesai;
              
            $tasks[] = $ruang;
        }
    
        return $this->render('pesanan', ['ruang' => $tasks, ]);
    }

    public function actionBantuan()
    {
        return $this->render('bantuan');
    }

}