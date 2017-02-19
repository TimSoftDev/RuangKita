<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\Ruang;
use kartik\datetime\DateTimePicker;


/* @var $this yii\web\View */
/* @var $model common\models\Ruangan */

$this->title = 'Tambah Pemesanan Ruangan';
$this->params['breadcrumbs'][] = ['label' => 'Pemesanan Ruangan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ruangan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

		    <?= $form->field($model, 'nim_mahasiswa')->textInput(['maxlength' => true]) ?>

		    <?= $form->field($model, 'no_surat')->textInput(['maxlength' => true]) ?>

		    <?= $form->field($model, 'ruang')
                ->dropDownList(ArrayHelper::map(Ruang::find()->all(),
                'nama', 'nama'),
                ['prompt' => 'Pilih Ruang']
            ) ?>

            <?= $form->field($model, 'waktu_mulai')->widget(DateTimePicker::classname(), [
			    'options' => ['placeholder' => date('Y-m-d H:i')],
			    'pluginOptions' => [
			        'autoclose'=>true,		
			        'todayHighlight' => true,
			        'calendarWeeks' => true,
			        'daysOfWeekDisabled' => [0, 5, 6],
			        'format' => 'yyyy-mm-dd HH:ii'
			    ]
			]); ?>

			<?= $form->field($model, 'waktu_selesai')->widget(DateTimePicker::classname(), [
			    'options' => ['placeholder' => date('Y-m-d H:i')],
			    'pluginOptions' => [
			        'autoclose'=>true,		
			        'todayHighlight' => true,
			        'calendarWeeks' => true,
			        'daysOfWeekDisabled' => [0, 5, 6],
			        'format' => 'yyyy-mm-dd HH:ii'
			    ]
			]); ?>

		    <div class="form-group">
		        <?= Html::submitButton('Pesan', ['class' => 'btn btn-primary', 'name' => 'pesan-button']) ?>
		    </div>

	    <?php ActiveForm::end(); ?>

</div>