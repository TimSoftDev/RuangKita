<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;
use yiister\gentelella\widgets\Panel;
use common\models\Ruang;


$this->title = 'Data Pemesanan';

?>
<div class="main">

    <?php $form = ActiveForm::begin([
        'method' => 'get',
    ]); ?>

        <?= $form->field($searchModel, 'ruang')
            ->label(false)
            ->dropDownList(ArrayHelper::map(Ruang::find()
            ->select('nama')
            ->all(),
            'nama', 'nama'),
            ['prompt' => '=== CEK RUANGAN ===']
        ) ?>

        <div class="form-group">
            <?= Html::submitButton('Tampilkan Ruang', ['class' => 'btn btn-primary btn-sm']) ?>
            <?= Html::a('Tambah Data', ['data/tambah'], ['class' => 'btn btn-default btn-sm']) ?>
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

                    [
                    	'value' => 'nim_mahasiswa',
                    	'label' => 'NIM'
                    ],
                    'no_surat',
                    'ruang',
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

<?php
Modal::begin([
    'header' => '<h3>Menampilkan Data Pemesanan</h3>',
    'id' => 'kalender',
    'size' => 'modal-lg'
]) ?>

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
        <div class="clearfix"></div>
    </div>

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