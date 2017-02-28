<?php

use yii\helpers\Html;
use dosamigos\chartjs\ChartJs;
use common\models\Ruangan;
use yiister\gentelella\widgets\Panel;
use yiister\gentelella\widgets\StatsTile;

$this->title = 'Pemesanan Ruangan';
?>

<div class="main">
    <div class="row">
        <div class="col-xs-12 col-md-4">
            <?= StatsTile::widget(
                [
                    'icon' => 'bar-chart',
                    'header' => 'Pesanan Aktif',
                    'text' => 'Jumlah semua pesanan aktif',
                    'number' => $aktif,
                ]
            )
            ?>
        </div>
        <div class="col-xs-12 col-md-4">
            <?= StatsTile::widget(
                [
                    'icon' => 'pie-chart',
                    'header' => 'Bulan Ini',
                    'text' => 'Jumlah pesanan bulan ini',
                    'number' => $bulan_ini,
                ]
            )
            ?>
        </div>
        <div class="col-xs-12 col-md-4">
            <?= StatsTile::widget(
                [
                    'icon' => 'users',
                    'header' => 'User',
                    'text' => 'Jumlah pemesan aktif',
                    'number' => $user,
                ]
            )
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-xs-12">
            <?php
            Panel::begin(
                [
                    'header' => 'Data Aktivitas Pemesanan',
                    'icon' => 'bar-chart',
                    'collapsable' => true,
                ]
            )
            ?>
            <?= ChartJs::widget([
                'type' => 'bar',
                'options' => [
                    'height' => 200,
                    'width' => 600
                ],
                'data' => [
                    'labels' => [date('F', strtotime("-4 Months")), date('F', strtotime("-3 Months")), date('F', strtotime("-2 Months")), date('F', strtotime("-1 Months")), date('F'), date('F', strtotime("+1 Months"))],
                    'datasets' =>
                    [
                        [
                            'backgroundColor' => [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            'borderColor' => [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            'borderWidth' => 1,

                            'label' => 'Total',
                            'data' => $data,
                        ]
                    ]
                ]
            ]) ?>

            <?php Panel::end() ?>
        </div>
    </div>
</div>