<?php

namespace backend\controllers;

use Yii;
use common\models\Ruangan;
use common\models\RuanganSearch;
use backend\models\PesanRuanganForm;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


/**
 * RuanganController implements the CRUD actions for Ruangan model.
 */
class RuanganController extends Controller
{
    /**
     * @inheritdoc
     */
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

    /**
     * Lists all Ruangan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RuanganSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $ruangan = Ruangan::find()->all();
        
        $tasks=[];  
        foreach ($ruangan AS $_ruang){
            $ruang = new \yii2fullcalendar\models\Event();
            $ruang->id = $_ruang->id;

            if ($_ruang->waktu_selesai < date('Y-m-d H:i') || $_ruang->status == 'Sudah Selesai') {
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

    /**
     * Displays a single Ruangan model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Ruangan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PesanRuanganForm();
        
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->pesan()) {

                Yii::$app->session->setFlash('success', 'Pemesanan ruang berhasil.');

                return $this->redirect('index');
            } else {
                Yii::$app->session->setFlash('error', 'Maaf, ada yang salah dengan inputan anda.');
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Ruangan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->validator = Yii::$app->user->identity->nama;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Ruangan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Ruangan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Ruangan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Ruangan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
