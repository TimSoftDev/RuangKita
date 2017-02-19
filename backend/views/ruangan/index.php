<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\RuanganSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ruangans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ruangan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ruangan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nim_mahasiswa',
            'ruang',
            'no_surat',
            'waktu_mulai',
            // 'waktu_selesai',
            // 'status',
            // 'waktu_pesan',
            // 'waktu_validasi',
            // 'validator',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
