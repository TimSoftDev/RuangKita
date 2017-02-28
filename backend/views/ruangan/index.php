<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;
use yiister\gentelella\widgets\Panel;
use kartik\datetime\DateTimePicker;

$this->title = 'Data Pemesanan Ruangan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ruangan-index">

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <?php
            Panel::begin(
                [
                    'header' => ' Cari Data',
                    'icon' => 'search',
                    'removable' => true,
                    'collapsable' => true,
                ]
            )
            ?>

            <div class="col-sm-8 col-sm-offset-2 col-xs-12">

            <?php $form = ActiveForm::begin([
                'method' => 'get',
            ]); ?>

            <div class="row">
                <div class="col-md-6">

                    <?= $form->field($searchModel, 'nim_mahasiswa') ?>

                    <?= $form->field($searchModel, 'ruang') ?>

                    <?= $form->field($searchModel, 'no_surat') ?>

                </div>

                <div class="col-md-6">

                    <?= $form->field($searchModel, 'waktu_mulai')
                        ->widget(DateTimePicker::classname(), [
                        'pluginOptions' => [
                            'autoclose'=>true,      
                            'todayHighlight' => true,
                            'calendarWeeks' => true,
                            'format' => 'yyyy-mm-dd hh:ii'
                        ]
                    ]); ?>

                    <?= $form->field($searchModel, 'waktu_selesai')
                        ->widget(DateTimePicker::classname(), [
                        'pluginOptions' => [
                            'autoclose'=>true,      
                            'todayHighlight' => true,
                            'calendarWeeks' => true,
                            'format' => 'yyyy-mm-dd hh:ii'
                        ]
                    ]); ?>

                        <?= $form->field($searchModel, 'waktu_pesan')
                        ->widget(DateTimePicker::classname(), [
                        'pluginOptions' => [
                            'autoclose'=>true,      
                            'todayHighlight' => true,
                            'calendarWeeks' => true,
                            'format' => 'yyyy-mm-dd hh:ii'
                        ]
                    ]); ?>

                </div>

            </div>
            
                <div class="ln_solid"></div>
                <div class="form-group">
                    <?= Html::submitButton('<i class="fa fa-search"></i> Cari Data', ['class' => 'btn btn-primary']) ?>
                </div>
            <?php ActiveForm::end(); ?>

            </div>

            <?php Panel::end() ?>
        </div>

        <div class="col-md-12 col-sm-12 col-xs-12">
            <?php
            Panel::begin(
                [
                    'header' => ' Menampilkan Data Pemesanan',
                    'icon' => 'list',
                    'removable' => true,
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