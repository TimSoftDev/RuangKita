<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SesiWaktuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sesi Waktus';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sesi-waktu-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Sesi Waktu', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'sesi',
            'mulai',
            'selesai',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
