<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;


$this->title = 'List Ruangan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ruangan-index">    

    <div class="">

    <p>
        <?= Html::a('Pesan Sekarang', ['pesan'], ['class' => 'btn btn-success']) ?>
    </p>

    </div>

    <?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ruang',
            'waktu_mulai',
            'waktu_selesai',
            'status',
        ],
    ]); ?>
    <?php Pjax::end(); ?>

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
   
</div>