<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Pesanan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pesanan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nim_mahasiswa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_ruang')->textInput() ?>

    <?= $form->field($model, 'no_surat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sesi_waktu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_mulai')->textInput() ?>

    <?= $form->field($model, 'tanggal_selesai')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([ 'Menunggu Validasi' => 'Menunggu Validasi', 'Sudah Digunakan' => 'Sudah Digunakan', 'Sudah Selesai' => 'Sudah Selesai', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'waktu_pesan')->textInput() ?>

    <?= $form->field($model, 'waktu_validasi')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
