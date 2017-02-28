<?php
namespace backend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\Ruangan;
use common\models\RuanganSearch;
use backend\models\TambahDataPemesanan;


class DataController extends Controller
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
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
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

        return $this->render('index', [
            'ruang' => $tasks,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionTambah()
    {
        $model = new TambahDataPemesanan();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->tambah()) {

                Yii::$app->session->setFlash('success', 'Penambahan data penggunaan ruang berhasil.');

                return $this->redirect('index');
            }
        }

        return $this->render('tambah', [
            'model' => $model,
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

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $ruangan = Ruangan::find()
            ->where(['ruang' => $model->ruang])
            ->andWhere(['between', 'waktu_selesai', $model->waktu_mulai, $model->waktu_selesai])
            ->andWhere(['status' => 'Aktif'])
            ->count();

        if ($ruangan > 0 && $model->status !== 'Aktif') {
            Yii::$app->session->setFlash('error', 'Maaf, Anda tidak dapat mengaktifkan pemesanan ruangan ini, ruangan sudah ada yang menggunakan pada waktu tersebut.');

            return $this->render('perbarui', [
                'model' => $model,
            ]);

        } else if ($model->load(Yii::$app->request->post())) {
            $model->validator = Yii::$app->user->identity->nama;
            $model->waktu_validasi = date('Y-m-d H:i');
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);

        } else {
            return $this->render('perbarui', [
                'model' => $model,
            ]);
        }
    }

    protected function findModel($id)
    {
        if (($model = Ruangan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionAktif()
    {
        $ruangan = Ruangan::find()
        	->where(['status' => 'Aktif'])
        	->all();
        
        $tasks=[];  
        foreach ($ruangan AS $_ruang){
            $ruang = new \yii2fullcalendar\models\Event();
            $ruang->id = $_ruang->id;
			$ruang->backgroundColor= '#40A040';
            $ruang->borderColor= '#008000';
            $ruang->title = $_ruang->ruang;
            $ruang->start = $_ruang->waktu_mulai; 
            $ruang->end = $_ruang->waktu_selesai;
              
            $tasks[] = $ruang;
        }

        return $this->render('data', [
            'ruang' => $tasks,
            'title' => 'Data Sudah Divalidasi'
        ]);
    }

    public function actionMenunggu()
    {
        $ruangan = Ruangan::find()
        	->where(['status' => 'Menunggu Validasi'])
        	->all();
        
        $tasks=[];  
        foreach ($ruangan AS $_ruang){
            $ruang = new \yii2fullcalendar\models\Event();
            $ruang->id = $_ruang->id;
			$ruang->backgroundColor= '#FFBB40';
            $ruang->borderColor= '#FFA500';
            $ruang->title = $_ruang->ruang;
            $ruang->start = $_ruang->waktu_mulai; 
            $ruang->end = $_ruang->waktu_selesai;
              
            $tasks[] = $ruang;
        }

        return $this->render('data', [
            'ruang' => $tasks,
            'title' => 'Data Menunggu Validasi'
        ]);
    }

    public function actionNonaktif()
    {
        $ruangan = Ruangan::find()
            ->where(['between', 'waktu_selesai', 0, date('Y-m-d H:i')])
            ->all();
        
        $tasks=[];  
        foreach ($ruangan AS $_ruang){
            $ruang = new \yii2fullcalendar\models\Event();
            $ruang->id = $_ruang->id;
            $ruang->backgroundColor= '#FF4040';
            $ruang->borderColor= '#FF0000';
            $ruang->title = $_ruang->ruang;
            $ruang->start = $_ruang->waktu_mulai; 
            $ruang->end = $_ruang->waktu_selesai;
              
            $tasks[] = $ruang;
        }

        return $this->render('data', [
            'ruang' => $tasks,
            'title' => 'Data Sudah Kadaluarsa'
        ]);
    }
}