<?php

use yii\helpers\Html;
use yiister\gentelella\widgets\Panel;
use yiister\gentelella\widgets\StatsTile;

$this->title = 'Sistem Peminjaman Ruang';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
    <div class="row">
        <div class="col-xs-12 col-md-4">
            <?= StatsTile::widget(
                [
                    'icon' => 'podcast',
                    'header' => 'Pesanan Aktif',
                    'text' => 'Jumlah semua pesanan aktif.',
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
                    'text' => 'Jumlah pesanan yang menunggu validasi.',
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
                    'text' => 'Jumlah pesanan yang sudah kadaluarsa',
                    'number' => $nonaktif,
                ]
            )
            ?>
        </div>
    </div>

	<div style="margin-bottom: 32px"></div>
	<?php
    Panel::begin(
        [
            'header' => 'Data Pesananku',
            'icon' => 'bar-chart',
            'collapsable' => true,
        ]
    )
    ?>

    <?= \yii2fullcalendar\yii2fullcalendar::widget(array(
        'options' => [
            'lang' => 'id'
        ],
        'events' => $ruang,
        'header' => [	        	
	        'center'=>'title',
	        'left'=>'prev next today',        
	        'right'=>'agendaDay agendaWeek listMonth'
        ],
        'defaultView' => 'listYear'
    )); ?>

    <?php Panel::end() ?>
</div>