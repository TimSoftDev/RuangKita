<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;
use yiister\gentelella\widgets\Panel;


$this->title = 'Data Pemesanan Peminjamanku';
?>
<div class="main">
        
    <?= Html::a('Pesan Ruang', ['pesanan/pesan'], ['class' => 'btn btn-md btn-block btn-primary', 'style' => 'margin-bottom: 24px']); ?>

    <?php
    Panel::begin(
        [
            'header' => 'Data Peminjaman Ruang <small>Tampilan Grid</small>',
            'icon' => 'list-alt',
            'collapsable' => true,
        ]
    )
    ?>
    
    <?php Pjax::begin(); ?>
        <?= \yiister\gentelella\widgets\grid\GridView::widget(
            [
                'dataProvider' => $dataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'ruang',
                    'waktu_mulai',
                    'waktu_selesai',
                    'status',

                    [
                    	'class' => 'yii\grid\ActionColumn',
                    	'template' => '{view}',
                    ],
                ],
                'hover' => true,
                'condensed' => true,
            ]
        );
        ?>
    <?php Pjax::end(); ?>
    <?php Panel::end() ?>

    <div style="margin-top: 16px">
        <?php
        Panel::begin(
            [
                'header' => 'Data Peminjaman Ruang <small>Tampilan Kalender</small>',
                'icon' => 'calendar',
                'expandable' => true,
            ]
        )
        ?>
        
            <div class="row">
                <div class="col-md-2 col-sm-2 col-xs-6">
                    <?= Html::button('Menunggu Validasi', ['class' => 'btn btn-xs btn-block btn-menunggu']); ?>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6">
                    <?= Html::button('Dalam Masa Aktif', ['class' => 'btn btn-xs btn-block btn-aktif']); ?>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12">
                    <?= Html::button('Sudah Kadaluarsa', ['class' => 'btn btn-xs btn-block btn-nonaktif']); ?>
                </div>
            </div>

            <div style="margin-top: 32px"></div>

            <?= \yii2fullcalendar\yii2fullcalendar::widget(array(
                'options' => [
                    'lang' => 'id'
                ],
                'events' => $ruang,
                'header' => [               
                    'center'=>'title',
                    'left'=>'prev next today',        
                    'right'=>'agendaDay agendaWeek listMonth'
                ]
            )); ?>
        <?php Panel::end() ?>
    </div>
</div>