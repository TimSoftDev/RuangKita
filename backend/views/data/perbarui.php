<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yiister\gentelella\widgets\Panel;

$this->title = 'Validasi Data Pemesanan Ruangan';

?>
<div class="data-tambah">

	<?php $form = ActiveForm::begin(); ?>
    	<?php
	    Panel::begin(
	        [
	            'header' => 'Data Validator',
	            'icon' => 'id-badge',
	            'collapsable' => true,
	        ]
	    )
	    ?>

    	<div class="row">
	    	<div class="col-md-6 col-sm-6 col-xs-12">
	    		<?= $form->field($model, 'status')->dropDownList([ 'Menunggu Validasi' => 'Menunggu Validasi', 'Aktif' => 'Aktif' ], ['prompt' => '']) ?>
	    	</div>
	    	<div class="col-md-6 col-sm-6 col-xs-12">
	    		<?= $form->field($model, 'validator')->textInput(['value' => Yii::$app->user->identity->nama, 'disabled' => 'disabled']) ?>
	    	</div>
    	</div>

	    <div class="form-group" style="margin-top: 40px">
	        <?= Html::submitButton('Perbarui', ['class' => 'btn btn-primary', 'name' => 'pesan-button']) ?>
	        <?= Html::resetButton('Reset', ['class' => 'btn btn-default', 'name' => 'reset-button']) ?>
	        <?= Html::a('<< Kembali', ['data/index'], ['class' => 'btn btn-default pull-right']) ?>
	    </div>

   		<?php Panel::end() ?>
    <?php ActiveForm::end(); ?>

</div>