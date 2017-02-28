<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\User;
use common\models\Ruangan;
use common\models\RuanganSearch;


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

    public function actionIndex()
    {
        $ruangan = Ruangan::find()
            ->where(['nim_mahasiswa' => Yii::$app->user->identity->nim] )
            ->all();

        $aktif = Ruangan::find()
            ->where(['status' => 'Aktif'])
            ->andWhere(['nim_mahasiswa' => Yii::$app->user->identity->nim])
            ->count();

        $menunggu = Ruangan::find()
            ->where(['status' => 'Menunggu Validasi'])
            ->andWhere(['nim_mahasiswa' => Yii::$app->user->identity->nim])
            ->count();

        $nonaktif = Ruangan::find()
            ->where(['between', 'waktu_selesai', 0, date('Y-m-d H:i')])
            ->andWhere(['nim_mahasiswa' => Yii::$app->user->identity->nim])
            ->count();

        $tasks=[];  
        foreach ($ruangan AS $_ruang){
            $ruang = new \yii2fullcalendar\models\Event();
            $ruang->id = $_ruang->id;

            if ($_ruang->waktu_selesai < date('Y-m-d H:i')) {
                $ruang->backgroundColor= '#FF4040';
                $ruang->borderColor= '#FF0000';
            } else if ($_ruang->status == 'Aktif') {
                $ruang->backgroundColor= '#40A040';
                $ruang->borderColor= '#008000';
            } else if ($_ruang->status == 'Menunggu Validasi') {
                $ruang->backgroundColor= '#FFBB40';
                $ruang->borderColor= '#FFA500';
            }

            $ruang->title = $_ruang->ruang;
            $ruang->start = $_ruang->waktu_mulai; 
            $ruang->end = $_ruang->waktu_selesai;
              
            $tasks[] = $ruang;
        }

        return $this->render('index', [
            'aktif' => $aktif,
            'menunggu' => $menunggu,
            'nonaktif' => $nonaktif,
            'ruang' => $tasks
        ]);
    }

    public function actionRuangan()
    {
        $searchModel = new RuanganSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $ruangan = Ruangan::find()->all();
        
        $tasks=[];  
        foreach ($ruangan AS $_ruang){
            $ruang = new \yii2fullcalendar\models\Event();
            $ruang->id = $_ruang->id;

            if ($_ruang->waktu_selesai < date('Y-m-d H:i')) {
                $ruang->backgroundColor= '#FF4040';
                $ruang->borderColor= '#FF0000';
            } else if ($_ruang->status == 'Aktif') {
                $ruang->backgroundColor= '#40A040';
                $ruang->borderColor= '#008000';
            } else if ($_ruang->status == 'Menunggu Validasi') {
                $ruang->backgroundColor= '#FFBB40';
                $ruang->borderColor= '#FFA500';
            }

            $ruang->title = $_ruang->ruang;
            $ruang->start = $_ruang->waktu_mulai; 
            $ruang->end = $_ruang->waktu_selesai;
              
            $tasks[] = $ruang;
        }

        return $this->render('ruangan', [
            'ruang' => $tasks,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionProfil()
    {
        $model = User::find()
            ->where([ 'id' => Yii::$app->user->identity->id ])
            ->one();

        $pesanan = Ruangan::find()
            ->where(['nim_mahasiswa' => Yii::$app->user->identity->nim])
            ->count();

        $aktif = Ruangan::find()
            ->where(['nim_mahasiswa' => Yii::$app->user->identity->nim])
            ->andWhere(['status' => 'Aktif'])
            ->count();

        return $this->render('profil', [
            'model' => $model,
            'pesanan' => $pesanan,
            'aktif' => $aktif
        ]);
    }

    public function actionBantuan()
    {
        return $this->render('bantuan');
    }
}