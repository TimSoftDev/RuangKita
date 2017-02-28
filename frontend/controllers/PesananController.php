<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\Ruangan;
use frontend\models\PesanankuSearch;
use frontend\models\PesanRuanganForm;


class PesananController extends Controller
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
        $searchModel = new PesanankuSearch();
        $dataProvider = $searchModel->semua(Yii::$app->request->queryParams);

        $ruangan = Ruangan::find()
            ->where(['nim_mahasiswa' => Yii::$app->user->identity->nim])
            ->all();
        
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
            'ruang' => $tasks,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('tampilkan', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionAktif()
    {
        $searchModel = new PesanankuSearch();
        $dataProvider = $searchModel->aktif(Yii::$app->request->queryParams);

        $ruangan = Ruangan::find()
            ->where(['nim_mahasiswa' => Yii::$app->user->identity->nim])
            ->andWhere(['status' => 'Aktif'])
            ->all();
        
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
            'ruang' => $tasks,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionMenunggu()
    {
        $searchModel = new PesanankuSearch();
        $dataProvider = $searchModel->menunggu(Yii::$app->request->queryParams);

        $ruangan = Ruangan::find()
            ->where(['nim_mahasiswa' => Yii::$app->user->identity->nim])
            ->andWhere(['status' => 'Menunggu Validasi'])
            ->all();
        
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
            'ruang' => $tasks,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionPesan()
    {
        $model = new PesanRuanganForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->pesan()) {

                Yii::$app->session->setFlash('success', 'Pemesanan ruang berhasil.');

                return $this->redirect('index');
            }
        }

        return $this->render('pesan', [
            'model' => $model,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Ruangan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}