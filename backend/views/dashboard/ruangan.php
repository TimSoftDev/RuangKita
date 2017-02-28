<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;
use yiister\gentelella\widgets\Panel;
use kartik\date\DatePicker;
use common\models\Ruang;

$this->title = 'Data Pemesanan Ruangan';
?>
<div class="main">

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <?php
            Panel::begin(
                [
                    'header' => 'Cari Data Pemesanan Ruang',
                    'icon' => 'search',
                    'expandable' => true,
                ]
            )
            ?>

            <?php $form = ActiveForm::begin([
                'method' => 'get',
            ]); ?>

            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">

                    <?= $form->field($searchModel, 'nim_mahasiswa')->label('NIM') ?>

                </div>

                <div class="col-md-4 col-sm-4 col-xs-12">

                    <?= $form->field($searchModel, 'ruang')
                        ->dropDownList(ArrayHelper::map(Ruang::find()->select('nama')->all(),
                        'nama', 'nama'),
                        ['prompt' => '']
                    ) ?>

                </div>

                <div class="col-md-4 col-sm-4 col-xs-12">

                    <?= $form->field($searchModel, 'no_surat') ?>

                </div>

            </div>
            
                <div class="ln_solid"></div>
                <div class="form-group">
                    <?= Html::submitButton('<i class="fa fa-search"></i> Cari Data', ['class' => 'btn btn-primary']) ?>
                </div>
            <?php ActiveForm::end(); ?>
            <?php Panel::end() ?>

            <?php
            Panel::begin(
                [
                    'header' => ' Menampilkan Data Pemesanan',
                    'icon' => 'list',
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

                            'nim_mahasiswa',
                            'ruang',
                            'no_surat',
                            'waktu_mulai',
                            'waktu_selesai',
                            'status',

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
    </div>
</div>