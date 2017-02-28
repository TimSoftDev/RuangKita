<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\widgets\TimePicker;


$this->title = 'Tambah Sesi Waktu';

?>
<div class="main">
    
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sesi')->textInput(['maxlength' => true]) ?>

    <div class="row">
    	<div class="col-md-6 col-sm-6 col xs-12">
	    <?= $form->field($model, 'mulai')
	    	->widget(TimePicker::classname(), [
		    'options' => ['placeholder' => date('H:i')],
		    'pluginOptions' => [
		        'autoclose'=>true,
	        	'showMeridian' => false,
	        	'minuteStep' => 15
		    ]
		]); ?>
		</div>
    	<div class="col-md-6 col-sm-6 col xs-12">

	    <?= $form->field($model, 'selesai')
	    	->widget(TimePicker::classname(), [
		    'options' => ['placeholder' => date('H:i')],
		    'pluginOptions' => [
		        'autoclose'=>true,
	        	'showMeridian' => false,
	        	'minuteStep' => 15
		    ]
		]); ?>
		</div>
	</div>

    <div class="form-group">
        <?= Html::submitButton('Tambah', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>