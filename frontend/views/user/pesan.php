<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\Ruang;
use kartik\datetime\DateTimePicker;
use yiister\gentelella\widgets\Panel;

$this->title = 'Pesan Ruang';
$this->params['breadcrumbs'][] = ['label' => 'User', 'url' => ['user/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-pesan">

    <?php $form = ActiveForm::begin(); ?>
    	<?php
	    Panel::begin(
	        [
	            'header' => 'Data Saya',
	            'icon' => 'id-badge',
	            'collapsable' => true,
	        ]
	    )
	    ?>

    	<div class="row">
	    	<div class="col-md-4 col-sm-4 col-xs-12">
	    		<?= $form->field($model, 'nama')
		    		->textInput(['value' => strtoupper(Yii::$app->user->identity->nama_depan . ' ' . Yii::$app->user->identity->nama_belakang),
		    		'disabled' => 'disabled'
		    	]) ?>
	    	</div>
	    	<div class="col-md-4 col-sm-4 col-xs-12">
	    		<?= $form->field($model, 'nim')
	    			->label('NIM')
		    		->textInput(['value' => Yii::$app->user->identity->nim, 'disabled' => 'disabled'
		    	]) ?>
	    	</div>
	    	<div class="col-md-4 col-sm-4 col-xs-12">
	    		<?= $form->field($model, 'prodi')
		    		->textInput(['value' => Yii::$app->user->identity->prodi,
		    		'disabled' => 'disabled'
		    	]) ?>
	    	</div>
    	</div>

   		<?php Panel::end() ?>

   		<?php
	    Panel::begin(
	        [
	            'header' => 'Form Pemesanan Ruang',
	            'icon' => 'tasks',
	            'collapsable' => true,
	        ]
	    )
	    ?>

	    <?= $form->field($model, 'no_surat')
	    	->textInput(['maxlength' => true
	    ]) ?>

	    <?= $form->field($model, 'ruang')
            ->dropDownList(ArrayHelper::map(Ruang::find()->all(),
            'nama', 'nama'),
            ['prompt' => '=== PILIH RUANG ===']
        ) ?>

        <div class="row">

	        <?= $form->field($model, 'waktu_mulai')
	        	->widget(DateTimePicker::classname(), [
			    'options' => ['placeholder' => date('Y-m-d H:i')],
		    	'removeButton' => false,
		    	'pickerButton' => ['icon' => 'time'],
			    'pluginOptions' => [
			        'autoclose'=>true,		
			        'todayHighlight' => true,
			        'calendarWeeks' => true,
			        'format' => 'yyyy-mm-dd hh:ii'
			    ]
			]); ?>

			<?= $form->field($model, 'waktu_selesai')
				->widget(DateTimePicker::classname(), [
			    'options' => ['placeholder' => date('Y-m-d H:i')],
			    'removeButton' => false,
		    	'pickerButton' => ['icon' => 'time'],
			    'pluginOptions' => [
			        'autoclose'=>true,		
			        'todayHighlight' => true,
			        'calendarWeeks' => true,
			        'format' => 'yyyy-mm-dd hh:ii'
			    ]
			]); ?>
			
		</div>

	    <div class="form-group" style="margin-top: 40px">
	        <?= Html::submitButton('Pesan Sekarang', ['class' => 'btn btn-primary', 'name' => 'pesan-button']) ?>
	        <?= Html::resetButton('Reset', ['class' => 'btn btn-default', 'name' => 'reset-button']) ?>
	    </div>

   		<?php Panel::end() ?>
    <?php ActiveForm::end(); ?>

</div>