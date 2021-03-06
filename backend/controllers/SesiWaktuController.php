<?php

namespace backend\controllers;

use Yii;
use common\models\SesiWaktu;
use common\models\SesiWaktuSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use backend\models\SesiWaktuForm;

/**
 * SesiWaktuController implements the CRUD actions for SesiWaktu model.
 */
class SesiWaktuController extends Controller
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
     * Lists all SesiWaktu models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SesiWaktuSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SesiWaktu model.
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
     * Creates a new SesiWaktu model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SesiWaktuForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($tambah = $model->tambah()) {

                Yii::$app->session->setFlash('success', 'Penambahan data sesi waktu berhasil.');
                return $this->redirect('index');
            }

        } 

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing SesiWaktu model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->tampil = $model->mulai . ' - ' . $model->selesai;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SesiWaktu model.
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
     * Finds the SesiWaktu model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SesiWaktu the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SesiWaktu::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
