<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;
use kartik\datetime\DateTimePicker;
use yiister\gentelella\widgets\Panel;
use common\models\Ruang;


$this->title = 'Monitor Ruangan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ruangan-index">

    <?php $form = ActiveForm::begin([
        'method' => 'get',
    ]); ?>

        <?= $form->field($searchModel, 'ruang')
            ->label(false)
            ->dropDownList(ArrayHelper::map(Ruang::find()->all(),
            'nama', 'nama'),
            ['prompt' => '=== CEK RUANGAN ===']
        ) ?>

        <div class="form-group">
            <?= Html::submitButton('Tampilkan Ruang', ['class' => 'btn btn-primary btn-sm']) ?>
            <?= Html::a('Pesan Sekarang', ['pesan'], ['class' => 'btn btn-default btn-sm']) ?>
        </div>
    <?php ActiveForm::end(); ?>

    <div style="margin-bottom: 40px"></div>

    <?php
    Panel::begin(
        [
            'header' => 'Menampilkan Data Pemesanan <a href="#" data-toggle="modal" data-target="#kalender"><small>Tampilan Kalender<small></a>',
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
                ],
                'hover' => true,
                'condensed' => true,
            ]
        );
        ?>
    <?php Pjax::end(); ?>
    <?php Panel::end() ?>

</div>

<?php
    Modal::begin([
        'header' => '<h3>Menampilkan Data Pemesanan</h3>',
        'id' => 'kalender',
        'size' => 'modal-lg'
    ]) ?>

    <button class="btn btn-xs" style="background-color: #FFBB40; border-color: #FFA500; color: #fff;cursor: inherit;">Menunggu Validasi</button>
    <button class="btn btn-xs" style="background-color: #40A040; border-color: #008000; color: #fff;cursor: inherit;">Dalam Masa Aktif</button>
    <button class="btn btn-xs" style="background-color: #FF4040; border-color: #FF0000; color: #fff;cursor: inherit;">Sudah Kadaluarsa</button>

    <div style="margin-top: 32px;"></div>

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

    <?php Modal::end() ?>