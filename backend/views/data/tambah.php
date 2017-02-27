<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\Ruang;
use common\models\SesiWaktu;
use yiister\gentelella\widgets\Panel;
use kartik\date\DatePicker;

$this->title = 'Tambah Data Pemesanan Ruangan';

?>
<div class="data-tambah">

	<?php $form = ActiveForm::begin(); ?>
    	<?php
	    Panel::begin(
	        [
	            'header' => 'Data Identitas',
	            'icon' => 'id-badge',
	            'collapsable' => true,
	        ]
	    )
	    ?>

    	<div class="row">
	    	<div class="col-md-6 col-sm-6 col-xs-12">
	    		<?= $form->field($model, 'validator')->textInput(['value' => Yii::$app->user->identity->nama, 'disabled' => 'disabled']) ?>
	    	</div>
	    	<div class="col-md-6 col-sm-6 col-xs-12">
	    		<?= $form->field($model, 'status')->textInput(['value' => 'Aktif', 'disabled' => 'disabled']) ?>
	    	</div>
    	</div>

   		<?php Panel::end() ?>

   		<?php
	    Panel::begin(
	        [
	            'header' => 'Form Tambah Pemesanan Ruang',
	            'icon' => 'tasks',
	            'collapsable' => true,
	        ]
	    )
	    ?>
	    <?= $form->field($model, 'nim_mahasiswa')->textInput(['maxlength' => true]) ?>
	    <?= $form->field($model, 'no_surat')->textInput(['maxlength' => true]) ?>

	    <?= $form->field($model, 'ruang')
            ->dropDownList(ArrayHelper::map(Ruang::find()
            ->select('nama')
            ->all(),
            'nama', 'nama'),
            ['prompt' => '=== PILIH RUANG ===']
        ) ?>

        <?= $form->field($model, 'tanggal')
        	->widget(DatePicker::classname(), [
		    'options' => ['placeholder' => date('Y-m-d H:i')],
	    	'removeButton' => false,
		    'pluginOptions' => [
		        'autoclose'=>true,		
		        'todayHighlight' => true,
		        'calendarWeeks' => true,
		        'format' => 'yyyy-mm-dd'
		    ]
		]); ?>

		<?= $form->field($model, 'sesi_waktu')
			->dropDownList(ArrayHelper::map(SesiWaktu::find()
			->select('tampil')
			->all(),
			'tampil', 'tampil'),
			['prompt' => '=== SESI WAKTU ===']
		) ?>

	    <div class="form-group" style="margin-top: 40px">
	        <?= Html::submitButton('Tambah Data', ['class' => 'btn btn-primary', 'name' => 'pesan-button']) ?>
	        <?= Html::resetButton('Reset', ['class' => 'btn btn-default', 'name' => 'reset-button']) ?>
	    </div>

   		<?php Panel::end() ?>
    <?php ActiveForm::end(); ?>

</div>