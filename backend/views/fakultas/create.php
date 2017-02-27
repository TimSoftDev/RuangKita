<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;
use yiister\gentelella\widgets\Panel;


$this->title = 'Tambah Fakultas';

?>
<div class="fakultas-create">
    <?php
    Panel::begin(
        [
            'header' => 'Tambah Data Fakultas',
            'icon' => 'pencil',
            'collapsable' => true,
        ]
    )
    ?>
    
	    <?php $form = ActiveForm::begin(); ?>

	    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

	    <?= $form->field($model, 'alamat')->textArea(['maxlength' => true]) ?>

	    <div class="form-group">
	        <?= Html::submitButton('Tambah', ['class' => 'btn btn-primary']) ?>
	    </div>

	    <?php ActiveForm::end(); ?>
    <?php Panel::end() ?>

</div>