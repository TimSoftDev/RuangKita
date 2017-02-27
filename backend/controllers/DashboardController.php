<?php

namespace backend\controllers;

use Yii;
use common\models\Ruangan;
use backend\models\DataSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class DashboardController extends Controller
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
        $bulan1 = Ruangan::find()
            ->where(['between', 'waktu_mulai', date('Y-m-0', strtotime("-4 Months")), date('Y-m-0', strtotime("-3 Months"))])
            ->count();

        $bulan2 = Ruangan::find()
            ->where(['between', 'waktu_mulai', date('Y-m-0', strtotime("-3 Months")), date('Y-m-0', strtotime("-2 Months"))])
            ->count();

        $bulan3 = Ruangan::find()
            ->where(['between', 'waktu_mulai', date('Y-m-0', strtotime("-2 Months")), date('Y-m-0', strtotime("-1 Months"))])
            ->count();

        $bulan4 = Ruangan::find()
            ->where(['between', 'waktu_mulai', date('Y-m-0', strtotime("-1 Months")), date('Y-m-0')])
            ->count();

        $bulan5 = Ruangan::find()
            ->where(['between', 'waktu_mulai', date('Y-m-0'), date('Y-m-0', strtotime("+1 Months"))])
            ->count();

        $bulan6 = Ruangan::find()
            ->where(['between', 'waktu_mulai', date('Y-m-0', strtotime("+1 Months")), date('Y-m-0', strtotime("+2 Months"))])
            ->count();

        $aktif = Ruangan::find()
            ->where(['status' => 'Aktif'])
            ->count();

        $user = Ruangan::find()
            ->select(['nim_mahasiswa'])
            ->groupBy(['nim_mahasiswa'])
            ->count();


        
        $data = [$bulan1, $bulan2, $bulan3, $bulan4, $bulan5, $bulan6];

 
        return $this->render('index', [
            'data' => $data,
            'aktif' => $aktif,
            'bulan_ini' => $bulan5,
            'user' => $user,
        ]);
    }
    
    public function actionRuangan()
    {
        $searchModel = new DataSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('ruangan', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}

