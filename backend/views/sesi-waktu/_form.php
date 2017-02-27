<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SesiWaktu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sesi-waktu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sesi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mulai')->textInput() ?>

    <?= $form->field($model, 'selesai')->textInput() ?>

    <?= $form->field($model, 'tampil')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
