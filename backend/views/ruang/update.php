<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

$this->title = 'Update Ruangan: ' . $model->nama;
?>
<div class="main">
    
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kapasitas')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Perbarui', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>