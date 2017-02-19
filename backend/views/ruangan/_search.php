<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\RuanganSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ruangan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nim_mahasiswa') ?>

    <?= $form->field($model, 'ruang') ?>

    <?= $form->field($model, 'no_surat') ?>

    <?= $form->field($model, 'waktu_mulai') ?>

    <?php // echo $form->field($model, 'waktu_selesai') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'waktu_pesan') ?>

    <?php // echo $form->field($model, 'waktu_validasi') ?>

    <?php // echo $form->field($model, 'validator') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
