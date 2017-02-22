<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\Ruang;
use kartik\datetime\DateTimePicker;

$this->title = 'Pesan Ruang';
$this->params['breadcrumbs'][] = ['label' => 'User', 'url' => ['user/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pesanan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="pesanan-form">

	    <?php $form = ActiveForm::begin(); ?>

	    	<?= $form->field($model, 'nama')
	    		->textInput(['value' => strtoupper(Yii::$app->user->identity->nama_depan . ' ' . Yii::$app->user->identity->nama_belakang),
	    		'disabled' => 'disabled'
	    	]) ?>

	    	<?= $form->field($model, 'nim')
	    		->textInput(['value' => Yii::$app->user->identity->nim, 'disabled' => 'disabled'
	    	]) ?>

	    	<?= $form->field($model, 'prodi')
	    		->textInput(['value' => Yii::$app->user->identity->prodi,
	    		'disabled' => 'disabled'
	    	]) ?>

		    <?= $form->field($model, 'no_surat')
		    	->textInput(['maxlength' => true
		    ]) ?>

		    <?= $form->field($model, 'ruang')
                ->dropDownList(ArrayHelper::map(Ruang::find()->all(),
                'nama', 'nama'),
                ['prompt' => 'Pilih Ruang']
            ) ?>

            <?= $form->field($model, 'waktu_mulai')
            	->widget(DateTimePicker::classname(), [
			    'options' => ['placeholder' => date('Y-m-d H:i')],
			    'pluginOptions' => [
			        'autoclose'=>true,		
			        'todayHighlight' => true,
			        'calendarWeeks' => true,
			        'daysOfWeekDisabled' => [0, 5, 6],
			        'format' => 'yyyy-mm-dd hh:ii'
			    ]
			]); ?>

			<?= $form->field($model, 'waktu_selesai')
				->widget(DateTimePicker::classname(), [
			    'options' => ['placeholder' => date('Y-m-d H:i')],
			    'pluginOptions' => [
			        'autoclose'=>true,		
			        'todayHighlight' => true,
			        'calendarWeeks' => true,
			        'daysOfWeekDisabled' => [0, 5, 6],
			        'format' => 'yyyy-mm-dd hh:ii'
			    ]
			]); ?>

		    <div class="form-group">
		        <?= Html::submitButton('Pesan', ['class' => 'btn btn-primary', 'name' => 'pesan-button']) ?>
		    </div>

	    <?php ActiveForm::end(); ?>

    </div>
</div>