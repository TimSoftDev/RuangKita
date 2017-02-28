<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;
use yiister\gentelella\widgets\Panel;


$this->title = 'Data Ruangan';

?>
<div class="main">
    <?= Html::a('Tambah Data', ['create'], ['class' => 'btn btn-primary']) ?>

    <div style="margin-bottom: 24px"></div>

    <?php
    Panel::begin(
        [
            'header' => 'Menampilkan Data Ruangan',
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

                    'nama',
                    'kapasitas',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
                'hover' => true,
                'condensed' => true,
            ]
        );
        ?>
    <?php Pjax::end(); ?>
    <?php Panel::end() ?>

</div>