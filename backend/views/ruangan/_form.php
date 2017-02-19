<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Ruangan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ruangan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'status')->dropDownList([ 'Menunggu Validasi' => 'Menunggu Validasi', 'Aktif' => 'Aktif', 'Sudah Selesai' => 'Sudah Selesai', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'validator')->textInput(['value' => Yii::$app->user->identity->nama, 'readonly' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
