<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\RuanganSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pemesanan Ruangan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ruangan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Pemesanan Ruangan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'nim_mahasiswa',
            'ruang',
            'no_surat',
            'waktu_mulai',
            'waktu_selesai',
            //'waktu_pesan',
            'status',
            // 'waktu_validasi',
            // 'validator',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>

    <div style="margin-top: 48px;"></div>

    <button class="btn btn-sm" style="background-color: #FFBB40; border-color: #FFA500; color: #fff;">Menunggu Validasi</button>
    <button class="btn btn-sm" style="background-color: #40A040; border-color: #008000; color: #fff;">Dalam Masa Aktif</button>
    <button class="btn btn-sm" style="background-color: #FF4040; border-color: #FF0000; color: #fff;">Sudah Kadaluarsa</button>


    <div style="margin-top: 32px;"></div>

    <?= \yii2fullcalendar\yii2fullcalendar::widget(array(
        'options' => [
            'lang' => 'id',
        ],
        'clientOptions' => [
            'selectable' => true,
        ],
        'events'=> $ruang,
    )); ?>
