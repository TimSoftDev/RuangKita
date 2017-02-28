<?php

use yii\helpers\Html;
use yiister\gentelella\widgets\Panel;
use yiister\gentelella\widgets\StatsTile;

$this->title = 'Sistem Peminjaman Ruangan';
?>

<div class="main">
    <div class="row">
        <div class="col-xs-12 col-md-4">
            <?= StatsTile::widget(
                [
                    'icon' => 'podcast',
                    'header' => 'Peminjaman Aktif',
                    'text' => 'Data semua peminjaman aktif.',
                    'number' => $aktif,
                ]
            )
            ?>
        </div>
        <div class="col-xs-12 col-md-4">
            <?= StatsTile::widget(
                [
                    'icon' => 'history',
                    'header' => 'Menunggu Validasi',
                    'text' => 'Data pesanan yang menunggu validasi.',
                    'number' => $menunggu,
                ]
            )
            ?>
        </div>
        <div class="col-xs-12 col-md-4">
            <?= StatsTile::widget(
                [
                    'icon' => 'ban',
                    'header' => 'Tidak Aktif',
                    'text' => 'Data peminjaman yang sudah kadaluarsa.',
                    'number' => $nonaktif,
                ]
            )
            ?>
        </div>
    </div>

    <div style="margin-top: 16px">
        <?php
        Panel::begin(
            [
                'header' => 'Data Peminjamanku',
                'icon' => 'list',
                'collapsable' => true,
            ]
        ) ?>
            
            <div class="row">
                <div class="col-md-2 col-sm-2 col-xs-6">
                    <?= Html::button('Menunggu Validasi', ['class' => 'btn btn-xs btn-block btn-menunggu']); ?>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6">
                    <?= Html::button('Dalam Masa Aktif', ['class' => 'btn btn-xs btn-block btn-aktif']); ?>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6">
                    <?= Html::button('Sudah Kadaluarsa', ['class' => 'btn btn-xs btn-block btn-nonaktif']); ?>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6 pull-right">
                    <?= Html::a('Pesan Ruang', ['pesanan/pesan'], ['class' => 'btn btn-xs btn-block btn-primary']); ?>
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